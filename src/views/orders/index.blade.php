@extends('layouts.content')

@section('title', 'Empresas')

@section('content')


<!-- listado de orderos -->

  @if( count($orders) )
  <h2>Listado de pedidos</h2>
  <table>
    <!-- cabecera -->
    <thead>
      <tr>
        <th>ID</th>
        <th>Fecha</th>
        <th>Empresa</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <!-- cuerpo -->
    <tbody>
    @foreach($orders as $order)
      <tr>    
        <td>{{ $order->getId() }}</td>
        <td>{{ $order->getOrder_date() }}</td>
        <td>{{ $order->getCompanyId()}}</td>
        <td><a href="/orders/details/{{ $order->getId() }}">Detalle</a></td>
        
    </tr>
    @endforeach
    </tbody>
  </table>
  @else
    <h2>No hay compañias</h2>
  @endif
@endsection