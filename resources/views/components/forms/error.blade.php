@props(['error' => false])

@if ($errors->any())
    <p class="text-sm text-red-500 mt-1">{{ $error }}</p>
@endif
