@extends('layout')
@section('title', 'Contact Details')
@section('content')

  
			<h1>Details of {{$contacts->name}}</h1>
			<p><a href="{{$contacts->id}}/edit">Edit</a></p>
			<form action="{{url('contact')}}/{{$contacts->id}}" method="POST">
			@method('DELETE')
			@csrf
			<button type="submit" class="btn btn-danger">Delete</button>
			</form>
			<br>
			<div class="row">
			<div class="col-12">
			<p><strong>Name: </strong>{{$contacts->name}}</p>
			<p><strong>LastName: </strong>{{$contacts->lastname}}</p>
			<p><strong>Email: </strong>{{$contacts->email}}</p>
			<p><strong>phone: </strong>{{$contacts->phone}}</p>
			<p><strong>Pincode: </strong>{{$contacts->pincode}}</p>
			<p><strong>Message: </strong>{{$contacts->message}}</p>
			<p><strong>Company: </strong>{{$contacts->company->name}}</p>
			</div>
			</div>	

<link rel="stylesheet" type="text/css" href="{{ url('public/css/album.css') }}" />

@endsection
