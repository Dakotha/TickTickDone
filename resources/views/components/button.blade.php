@props([
    'href' => '#',
])

<a
    {{ $attributes->merge(['class' => 'px-4 py-3 rounded shadow bg-green-400 hover:bg-green-500 text-white']) }}
    href="{{ $href }}"
>{{ $slot }}</a>
