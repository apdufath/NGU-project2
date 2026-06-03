@props(['student' => null])

@php
    $hasPhoto = $student?->hasPhoto() ?? false;
    $photoUrl = $student?->photo_url;
    $fallbackUrl = $student?->defaultAvatarUrl() ?? \App\Models\Student::DEFAULT_AVATAR;
    $initials = $student?->initials ?? '?';
    $alt = $student?->full_name ?? 'Student photo preview';
@endphp

<div {{ $attributes->merge(['class' => 'student-photo-upload shrink-0']) }}>
    <label class="mb-3 block text-sm font-medium text-white/80">Profile Photo</label>

    <div class="student-avatar student-avatar-profile mx-auto md:mx-0">
        <div id="photo-placeholder" class="student-avatar-placeholder text-3xl md:text-4xl lg:text-5xl {{ $hasPhoto ? 'hidden' : '' }}">
            {{ $initials }}
        </div>
        <img
            id="photo-preview"
            src="{{ $hasPhoto ? $photoUrl : '' }}"
            alt="{{ $alt }}"
            class="student-avatar-image {{ $hasPhoto ? '' : 'hidden' }}"
            @if($hasPhoto)
                onerror="this.onerror=null;this.src='{{ $fallbackUrl }}';document.getElementById('photo-placeholder')?.classList.add('hidden');"
            @endif
        >
    </div>

    <div class="mt-4">
        <input
            type="file"
            name="photo"
            id="photo"
            accept="image/jpeg,image/jpg,image/png,image/webp"
            class="block w-full text-sm text-white/70 file:mr-4 file:rounded-lg file:border-0 file:bg-brand-500 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-brand-400"
        >
        <p class="mt-2 text-xs text-white/50">JPG, JPEG, PNG, or WEBP. Max 2MB.</p>
        @error('photo')
            <p class="mt-1 text-sm text-red-300">{{ $message }}</p>
        @enderror
    </div>
</div>
