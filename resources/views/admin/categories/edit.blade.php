<x-site-layout>
<form action="/admin/categories/{{$category->id}}" method="post" enctype="multipart/form-data" class="bg-white p-4">
    @csrf
    @method('put')

    <x-form-textinput name="name" label="Category name" placeholder="category name" value="{{$category->name}}"/>
    <x-form-file-upload name="picture" label="Category picture" />

    <button type="submit" class="bg-black p-2 text-white">Update</button>
</form>
</x-site-layout>
