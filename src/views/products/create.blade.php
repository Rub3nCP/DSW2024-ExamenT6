@extends('layouts.content')

@section('title', 'Empresas')

@section('content')


<!-- formulario -->

<form action="/products" method="post">
  <legend>Nuevo Producto</legend>
  <label for="name">Nombre: </label>
  <input type="text" id="name" name="name" required>
  <br>
  <label for="product_description">Descripción:</label>
  <input type="text" id="product_description" name="product_description" required>

  <label for="product_price">Precio:</label>
  <input type="number" step="0.01" id="product_price" name="product_price" required>
  
  <label for="product_price">Compañia:</label>

  <select name="company_selected" id="company_selected" required>
    @foreach($companies as $company)
      <option value="{{ $company->getId() }}">{{ $company->getName() }}</option>  

    @endforeach

  </select>
  <div>
    <button class="success">Crear Producto</button>
  </div>
</form>

@endsection