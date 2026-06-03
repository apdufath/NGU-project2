@props([
    'student',
    'size' => 'profile',
])

@php
    $sizeClasses = match ($size) {
        'xs' => 'student-avatar-xs',
        'sm' => 'student-avatar-sm',
        'md' => 'student-avatar-md',
        'profile' => 'student-avatar-profile',
        default => 'student-avatar-profile',
    };

    $textClasses = match ($size) {
        'xs' => 'text-xs',
        'sm' => 'text-sm',
        'md' => 'text-2xl',
        'profile' => 'text-3xl md:text-4xl lg:text-5xl',
        default => 'text-3xl',
    };

    $hasPhoto = $student->hasPhoto();
    $photoUrl = $student->photo_url;
    $fallbackUrl = $student->defaultAvatarUrl();
    $alt = $student->full_name;
@endphp

<div {{ $attributes->merge(['class' => "student-avatar {$sizeClasses}"]) }}>
    @if ($hasPhoto)
        <img
            src="{{ $photoUrl }}"
            alt="{{ $alt }}"
            class="student-avatar-image"
            loading="lazy"
            onerror="this.onerror=null;this.src='{{ $fallbackUrl }}';this.classList.add('student-avatar-fallback-image');"
        >
    @else
        <div class="student-avatar-placeholder {{ $textClasses }}" aria-label="{{ $alt }}">
            {{ $student->initials }}
        </div>
    @endif
</div>
