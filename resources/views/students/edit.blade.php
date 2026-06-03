<x-app-layout>
    <div class="fade-in max-w-3xl mx-auto">
        <x-page-header :title="'Edit '.$student->full_name" :subtitle="$student->student_id">
            <x-slot:actions>
                <x-button variant="secondary" :href="route('students.show', $student)">Back to Details</x-button>
            </x-slot:actions>
        </x-page-header>

        <form method="POST" action="{{ route('students.update', $student) }}" enctype="multipart/form-data" class="glass-card p-8 space-y-6 slide-up" data-loading>
            @csrf @method('PUT')
            @include('students.partials.form', ['student' => $student])
            <div class="flex flex-wrap gap-3 pt-4">
                <x-button type="submit" variant="primary">Save Changes</x-button>
                <x-button variant="secondary" :href="route('students.show', $student)">Cancel</x-button>
            </div>
        </form>
    </div>
</x-app-layout>
