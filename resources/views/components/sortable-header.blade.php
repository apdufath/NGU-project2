@props(['field', 'label'])

<th class="cursor-pointer hover:text-white transition" data-sort="{{ $field }}">
    <span class="inline-flex items-center gap-1">
        {{ $label }}
        @if(request('sort') === $field)
            <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                @if(request('direction', 'asc') === 'asc')
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                @else
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                @endif
            </svg>
        @endif
    </span>
</th>
