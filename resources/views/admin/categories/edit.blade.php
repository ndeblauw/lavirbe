
<form action="/admin/categories/{{$category->id}}" method="post">
    @csrf
    @method('put')

    <x-form-textinput name="name" label="Category name" placeholder="category name" value="{{$category->name}}"/>

    <button type="submit">Update</button>
</form>
