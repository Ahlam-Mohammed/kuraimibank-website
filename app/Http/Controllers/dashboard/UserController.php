<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('Permissions:user-list', ['only' => ['index']]);
        $this->middleware('Permissions:user-create', ['only' => ['store']]);
        $this->middleware('Permissions:user-edit', ['only' => ['update']]);
        $this->middleware('Permissions:user-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $users = User::all();
        $roles = Role::pluck('name')->all();
        return view('dashboard.page.user.manage-users', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'same:confirm'],
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->roles);

        return back()->with('success', Lang::get('messages.stored_message'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'password' => ['nullable', 'string', 'min:8', 'same:confirm'],
        ]);

        $input = $request->all();
        if(!empty($input['password']))
            $input['password'] = Hash::make($input['password']);
        else
            $input = Arr::except($input,array('password'));

        $user->update($input);

        DB::table('model_has_roles')->where('model_id',$user->id)->delete();
        $user->assignRole($request->input('roles'));

        return back()->with('success', Lang::get('messages.updated_message'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', Lang::get('messages.deleted_message'));
    }

}
