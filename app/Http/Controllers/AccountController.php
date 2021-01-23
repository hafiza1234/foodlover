<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function account()
    {
        $user = Auth::user();

        return view('my-account', ['user' => $user]);
    }

    public function updateAccount(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
        ];

        $data = $request->all();

        if ($request->password) {
            $rules['password'] = 'required|string|confirmed|min:8';
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }
        
        $request->validate($rules);

        if ($request->hasFile('image')) {
            $path = $request->image->store('avatars', 'public');

            $data['avatar'] = $path;
        }

        $user = Auth::user();
        
        $user->update($data);

        return redirect('my-account');
    }
}
