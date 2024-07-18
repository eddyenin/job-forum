<x-layout>
    <div class="space-y-10">
        <section class="text-center py-6">
            <h1 class="font-bold text-3xl">Let's find you a Job</h1>

            <form action="/job" method="POST" class="py-3">
                @csrf
                <input type="text" name="job" placeholder="Web developer..." class="rounded-xl bg-white/5 border-white/10 py-4 px-5 w-full max-w-xl ">
            </form>
        </section>

        <section>
            <x-section-heading>Featured Jobs</x-section-heading>

            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                <x-job-card></x-job-card>
                <x-job-card></x-job-card>
                <x-job-card></x-job-card>
            </div>

        </section>

        <section>
            <x-section-heading>Tags</x-section-heading>

            <div class="space-x-6 mt-6">
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
            </div>
        </section>

        <section>
            <x-section-heading>Recent Jobs</x-section-heading>

            <x-job-card-wide></x-job-card-wide>
            <x-job-card-wide></x-job-card-wide>
            <x-job-card-wide></x-job-card-wide>
        </section>

    </div>

</x-layout>
