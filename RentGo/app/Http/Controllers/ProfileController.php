<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = User::findOrFail(Auth::user()->id);
        return view('cms.profile.profile', compact('data'));
    }

    public function update_process(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user)],
            'foto' => 'mimes:jpg,jpeg,png',
        ]);

        if (isset($request->foto)) {
            $image_path = 'storage/' . $user->photo;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $user->photo = Storage::disk('public')->put('profile', $request->file('foto'));
        }

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profile')->withSuccess('Profile updated successfully.');
    }


    public function change_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'string', 'min:8'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => $request->new_password]);
        return redirect()->route('profile')->withSuccess('Password changed successfully.');
    }
}