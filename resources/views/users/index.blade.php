<x-app-layout>
    <div class="fade-in">
        <x-page-header title="User Management" subtitle="Manage system users and roles">
            <x-slot:actions>
                <x-button variant="secondary" :href="route('dashboard')">Back to Dashboard</x-button>
            </x-slot:actions>
        </x-page-header>

        <div class="glass-card p-6 mb-6 slide-up">
            <form method="GET" action="{{ route('users.index') }}" class="flex flex-col gap-4 sm:flex-row" data-loading>
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Search by name or email..."
                       class="glass-input flex-1">
                <x-button type="submit" variant="primary">Search</x-button>
            </form>
        </div>

        <div class="glass-card overflow-hidden slide-up">
            <div class="overflow-x-auto">
                <table class="glass-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Joined</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr class="hover:bg-white/5 transition-colors">
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-500/30 font-bold">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        {{ $user->name }}
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="glass-badge {{ $user->isAdmin() ? 'bg-brand-500/30 text-brand-100' : 'bg-white/10' }}">
                                        {{ $user->role->label() }}
                                    </span>
                                </td>
                                <td>{{ $user->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="flex justify-end gap-2">
                                        <x-button variant="secondary" size="sm" :href="route('users.edit', $user)">Edit</x-button>
                                        @can('delete', $user)
                                            <form method="POST" action="{{ route('users.destroy', $user) }}" data-confirm="Delete this user?">
                                                @csrf @method('DELETE')
                                                <x-button type="submit" variant="danger" size="sm">Delete</x-button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <x-empty-state title="No users found" description="Try adjusting your search criteria.">
                                        <x-slot:icon>
                                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                        </x-slot:icon>
                                    </x-empty-state>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($users->hasPages())
                <div class="border-t border-white/10 px-6 py-4">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
