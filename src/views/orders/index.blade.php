@extends('layouts.content')

@section('title', 'Empresas')

@section('content')


<!-- Lista de pedidos -->

  @if( count($orders) )
  <h2>Listado de pedidos</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Fecha</th>
        <th>Empresa</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
      <tr>    
        <td>{{ $order->getId() }}</td>
        <td>{{ $order->getOrder_date() }}</td>
        <td>{{ $order->getCompanyId()}}</td>
        <!-- Enlace para ver los detalles de este pedido -->
        <td><a href="/orders/details/{{ $order->getId() }}">Detalles</a></td>
    </tr>
    @endforeach
    </tbody>
  </table>
  @else
    <h2>No hay compañias</h2>
  @endif
@endsection