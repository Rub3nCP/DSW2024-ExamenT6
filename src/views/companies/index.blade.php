@extends('layouts.content')

@section('title', 'Empresas')

@section('content')

<!-- formulario -->
<form action="/companies" method="post">
  <legend>Nueva Empresa</legend>
  <label for="name">Nombre: </label>
  <input type="text" id="name" name="name" required>
  <br>
  <label for="contact_info">Correo de Contacto:</label>
  <input type="email" id="contact_info" name="contact_info" required>
  <div>
    <button class="success">Crear Empresa</button>
  </div>
</form>

  @if( count($companies) )
  <h2>Listado de empresas</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Correo de Contacto</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
    @foreach($companies as $company)
      <tr>    
        <td>{{ $company->getId() }}</td>
        <!-- Enlace con el nombre de la empresa que lleva a la lista de productos de esa empresa -->
        <td><a href="/products/{{ $company->getId() }}">{{ $company->getName() }}</a></td>
        <td>{{ $company->getContactInfo()}}</td>
        <td>
          
          <!-- Enlace para editar la empresa -->
          <a href="/companies/{{ $company->getId() }}/edit"><button  class="warning">Editar</button></a>
          
          <!-- Formulario para borrar la empresa -->
          <form class="frmBtn inline" action="/companies/{{  $company->getId() }}" method="post">
            <input type="hidden" name="_method" value="delete">
            <input type="submit" value="Borrar" class="alert">
          </form>
          
          <!-- Enlace para hacer un pedido relacionado con la empresa -->
          <a href="/orders/add/{{ $company->getId() }}"><button  class="success">Hacer pedido</button></a>
        </td>
    </tr>
    @endforeach
    </tbody>
  </table>
  @else
    <h2>No hay compañias</h2>
  @endif
@endsection