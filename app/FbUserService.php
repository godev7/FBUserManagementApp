<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;

class FbUserService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = FbUser::whereFbId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new FbUser([
                'fb_id' => $providerUser->getId(),
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }

    public function getFbUsers()
    {
        return FbUser::get();
    }
}