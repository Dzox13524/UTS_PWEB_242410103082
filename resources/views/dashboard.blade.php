@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="text-white w-full h-full">
    <h1 class="text-4xl font-bold mb-4">
        Selamat Datang, {{ $username }}!
    </h1>
</div>
@endsection

