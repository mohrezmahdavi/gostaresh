<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //        get list of name of all modles
        $models = getAppModelsList(app_path() . "/Models", false);
        $models[] = "Role";
        DB::statement('SET foreign_key_checks=0');
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::statement('SET foreign_key_checks=1');

        //   add each model's permissions to database
        foreach ($models as $model) {
            Permission::create(['name' => 'view-any-' . $model, "guard_name" => "web"]);
            Permission::create(['name' => 'create-any-' . $model, "guard_name" => "web"]);
            Permission::create(['name' => 'edit-any-' . $model, "guard_name" => "web"]);
            Permission::create(['name' => 'delete-any-' . $model, "guard_name" => "web"]);
        }

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        $admin = User::where('phone_number', '09023238787')->first();
        if ($admin)
            $admin->assignRole('admin');

        $admin = User::where('phone_number', '09122594301')->first();
        if ($admin)
            $admin->assignRole('admin');

        $admin = User::where('phone_number', '09123713955')->first();
        if ($admin)
            $admin->assignRole('admin');

        $admin = User::where('phone_number', '09399528826')->first();
        if ($admin)
            $admin->assignRole('admin');

        $admin = User::where('phone_number', '09367683492')->first();
        if ($admin)
            $admin->assignRole('admin');

        $admin = User::where('phone_number', '09194744799')->first();
        if ($admin)
            $admin->assignRole('admin');
    }
}
