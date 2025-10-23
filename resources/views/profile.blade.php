@extends('layouts.app')

@section('title', 'Profil Pengguna')

@section('content')
<div class="bg-gray-800 bg-opacity-70 backdrop-blur-md rounded-lg shadow-xl p-8 border border-gray-700 text-white">
    
    <div class="flex flex-col sm:flex-row items-center sm:space-x-6">
        <img class="w-24 h-24 rounded-full object-cover border-4 border-indigo-500 mb-4 sm:mb-0" 
             src="{{ $image }}" 
             alt="Foto Profil {{ $username }}">
        <div>
            <h1 class="text-3xl lg:text-4xl font-bold text-center sm:text-left">{{ $username }}</h1>
            <p class="text-gray-400 text-center sm:text-left">{{ $bio }}</p>
        </div>
    </div>

    <hr class="my-8 border-gray-700">

    <div>
        <h2 class="text-2xl font-semibold mb-4">Informasi Akun</h2>
        <div class="space-y-4">
            <div>
                <span class="font-medium text-gray-400">Username:</span>
                <p class="text-lg">{{ $username }}</p>
            </div>
            <div>
                <span class="font-medium text-gray-400">Password:</span>
                <p class="text-lg font-mono bg-gray-900 p-2 rounded-md break-all">{{ $password }}</p>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="text-2xl font-semibold mb-4">Navigasi</h2>
        <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
            <a href="/dashboard?username={{ $username }}" 
               class="w-full sm:w-auto text-center bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-5 rounded-md transition duration-300">
                Ke Dashboard
            </a>
        </div>
    </div>

</div>
@endsection

