
<form action="/admin/categories" method="post">
    @csrf

    <label for="name">Category name</label>
    <input type="text" name="name" placeholder="category name" value="{{old('name')}}">
    @error('name') <div style="color: red"> {{ $message }} </div> @enderror

    <button type="submit">Create</button>
</form>
