@extends('layouts.app')
@section('content')
	<section class="container">
		<div class="row">
			<article class="col-md-12">
				{!! Form::open(['route' => 'user/show', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" name="name">
					</div>
					<div class="form-control">
						<button type="submit" class="btn btn-default">Search</button>
						<a href="{{ route('user.index') }}" class="btn btn-primary">All</a>
					</div>	
				{!! Form::close() !!}
			</article>
			<article class="col-md-12">
				<table class="table table-condensed table-striped table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Description</th>
							<th>State</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>						
						@foreach($users as $user)
							<tr>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->state->state }}</td>
								<td>
									<a class="btn btn-primary btn-xs" href="{{ route('user.edit',['id' => $user->id]) }}">Edit</a>
									<a class="btn btn-danger btn-xs" href="{{ route('user/destroy',['id' => $user->id]) }}">Delete</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</article>
		</div>
	</section>
@endsection