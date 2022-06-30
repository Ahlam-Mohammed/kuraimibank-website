<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\RoleHasPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('Permissions:role-list', ['only' => ['index']]);
        $this->middleware('Permissions:role-create', ['only' => ['store']]);
        $this->middleware('Permissions:role-edit', ['only' => ['update']]);
        $this->middleware('Permissions:role-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $permissions = Permission::all();
        $roles       = Role::all();
        return view('dashboard.page.user.manage-roles', compact('permissions', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => ['required', 'unique:roles', 'regex:/^[a-zA-Z ]+$/'],
            'display_name' => ['required', 'string', 'regex:/^[a-zA-Z ]+$/'],
        ]);

        $role = Role::create($request->all());
        $role->syncPermissions($request->permissions);


        return back()->with('success', Lang::get('messages.stored_message'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'         => ['required', 'string'],
            'display_name' => ['required', 'string'],
        ]);

        $role->update(['name' => $request->name, 'display_name' => $request->display_name]);

        DB::table('role_has_permissions')->where('role_id', $role->id)->delete();
        $role->syncPermissions($request->permissions);

        return back()->with('success', Lang::get('messages.updated_message'));
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('success', Lang::get('messages.deleted_message'));
    }
}
