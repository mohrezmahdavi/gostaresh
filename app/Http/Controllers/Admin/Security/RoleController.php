<?php

namespace App\Http\Controllers\Admin\Security;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Security\StoreRoleRequest;
use App\Http\Requests\Admin\Security\UpdateRoleRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request)
    {
        $this->authorize("view-any-Role");

        $roles = Role::query()->withCount("users")->paginate();

        return view("admin.security.roles.list.list", compact("roles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize("create-any-Role");

        $permissions = Permission::all();

        $guards = Permission::query()->whereNotNull("guard_name")
            ->groupBy("guard_name")->pluck("guard_name");

        return view('admin.security.roles.create.create', compact("permissions", 'guards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StoreRoleRequest $request)
    {
        $this->authorize("create-any-Role");

        $role = Role::query()->create(["name" => $request->name, 'guard_name' => $request->guard_name]);

        $role->syncPermissions($request->permissions);

        return redirect()->route('admin.role.index')->with('success', __('validation.responses.store_role_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Role $role)
    {
        $this->authorize("view-any-Role");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Role $role)
    {
        $this->authorize("edit-any-Role");

        $permissions = Permission::all();

        $guards = Permission::query()->whereNotNull("guard_name")
            ->groupBy("guard_name")->pluck("guard_name");

        return view("admin.security.roles.edit.edit", compact("role", "permissions", "guards"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $this->authorize("edit-any-Role");

        $role->update(["name" => $request->name, 'guard_name' => $request->guard_name]);

        $role->syncPermissions($request->permissions);

        return redirect()->route('admin.role.index')->with('success', __('validation.responses.update_role_success'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Role $role)
    {
        $this->authorize("delete-any-Role");

        $role->delete();

        return redirect()->route('admin.role.index')->with('success', __('validation.responses.delete_role_success'));
    }

    /**
     *  Show the users of the role.
     *
     * @param Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function roleUsers(Role $role)
    {
        $this->authorize("edit-any-Role");

        $usersQuery = $role->users();

        $users = $this->getUsers($role, $usersQuery);

        return view("admin.security.roles.users.list.list", compact("users", 'role'));
    }

    /**
     * remove a user from role users list
     *
     * @param Role $role
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function removeUserFromRole(Role $role, User $user)
    {
        $this->authorize("edit-any-Role");

        $user->removeRole($role->name);

        return redirect()->back()->with('success', __('validation.responses.delete_user_success'));
    }

    /**
     * return the list of users that doesn't have the role
     *
     * @param Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function addUserToRoleList(Role $role)
    {
        $this->authorize("edit-any-Role");

        $userQuery = User::query()->whereDoesntHave("roles", function ($query) use ($role) {
            return $query->where("id", $role->id);
        });

        $users = $this->getUsers($role, $userQuery);

        return view('admin.security.roles.users.add.add', compact("users", "role"));
    }

    /**
     * add user to the list of users of the role
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function addUserToRole(Role $role, User $user)
    {
        $this->authorize("edit-any-Role");

        $user->assignRole($role);

        return redirect()->back()->with('success', __('validation.responses.update_role_success'));

    }

    /**
     * search for user
     *
     * @param $role
     * @param $usersQuery
     * @return mixed
     */
    private function getUsers($role, $usersQuery)
    {
        if (request('first_name')) {
            $usersQuery->where('first_name', 'like', '%' . request('first_name') . '%');
        }

        if (request('last_name')) {
            $usersQuery->where('last_name', 'like', '%' . request('last_name') . '%');
        }

        if (request('full_name') != null) {
            $usersQuery->where(DB::raw("concat(first_name, ' ', last_name)"), 'LIKE', "%" . request('full_name') . "%");
        }

        if (request('phone_number')) {
            $usersQuery->where('phone_number', 'like', '%' . request('phone_number') . '%');
        }

        if (request('status')) {
            $usersQuery->where('status', request('status'));
        }

        return $usersQuery->paginate(15);

    }
}
