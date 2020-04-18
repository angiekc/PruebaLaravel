@extends('layouts.app')
@section('content')
	<section class="container">
		<div class="row">
			<article class="col-md-10 col-md-offset-1">
				{!! Form::model($movie,['route' => ['movie.update', $movie->id], 'method' => 'put', 'novalidate']) !!}
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="name" class="form-control" required value="{{ $movie->name }}">
					</div>
					<div class="form-group">
						<label>Descripción</label>
						<input type="text" name="description" class="form-control" required value="{{ $movie->description }}">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success">Enviar</button>
					</div>
				{!! Form::close() !!}
			</article>
		</div>	
	</section>
@endsection