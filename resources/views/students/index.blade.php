<x-app-layout>
    <div class="fade-in">
        <x-page-header title="Students" subtitle="Browse and manage registered students from Hargeisa, Somaliland">
            <x-slot:actions>
                @can('create', App\Models\Student::class)
                    <x-button variant="primary" :href="route('students.create')">
                        <x-slot:icon>
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        </x-slot:icon>
                        Add Student
                    </x-button>
                @endcan
            </x-slot:actions>
        </x-page-header>

        <div class="glass-card p-6 mb-6 slide-up">
            <form method="GET" action="{{ route('students.index') }}" class="flex flex-col gap-4 sm:flex-row" data-loading>
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Search by ID, name, email, or phone..."
                       class="glass-input flex-1">
                <div class="flex gap-3">
                    <x-button type="submit" variant="primary">Search</x-button>
                    @if(request('search'))
                        <x-button variant="secondary" :href="route('students.index')">Clear</x-button>
                    @endif
                </div>
            </form>
        </div>

        <div class="glass-card overflow-hidden slide-up">
            <div class="overflow-x-auto">
                <table class="glass-table">
                    <thead>
                        <tr>
                            <x-sortable-header field="student_id" label="ID" />
                            <x-sortable-header field="full_name" label="Name" />
                            <th>Email</th>
                            <x-sortable-header field="phone" label="Phone" />
                            <th>Gender</th>
                            <x-sortable-header field="created_at" label="Registered" />
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                            <tr class="hover:bg-white/5 transition-colors">
                                <td class="font-mono text-brand-200">{{ $student->student_id }}</td>
                                <td>
                                    <div class="flex items-center gap-3 min-w-0">
                                        <x-student-avatar :student="$student" size="xs" />
                                        <span class="truncate">{{ $student->full_name }}</span>
                                    </div>
                                </td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->phone }}</td>
                                <td><span class="glass-badge bg-white/10 capitalize">{{ $student->gender }}</span></td>
                                <td>{{ $student->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="flex justify-end gap-2">
                                        <x-button variant="ghost" size="sm" :href="route('students.show', $student)">View</x-button>
                                        @can('update', $student)
                                            <x-button variant="secondary" size="sm" :href="route('students.edit', $student)">Edit</x-button>
                                        @endcan
                                        @can('delete', $student)
                                            <form method="POST" action="{{ route('students.destroy', $student) }}" data-confirm="Delete this student permanently?">
                                                @csrf @method('DELETE')
                                                <x-button type="submit" variant="danger" size="sm">Delete</x-button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <x-empty-state
                                        title="No students found"
                                        :description="request('search') ? 'Try a different search term or clear filters.' : 'Get started by registering your first student.'"
                                        :action="request('search') ? route('students.index') : (auth()->user()->isAdmin() ? route('students.create') : null)"
                                        :action-label="request('search') ? 'Clear Search' : (auth()->user()->isAdmin() ? 'Add Student' : null)"
                                    >
                                        <x-slot:icon>
                                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                        </x-slot:icon>
                                    </x-empty-state>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($students->hasPages())
                <div class="border-t border-white/10 px-6 py-4">
                    {{ $students->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
