@extends('layouts.layout')
@section('contenido')
<div class="row">
 <div class="col-md-6 col-md-offset-2">
 @if (count($errors)>0)
 <div class="alert alert-danger">
 <strong>Error!</strong> Revise los campos obligatorios.<br><br>
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
 @endif
 @if(Session::has('success'))
 <div class="alert alert-info">
 {{Session::get('success')}}
 </div>
 @endif
 <div class="panel panel-default">
 <div class="panel-heading">
 <h3 class="panel-title">Editar vehiculo</h3>
 </div>
 <div class="panel-body">
 <div class="table-container">
<form method="POST" action="{{ route('vehiculo.update',$vehiculo->id) }}" role="form">
 {{ csrf_field() }}
 <input name="_method" type="hidden" value="PATCH">
 <div class="row">
 <div class="col-xs-7 col-sm-7 col-md-7">
 <div class="form-group">
 <input type="text" name="placa" id="placa" class="form-control inputsm"
value="{{$vehiculo->placa}}">
 </div>
 </div>
 <div class="col-xs-7 col-sm-7 col-md-7">
 <div class="form-group">
 <input type="text" name="tipo" id="tipo" class="form-control inputsm"
value="{{$vehiculo->tipo}}">
</div>
</div>
</div>
<div class="col-xs-7 col-sm-7 col-md-7">
 <div class="form-group">
<input type="text" name="modelo" id="modelo" class="form-control inputsm"
value="{{$vehiculo->modelo}}">
 </div>
 </div>
 </div>

 <div class="row">
 <div class="col-xs-12 col-sm-12 col-md-12">
<input type="submit" value="Actualizar" class="btn btn-info btnblock">
<a href="{{ route('vehiculo.index') }}" class="btn btn-danger"
>Atrás</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection