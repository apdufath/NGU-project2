@props([
    'variant' => 'primary',
    'size' => 'md',
    'href' => null,
    'type' => 'button',
    'block' => false,
])

@php
    $variantClass = match ($variant) {
        'primary' => 'glass-btn-primary',
        'secondary' => 'glass-btn-secondary',
        'danger' => 'glass-btn-danger',
        'success' => 'glass-btn-success',
        'ghost' => 'glass-btn-ghost',
        'outline' => 'glass-btn-outline',
        default => 'glass-btn-primary',
    };

    $sizeClass = match ($size) {
        'sm' => 'glass-btn-sm',
        'lg' => 'glass-btn-lg',
        default => 'glass-btn-md',
    };

    $classes = collect([
        'glass-btn-base',
        $variantClass,
        $sizeClass,
        $block ? 'glass-btn-block' : '',
    ])->filter()->implode(' ');
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes, 'data-button' => true]) }}>
        @isset($icon)
            <span class="glass-btn-icon">{!! $icon !!}</span>
        @endisset
        <span class="glass-btn-label">{{ $slot }}</span>
        <span class="glass-btn-spinner hidden" aria-hidden="true"></span>
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes, 'data-button' => true]) }}>
        @isset($icon)
            <span class="glass-btn-icon">{!! $icon !!}</span>
        @endisset
        <span class="glass-btn-label">{{ $slot }}</span>
        <span class="glass-btn-spinner hidden" aria-hidden="true"></span>
    </button>
@endif
