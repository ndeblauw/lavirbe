<x-site-layout>
<form action="/admin/articles" method="post" enctype="multipart/form-data">
    @csrf

    <x-form-textinput name="title" label="Title" placeholder="Article title"/>
    <div>
        <label for="content">Content</label>
        <textarea class="border border-black" name="content" id="content" cols="30" rows="10">{{old('content')}}</textarea>
        @error('content') <div style="color: red"> {{ $message }} </div> @enderror
    </div>

    <x-form-select
        name="category_id"
        label="Category"
        :options="\App\Models\Category::all()->pluck('name', 'id')->toArray()"
    />

    <div>
        <label for="published_at">Published at</label>
        <input class="border border-black" type="date" name="published_at" id="published_at" value="{{old('published_at')}}">
        @error('published_at') <div style="color: red"> {{ $message }} </div> @enderror
    </div>

    <x-form-file-upload name="image" label="Image"/>

    <button type="submit">Create</button>
</form>
</x-site-layout>
