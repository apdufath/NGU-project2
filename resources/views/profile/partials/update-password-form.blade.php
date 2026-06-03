<section>
    <header class="mb-6">
        <h2 class="text-lg font-semibold text-white">Update Password</h2>
        <p class="mt-1 text-sm text-white/60">Ensure your account is using a long, random password to stay secure.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-5" data-loading>
        @csrf @method('put')

        <div>
            <label for="update_password_current_password" class="mb-2 block text-sm font-medium text-white/80">Current Password</label>
            <input id="update_password_current_password" name="current_password" type="password" class="glass-input">
            @foreach ($errors->updatePassword->get('current_password') as $message)
                <p class="mt-1 text-sm text-red-300">{{ $message }}</p>
            @endforeach
        </div>

        <div>
            <label for="update_password_password" class="mb-2 block text-sm font-medium text-white/80">New Password</label>
            <input id="update_password_password" name="password" type="password" class="glass-input">
            @foreach ($errors->updatePassword->get('password') as $message)
                <p class="mt-1 text-sm text-red-300">{{ $message }}</p>
            @endforeach
        </div>

        <div>
            <label for="update_password_password_confirmation" class="mb-2 block text-sm font-medium text-white/80">Confirm Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="glass-input">
        </div>

        <div class="flex items-center gap-4">
            <x-button type="submit" variant="primary">Save</x-button>
            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)" class="text-sm text-emerald-300">Saved.</p>
            @endif
        </div>
    </form>
</section>
