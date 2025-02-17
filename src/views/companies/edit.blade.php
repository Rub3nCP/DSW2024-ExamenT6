@extends('layouts.content')

@section('title', 'Empresas')

@section('content')

<form class="warning" action="/companies/{{$companyToEdit->getId()}}" method="POST">
  <!-- Actualización -->
  <input type="hidden" name="_method" value="put">
  <legend>Modificar Empresa</legend>
  <label for="name">Nombre:</label>
  <input type="text" id="name" name="name" required placeholder="{{ $companyToEdit->getName()}}">
  <br>
  <label for="contact_info">Correo de Contacto:</label>
  <input type="email" id="contact_info" name="contact_info" required placeholder="{{ $companyToEdit->getContactInfo()}}">
  <div>
      <button class="success">Guardar Cambios</button>
      <input type="reset" name="" id="" class="button alert" value="Restaurar">
      <a href="/companies" class="button">Descartar</a>
  </div>
</form>
<!-- Si hay empresas disponibles, mostramos una lista en una tabla -->
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
        <td>{{ $company->getName() }}</td>
        <td>{{ $company->getContactInfo()}}</td>
        <td>

          <a href="/companies/{{ $company->getId() }}/edit"><button  class="warning">Editar</button></a>
          <!-- Formulario para borrar la empresa -->
          <form class="frmBtn inline" action="/companies/{{  $company->getId() }}" method="post">
            <input type="hidden" name="_method" value="delete">
            <input type="submit" value="Borrar" class="alert">
          </form>
        </td>
    </tr>
    @endforeach
    </tbody>
  </table>
  @else
    <h2>No hay compañias</h2>
  @endif
@endsection