@props(['active'])

@php
$classes = ($active ?? false)
            ? 'navlink activelink inline-flex items-center p-3 pt-1 border-b-2 border-none text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'navlink p-3 pt-1 leading-5 text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
