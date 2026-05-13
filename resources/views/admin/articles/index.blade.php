<x-site-layout>
<h1>Articles</h1>
<ul>
@foreach($articles as $article)
    <li>
        {{$article->title}}
        @if($article->published_at)
            ({{$article->published_at->format('d-m-Y')}})
        @endif
        -
        <a href="/admin/articles/{{$article->id}}/edit">edit</a>
        |
        <form action="/admin/articles/{{$article->id}}" method="post">
            @csrf
            @method('delete')
            <button type="submit">delete</button>
        </form>
    </li>
@endforeach
</ul>

<a href="/admin/articles/create">Add new article</a>
</x-site-layout>
