<x-app-layout>
    <div class="fade-in max-w-2xl mx-auto">
        <x-page-header title="Edit User" :subtitle="$user->email">
            <x-slot:actions>
                <x-button variant="secondary" :href="route('users.index')">Back to Users</x-button>
            </x-slot:actions>
        </x-page-header>

        <form method="POST" action="{{ route('users.update', $user) }}" class="glass-card p-8 space-y-6 slide-up" data-loading>
            @csrf @method('PUT')

            <div>
                <label class="mb-2 block text-sm font-medium text-white/80">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="glass-input">
                @error('name')<p class="mt-1 text-sm text-red-300">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="mb-2 block text-sm font-medium text-white/80">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="glass-input">
                @error('email')<p class="mt-1 text-sm text-red-300">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="mb-2 block text-sm font-medium text-white/80">Role</label>
                <select name="role" required class="glass-input">
                    @foreach(App\Enums\UserRole::cases() as $role)
                        <option value="{{ $role->value }}" @selected(old('role', $user->role->value) === $role->value)>
                            {{ $role->label() }}
                        </option>
                    @endforeach
                </select>
                @error('role')<p class="mt-1 text-sm text-red-300">{{ $message }}</p>@enderror
            </div>

            <div class="flex flex-wrap gap-3 pt-4">
                <x-button type="submit" variant="primary">Save Changes</x-button>
                <x-button variant="secondary" :href="route('users.index')">Cancel</x-button>
            </div>
        </form>
    </div>
</x-app-layout>
