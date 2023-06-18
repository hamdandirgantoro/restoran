@props(['active'])

@php
$classes = ($active ?? false)
? 'bg-red-500 child group-hover:bg-red-500 transition duration-150 ease-in-out rounded-full h-5 w-5 flex items-center justify-center ml-1'
: 'bg-red-400 child group-hover:bg-red-500 transition duration-150 ease-in-out rounded-full h-5 w-5 flex items-center justify-center ml-1';
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>