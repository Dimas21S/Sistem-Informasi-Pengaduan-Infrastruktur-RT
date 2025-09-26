@props(['href', 'active' => false, 'icon' => null])

@php
    $classes = $active
        ? 'nav-link active bg-primary text-white'
        : 'nav-link text-dark';
@endphp

<a {{ $attributes->merge(['href' => $href, 'class' => $classes]) }}>
    @if ($icon)
        <i class="{{ $icon }}"></i>
    @endif
    {{ $slot }}
</a>