<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\User;
use Auth0\SDK\Auth0;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class Auth0Controller extends Controller
{
    protected function auth0Client(): Auth0
    {
        return new Auth0([
            'domain' => env('AUTH0_DOMAIN'),
            'clientId' => env('AUTH0_CLIENT_ID'),
            'clientSecret' => env('AUTH0_CLIENT_SECRET'),
            'cookieSecret' => env('AUTH0_COOKIE_SECRET'),
            'redirectUri' => url('/auth/callback'),
            'scope' => ['openid', 'profile', 'email'],
        ]);
    }

    public function login(): RedirectResponse
    {
        $auth0 = $this->auth0Client();

        if (! env('AUTH0_DOMAIN') || ! env('AUTH0_CLIENT_ID') || ! env('AUTH0_CLIENT_SECRET') || ! env('AUTH0_COOKIE_SECRET')) {
            return Redirect::route('home')->withErrors([
                'auth0' => 'Auth0 is not configured yet. Add your Auth0 domain, client ID, client secret, and cookie secret to the environment first.',
            ]);
        }

        $auth0->clear();

        return Redirect::to($auth0->login(url('/auth/callback')));
    }

    public function callback(Request $request): RedirectResponse
    {
        $auth0 = $this->auth0Client();

        try {
            $auth0->exchange(url('/auth/callback'));
        } catch (\Throwable $exception) {
            return Redirect::route('home')->withErrors([
                'auth0' => 'Unable to finish the Auth0 sign-in flow. Please try again.',
            ]);
        }

        $session = $auth0->getCredentials();
        $profile = $session?->user ?? [];
        $email = $profile['email'] ?? $profile['preferred_username'] ?? $profile['name'] ?? null;

        if (! $email) {
            return Redirect::route('home')->withErrors([
                'auth0' => 'Your Auth0 profile did not expose an email address.',
            ]);
        }

        $user = User::where('email', $email)->first();

        if (! $user) {
            $business = Business::create([
                'name' => $profile['name'] ?? Str::before($email, '@'),
                'slug' => Str::slug($profile['name'] ?? Str::before($email, '@')) ?: 'business',
                'status' => 'active',
                'subscription_plan' => 'free',
            ]);

            $user = User::create([
                'name' => $profile['name'] ?? Str::before($email, '@'),
                'email' => $email,
                'password' => bcrypt(Str::random(24)),
                'business_id' => $business->id,
            ]);
        }

        Auth::login($user, true);
        $request->session()->regenerate();

        return Redirect::intended(route('dashboard'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $auth0 = $this->auth0Client();

        return Redirect::to($auth0->logout(url('/')));
    }
}
