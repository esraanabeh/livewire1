<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Stack Developers online Shopping cart</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<!-- Front style -->
	<link id="callCss" rel="stylesheet" href="{{ url('css/front_css/front.min.css')}}" media="screen"/>
	<link href="{{ url('css/front_css/base.css')}}" rel="stylesheet" media="screen"/>
	<!-- Front style responsive -->
	<link href="{{ url('css/front_css/front-responsive.min.css')}}" rel="stylesheet"/>
	<link href="{{ url('css/front_css/font-awesome.css')}}" rel="stylesheet" type="text/css">
	<!-- Google-code-prettify -->
	<link href="{{ url('js/front_js/google-code-prettify/prettify.css" rel="stylesheet')}}"/>
	<!-- fav and touch icons -->
	<link rel="shortcut icon" href="{{ asset('image/front_images/ico/favicon.ico')}}">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('image/front_images/ico/apple-touch-icon-144-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('image/front_images/ico/apple-touch-icon-114-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('image/front_images/ico/apple-touch-icon-72-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" href="{{ asset('image/front_images/ico/apple-touch-icon-57-precomposed.png')}}">
	<style type="text/css" id="enject"></style>
</head>
<body>

    <?php
    use App\Models\Category;
    $Categories = Category::Categories();
    // echo "<pre>"; print_r($Categories);
        ?>


<div id="header">
	<div class="container">
		<div id="welcomeLine" class="row">
			<div class="span6">Welcome!<strong> User</strong></div>
			<div class="span6">
				<div class="pull-right">
					<a href="{{url('/cart')}}"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ {{ count((array) session('cart')) }} ] Items in your cart </span> </a>
				</div>
			</div>
		</div>
		<!-- Navbar ================================================== -->
		<section id="navbar">
		  <div class="navbar">
		    <div class="navbar-inner">
		      <div class="container">
		        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		          <span class="icon-bar"></span>
		          <span class="icon-bar"></span>
		          <span class="icon-bar"></span>
		        </a>
		        <a class="brand" href="#">Stack Developers</a>
		        <div class="nav-collapse">
		          <ul class="nav">

		            <li class="active"><a href="{{url('/')}}">Home</a></li>

                    @foreach($Categories as $category)
                    @if(count($category['products'])>0)
		            <li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$category['nameEn']}} <b class="caret"></b></a>
		              <ul class="dropdown-menu">

                        @foreach($category['products'] as $product)

		              	<li class="divider"></li>
		                <li class="nav-header"><a href="#">{{$product['name']}}</a></li>
		              
		               @endforeach
		              </ul>
		            </li>
                    @endif
                    @endforeach
		            
		            <li><a href="#">About</a></li>
		          </ul>
		          <form class="navbar-search pull-left" action="#">
		            <input type="text" class="search-query span2" placeholder="Search"/>
		          </form>
		          <ul class="nav pull-right">
		            <li><a href="#">Contact</a></li>
		            <li class="divider-vertical"></li>
		            <li><a href="#">Login</a></li>
		          </ul>
		        </div><!-- /.nav-collapse -->
		      </div>
		    </div><!-- /navbar-inner -->
		  </div><!-- /navbar -->
		</section>
	</div>
</div>
<!-- Header End====================================================================== -->
{{-- <div id="carouselBlk">
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">
			<div class="item active">
				<div class="container">
					<a href="#"><img style="width:100%" src="{{ asset('image/front_images/carousel/1.png')}}" alt="special offers"/></a>
					<div class="carousel-caption">
						<h4>First Thumbnail label</h4>
						<p>Banner text</p>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="container">
					<a href="register.html"><img style="width:100%" src="{{ asset('image/front_images/carousel/2.png')}}" alt=""/></a>
					<div class="carousel-caption">
						<h4>Second Thumbnail label</h4>
						<p>Banner text</p>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="container">
					<a href="register.html"><img src="{{ asset('image/front_images/carousel/3.png')}}" alt=""/></a>
					<div class="carousel-caption">
						<h4>Third Thumbnail label</h4>
						<p>Banner text</p>
					</div>
					
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
	</div>
</div> --}}
<div id="mainBody">
	<div class="container">
		<div class="row">
			<!-- Sidebar ================================================== -->


			<div id="sidebar" class="span3">
				<div class="well well-small"><a id="myCart" href="{{url('/cart')}}"><img src="{{ asset('image/front_images/ico-cart.png')}}" alt="cart"> your Cart</a>{{ count((array) session('cart')) }}

				<?php $total = 0 ?>
				@foreach((array) session('cart') as $id => $details)
					<?php $total += $details['price'] * $details['quantity'] ?>
				@endforeach

				<div class="col-lg-6 col-sm-6 col-6 total-section text-right">
					<p>Total: <span class="text-info">$ {{ $total }}</span></p>
				</div>
			
				@if(session('cart'))
				@foreach(session('cart') as $id => $details)
					<div class="row cart-detail">
						<div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
							<img src="{{ $details['image'] }}" />
						</div>
						<div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
							<p>{{ $details['name'] }}</p>
							<span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
						</div>
					</div>
				@endforeach
			@endif

			{{-- <div class="row">
				<div class="col-lg-12 col-sm-12 col-12 text-center checkout">
					<a href="{{ url('cart') }}" class="btn btn-primary btn-block">View all</a>
				</div>
			</div> --}}
		</div>

				<ul id="sideManu" class="nav nav-tabs nav-stacked">

                    
                    @foreach($Categories as $category)
                    @if(count($category['products'])>0)
					<li class="subMenu"><a>{{$category['nameEn']}}</a>
                        
                        @foreach($category['products'] as $product)
						<ul>
							<li><a href="products.html"><i class="icon-chevron-right"></i><strong>{{$product['name']}}</strong></a></li>
						
						</ul>
                        @endforeach
						
					</li>
                    @endif
                    @endforeach
					
				</ul>
				<br/>
				<div class="thumbnail">
					<img src="{{ asset('image/front_images/payment_methods.png')}}" title="Payment Methods" alt="Payments Methods">
					<div class="caption">
						<h5>Payment Methods</h5>
					</div>
				</div>
			</div>
			<!-- Sidebar end=============================================== -->
			<div class="span9">
			
				<h4>available Products </h4>

                @foreach($newproducts as $product)
				<ul class="thumbnails">
					<li class="span3">
						<div class="thumbnail">
							<a  href="product_details.html">
                                <?php $product_image_path = 'image/'.$product['image']; ?>
                                @if (!empty($product['image'])&& file_exists($product_image_path))
                                <img style="width: 160px;" src="{{asset($product_image_path) }}">
                                @else
                                <img style="width: 160px;"  src =" {{asset('image/no-image.png')}} " >
                                @endif
                            </a>
							<div class="caption">
								<h5>{{ $product['name'] }}</h5>
								<p>
									{{ $product['name'] }} is available .
								</p>
                              
								
								{{-- <h4 style="text-align:center"> </a> --}}
                                     <p><strong>Price: </strong> {{ $product->price }}$</p>
                                     <p><strong>views: </strong> {{ $product->views }}</p>
                                     <p><strong>buyers: </strong> {{ $product->buyers }}</p>
                                   
									 {{-- <a class="btn btn-primary" href="#">views{{ $product['views'] }}</a> 
									<a class="btn btn-primary" href="#">buyers{{ $product['buyers'] }}</a></h4> --}}
									{{-- <a class="btn" href="{{ url('/add-to-cart' ) }}" role="button"  >Add to <i class="icon-shopping-cart"></i> --}}
										
										<p class="btn-holder"><a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add To Cart <i class="icon-shopping-cart"></i></a> </p>
                                {{-- </form> --}}
							</div>
						</div>
					</li>
                    @endforeach
					
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- Footer ================================================================== -->
<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h5>ACCOUNT</h5>
				<a href="login.html">YOUR ACCOUNT</a>
				<a href="login.html">PERSONAL INFORMATION</a>
				<a href="login.html">ORDER HISTORY</a>
			</div>
			<div class="span3">
				<h5>INFORMATION</h5>
				<a href="contact.html">CONTACT</a>
				<a href="tac.html">TERMS AND CONDITIONS</a>
				<a href="faq.html">FAQ</a>
			</div>
			<div class="span3">
				<h5>OUR OFFERS</h5>
				<a href="#">NEW PRODUCTS</a>
				<a href="#">TOP SELLERS</a>
				<a href="special_offer.html">SPECIAL OFFERS</a>
			</div>
			<div id="socialMedia" class="span3 pull-right">
				<h5>SOCIAL MEDIA </h5>
				<a href="https://www.facebook.com/groups/stackdevelopers"><img width="60" height="60" src="{{ asset('image/front_images/facebook.png')}}" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="60" height="60" src="{{ asset('image/front_images/twitter.png')}}" title="twitter" alt="twitter"/></a>
				<a href="https://www.youtube.com/StackDevelopers"><img width="60" height="60" src="{{ asset('image/front_images/youtube.png')}}" title="youtube" alt="youtube"/></a>
			</div>
		</div>
		<p class="pull-right"><a target="_blank" href="https://www.youtube.com/StackDevelopers">&copy; Stack Developers</a></p>
	</div><!-- Container End -->
</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
<script src="{{ url('js/front_js/jquery.js')}}" type="text/javascript"></script>
<script src="{{ url('js/front_js/front.min.js')}}" type="text/javascript"></script>
<script src="{{ url('js/front_js/google-code-prettify/prettify.js')}}"></script>

<script src="{{ url('js/front_js/front.js')}}"></script>
<script src="{{ url('js/front_js/jquery.lightbox-0.5.js')}}"></script>
{{-- <div class="container">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12 main-section">
            <div class="dropdown">
                <button type="button" class="btn btn-info" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </button>
                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </div>
                        <?php $total = 0 ?>
                        @foreach((array) session('cart') as $id => $details)
                            <?php $total += $details['price'] ?>
                        @endforeach
                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                        </div>
                    </div>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="{{ $details['image'] }}" />
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>{{ $details['name'] }}</p>
                                    <span class="price text-info"> ${{ $details['price'] }}</span> 
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ url('cart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}


</body>
</html>