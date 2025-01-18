<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\NetworkModel;
use App\Models\User;

class UserContoller extends Controller

{
    public function loadRegister()
    {
        return view('register');
    }

    public function registered(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $referralCode = Str::random(10);

        if ($request->filled('referral_code')) {
            $referralUser = User::where('referral_code', $request->referral_code)->first();

            if ($referralUser) {
                $userId = User::insertGetId([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'referral_code' => $referralCode,
                ]);

                NetworkModel::create([
                    'referral_code' => $request->referral_code,
                    'user_id' => $userId,
                    'parent_user_id' => $referralUser->id,
                ]);

                return back()->with('success', 'Your registration was successful!');
            } else {
                return back()->with('error', 'Invalid referral code.');
            }
        } else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'referral_code' => $referralCode,
            ]);

            return back()->with('success', 'Your registration was successful!');
        }
    }

}
