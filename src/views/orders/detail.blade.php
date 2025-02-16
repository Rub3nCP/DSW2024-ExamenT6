@extends('layouts.content')

@section('title', 'Empresas')

@section('content')


<!-- listado de productos -->
  <h1>Detalle de pedido</h1>
  <div class="box">
    <p>Id de pedido: {{$orderInfo->getId()}}</p>
    <p>Fecha: {{$orderInfo->getOrder_date()}}</p>
    <p>Empresa: {{$orderInfo->getCompanyId()}}</p>

  </div>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>ID Pedido</th>
        <th>Producto</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Subtotal</th>

      </tr>
    </thead>
    <tbody>
    @foreach($ordersDetailInfo as $detailedOrder)
      <tr>    
        <td>{{ $detailedOrder->getId() }}</td>
        <td>{{ $detailedOrder->getOrderId() }}</td>
        <td>{{ $detailedOrder->getProductName() }}</td>
        <td>{{ $detailedOrder->getPrice() . '€'}}</td>
        <td>{{ $detailedOrder->getQuantity() }}</td>
        <td>{{ $detailedOrder->getSub() . '€'}}</td>
    </tr>
    @endforeach
      <tfoot>
        <tr>
          <td colspan="5">Total</td>
          <td>{{$total . '€'}}</td>
        </tr>
      </tfoot>
    </tbody>
  </table>


@endsection