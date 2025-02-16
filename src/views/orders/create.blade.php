@extends('layouts.content')

@section('title', 'Empresas')

@section('content')


<!-- listado de productos -->

  @if( count($products) )
  <h2>Pedido para la empresa</h2>
  <form action="/orders" method="post">
  <table>
    <!-- cabecera -->
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
      </tr>
    </thead>
    <!-- cuerpo -->
    <tbody>
    @foreach($products as $product)
    <tr>    
      <td>{{ $product->getId() }}</td>
      <td><a href="/products/details/{{ $product->getId() }}">{{ $product->getName() }}</a></td>
      <td>{{ $product->getPrice() . '€'}}</td>
      <td>
        <input type="hidden" id="{{$companyId}}">
        <input type="number" name="" id="" step="1" placeholder="0">
      </td>
    </tr>
    @endforeach
    </tbody>
  </table>
  <input type="submit" class="success" value="Hacer pedido">
  <input type="reset" class="success">

</form>
  @else
    <h2>No hay compañias</h2>
  @endif
@endsection