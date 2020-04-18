@extends('layouts.app')
@section('content')
	<section class="container">
		<div class="row">
			<article class="col-md-12">
				{!! Form::open(['route' => 'category/show', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" name="name">
					</div>
					<div class="form-control">
						<button type="submit" class="btn btn-default">Search</button>
						<a href="{{ route('category.index') }}" class="btn btn-primary">All</a>
						<a href="{{ route('category.create') }}" class="btn btn-primary">Create</a>						
					</div>	
				{!! Form::close() !!}
			</article>
			
			<article class="col-md-12">
				<table class="table table-condensed table-striped table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>State</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
							<tr>
								<td>{{ $category->name }}</td>
								<td>{{ $category->state->state }}</td>
								<td>
									<a class="btn btn-primary btn-xs" href="{{ route('category.edit',['id' => $category->id]) }}">Edit</a>
									<a class="btn btn-danger btn-xs" href="{{ route('category/destroy',['id' => $category->id]) }}">Delete</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</article>
		</div>
	</section>
@endsection