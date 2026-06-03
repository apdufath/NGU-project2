<x-app-layout>
    <div class="fade-in max-w-3xl mx-auto">
        <x-page-header title="Register New Student" subtitle="Add a new student record from Hargeisa, Somaliland">
            <x-slot:actions>
                <x-button variant="secondary" :href="route('students.index')">Back to Students</x-button>
            </x-slot:actions>
        </x-page-header>

        <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data" class="glass-card p-8 space-y-6 slide-up" data-loading>
            @csrf
            @include('students.partials.form')
            <div class="flex flex-wrap gap-3 pt-4">
                <x-button type="submit" variant="primary">Register Student</x-button>
                <x-button variant="secondary" :href="route('students.index')">Cancel</x-button>
            </div>
        </form>
    </div>
</x-app-layout>
