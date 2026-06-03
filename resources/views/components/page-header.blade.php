@props(['title', 'subtitle' => null])

<div {{ $attributes->merge(['class' => 'glass-page-header']) }}>
    <div>
        <h1 class="glass-page-title">{{ $title }}</h1>
        @if ($subtitle)
            <p class="glass-page-subtitle">{{ $subtitle }}</p>
        @endif
    </div>
    @isset($actions)
        <div class="flex flex-wrap gap-3">
            {{ $actions }}
        </div>
    @endisset
</div>
