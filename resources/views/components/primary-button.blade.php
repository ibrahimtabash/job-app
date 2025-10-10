{{-- <button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'justify-center bg-gradient-to-t from-indigo-500 to-rose-500 text-bg-white rounded-lg px-4 py-2 hover:from-indigo-600 hover:to-rose-600 transition']) }}>
    {{ $slot }}
</button> --}}
<button type="submit"
    {{ $attributes->class([
        'justify-center',
        'bg-gradient-to-t',
        'from-indigo-500',
        'to-rose-500',
        'text-bg-white',
        'rounded-lg',
        'px-4',
        'py-2',
        'hover:from-indigo-600',
        'hover:to-rose-600',
        'transition',
    ]) }}>
    {{ $slot }}
</button>
