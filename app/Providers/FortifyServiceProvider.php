<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::registerView(function () {
            $title = "register";
            return view('auth.register', compact('title'));
        });

        Fortify::verifyEmailView(function () {

			return view('auth.verify');
		});

        Fortify::loginView(function () {
            $title = "login";
            return view('auth.login', compact('title'));
        });

        Fortify::authenticateUsing(function (Request $request) {
			$request->validate([
				'email' => 'required|email',
				'password' => 'required|min:8',
			]);
			$user = User::where('email', $request->email)->first();
			if ($user &&
				Hash::check($request->password, $user->password)) {
				return $user;
			}
		});

        Fortify::requestPasswordResetLinkView(function () {
			$title = "reset password";
			return view('auth.password.email', compact('title'));
		});

        Fortify::resetPasswordView(function ($request) {
			return view('auth.password.reset', compact('request'));
		});

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
