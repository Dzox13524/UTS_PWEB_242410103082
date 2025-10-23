<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class PageController extends Controller
{
    private $dataUser = [
        ['username' => 'Rio batu bata', 'password' => 'asek111'],
        ['username' => 'a', 'password' => 'a'],
        ['username' => 'Rizqi awikwok', 'password' => 'manukakal'],
        ['username' => 'Alfin dingin bozz', 'password' => 'sayurmayur'],
    ];

    public function login()
    {
        return view('login');
    }

        public function dashboard(Request $request)
        {
            $usernameInput = $request->input('nama');
            $passwordInput = $request->input('password');
            $berhasil = false;
            foreach ($this->dataUser as $user) {
                if ($user['username'] === $usernameInput && $user['password'] === $passwordInput) {
                    $berhasil = true;
                    break;
                }
            }
            if ($berhasil) {
                return view('dashboard', [
                    'username' => $usernameInput,
                    'password' => $passwordInput
                    ]);
                } else {
                return redirect()->route('login')
                    ->withErrors(['loginError' => 'Username atau Password salah. Silakan coba lagi.']);
                }
        }
}

