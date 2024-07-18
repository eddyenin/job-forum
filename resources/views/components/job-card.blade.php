@props(['job'])

<x-panel class="p-4 flex flex-col text-center">

        <div class="self-start text-sm">
            {{ $job->employer->name }}
        </div>
        @auth
            @if (Auth::user()->employer->name === $job->employer->name)
            <div class="self-end">
                <a href="/job/edit/{{ $job->employer->name }}" class="bg-blue-800 py-1 px-2 rounded text-2xs">^</a>
            </div>
            <form action="/job/destroy/{{ $job->employer->name }}" method="POST" class="self-end">
                @csrf
                @method('PATCH')

                <button class="bg-red-800 py-1 px-2 rounded text-2xs mt-1">X</button>
            </form>
        @endif
        @endauth

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
