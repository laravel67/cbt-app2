@props(['href', 'active' => [], 'class' => 'menu-item'])

@php
    $currentRoute = Request::route()->getName();
    // Check if the current route is in the active array
    $isActive = in_array($currentRoute, (array) $active);
@endphp

<li class="{{ $class }} {{ $isActive ? 'active' : '' }}">
    <a wire:navigate href="{{ $href }}" {{ $attributes->merge(['class' => 'menu-link']) }}>
        {{ $slot }}
    </a>
</li>

