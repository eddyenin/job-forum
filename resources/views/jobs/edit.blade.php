@props(['jo'])
<x-layout>

    <x-page-heading>Edit job</x-page-heading>

    <x-forms.form action="" method="POST" enctype="multipart/formdata">
        <x-forms.input label="Title" name="title"  value="{{ $jo->title }}"/>
        <x-forms.input label="Salary" name="salary" value="{{ $jo->salary }}"/>
        <x-forms.input label="Location" name="location" value="{{ $jo->location }}"/>

        <x-forms.select label="Schedule" name="schedule">
            <option>{{ $jo->schedule }}</option>
            <option>Part Time</option>
            <option>Full Time</option>
        </x-forms.select>

        <x-forms.input label="URL" name="url" value="{{ $jo->url }}" placeholder="https://eddyenin.com"/>
        <x-forms.checkbox label="Feature (Costs Extra)" name="featured"/>

        <x-forms.divider/>

        <x-forms.input label="Tags (seperate with commas)" name="tags" />

        <x-forms.button>Edit</x-forms.button>
    </x-forms.form>
</x-layout>
