<?php

namespace App\Http\Controllers;

use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;
use Laravel\Fortify\Contracts\RegisterResponse;
use Illuminate\Contracts\Auth\StatefulGuard;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    protected $guard;

    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function store(RegisterRequest $request, CreatesNewUsers $creator)
    {
        if (config('fortify.lowercase_usernames')) {
            $request->merge([
                Fortify::username() => Str::lower($request->{Fortify::username()}),
            ]);
        }

        event(new Registered($user = $creator->create($request->all())));

        $this->guard->login($user);

        return app(RegisterResponse::class);
    }
}