<x-app-layout>
    <div class="fade-in max-w-3xl mx-auto">
        <x-page-header title="Profile" subtitle="Manage your account settings">
            <x-slot:actions>
                <x-button variant="secondary" :href="route('dashboard')">Back to Dashboard</x-button>
            </x-slot:actions>
        </x-page-header>

        <div class="space-y-6">
            <div class="glass-card p-8 slide-up">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="glass-card p-8 slide-up">
                @include('profile.partials.update-password-form')
            </div>

            <div class="glass-card p-8 slide-up">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
