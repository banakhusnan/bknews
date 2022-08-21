<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ])->validateWithBag('updateProfileInformation');

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            // Update Image Profile
            if(isset($input['image'])){
                $image = $input['image']->store('file-images', ['disk' => 'my_files']);
            } else {
                $image = $user->image;
            }

            $user->forceFill([
                'image' => $image,
                'name' => $input['name'],
                'email' => $input['email'],
                'no_induk' => $input['no_induk'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        if(isset($input['image'])){
            $image = $input['image']->store('file-images', ['disk' => 'my_files']);
        } else {
            $image = $user->image;
        }

        $user->forceFill([
            'image' => $image,
            'name' => $input['name'],
            'email' => $input['email'],
            'no_induk' => $input['no_induk'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
