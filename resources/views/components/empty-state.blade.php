@props([
    'title',
    'description' => null,
    'action' => null,
    'actionLabel' => null,
])

<div {{ $attributes->merge(['class' => 'glass-empty-state']) }}>
    @isset($icon)
        <div class="glass-empty-icon text-brand-200">
            {{ $icon }}
        </div>
    @endisset
    <h3 class="text-lg font-semibold text-white">{{ $title }}</h3>
    @if ($description)
        <p class="mt-2 max-w-sm text-sm text-white/60">{{ $description }}</p>
    @endif
    @if ($action && $actionLabel)
        <div class="mt-6">
            <x-button variant="primary" :href="$action">{{ $actionLabel }}</x-button>
        </div>
    @endif
</div>
