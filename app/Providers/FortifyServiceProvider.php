<?php

namespace App\Providers;

use App\Models\User;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;
            $user = User::where('email', $email)->first();
            if($user && Hash::check($request->password, $user->password))
            {
                return Limit::perMinute(5)->by($email.$request->ip());
            }
            return redirect()->back()->with('danger', 'Username atau Password yang kamu masukan salah!');
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        Fortify::loginView(function () {
            return view('auth.login',[
                'title' => 'Masuk'
            ]);
        });

        Fortify::registerView(function () {
            return view('auth.registrasi',[
                'title' => 'Registrasi'
            ]);
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password', [
                'title' => 'Lupa Password'
            ]);
        });

        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset-password', [
                'title' => 'Reset Password',
                'request' => $request
            ]);
        });

        Fortify::verifyEmailView(function () {
            return view('auth.verify-email',[
                'title' => 'Verifikasi Email'
            ]);
        });
    }
}
