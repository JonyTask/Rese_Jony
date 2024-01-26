<?php

namespace App\Http\Controllers;

use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Laravel\Fortify\Contracts\RegisterResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Auth\StatefulGuard;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\AdminRequest;

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

    public function viewAdminLogin(){
        return view('auth.adminLogin');
    }

    public function AdminStoreAuth(AdminRequest $request){
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->intended(route('admin.auth_complete'));
    }

    public function DestroyAdmin(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin_login');
    }
}
