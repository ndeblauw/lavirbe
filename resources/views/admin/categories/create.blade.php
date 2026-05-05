
<form action="/admin/categories" method="post">
    @csrf

    <label for="name">Category name</label>
    <input type="text" name="name" placeholder="category name">

    <button type="submit">Create</button>
</form>
