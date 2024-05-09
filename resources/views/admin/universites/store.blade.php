<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Description</th>
            <th scope="col">location</th>
        </tr>
        </thead>
        <tbody>
        @foreach($universities as $universities)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->nom }}</td>
                <td>{{ $student->description }}</td>
                <td>{{ $student->location }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>