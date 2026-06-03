<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-white">Welcome Back</h2>
        <p class="mt-1 text-sm text-white/60">Sign in to your account</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5" data-loading>
        @csrf

        <div>
            <label for="email" class="mb-2 block text-sm font-medium text-white/80">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="glass-input">
            @error('email')<p class="mt-1 text-sm text-red-300">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="password" class="mb-2 block text-sm font-medium text-white/80">Password</label>
            <input id="password" type="password" name="password" required class="glass-input">
            @error('password')<p class="mt-1 text-sm text-red-300">{{ $message }}</p>@enderror
        </div>

        <div class="flex items-center justify-between">
            <label class="flex items-center gap-2 text-sm text-white/70">
                <input type="checkbox" name="remember" class="rounded border-white/30 bg-white/10 text-brand-500 focus:ring-brand-400">
                Remember me
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-brand-200 hover:text-white transition-colors">Forgot password?</a>
            @endif
        </div>

        <x-button type="submit" variant="primary" block>Sign In</x-button>

        <p class="text-center text-sm text-white/60">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-brand-200 hover:text-white font-medium transition-colors">Register</a>
        </p>
    </form>
</x-guest-layout>
