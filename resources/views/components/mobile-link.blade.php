@props(['href', 'active' => false])

@php
    $currentRoute = Request::route()->getName();
    // Check if the current route is in the active array
    $isActive = in_array($currentRoute, (array) $active);
@endphp

<li>
    <a wire:navigate class="dropdown-item d-lg-none {{ $isActive ? 'active' : '' }}" href="{{ $href }}">
        {{ $slot }}
    </a>
</li>
