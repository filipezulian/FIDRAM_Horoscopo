<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ], [
            'email.required' => 'O campo "E-mail" não pode estar vazio!',
            'email.email' => 'O campo "E-mail" tem que ter um E-mail valido!',
            'password.required' => 'O campo "Senha" não pode estar vazio!',
            'password.min' => 'O campo "Senha" tem que ter no mínimo :min caracteres'
        ]);
        $credentials = $request->only('email', 'password');
        $authenticated = Auth::attempt($credentials);
        if (!$authenticated) {
            return redirect()->route('login.index')->withErrors(['error' => '"E-mail" ou "Senha" estão incorretos']);
        }

        $user = Auth::user();
        session(['id_usuario' => $user->id]);
        return redirect()->route('home.logado');
    }

    public function store(Request $request)
    {

        $codigo_s = 0;
        $mes = 0;
        $dia = 0;

        $data = $request->input('nascimento');
        list($ano, $mes, $dia) = explode('-', $data);
        $dia = intval($dia);
        $mes = intval($mes);
        $ano = intval($ano);

        if (($mes == 3 && $dia >= 21) || ($mes == 4 && $dia <= 19)) {
            // Aries
            $codigo_s = 1;
        } elseif (($mes == 4 && $dia >= 20) || ($mes == 5 && $dia <= 20)) {
            // Taurus
            $codigo_s = 2;
        } elseif (($mes == 5 && $dia >= 21) || ($mes == 6 && $dia <= 20)) {
            // Gemini
            $codigo_s = 3;
        } elseif (($mes == 6 && $dia >= 21) || ($mes == 7 && $dia <= 22)) {
            // Cancer
            $codigo_s = 4;
        } elseif (($mes == 7 && $dia >= 23) || ($mes == 8 && $dia <= 22)) {
            // Leo
            $codigo_s = 5;
        } elseif (($mes == 8 && $dia >= 23) || ($mes == 9 && $dia <= 22)) {
            // Virgo
            $codigo_s = 6;
        } elseif (($mes == 9 && $dia >= 23) || ($mes == 10 && $dia <= 22)) {
            // Libra
            $codigo_s = 7;
        } elseif (($mes == 10 && $dia >= 23) || ($mes == 11 && $dia <= 21)) {
            // Scorpio
            $codigo_s = 8;
        } elseif (($mes == 11 && $dia >= 22) || ($mes == 12 && $dia <= 21)) {
            // Sagittarius
            $codigo_s = 9;
        } elseif (($mes == 12 && $dia >= 22) || ($mes == 1 && $dia <= 19)) {
            // Capricorn
            $codigo_s = 10;
        } elseif (($mes == 1 && $dia >= 20) || ($mes == 2 && $dia <= 18)) {
            // Aquarius
            $codigo_s = 11;
        } elseif (($mes == 2 && $dia >= 19) || ($mes == 3 && $dia <= 20)) {
            // Pisces
            $codigo_s = 12;
        }

        $user = User::create(
            [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'cpf' => $request->input('cpf'),
                'password' => $request->input('password'),
                'nascimento' => $request->input('nascimento'),
                'id_signo' => $codigo_s
            ]
        );

        return redirect()->route('login.index');
    }
}
