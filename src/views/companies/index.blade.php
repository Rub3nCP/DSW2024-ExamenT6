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


<!-- listado de empresas -->

  @if( count($companies) )
  <h2>Listado de empresas</h2>
  <table>
    <!-- cabecera -->
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Correo de Contacto</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <!-- cuerpo -->
    <tbody>
    @foreach($companies as $company)
      <tr>    
        <td>{{ $company->getId() }}</td>
        <td><a href="/products/{{ $company->getId() }}">{{ $company->getName() }}</a></td>
        <td>{{ $company->getContactInfo()}}</td>
        <td>

          <a href="/companies/{{ $company->getId() }}/edit"><button  class="warning">Editar</button></a>
          <form class="frmBtn inline" action="/companies/{{  $company->getId() }}" method="post">
            <input type="hidden" name="_method" value="delete">
            <input type="submit" value="Borrar" class="alert">
          </form>
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