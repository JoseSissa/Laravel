<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add two numbers</title>
</head>
<body>
    <h1>Add two numbers</h1>
    <form action="/suma" method="post">
        @csrf
        <label for="numero1">First number:</label>
        <input type="number" name="numero1" id="numero1" placeholder="First number">
        <br>
        <label for="numero2">Second number:</label>
        <input type="number" name="numero2" id="numero2" placeholder="Second number"> 
        <br>
        <button type="submit">Add</button>
    </form>
    <br>
    @if(isset($res))
        <h2>Result: {{ $res }}</h2>
    @endif
</body>
</html>