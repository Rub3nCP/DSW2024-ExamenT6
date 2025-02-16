@extends('layouts.content')

@section('title', 'Realizar Pedido')

@section('content')

@if(count($products))
<h2>Pedido para la empresa</h2>
<form action="/orders/save" method="post">
  <input type="hidden" name="company_id" value="{{ $companyId }}">
  <table>
      <thead>
          <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Precio</th>
              <th>Cantidad</th>
          </tr>
      </thead>
      <tbody>
          @foreach($products as $product)
              <tr>    
                  <td>{{ $product->getId() }}</td>
                  <td><a href="/products/details/{{ $product->getId() }}">{{ $product->getName() }}</a></td>
                  <td>{{ $product->getPrice() . '€' }}</td>
                  <td>
                      <input type="number" name="products[{{ $product->getId() }}]" step="1" placeholder="0">
                  </td>
              </tr>
          @endforeach
      </tbody>
  </table>
  <input type="submit" class="success" value="Hacer pedido">
  <input type="reset" class="success">
</form>


@else
<h2>No hay productos para esta empresa</h2>
@endif

@endsection
