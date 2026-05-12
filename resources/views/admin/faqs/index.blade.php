<x-site-layout>
<h1>Faqs</h1>
<ul>
@foreach($faqs as $faq)
    <li>
        {{$faq->question}}
        -
        <a href="/admin/faqs/{{$faq->id}}/edit">edit</a>
        |
        <form action="/admin/faqs/{{$faq->id}}" method="post">
            @csrf
            @method('delete')
            <button type="submit">delete</button>
        </form>
    </li>
@endforeach
</ul>

<a href="/admin/faqs/create">Add new faq</a>
</x-site-layout>
