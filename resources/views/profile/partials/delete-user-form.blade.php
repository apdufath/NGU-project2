<section>
    <header class="mb-6">
        <h2 class="text-lg font-semibold text-white">Delete Account</h2>
        <p class="mt-1 text-sm text-white/60">Once your account is deleted, all of its resources and data will be permanently deleted.</p>
    </header>

    <x-button type="button" variant="danger" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        Delete Account
    </x-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 glass-card-solid" data-loading>
            @csrf @method('delete')

            <h2 class="text-lg font-semibold text-gray-900">Are you sure you want to delete your account?</h2>
            <p class="mt-1 text-sm text-gray-600">Please enter your password to confirm.</p>

            <div class="mt-6">
                <input id="password" name="password" type="password" class="glass-input-dark" placeholder="Password">
                @foreach ($errors->userDeletion->get('password') as $message)
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @endforeach
            </div>

            <div class="mt-6 flex flex-wrap justify-end gap-3">
                <x-button type="button" variant="outline" x-on:click="$dispatch('close')">Cancel</x-button>
                <x-button type="submit" variant="danger">Delete Account</x-button>
            </div>
        </form>
    </x-modal>
</section>
