<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} @isset($title) — {{ $title }} @endisset</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="glass-bg">
        <div class="glass-blob w-96 h-96 bg-brand-500 top-0 -left-32"></div>
        <div class="glass-blob w-80 h-80 bg-indigo-500 bottom-0 right-0 animation-delay-2000"></div>
        <div class="glass-blob w-64 h-64 bg-purple-400 top-1/2 left-1/2 -translate-x-1/2"></div>

        @auth
            @include('layouts.navigation')
        @else
            <nav class="relative z-20 border-b border-white/10 bg-white/5 backdrop-blur-xl">
                <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
                    <a href="{{ route('landing') }}" class="font-bold text-white">{{ config('app.name') }}</a>
                    <div class="flex gap-3">
                        <x-button variant="secondary" size="sm" :href="route('login')">Login</x-button>
                        <x-button variant="primary" size="sm" :href="route('register')">Register</x-button>
                    </div>
                </div>
            </nav>
        @endauth

        <main class="relative z-10 mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            @if (session('success'))
                <x-alert type="success" :message="session('success')" />
            @endif

            @if (session('error'))
                <x-alert type="error" :message="session('error')" />
            @endif

            {{ $slot }}
        </main>
    </div>
</body>
</html>
