
<form action="/admin/categories/{{$category->id}}" method="post">
    @csrf
    @method('put')

    <label for="name">Category name</label>
    <input type="text" name="name" placeholder="category name" value="{{old('name', $category->name)}}">
    @error('name') <div style="color: red"> {{ $message }} </div> @enderror

    <button type="submit">Update</button>
</form>
