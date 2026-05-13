<x-site-layout>
<form action="/admin/articles/{{$article->id}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <x-form-textinput name="title" label="Title" placeholder="Article title" value="{{$article->title}}"/>
    <x-form-textarea name="content" label="Content" placeholder="Article content" value="{{$article->content}}"/>

    <x-form-select
        name="category_id"
        label="Category"
        :options="\App\Models\Category::all()->pluck('name', 'id')->toArray()"
        value="{{$article->category_id}}"
    />

    <x-form-datepicker name="published_at" label="Published at" value="{{$article->published_at?->format('Y-m-d')}}"/>

    @if($article->image_path)
        <div>
            <img src="{{asset('storage/'.$article->image_path)}}" alt="Current image" style="max-width: 200px;">
        </div>
    @endif

    <x-form-file-upload name="image" label="Image"/>

    <button type="submit">Update</button>
</form>
</x-site-layout>
