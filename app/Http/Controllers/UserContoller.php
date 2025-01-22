<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\NetworkModel;
use App\Models\User;

use Mail;
use Illuminate\Support\Facades\URL;

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

            $domain = URL::to('/');
            $url = $domain.'/referral-register?ref='.$referralCode;

            $data['url'] = $url;
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = $request->password;
            $data['title'] = 'Registered';

            Mail::send('emails.registerMail',['data' => $data], function($message) use($data){
                $message->to( $data['email'])->subject($data['title']);
            });

            return back()->with('success', 'Your registration was successful!');
        }
    }


    public function loadReferralRegister(Request $request ){
        if (isset($request->ref)) {
            $referral = $request->ref;
            $userData = User::where('referral_code',$referral)->get();

            if (count($userData)> 0) {
                return view('referralRegister', compact('referral'));
            }
            else {
                return view('404');
            }
        }
        else{
            return redirect('/');
        }
    }

}
