<?php

namespace App\Http\Controllers;

use PHPUnit\Framework\Attributes\WithoutErrorHandler;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    //Login
    public function showLogin() {
        if (Auth::check()){
            return redirect('/');
        } else {
            return view('login');
        }
    }

    public function login(Request $request) {
        if (Auth::check()) {
            Log::info('passei aqui');
            return redirect('/');
        }

        $credentials = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');   
        }
        return back()->withErrors(['auth' => 'Informações Inválidas!'])->onlyInput('email');
    }

    //Logout
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    //Register
    public function showRegister() {
        if (Auth::check()){
            return redirect('/');
        } else {
            return view('register');
        }
    }

    public function register(Request $request) {
        $data = $request->validate([
            'name'                  => ['required', 'string', 'min:3'],
            'email'                 => ['required', 'email', 'unique:users'],
            'password'              => ['required', Password::min(8)->mixedCase()->letters()->numbers()->symbols(), 'confirmed']
        ], [
            'name.required'         => 'Nome obrigatório.',
            'name.min'              => 'Nome mínimo :min letras.',
            'email.required'        => 'E-mail obrigatório.',
            'email.email'           => 'E-mail inválido.',
            'email.unique'          => 'E-mail já registrado.',
            'password.required'     => 'Campo obrigatório.',
            'password.min'          => 'Mínimo :min caracteres.',
            'password.mixed'        => 'Use maiúsculas e minúsculas.',
            'password.letters'      => 'Inclua letras.',
            'password.numbers'      => 'Inclua números.',
            'password.symbols'      => 'Use um símbolo.',
            'password.confirmed'    => 'Confirmação incorreta.',
        ]);

        $user = User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => bcrypt($data['password']),
        ]);

        Auth::login($user);

        return redirect()->intended('/')->onlyInput(['name', 'email']);
    }
}
