@props(['job'])


<x-panel class="flex  gap-x-6 mb-4">
    <a href="{{ $job->url }}">
        <div>
            <x-employer-logo :$job />
        </div>

        <div class="flex-1 flex flex-col">
            <a href="#" class=" self-start text-sm text-gray-600">{{ $job->employer->name }}</a>
            <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800">
                <a href="{{ $job->url }}" target="_blank">
                    {{ $job->title }}
                </a>
            </h3>
            <p class="text-sm text-gray-600 mt-auto">{{ $job->salary }}</p>
        </div>

        <div>
            @foreach ($job->tags as $tag)
            <x-tag :$tag />
            @endforeach

        </div>

    </a>

</x-panel>
