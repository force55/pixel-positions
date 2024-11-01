<x-layout>
    <x-page-heading>New Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs">
        <x-forms.input name="title" label="Title" placeholder="CEO"/>
        <x-forms.input name="salary" label="Salary" placeholder="$90,000 USD"/>
        <x-forms.input name="location" label="Location" placeholder="New York, NY"/>

        <x-forms.select name="schedule" label="Schedule">
            @foreach($schedules as $schedule)
                <option value="{{ $schedule }}">{{ $schedule }}</option>
            @endforeach
        </x-forms.select>

        <x-forms.input name="url" label="URL" placeholder="https://example.com"/>
        <x-forms.checkbox name="featured" label="Featured (Costs Extra)"/>

        <x-forms.input name="tags" label="Tags (comma separated_" placeholder="remote, full-time, senior"/>

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>
