<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-white">Confirm Password</h2>
        <p class="mt-2 text-sm text-white/60">This is a secure area. Please confirm your password before continuing.</p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5" data-loading>
        @csrf

        <div>
            <label for="password" class="mb-2 block text-sm font-medium text-white/80">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" class="glass-input">
            @error('password')<p class="mt-1 text-sm text-red-300">{{ $message }}</p>@enderror
        </div>

        <div class="flex justify-end">
            <x-button type="submit" variant="primary">Confirm</x-button>
        </div>
    </form>
</x-guest-layout>
