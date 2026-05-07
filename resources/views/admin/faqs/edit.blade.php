
<form action="/admin/faqs/{{$faq->id}}" method="post">
    @csrf
    @method('put')

    <x-form-textinput name="question" label="Vraag" placeholder="Geef hier de vraag" value="{{$faq->question}}"/>
    <x-form-textinput name="answer" label="Antwoord" placeholder="Geef een beknopt antwoord" value="{{$faq->answer}}"/>

    <button type="submit">Update</button>
</form>
