<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-white">Verify Email</h2>
        <p class="mt-2 text-sm text-white/60">
            Please verify your email address by clicking the link we sent you. If you did not receive it, we can send another.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <x-alert type="success" message="A new verification link has been sent to your email address." class="mb-4" />
    @endif

    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <form method="POST" action="{{ route('verification.send') }}" data-loading>
            @csrf
            <x-button type="submit" variant="primary">Resend Verification Email</x-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-button type="submit" variant="secondary">Log Out</x-button>
        </form>
    </div>
</x-guest-layout>
