@props([
    'title',
    'url',
])

@php
    $active = request()->routeIs($url);
@endphp

<a href="{{ route($url) }}"
    @class([
        'sidebar-active' => $active,
        'sidebar' => !$active,
    ])>

    {{ $slot }}

    <span class="font-medium">
        {{ ucfirst($title) }}
    </span>

</a>