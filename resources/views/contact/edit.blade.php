@extends('layout')
@section('title', 'Edit Details of {{$contacts->name}}')
@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

<div class="row" id="contatti">
<div class="container mt-5" >

    <div class="row" style="height:550px;">
      <div class="col-md-6 maps" >
         <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11880.492291371422!2d12.4922309!3d41.8902102!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x28f1c82e908503c4!2sColosseo!5e0!3m2!1sit!2sit!4v1524815927977" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <div class="col-md-6">
        <h2 class="text-uppercase mt-3 font-weight-bold text-white">Edit Details For {{$contacts->name}}</h2>
        <form action="{{url('contact')}}/{{$contacts->id}}" method="POST">
		@method('PATCH')
		@include('contact.form');
            <div class="col-12">
              <button class="btn btn-light" type="submit">Save</button>
            </div>
        </form>
        <div class="text-white">
        <h2 class="text-uppercase mt-4 font-weight-bold">where we are</h2>

        <i class="fas fa-phone mt-3"></i> <a href="tel:+">(+91) 7860488101</a><br>
        <i class="fas fa-phone mt-3"></i> <a href="tel:+">(+91) 7860488101</a><br>
        <i class="fa fa-envelope mt-3"></i> <a href="">info@test.it</a><br>
        <div class="my-4">
        <a href=""><i class="fab fa-facebook fa-3x pr-4"></i></a>
        <a href=""><i class="fab fa-linkedin fa-3x"></i></a>
        </div>
        </div>
      </div>

    </div>
</div>
</div>

<div class="row text-center bg-success text-white" id="author">
  <div class="col-12 mt-4 h3 ">
  <a href="#">by Vikash</a>
</div>
<div class="col-12 my-2">
<a href="https://www.linkedin.com/in/paolofattoruso/" target="_blank"><i class="fab fa-linkedin fa-3x"></i></a>
</div>
</div>
<link rel="stylesheet" type="text/css" href="{{ url('public/css/album.css') }}" />

@endsection
