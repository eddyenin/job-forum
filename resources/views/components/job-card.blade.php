@props(['job'])

<x-panel class="p-4 flex flex-col text-center">

        <div class="self-start text-sm">{{ $job->employer->name }}</div>

        <div class="py-8 text-center">
            <h3 class="group-hover:text-blue-800 text-xl font-bold">
                <a href="{{ $job->url }}" target="_blank">
                    {{ $job->title }}
                </a>
            </h3>
            <p class="text-sm mt-4">{{ $job->salary }}</p>
        </div>

        <div class="flex justify-between items-center mt-auto">
            <div>
                @foreach ($job->tags as $tag)
                <x-tag size='small' :$tag />
                @endforeach

            </div>
            <x-employer-logo :$job />
        </div>


</x-panel>
