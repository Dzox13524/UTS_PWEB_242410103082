<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class PageController extends Controller
{
    private $dataUser = [
        [
            'username' => 'Rio batu bata',
            'password' => 'asek111',
            'bio' => 'Aku raja jamsut',
            'image' => 'https://i.pinimg.com/736x/76/a1/a5/76a1_a5b2cbc1882fed8a65d04ba13d58.jpg',
            'tugas' => [
                [
                    'id_tugas' => 1,
                    'judul' => 'PWEB',
                    'deskripsi' => 'bikin web woi',
                    'tenggat' => '2025-10-30'
                ],
                [
                    'id_tugas' => 2,
                    'judul' => 'MKSI',
                    'deskripsi' => 'Hack web univ woi',
                    'tenggat' => '2025-11-05'
                ]
            ]
        ],
        [
            'username' => 'a',
            'password' => 'a',
            'bio' => 'admin gwa wok',
            'image' => 'https://i.pinimg.com/736x/76/a1/a5/76a1a5b2cbc1882fed8a65d04ba13d58.jpg',
            'tugas' => [
                [
                    'id_tugas' => 1,
                    'judul' => 'desain web',
                    'deskripsi' => 'bikkinkan uai uex wok',
                    'tenggat' => '2025-10-25'
                ],
                [
                    'id_tugas' => 2,
                    'judul' => 'matematika',
                    'deskripsi' => 'ciptakan rumus baru.',
                    'tenggat' => '2025-10-22'
                ]
            ]
        ],
        [
            'username' => 'Rizqi awikwok',
            'password' => 'manukakal',
            'bio' => 'malas banget sama atmin',
            'image' => 'https://i.pinimg.com/736x/76/a1/a5/76a1a5b2cbc1882fed8a65d04ba13d58.jpg',
            'tugas' => [
                [
                    'id_tugas' => 1,
                    'judul' => 'catur',
                    'deskripsi' => 'raih ello sebanyak 3000 point.',
                    'tenggat' => '2025-10-28'
                ],
                [
                    'id_tugas' => 2,
                    'judul' => 'LKM 3',
                    'deskripsi' => 'Teori Bahasa dan Otomata (A-TM-14606)-25261.',
                    'tenggat' => '2025-11-15'
                ]
            ]
        ],
        [
            'username' => 'Alfin dingin bozz',
            'password' => 'sayurmayur',
            'bio' => 'yang ytta aja',
            'image' => 'https://i.pinimg.com/736x/76/a1/a5/76a1a5b2cbc1882fed8a65d04ba13d58.jpg',
            'tugas' => [
                [
                    'id_tugas' => 1,
                    'judul' => 'Finalisasi Presentasi Klien (Proyek A)',
                    'deskripsi' => 'Menambahkan data demo terakhir dan memperbaiki typo.',
                    'tenggat' => '2025-10-24'
                ],
                [
                    'id_tugas' => 2,
                    'judul' => 'fung pro',
                    'deskripsi' => 'Functional Concurrency.',
                    'tenggat' => '2025-10-20'
                ],
                [
                    'id_tugas' => 3,
                    'judul' => 'fung pro',
                    'deskripsi' => 'Activity event Desain Pola Fungsional.',
                    'tenggat' => '2025-11-01'
                ]
            ]
        ],
    ];

    public function login()
    {
        return view('login');
    }

    public function dashboard(Request $request)
    {
        $usernameInput = $request->input('username');
        $userData = $this->cekUser($usernameInput);
        $passwordInput = $request->input('password') ?? $userData['password'];
        $berhasil = false;
        $userData = '';
        foreach ($this->dataUser as $user) {
            if ($user['username'] === $usernameInput && $user['password'] === $passwordInput) {
                $berhasil = true;
                $userData = $user;
                break;
            }
        }
        if ($berhasil) {
            return view('dashboard', [
                'username' => $usernameInput,
                'image' => $userData['image'],
                'tugas' => $userData['tugas'],
                'totalTugas' => count($userData['tugas']),
                'tugasMendatang' => $userData['tugas'][0]['judul'],
                ]);
            } else {
            return redirect()->route('login')
                ->withErrors(['loginError' => 'Username atau Password salah. Silakan coba lagi.']);
            }
    }
    public function profile(request $request) 
    {
        $usernameInput = $request->query('username'); 
        
        $userData = $this->cekUser($usernameInput);
        
        if (!$userData) {
            return redirect()->route('login')->withErrors(['loginError' => 'anda harus login ulang!']);
        }

        return view('profile', [
            'username' => $usernameInput,
            'password' => $userData['password'],
            'bio' => $userData['bio'],
            'image' => $userData['image'],
        ]);
    }

    public function pengelolaan(request $request)
    {
        $usernameInput = $request->query('username'); 
        
        $userData = $this->cekUser($usernameInput);
        
        if (!$userData) {
            return redirect()->route('login')->withErrors(['loginError' => 'anda harus login ulang!']);
        }

        return view('pengelolaan', [
            'username' => $usernameInput,
            'bio' => $userData['bio'],
            'image'=> $userData['image'],
            'tugas' => $userData['tugas'],
        ]);
    }

    public function loginAuth(Request $request)
    {
        $usernameInput = $request->input('username');
        $passwordInput = $request->input('password');
        $berhasil = false;
        $userData = '';
        foreach ($this->dataUser as $user) {
            if ($user['username'] === $usernameInput && $user['password'] === $passwordInput) {
                $berhasil = true;
                $userData = $user;
                break;
            }
        }
        if ($berhasil) {
            return redirect()->route('dashboard', ['username' => $usernameInput]);
            } else {
            return redirect()->route('login')
                ->withErrors(['loginError' => 'Username atau Password salah. Silakan coba lagi.']);
            }
    }


    private function cekUser($usernameInput)
    {
        foreach ($this->dataUser as $user) {
            if ($user['username'] === $usernameInput) {
                return $user;
            }
        }
        return false;
    }
}

