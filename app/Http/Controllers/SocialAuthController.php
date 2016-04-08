<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\FbUserService;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(FbUserService $service)
    {

        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

        dd($user);

        auth()->login($user);

        return redirect()->to('/home');
    }
}
