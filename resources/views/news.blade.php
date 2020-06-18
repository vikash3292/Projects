@extends('layout')
@section('title', 'News')
@section('content')

<section class="blog-cat mt-5 pb-5">

	<div class="container mb-5">
		<div class="text-center container-less resources-feed-heading">
			<h1 class="in-news h3 text-red font-italic">Solodev In The News</h1>
			<h2 class="news-feed-heading h1 lead">Solodev CDO on Key Marketing Considerations in Choosing a CMS</h2>
			<p class="news-heading-intro h4 font-italic pt-3 font-weight-normal">"Free" should never be the biggest determining factor in deciding on a CMS provider. The most popular options leave websites
				vulnerable to security breaches and ultimately aren't worth the promises of a low price, said Solodev Chief Digital Officer
				Matt Garrepy.</p>
			<a class="btn btn-primary text-white mt-3" href="#">Read More</a>
		</div>
	</div>
	<div class="fullbar-item w-100 cursor-pointer" onclick="location.href='#'">
		<div class="container">
			<div class="row py-3 py-md-5 align-items-center border-top">
				<div class="col-md-10">
					<h3 class="feed-item-heading m-0 font-weight-800">
						<a class="text-black" href="#">Solodev Ranked as High Performer on G2 Crowd’s Spring 2020 Web Content Management Grid</a>
					</h3>
				</div>
				<div class="col-md-2">
					<p class="m-0 text-pink text-uppercase">April 02, 2020</p>
				</div>
			</div>
		</div>
	</div>
	<div class="fullbar-item w-100 cursor-pointer" onclick="location.href='#'">
		<div class="container">
			<div class="row py-3 py-md-5 align-items-center border-top">
				<div class="col-md-10">
					<h3 class="feed-item-heading  m-0 font-weight-800">
						<a class="text-black" href="#">Solodev Earns “Highest Ranking Software Tool” for State of Florida in Nationwide G2 Crowd Study</a>
					</h3>
				</div>
				<div class="col-md-2">
					<p class="m-0 text-pink text-uppercase">January 30, 2020</p>
				</div>
			</div>
		</div>
	</div>
	<div class="fullbar-item w-100 cursor-pointer" onclick="location.href='#'">
		<div class="container">
			<div class="row py-3 py-md-5 align-items-center border-top">
				<div class="col-md-10">
					<h3 class="feed-item-heading  m-0 font-weight-800">
						<a class="text-black" href="#">City of Miami Beach Launches Enticing Website to Match Vibrant City</a>
					</h3>
				</div>
				<div class="col-md-2">
					<p class="m-0 text-pink text-uppercase">Janurary 18, 2020</p>
				</div>
			</div>
		</div>
	</div>
	<div class="fullbar-item w-100 cursor-pointer" onclick="location.href='#'">
		<div class="container">
			<div class="row py-3 py-md-5 align-items-center border-top">
				<div class="col-md-10">
					<h3 class="feed-item-heading  m-0 font-weight-800">
						<a class="text-black" href="#">Solodev Earns National Recognition as Marketing and Commerce CMS Leader</a>
					</h3>
				</div>
				<div class="col-md-2">
					<p class="m-0 text-pink text-uppercase">December 05, 2019</p>
				</div>
			</div>
		</div>
	</div>
	<div class="fullbar-item w-100 cursor-pointer" onclick="location.href='#'">
		<div class="container">
			<div class="row py-3 py-md-5 align-items-center border-top">
				<div class="col-md-10">
					<h3 class="feed-item-heading  m-0 font-weight-800">
						<a class="text-black" href="#">Solodev Helps Power American Dairy Association North East's Online Passions</a>
					</h3>
				</div>
				<div class="col-md-2">
					<p class="m-0 text-pink text-uppercase">November 23, 2019</p>
				</div>
			</div>
		</div>
	</div>
</section>
<link rel="stylesheet" type="text/css" href="{{ url('public/css/album.css') }}" />
@endsection