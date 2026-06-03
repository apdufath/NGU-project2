<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-white">Create Account</h2>
        <p class="mt-1 text-sm text-white/60">Register as a guest user</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5" data-loading>
        @csrf

        <div>
            <label for="name" class="mb-2 block text-sm font-medium text-white/80">Full Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="glass-input">
            @error('name')<p class="mt-1 text-sm text-red-300">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="email" class="mb-2 block text-sm font-medium text-white/80">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required class="glass-input">
            @error('email')<p class="mt-1 text-sm text-red-300">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="password" class="mb-2 block text-sm font-medium text-white/80">Password</label>
            <input id="password" type="password" name="password" required class="glass-input">
            @error('password')<p class="mt-1 text-sm text-red-300">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="password_confirmation" class="mb-2 block text-sm font-medium text-white/80">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required class="glass-input">
        </div>

        <x-button type="submit" variant="primary" block>Create Account</x-button>

        <p class="text-center text-sm text-white/60">
            Already registered?
            <a href="{{ route('login') }}" class="text-brand-200 hover:text-white font-medium transition-colors">Sign in</a>
        </p>
    </form>
</x-guest-layout>
