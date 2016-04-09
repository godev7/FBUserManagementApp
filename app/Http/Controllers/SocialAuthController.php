<?php

namespace App\Http\Controllers;

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
        $fb_info = Socialite::driver('facebook')->user();

        $user = $service->createOrGetUser($fb_info);

        auth()->login($user);

        return redirect()->to('/home');
    }
}
