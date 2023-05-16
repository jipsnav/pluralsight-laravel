<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function register(Request $request)
  {
    if ($request->isMethod('get')) {
      return view('auth.register');
    }

    $request->validate([
      'name' => 'required|min:3|max:255',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:8',
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password)
    ]);

    Auth::login($user);
    return redirect()->route('pages.home')->with('success', "You have registered successfully! Welcome $request->name");

  }

  public function login(Request $request)
  {
    if ($request->isMethod('get')) {
      return view('auth.login');
    }

    $credentials = $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:8',
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      return redirect()->route('pages.home')->with('success', 'You are logged in!');
    }

    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ]);
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()
            ->route('pages.home')
            ->with('success', 'You are logged out.');
  }
}
