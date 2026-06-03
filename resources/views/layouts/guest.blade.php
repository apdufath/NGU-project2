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
    <div class="glass-bg flex min-h-screen flex-col items-center justify-center px-4 py-12">
        <div class="glass-blob w-96 h-96 bg-brand-500 top-0 -left-32"></div>
        <div class="glass-blob w-80 h-80 bg-indigo-500 bottom-0 right-0"></div>

        <div class="relative z-10 w-full max-w-md fade-in">
            <div class="mb-8 text-center">
                <a href="{{ route('landing') }}" class="inline-flex items-center gap-3">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/15 backdrop-blur-xl border border-white/20 shadow-xl">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m-6-3l6 3m0 0l6-3"/>
                        </svg>
                    </div>
                    <div class="text-left">
                        <p class="text-xl font-bold text-white">{{ config('app.name') }}</p>
                        <p class="text-sm text-white/60">Student Registration System</p>
                    </div>
                </a>
            </div>

            <div class="glass-card p-8 slide-up">
                {{ $slot }}
            </div>

            <p class="mt-6 text-center text-sm text-white/50">
                &copy; {{ date('Y') }} University Management System
            </p>
        </div>
    </div>
</body>
</html>
