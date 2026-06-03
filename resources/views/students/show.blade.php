<x-app-layout>
    <div class="fade-in max-w-4xl mx-auto">
        <x-page-header :title="$student->full_name" :subtitle="$student->student_id">
            <x-slot:actions>
                <x-button variant="secondary" :href="route('students.index')">Back to Students</x-button>
                @can('update', $student)
                    <x-button variant="primary" :href="route('students.edit', $student)">Edit</x-button>
                @endcan
                @can('delete', $student)
                    <form method="POST" action="{{ route('students.destroy', $student) }}" data-confirm="Delete this student permanently?">
                        @csrf @method('DELETE')
                        <x-button type="submit" variant="danger">Delete</x-button>
                    </form>
                @endcan
            </x-slot:actions>
        </x-page-header>

        <div class="glass-card p-6 md:p-8 slide-up">
            <div class="student-profile-layout">
                <x-student-avatar :student="$student" size="profile" />

                <div class="student-profile-info grid gap-6 sm:grid-cols-2">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-white/50">Email</p>
                        <p class="mt-1 break-words text-white">{{ $student->email }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-white/50">Phone</p>
                        <p class="mt-1 text-white">{{ $student->phone }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-white/50">Gender</p>
                        <p class="mt-1 capitalize text-white">{{ $student->gender }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-white/50">Date of Birth</p>
                        <p class="mt-1 text-white">{{ $student->date_of_birth->format('F d, Y') }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <p class="text-xs font-semibold uppercase tracking-wider text-white/50">Address</p>
                        <p class="mt-1 text-white">{{ $student->address }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-white/50">Registered</p>
                        <p class="mt-1 text-white">{{ $student->created_at->format('M d, Y h:i A') }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-white/50">Last Updated</p>
                        <p class="mt-1 text-white">{{ $student->updated_at->format('M d, Y h:i A') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
