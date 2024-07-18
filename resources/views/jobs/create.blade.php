<x-layout>

    <x-page-heading>Publish a Job</x-page-heading>

    <x-forms.form action="/job" method="POST" enctype="multipart/formdata">
        <x-forms.input label="Title" name="title" placeholder="CEO" />
        <x-forms.input label="Salary" name="salary" placeholder="$90,000" />
        <x-forms.input label="Location" name="location" placeholder="London"/>

        <x-forms.select label="Schedule" name="schedule">
            <option>Part Time</option>
            <option>Full Time</option>
        </x-forms.select>

        <x-forms.input label="URL" name="url" placeholder="https://eddyenin.com"/>
        <x-forms.checkbox label="Feature (Costs Extra)" name="featured"/>

        <x-forms.divider/>

        <x-forms.input label="Tags (seperate with commas)" name="tags" placeholder="video,design,web"/>

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>
