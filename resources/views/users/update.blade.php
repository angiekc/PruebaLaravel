@extends('layouts.app')
@section('content')
	<section class="container">
		<div class="row">
			<article class="col-md-10 col-md-offset-1">
				{!! Form::model($user,['route' => ['user.update', $user->id], 'method' => 'put', 'novalidate']) !!}
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="name" class="form-control" required value="{{ $user->name }}">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" required value="{{ $user->email }}">
					</div>
					<div class="form-group">
						<label>Estado</label>
						{{ Form::select('state',$states, null,['class' => 'form-control','placeholder' => 'Seleccione','required' => 'required']) }}
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success">Enviar</button>
					</div>
				{!! Form::close() !!}
			</article>
		</div>	
	</section>
@endsection