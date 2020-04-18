@extends('layouts.app')
@section('content')
	<movie :edit="false" :categories="{{$categories}}"></movie>
@endsection
