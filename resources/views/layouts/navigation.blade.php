<nav x-data="{ open: false }" class="relative z-20 border-b border-white/10 bg-white/5 backdrop-blur-xl">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center gap-8">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/15 border border-white/20">
                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        </svg>
                    </div>
                    <span class="hidden font-bold text-white sm:block">{{ config('app.name') }}</span>
                </a>

                <div class="hidden md:flex items-center gap-1">
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'glass-nav-link-active' : 'glass-nav-link' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('students.index') }}" class="{{ request()->routeIs('students.*') ? 'glass-nav-link-active' : 'glass-nav-link' }}">
                        Students
                    </a>
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'glass-nav-link-active' : 'glass-nav-link' }}">
                            Users
                        </a>
                    @endif
                </div>
            </div>

            <div class="hidden md:flex items-center gap-4">
                <span class="glass-badge bg-white/10 text-white/80">
                    {{ auth()->user()->role->label() }}
                </span>
                <div x-data="{ dropdownOpen: false }" class="relative">
                    <button @click="dropdownOpen = !dropdownOpen" class="flex items-center gap-2 rounded-xl bg-white/10 px-3 py-2 text-sm text-white hover:bg-white/15">
                        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-brand-500 font-semibold">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </span>
                        <span>{{ auth()->user()->name }}</span>
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="dropdownOpen" @click.outside="dropdownOpen = false" x-transition class="absolute right-0 mt-2 w-48 glass-card py-2">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-white/80 hover:bg-white/10 hover:text-white">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-white/80 hover:bg-white/10 hover:text-white">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <button @click="open = !open" class="md:hidden rounded-lg p-2 text-white hover:bg-white/10">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    <div x-show="open" x-transition class="md:hidden border-t border-white/10 bg-white/5 px-4 py-4 space-y-2">
        <a href="{{ route('dashboard') }}" class="block glass-nav-link">Dashboard</a>
        <a href="{{ route('students.index') }}" class="block glass-nav-link">Students</a>
        @if(auth()->user()->isAdmin())
            <a href="{{ route('users.index') }}" class="block glass-nav-link">Users</a>
        @endif
        <a href="{{ route('profile.edit') }}" class="block glass-nav-link">Profile</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block w-full text-left glass-nav-link">Log Out</button>
        </form>
    </div>
</nav>
