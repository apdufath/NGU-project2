<section>
    <header class="mb-6">
        <h2 class="text-lg font-semibold text-white">Profile Information</h2>
        <p class="mt-1 text-sm text-white/60">Update your account's profile information and email address.</p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-5" data-loading>
        @csrf @method('patch')

        <div>
            <label for="name" class="mb-2 block text-sm font-medium text-white/80">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required class="glass-input">
            @error('name')<p class="mt-1 text-sm text-red-300">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="email" class="mb-2 block text-sm font-medium text-white/80">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required class="glass-input">
            @error('email')<p class="mt-1 text-sm text-red-300">{{ $message }}</p>@enderror
        </div>

        <div class="flex items-center gap-4">
            <x-button type="submit" variant="success">Save</x-button>
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)" class="text-sm text-emerald-300">Saved.</p>
            @endif
        </div>
    </form>
</section>
