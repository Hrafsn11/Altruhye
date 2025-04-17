@props(['href', 'active'])

@php
$classes = $active
    ? 'text-amber-600 font-semibold underline'
    : 'text-gray-600 hover:text-amber-500';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
