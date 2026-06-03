<x-app-layout>
    <section class="fade-in">
        <div class="glass-page-header">
            <div>
                <p class="text-sm font-medium uppercase tracking-widest text-brand-300">University Portal · Hargeisa, Somaliland</p>
                <h1 class="mt-2 text-3xl font-bold text-white sm:text-4xl">Student Registration System</h1>
                <p class="mt-3 max-w-2xl text-lg text-white/70">
                    A modern platform for managing student records with secure role-based access,
                    powerful search, and real-time analytics.
                </p>
            </div>
            <div class="flex flex-wrap gap-3">
                @auth
                    <x-button variant="primary" :href="route('dashboard')">Go to Dashboard</x-button>
                @else
                    <x-button variant="primary" :href="route('login')">Sign In</x-button>
                    <x-button variant="secondary" :href="route('register')">Create Account</x-button>
                @endauth
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-3 slide-up">
            <div class="glass-card p-8 animate-float">
                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-brand-500/30">
                    <svg class="h-6 w-6 text-brand-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-white">Student Management</h3>
                <p class="mt-2 text-white/60">Complete CRUD operations with photo uploads, validation, and pagination.</p>
            </div>
            <div class="glass-card p-8">
                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-brand-500/30">
                    <svg class="h-6 w-6 text-brand-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-white">Secure Access</h3>
                <p class="mt-2 text-white/60">Role-based permissions for administrators and guest users with policy enforcement.</p>
            </div>
            <div class="glass-card p-8">
                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-brand-500/30">
                    <svg class="h-6 w-6 text-brand-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-white">Live Analytics</h3>
                <p class="mt-2 text-white/60">Dashboard statistics, growth charts, and recent registration tracking.</p>
            </div>
        </div>
    </section>
</x-app-layout>
