@props(['job','width'=> 90 ])

<img src="{{ asset($job->employer->logo) }}" alt="" class="rounded-xl" width="{{ $width }}">
