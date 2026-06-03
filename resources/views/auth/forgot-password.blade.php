<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-white">Forgot Password</h2>
        <p class="mt-1 text-sm text-white/60">Enter your email to receive a reset link</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5" data-loading>
        @csrf

        <div>
            <label for="email" class="mb-2 block text-sm font-medium text-white/80">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="glass-input">
            @error('email')<p class="mt-1 text-sm text-red-300">{{ $message }}</p>@enderror
        </div>

        <x-button type="submit" variant="primary" block>Email Reset Link</x-button>

        <p class="text-center text-sm text-white/60">
            <a href="{{ route('login') }}" class="text-brand-200 hover:text-white font-medium transition-colors">Back to login</a>
        </p>
    </form>
</x-guest-layout>
