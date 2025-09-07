<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Services\Auth\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\View\View;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $auth_service)
    {
        $this->authService = $auth_service;
    }

    public function index():View
    {
        return view('auth.login.login', [
            'title' => "Sign In  - " . config('app.name')
        ]);
    }

    public function login(AuthRequest $authRequest): RedirectResponse
    {
        $credentials = $authRequest->validated();

        if($this->authService->login($credentials)) {
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'email' => 'Invalid Credentials!'
        ])->withInput();
    }

    public function logout(Request $request): RedirectResponse
    {
        $this->authService->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
