@props(['student' => null])

<div class="flex flex-col items-center">
    <div id="photo-placeholder" class="{{ $student?->photo ? 'hidden' : '' }} flex h-32 w-32 items-center justify-center rounded-2xl bg-white/10 border border-white/20 text-3xl font-bold text-white">
        {{ $student?->initials ?? '?' }}
    </div>
    <img id="photo-preview"
         src="{{ $student?->photo_url }}"
         alt="Photo preview"
         class="{{ $student?->photo ? '' : 'hidden' }} h-32 w-32 rounded-2xl object-cover border-2 border-white/30 shadow-xl">
</div>
