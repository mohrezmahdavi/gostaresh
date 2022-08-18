<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

    private function add_delete_permissions()
    {
        $models = getAppModelsList(app_path() . "/Models", false);
        $models[] = "Role";
        foreach ($models as $model)
            Permission::create(['name' => 'delete-any-' . $model, "guard_name" => "web"]);
    }

    private function add_Edit_permissions()
    {
        $models = getAppModelsList(app_path() . "/Models", false);
        $models[] = "Role";
        foreach ($models as $model)
            Permission::create(['name' => 'edit-any-' . $model, "guard_name" => "web"]);

    }

    private function add_create_permissions()
    {
        $models = getAppModelsList(app_path() . "/Models", false);
        $models[] = "Role";
        foreach ($models as $model)
            Permission::create(['name' => 'create-any-' . $model, "guard_name" => "web"]);
    }

    private function add_view_permissions()
    {
        $models = getAppModelsList(app_path() . "/Models", false);
        $models[] = "Role";
        //
        foreach ($models as $model) {
            Permission::create(['name' => 'view-any-' . $model, "guard_name" => "web"]);
        }
    }

    private function resolveRequestNameSpace($modelNameSpace)
    {
        $requestsNameSpace = "App\\Http\\Requests\\Gostaresh";

        $modelArray = explode("\\", $modelNameSpace);

        $model = $modelArray[count($modelArray) - 1];

        $request = $requestsNameSpace . "\\" . $model . "\\" . $model . "Request";

        if (!class_exists($request)) {
            $model = str_replace("Analysis", "", $model);
            $request = $requestsNameSpace . "\\" . $model . "\\" . $model . "Request";
        }

        if (!class_exists($request)) {
            $model = str_replace("Status", "", $model);
            $request = $requestsNameSpace . "\\" . $model . "\\" . $model . "Request";
        }

        if (!class_exists($request)) {
            $model = str_replace("IndexOf", "", $model);
            $request = $requestsNameSpace . "\\" . $model . "\\" . $model . "Request";
        }

        if (!class_exists($request)) {
            $model = str_replace("Trends", "", $model);
            $request = $requestsNameSpace . "\\" . $model . "\\" . $model . "Request";
        }

        if (!class_exists($request)) {
            $model = str_replace("Average", "", $model);
            $request = $requestsNameSpace . "\\" . $model . "\\" . $model . "Request";
        }

        if (!class_exists($request)) {
            $model = str_replace("ToAchieve", "", $model);
            $request = $requestsNameSpace . "\\" . $model . "\\" . $model . "Request";
        }

        if (!class_exists($request)) {
            $model = str_replace("Situation", "", $model);
            $request = $requestsNameSpace . "\\" . $model . "\\" . $model . "Request";
        }

        if (!class_exists($request)) {
            $model = str_replace("Centers", "", $model);
            $request = $requestsNameSpace . "\\" . $model . "\\" . $model . "Request";
        }
        if (!class_exists($request)) {
            $model = str_replace("ForResearchAchievements", "", $model);
            $request = $requestsNameSpace . "\\" . $model . "\\" . $model . "Request";
        }

        if (!class_exists($request)) {
            $model = str_replace("TechnologyAnd", "", $model);
            $request = $requestsNameSpace . "\\" . $model . "\\" . $model . "Request";
        }

        if (!class_exists($request)) {
            $request = $requestsNameSpace . "\\" . $model . "s\\" . $model . "sRequest";
        }

        return $request;
    }

    private function mockValidationRequest($request)
    {
        $this->mock($request, function ($mock) {
            $mock->shouldReceive('validated')->andReturn([]);
            $mock->shouldReceive('all')->andReturn([]);
            $mock->shouldReceive('route')->andReturn(null);
        });
    }


    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_cant_view_lists_without_permission()
    {
        $user = User::factory()->create();

        foreach (config("gostaresh-urls.url") as $part)
            foreach ($part as $subPart)
                foreach ($subPart as $key => $table) {
                    $response = $this->actingAs($user)
                        ->get(route($table["name"] . ".index"));
                    $response->assertForbidden();
                }
    }

    public function test_admin_can_view_lists_permission()
    {
        $this->add_view_permissions();

        $role = Role::create(['name' => 'admin']);

        $role->givePermissionTo(Permission::all());

        $user = User::factory()->create();

        $user->assignRole('admin');

        foreach (config("gostaresh-urls.url") as $part)
            foreach ($part as $subPart)
                foreach ($subPart as $key => $table) {
                    $response = $this->actingAs(User::first())
                        ->get(route($table["name"] . ".index"));
                    $response->assertOk();
                }
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_can_not_view_create_pages_without_permission()
    {
        $user = User::factory()->create();

        foreach (config("gostaresh-urls.url") as $part)
            foreach ($part as $subPart)
                foreach ($subPart as $key => $table) {
                    echo "   admin can not create " . $table["name"];
                    $response = $this->actingAs($user)
                        ->get(route($table["name"] . ".create"));
                    $response->assertForbidden();
                    echo "  PASS \n ";
                }
    }
//

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_Admin_can_view_create_pages()
    {
        $this->add_create_permissions();

        $this->add_view_permissions();

        $role = Role::create(['name' => 'admin']);

        $role->givePermissionTo(Permission::all());

        $user = User::factory()->create();

        $user->assignRole('admin');

        foreach (config("gostaresh-urls.url") as $part)
            foreach ($part as $subPart)
                foreach ($subPart as $key => $table) {
                    echo "   admin can create " . $table["name"];
                    $response = $this->actingAs($user)
                        ->get(route($table["name"] . ".create"));
                    $response->assertOk();

                    echo "  PASS \n ";
                }
    }

    public function test_user_can_not_delete_without_permission()
    {
        $user = User::factory()->create();

        foreach (config("gostaresh-urls.url") as $part)
            foreach ($part as $subPart)
                foreach ($subPart as $key => $table) {
                    $model = $table["model"]::create([]);
                    echo "   user can not delete " . $table["name"];
                    $response = $this->actingAs($user)
                        ->delete(route($table["name"] . ".destroy", $model));
                    $response->assertForbidden();
                    echo " {$response->status()} PASS \n ";
                }
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_Admin_can_delete_items()
    {
        $user = User::factory()->create();

        $this->add_delete_permissions();

        $user->givePermissionTo(Permission::all());

        foreach (config("gostaresh-urls.url") as $part)
            foreach ($part as $subPart)
                foreach ($subPart as $key => $table) {
                    $model = $table["model"]::create([]);
                    $model = $table["model"]::firstOrFail();
                    if (!$model->id) dd($table["model"]::create([]));
                    echo "   admin can delete " . $table["name"];
                    $response = $this->followingRedirects()->actingAs($user)
                        ->get(route($table["name"] . ".destroy", $model));
                    $response->assertOk();

                    echo "  PASS \n ";
                }
    }

    public function test_user_can_not_store_without_permission()
    {
        $user = User::factory()->create();

        foreach (config("gostaresh-urls.url") as $part)
            foreach ($part as $subPart)
                foreach ($subPart as $key => $table) {
                    $this->mockValidationRequest($this->resolveRequestNameSpace($table["model"]));

                    echo "   can not store " . $table["name"] . " " . $this->resolveRequestNameSpace($table["model"]);
                    $response = $this->actingAs($user)
                        ->post(route($table["name"] . ".store"), []);
                    $response->assertForbidden();
                    echo "  PASS \n ";
                }

    }

    public function test_admin_can_store()
    {
        $this->add_create_permissions();
        $this->add_view_permissions();

        $user = User::factory()->create();

        $user->givePermissionTo(Permission::all());

        foreach (config("gostaresh-urls.url") as $part)
            foreach ($part as $subPart)
                foreach ($subPart as $key => $table) {

                    $this->mockValidationRequest($this->resolveRequestNameSpace($table["model"]));

                    $model = $table["model"]::create([]);
                    echo "   admin can store " . $table["name"];
                    $response = $this->actingAs($user)
                        ->followingRedirects()
                        ->post(route($table["name"] . ".store"), []);
                    $response->assertOk();
                    echo "  PASS \n ";
                }

    }

    public function test_user_cant_see_edit_button_in_lists_without_permission()
    {
        $this->add_view_permissions();

        $user = User::factory()->create();
        $user->givePermissionTo(Permission::all());

        $this->add_create_permissions();
        $this->add_Edit_permissions();
        $this->add_delete_permissions();

        foreach (config("gostaresh-urls.url") as $part)
            foreach ($part as $subPart)
                foreach ($subPart as $key => $table) {

                    $model = $table["model"]::create([]);
                    echo "   user can view the list " . $table["name"];
                    $response = $this->actingAs($user)
                        ->followingRedirects()
                        ->get(route($table["name"] . ".index"));
                    $response->assertOk();
                    echo "  PASS  ";
                    echo "   user can not view edit button " . $table["name"];
                    $response->assertDontSee(__('validation.buttons.edit'));
                    echo "  PASS  \n";

                }

    }

    public function test_admin_can_see_edit_button_in_lists()
    {
        $this->add_view_permissions();
        $this->add_Edit_permissions();

        $user = User::factory()->create();
        $user->givePermissionTo(Permission::all());

        $this->add_create_permissions();
        $this->add_delete_permissions();

        foreach (config("gostaresh-urls.url") as $part)
            foreach ($part as $subPart)
                foreach ($subPart as $key => $table) {

                    $model = $table["model"]::create([]);
                    echo "   user can view the list " . $table["name"];
                    $response = $this->actingAs($user)
                        ->followingRedirects()
                        ->get(route($table["name"] . ".index"));
                    $response->assertOk();
                    echo "  PASS  ";
                    echo "   admin can see edit button " . $table["name"];
                    $response->assertSee(__('validation.buttons.edit'));
                    echo "  PASS  \n";

                }
    }

    public function test_user_can_not_see_delete_button_in_lists_without_permission()
    {
        $this->add_view_permissions();

        $user = User::factory()->create();
        $user->givePermissionTo(Permission::all());

        $this->add_create_permissions();
        $this->add_Edit_permissions();
        $this->add_delete_permissions();

        foreach (config("gostaresh-urls.url") as $part)
            foreach ($part as $subPart)
                foreach ($subPart as $key => $table) {

                    $model = $table["model"]::create([]);
                    echo "   user can view the list " . $table["name"];
                    $response = $this->actingAs($user)
                        ->followingRedirects()
                        ->get(route($table["name"] . ".index"));
                    $response->assertOk();
                    echo "  PASS  ";
                    echo "   user can not see delete button " . $table["name"];
                    $response->assertDontSee(__('validation.buttons.delete'));
                    echo "  PASS  \n";

                }

    }

    public function test_admin_can_see_delete_button_in_lists()
    {
        $this->add_view_permissions();
        $this->add_delete_permissions();

        $user = User::factory()->create();
        $user->givePermissionTo(Permission::all());

        $this->add_Edit_permissions();
        $this->add_create_permissions();

        foreach (config("gostaresh-urls.url") as $part)
            foreach ($part as $subPart)
                foreach ($subPart as $key => $table) {

                    $model = $table["model"]::create([]);
                    echo "   user can view the list " . $table["name"];
                    $response = $this->actingAs($user)
                        ->followingRedirects()
                        ->get(route($table["name"] . ".index"));
                    $response->assertOk();
                    echo "  PASS  ";
                    echo "   admin can see delete button " . $table["name"];
                    $response->assertSee(__('validation.buttons.delete'));
                    echo "  PASS  \n";

                }
    }
    public function test_user_can_not_update_without_permission()
    {
        $user = User::factory()->create();

        foreach (config("gostaresh-urls.url") as $part)
            foreach ($part as $subPart)
                foreach ($subPart as $key => $table) {

                    $this->mockValidationRequest($this->resolveRequestNameSpace($table["model"]));

                    echo "   can not update " . $table["name"] . " " . $this->resolveRequestNameSpace($table["model"]);
                    $response = $this->actingAs($user)
                        ->post(route($table["name"] . ".store"), []);
                    $response->assertForbidden();
                    echo "  PASS \n ";
                }

    }
//
    public function test_admin_can_update()
    {
        $this->add_create_permissions();
        $this->add_view_permissions();

        $user = User::factory()->create();

        $user->givePermissionTo(Permission::all());

        foreach (config("gostaresh-urls.url") as $part)
            foreach ($part as $subPart)
                foreach ($subPart as $key => $table) {

                    $this->mockValidationRequest($this->resolveRequestNameSpace($table["model"]));

                    $model = $table["model"]::create([]);
                    echo "   admin can update " . $table["name"];
                    $response = $this->actingAs($user)
                        ->followingRedirects()
                        ->post(route($table["name"] . ".store"), []);
                    $response->assertOk();
                    echo "  PASS \n ";
                }

    }
}
