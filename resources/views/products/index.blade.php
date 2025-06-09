@extends('layouts.app')

@section('content')
    <h2>List of products from the database</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->nombre }}</td>
                <td>{{ $product->precio }}</td>
                <td>{{ $product->descripcion }}</td>
            </tr>
        @endforeach
    </table>
@endsection