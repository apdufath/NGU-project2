<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-white">Reset Password</h2>
        <p class="mt-1 text-sm text-white/60">Choose a new password for your account</p>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-5" data-loading>
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <label for="email" class="mb-2 block text-sm font-medium text-white/80">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required class="glass-input">
            @error('email')<p class="mt-1 text-sm text-red-300">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="password" class="mb-2 block text-sm font-medium text-white/80">New Password</label>
            <input id="password" type="password" name="password" required class="glass-input">
            @error('password')<p class="mt-1 text-sm text-red-300">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="password_confirmation" class="mb-2 block text-sm font-medium text-white/80">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required class="glass-input">
        </div>

        <x-button type="submit" variant="primary" block>Reset Password</x-button>
    </form>
</x-guest-layout>
