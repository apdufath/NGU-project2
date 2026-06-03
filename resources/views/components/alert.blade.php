@props(['type' => 'success', 'message'])

@php
    $classes = match($type) {
        'success' => 'bg-emerald-500/20 border-emerald-400/30 text-emerald-100',
        'error' => 'bg-red-500/20 border-red-400/30 text-red-100',
        default => 'bg-brand-500/20 border-brand-400/30 text-brand-100',
    };
@endphp

<div {{ $attributes->merge(['class' => "mb-6 rounded-xl border px-4 py-3 text-sm font-medium backdrop-blur-sm fade-in {$classes}"]) }}>
    {{ $message }}
</div>
