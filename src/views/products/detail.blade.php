@extends('layouts.content')

@section('title', 'Empresas')

@section('content')


<!-- listado de productos -->

  <div class="box">
    <h3>{{ $productInfo->getId() }} - {{ $productInfo->getName() }}</h3>
    {{ $productInfo->getDescription() }}
    <h4>{{ $productInfo->getPrice() }}</h4>
    <h4>Empresa:{{ $productInfo->getCompanyId() }}</h4>

  </div>


@endsection