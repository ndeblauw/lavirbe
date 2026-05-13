<x-site-layout>
<form action="/admin/articles/{{$article->id}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <x-form-textinput name="title" label="Title" placeholder="Article title" value="{{$article->title}}"/>
    <div>
        <label for="content">Content</label>
        <textarea class="border border-black" name="content" id="content" cols="30" rows="10">{{old('content', $article->content)}}</textarea>
        @error('content') <div style="color: red"> {{ $message }} </div> @enderror
    </div>

    <x-form-select
        name="category_id"
        label="Category"
        :options="\App\Models\Category::all()->pluck('name', 'id')->toArray()"
        value="{{$article->category_id}}"
    />

    <div>
        <label for="published_at">Published at</label>
        <input class="border border-black" type="date" name="published_at" id="published_at" value="{{old('published_at', $article->published_at?->format('Y-m-d'))}}">
        @error('published_at') <div style="color: red"> {{ $message }} </div> @enderror
    </div>

    @if($article->image_path)
        <div>
            <img src="{{asset('storage/'.$article->image_path)}}" alt="Current image" style="max-width: 200px;">
        </div>
    @endif

    <x-form-file-upload name="image" label="Image"/>

    <button type="submit">Update</button>
</form>
</x-site-layout>
