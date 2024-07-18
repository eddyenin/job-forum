@php
    $classes = 'p-4 flex bg-white/5 rounded-xl gap-x-6 mb-4 border border-transparent hover:border-blue-800 group';
@endphp

<div {{ $attributes(['class' => $classes ]) }}>
    {{ $slot }}
</div>
