<?php

namespace App\Listeners;

use App\Models\UserLog;
use DeviceDetector\ClientHints;
use DeviceDetector\DeviceDetector;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        if (!$event->user->id)
            return;

        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? request()->userAgent();
        $clientHints = ClientHints::factory($_SERVER);
        $agent = new DeviceDetector($userAgent, $clientHints);
        $agent->parse();

        $system = $agent->getOs();
        $browser = $agent->getClient();

        UserLog::query()->create(
            [
                "user_id"          => $event->user->id,
                "event"            => "logout",
                "ip_address"       => request()->ip(),
                "operating_system" => $system["platform"] ? $system["name"] . "-" . $system["platform"] : $system["name"],
                "browser"          => $browser["name"],
                "user_agent"       => request()->userAgent(),
            ]
        );
    }
}
