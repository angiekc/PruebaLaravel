@extends('layouts.app')
@section('content')
	<category :edit="true" :category="{{$category}}"></category>
@endsection
