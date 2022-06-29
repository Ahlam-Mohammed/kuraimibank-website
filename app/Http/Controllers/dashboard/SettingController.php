<?php

namespace App\Http\Controllers\dashboard;

use App\Enum\SettingEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\Uploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rules\Password;

class SettingController extends Controller
{
    use Uploads;

    //********* Setting Profile Management Page *********//
    public function index()
    {
        return view('dashboard.page.user.settings-profile');
    }

    //********* Update User Account *********//
    public function updateAccount(Request $request)
    {
      $request->validate([
          'name'      => ['required', 'string', 'max:255'],
          'email'     => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
        ]);

      Auth::user()->update(['name' => $request->name, 'email' => $request->email]);

      return back()->with('success', Lang::get('messages.updated_message'));;
    }

    //********* Update User Avatar *********//
    public function updateAvatar(Request $request)
    {
        // validator
        $request->validate(['avatar'  => 'required|image|mimes:jpeg,jpg,png,svg|max:2048']);

        $avatar = $this->updateImage(
            $request->avatar,
            SettingEnum::PATH_USER_AVATAR,
            SettingEnum::PATH_USER_AVATAR . Auth::user()->avatar
        );

        User::find(Auth::id())->update(['avatar' => $avatar]);

        return back()->with('success', Lang::get('messages.updated_message'));;
    }

    //********* Update User Password *********//
    public function updatePassword(Request $request)
      {
        # Validation
        $request->validate([
          'current_password' => ['required', 'string', 'min:8'],
          'new_password'     => ['required', 'string', Password::min(8) ->mixedCase()
              ->letters()
              ->numbers()
              ->symbols()
              ->uncompromised(), 'same:confirm_password']
        ]);

        #Match The Old Password
        if (!Hash::check($request->current_password, Auth::user()->password)) {
          return back()->with("danger", "كلمة السر القديمة غير صحيحة!");
        }

        #Update the new Password
        Auth::user()->update([ 'password' => Hash::make($request->new_password) ]);

        return back()->with('success', Lang::get('messages.updated_message'));;
    }

    //********* Delete Account *********//
    public function deleteAccount()
    {
        Auth::user()->delete();
        return redirect()->route('login');
    }
}
