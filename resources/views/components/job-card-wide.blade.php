@props(['job'])


<x-panel class="flex  gap-x-6 mb-4">
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

        @auth
                @if (Auth::user()->employer->name === $job->employer->name)
                <div class="">
                    <a href="{{ url('/job/edit/'.$job->title)  }}" class="bg-blue-800 py-1 px-2 rounded text-2xs">^</a>
                    <form action="{{ url('job.delete'.'/'.$job->employer->name )  }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <button class="bg-red-800 py-1 px-2 rounded text-2xs mt-1">X</button>
                    </form>
                    {{-- <a href="" class="bg-red-800 py-2 px-3 rounded text-2xs">X</a> --}}

                </div>
            @endif
            @endauth



</x-panel>
