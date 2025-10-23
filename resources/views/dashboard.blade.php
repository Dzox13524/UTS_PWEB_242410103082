@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="text-white w-full h-full">
    
    <div class="mb-8">
        <h1 class="text-4xl font-bold mb-2">
            Selamat Datang, {{ $username }}!
        </h1>
        <p class="text-lg text-gray-400">
            Berikut adalah ringkasan aktivitas Anda.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <div class="bg-gray-800 bg-opacity-70 backdrop-blur-md rounded-lg shadow-xl p-6 border border-gray-700">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-indigo-600 rounded-md p-3">
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-400 truncate">
                            Total Tugas
                        </dt>
                        <dd class="text-3xl font-bold text-white">
                            {{ $totalTugas }}
                        </dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="bg-gray-800 bg-opacity-70 backdrop-blur-md rounded-lg shadow-xl p-6 border border-gray-700">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-green-600 rounded-md p-3">
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-400 truncate">
                            Tugas Mendatang
                        </dt>
                        <dd class="text-3xl font-bold text-white">
                            {{ $tugasMendatang }}
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        
        <a href="{{ route('pengelolaan', ['username' => $username]) }}" 
           class="bg-gray-800 bg-opacity-70 backdrop-blur-md rounded-lg shadow-xl p-6 border border-gray-700 hover:bg-gray-700 transition duration-300 group">
            <div class="flex flex-col justify-center h-full">
                <h3 class="text-lg font-bold text-white group-hover:text-indigo-400">
                    Buka Pengelolaan Tugas
                </h3>
                <p class="text-gray-400 text-sm mt-1">
                    Lihat, tambah, atau hapus tugas Anda.
                </p>
            </div>
        </a>

    </div>
</div>
@endsection

