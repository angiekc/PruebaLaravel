@extends('layouts.app')
@section('content')
	<section class="container">
		<div class="form-row">
			<article class="form-group col-md-12">
				{!! Form::open(['route' => 'movie/show', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
					<div class="form-row">
						<div class="ml-2">
							<label>Name</label>
						</div>
						<div class="ml-2">							
							<input type="text" class="form-control" name="name">
						</div>
					</div>
					<div class="form-row ml-2">
						<div class="ml-2">							
							<button type="submit" class="btn btn-default">Search</button>
						</div>
						<div class="ml-2">							
							<a href="{{ route('movie.index') }}" class="btn btn-primary">All</a>
						</div>
							@if(\Auth::user()->role == 'Admin')
								<div class="ml-2">
									<a href="{{ route('movie.create') }}" class="btn btn-primary">Create</a>	
								</div> 	
							@endif
					</div>	
				{!! Form::close() !!}
			</article>
			<article class="col-md-12 mt-3">
				<table class="table table-condensed table-striped table-bordered">
					<thead>
						<tr class="text-center">
							<th>Name</th>
							<th>Description</th>
							<th>Registered by</th>
							<th>Categories</th>
							<th>State</th>
							@if(\Auth::user()->role == 'Admin')
								<th>Action</th>
							@endif
						</tr>
					</thead>
					<tbody>						
						@foreach($movies as $movie)
							<tr>
								<td>{{ $movie->name }}</td>
								<td>{{ $movie->description }}</td>
								<td>{{ $movie->user->name }} - {{ $movie->user->email }}</td>
								<td>
									@foreach($movie->categories as $category)
										{{$category->name}} -
									@endforeach
								</td>

								<td>{{ $movie->state->state }}</td>
									@if(\Auth::user()->role == 'Admin')
										<td>
											<div class="row">										
												<div class="col-md-12">										
													<a class="btn btn-primary btn-xs w-100" href="{{ route('movie.edit',['id' => $movie->id]) }}">Edit</a>
												</div>
												<div class="col-md-12 mt-1">
													<a class="btn btn-danger btn-xs w-100" href="{{ route('movie/destroy',['id' => $movie->id]) }}">Delete</a>
												</div>
											</div>
										</td>
									@endif
							</tr>
						@endforeach
					</tbody>
				</table>
			</article>
		</div>
	</section>
@endsection