@extends('landingAdmin')
@section('content')

<div>
    <table>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Author</th>
        <th>Cover</th>
        <th>Price</th>
    </table>
</div>
<div>
    <h3>Insert Book</h3>
    <form action="">
        <label for="titleInsert">Title</label><br>
        <input id="titleInsert" type="text" name="title" placeholder="Title"><br>
        <label for="descriptionInsert">Description</label><br>
        <input id="descriptionInsert" type="text" name="description" placeholder="Description"><br>
        <label for="authorInsert">Author</label><br>
        <input id="authorInsert" type="text" name="author" placeholder="Auhtor"><br>
        <label for="bookCoverInsert">Cover</label><br>
        <input id="bookCoverInsert" type="file" name="cover"><br>
        <label for="priceInsert">Price</label><br>
        <input id="priceInsert" type="number" name="price" min="1"><br>
        <br>
        <input type="submit" value="Submit"><br>
    </form>
</div>

@endsection