<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $all_user = User::all();
        return view('admin.user.index', compact('all_user'));
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function store(Request $request)
    {
        // return $request;
        $img_name_gen = null;

        if ($request->has('photo')) {
            $file = $request->file('photo');
            $img_name_gen = uniqid('user_img') . time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/user_img'), $img_name_gen);
        }
        $user_add = User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => $request->type,
            'password' => Hash::make($request->password),
            'slug' => uniqid('user_') . time() . rand(),
            'photo' => 'user_img/' . $img_name_gen,
            'created_at' => now('Asia/Dhaka'),
        ]);
        if ($user_add) {
            return redirect('/user/index')->with('message', 'User Add Success!');
        }
    }
    public function edit($slug)
    {
        $user_single = User::where('slug', $slug)->first();
        return view('admin.user.useredit', compact('user_single'));
    }
    public function update(Request $request, $slug)
    {
        // return $slug;
        $img_name_gen = null;

        if ($request->has('photo')) {
            $file = $request->file('photo');
            $img_name_gen = uniqid('user_img') . time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/user_img'), $img_name_gen);
        }

        $user_add = User::where('slug', $slug)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => $request->type,
            // 'password' => Hash::make($request->password),
            'slug' => uniqid('user_') . time() . rand(),
            'photo' => $img_name_gen ? 'user_img/' . $img_name_gen : User::where('slug', $slug)->value('photo'),
            'updated_at' => now('Asia/Dhaka'),
        ]);
        if ($user_add) {
            return redirect('/user/index')->with('message', 'User Update Success!');
        }
    }
    public function delete(Request $request)
    {
        $slug = $request->slug;
        $delete = User::where('slug', $slug)->delete();
        if ($delete) {
            return redirect('/user/index')->with('message', 'User Delete Success!');
        }
    }
}
