
<form action="/admin/faqs" method="post">
    @csrf

    <x-form-textinput name="question" label="Vraag" placeholder="Geef hier de vraag"/>
    <x-form-textinput name="answer" label="Antwoord" placeholder="Geef een beknopt antwoord"/>

    <x-form-select
        name="category_id"
        label="Categorie"
        :options="\App\Models\Category::all()->pluck('name', 'id')->toArray()"
    />
    <button type="submit">Create</button>
</form>
