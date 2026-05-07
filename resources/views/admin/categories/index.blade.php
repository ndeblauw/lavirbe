
<h1>Categories</h1>
<ul>
@foreach($categories as $category)
    <li>
        {{$category->name}}
        -
        <a href="/admin/categories/{{$category->id}}/edit">edit</a>
        |
        <form action="/admin/categories/{{$category->id}}" method="post">
            @csrf
            @method('delete')
            <button type="submit">delete</button>
        </form>
    </li>
@endforeach
</ul>

<a href="/admin/categories/create">Add category</a>

