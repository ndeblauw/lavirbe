<x-site-layout>
<form action="/admin/articles" method="post" enctype="multipart/form-data">
    @csrf

    <x-form-textinput name="title" label="Title" placeholder="Article title"/>
    <x-form-textarea name="content" label="Content" placeholder="Article content"/>

    <x-form-select
        name="category_id"
        label="Category"
        :options="\App\Models\Category::all()->pluck('name', 'id')->toArray()"
    />

    <x-form-datepicker name="published_at" label="Published at"/>

    <x-form-file-upload name="image" label="Image"/>

    <button type="submit">Create</button>
</form>
</x-site-layout>
