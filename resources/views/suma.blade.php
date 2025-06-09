@extends('layouts.app')

@section('content')
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
@endsection