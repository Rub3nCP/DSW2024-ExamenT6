@extends('layouts.content')

@section('title', 'Empresas')

@section('content')


<!-- listado de productos -->

  @if( count($products) )
  <h2>Listado de productos</h2>
  <table>
    <!-- cabecera -->
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <!-- cuerpo -->
    <tbody>
    @foreach($products as $product)
      <tr>    
        <td>{{ $product->getId() }}</td>
        <td><a href="/products/details/{{ $product->getId() }}">{{ $product->getName() }}</a></td>
        <td>{{ $product->getPrice() . '€'}}</td>
    <td></td>
    </tr>
    @endforeach
    </tbody>
  </table>
  @else
    <h2>No hay compañias</h2>
  @endif
@endsection