@extends('layout')
@section('title', 'Contact List')
@section('content')

  
			<h1>Contact List</h1>
            <ul>
	
              @foreach($contact as $contacts)
			<div class="row">
			<div class="col-2">{{$contacts->id}}
			</div>
			
			  <div class="col-4"><a href="contact/{{$contacts->id}}">{{$contacts->name}}</a></div>
			  <div class="col-4">{{$contacts->company->name}}</div>
			   <div class="col-2">{{$contacts->active}}</div>
			</div>	

			@endforeach
	
</ul>

  <p><a href="contact/create">Contact Us</a></p>

<link rel="stylesheet" type="text/css" href="{{ url('public/css/album.css') }}" />

@endsection
