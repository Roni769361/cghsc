<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassController extends Controller
{
    public function edit()
    {
        $sing = Auth::user()->password;
        $slug = Auth::user()->slug;

        return view('admin.user.change_pass', compact('sing', 'slug'));
    }
    public function update(Request $request, $slug)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('slug', $slug)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['message' => 'User not found']);
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'The current password is incorrect.');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('message', 'Password changed successfully.');
    }
}
