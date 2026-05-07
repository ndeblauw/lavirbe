
<form action="/admin/categories" method="post">
    @csrf

    <x-form-textinput name="name" label="Category name" placeholder="category name"/>

    <button type="submit">Create</button>
</form>
