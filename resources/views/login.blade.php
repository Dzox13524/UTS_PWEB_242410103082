@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="w-full max-w-md bg-gray-800 bg-opacity-50 backdrop-blur-md rounded-lg shadow-xl p-8 border border-gray-700 mx-auto">
    <h3 class="text-3xl font-bold text-center text-white mb-6">
        Login
    </h3>
    @if($errors->has('loginError'))
        <div class="bg-red-500 bg-opacity-70 border border-red-700 text-white px-4 py-3 rounded-md mb-4" role="alert">
            <span class="block sm:inline">{{ $errors->first('loginError') }}</span>
        </div>
    @endif
    <form action="{{ route('dashboard') }}" method="GET" id="loginForm"> 
        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-300 mb-2">Username</label>
            <input type="text"
                   name="nama"          
                   id="nama"
                   placeholder="masukkan username" 
                   required
                   class="w-full px-4 py-3 bg-gray-900 bg-opacity-70 border border-gray-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            />
        </div>
        <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
            <input type="password"   
                   name="password"     
                   id="password"
                   placeholder="masukkan password"       
                   required
                   class="w-full px-4 py-3 bg-gray-900 bg-opacity-70 border border-gray-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            />
        </div>
        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-4 rounded-md transition duration-300">
            Login
        </button>
        
    </form>
    
</div>
@endsection

