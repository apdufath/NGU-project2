<x-app-layout>
    <div class="fade-in">
        <x-page-header
            title="Dashboard"
            :subtitle="'Welcome back, '.auth()->user()->name"
        >
            <x-slot:actions>
                @if(auth()->user()->isAdmin())
                    <x-button variant="primary" :href="route('students.create')">
                        <x-slot:icon>
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        </x-slot:icon>
                        Add Student
                    </x-button>
                @endif
            </x-slot:actions>
        </x-page-header>

        <div class="mb-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <div class="glass-stat-card slide-up">
                <p class="text-sm font-medium uppercase tracking-wider text-white/50">Total Students</p>
                <p class="mt-2 text-4xl font-bold text-white">{{ number_format($total_students) }}</p>
            </div>
            <div class="glass-stat-card slide-up stagger-1">
                <p class="text-sm font-medium uppercase tracking-wider text-white/50">Total Users</p>
                <p class="mt-2 text-4xl font-bold text-white">{{ number_format($total_users) }}</p>
            </div>
            <div class="glass-stat-card slide-up stagger-2">
                <p class="text-sm font-medium uppercase tracking-wider text-white/50">This Month</p>
                <p class="mt-2 text-4xl font-bold text-white">{{ data_get($growth_statistics->last(), 'total', 0) }}</p>
            </div>
            <div class="glass-stat-card slide-up stagger-3">
                <p class="text-sm font-medium uppercase tracking-wider text-white/50">Your Role</p>
                <p class="mt-2 text-xl font-bold text-brand-200">{{ auth()->user()->role->label() }}</p>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-3">
            <div class="glass-card p-6 lg:col-span-2 slide-up">
                <h2 class="mb-4 text-lg font-semibold text-white">Student Growth</h2>
                @if($growth_statistics->isEmpty())
                    <x-empty-state
                        title="No growth data yet"
                        description="Student registration trends will appear here once records are added."
                        :action="auth()->user()->isAdmin() ? route('students.create') : route('students.index')"
                        :action-label="auth()->user()->isAdmin() ? 'Register First Student' : 'View Students'"
                    >
                        <x-slot:icon>
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2z"/></svg>
                        </x-slot:icon>
                    </x-empty-state>
                @else
                    <canvas id="growthChart" data-chart='@json($growth_statistics)' class="w-full min-h-[220px]"></canvas>
                @endif
            </div>

            <div class="glass-card p-6 slide-up">
                <h2 class="mb-4 text-lg font-semibold text-white">Quick Actions</h2>
                <div class="flex flex-col gap-3">
                    <x-quick-action :href="route('students.index')" icon="students">View All Students</x-quick-action>
                    @if(auth()->user()->isAdmin())
                        <x-quick-action :href="route('students.create')" icon="add">Register New Student</x-quick-action>
                        <x-quick-action :href="route('users.index')" icon="users">Manage Users</x-quick-action>
                    @endif
                    <x-quick-action :href="route('profile.edit')" icon="profile">Edit Profile</x-quick-action>
                </div>
            </div>
        </div>

        <div class="mt-8 glass-card p-6 slide-up">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-lg font-semibold text-white">Recent Registrations</h2>
                <x-button variant="ghost" size="sm" :href="route('students.index')">View all</x-button>
            </div>
            @if($recent_registrations->isEmpty())
                <x-empty-state
                    title="No recent registrations"
                    description="Newly registered students from Hargeisa will appear here."
                    :action="auth()->user()->isAdmin() ? route('students.create') : null"
                    :action-label="auth()->user()->isAdmin() ? 'Register Student' : null"
                >
                    <x-slot:icon>
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197"/></svg>
                    </x-slot:icon>
                </x-empty-state>
            @else
                <div class="overflow-x-auto">
                    <table class="glass-table">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Registered</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recent_registrations as $student)
                                <tr class="hover:bg-white/5 transition-colors">
                                    <td class="font-mono text-brand-200">{{ $student->student_id }}</td>
                                    <td>{{ $student->full_name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->created_at->diffForHumans() }}</td>
                                    <td class="text-right">
                                        <x-button variant="ghost" size="sm" :href="route('students.show', $student)">View</x-button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
