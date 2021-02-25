@extends('admin.master')

@section('header1')
    <h1>Men&uacute; principal del administrador</h1>
@endsection

@section('content')

<div class="card-header">Administrador logado:</div>
<div class="card-body">
    <p>{{ auth()->guard('admin')->user()->login }}</p>
</div>
@endsection