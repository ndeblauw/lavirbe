
<form action="/admin/faqs/{{$faq->id}}" method="post">
    @csrf
    @method('put')

    <x-form-textinput name="question" label="Vraag" placeholder="Geef hier de vraag" value="{{$faq->question}}"/>
    <x-form-textinput name="answer" label="Antwoord" placeholder="Geef een beknopt antwoord" value="{{$faq->answer}}"/>

    <x-form-select
        name="category_id"
        label="Categorie"
        :options="\App\Models\Category::all()->pluck('name', 'id')->toArray()"
        value="{{$faq->category_id}}"
    />

    <button type="submit">Update</button>
</form>
