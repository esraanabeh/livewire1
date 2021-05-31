
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

<?php
use App\Models\Category;
$Categories = Category::Categories();
// echo "<pre>"; print_r($Categories);
    ?>

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

<div id="mainBody">
<div class="container">
  <div class="row">
    <div id="sidebar" class="span3">
        <div class="well well-small"><a id="myCart" href="{{url('/cart')}}"><img src="{{ asset('image/front_images/ico-cart.png')}}" alt="cart">  your Cart</a>{{ count((array) session('cart')) }}</div>
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




    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li class="active"> SHOPPING CART</li>
        </ul>
        <h3>  SHOPPING CART [ <small>{{ count((array) session('cart')) }} </small>]</h3>	


<table class="table table-bordered">
    <thead>
      <tr>
        <th>Product</th>
        <th>Price</th>
        
      </tr>
    </thead>
    <tbody>
        


{{-- @dump(\Session::get('cart')) --}}

<?php $total = 0 ?>
@if(session('cart'))
    @foreach(session('cart') as $id => $details)
    <?php $total += $details['price']  ?>

    <tr>
      <td data-th="Product">
          <div class="row">
              <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
              <div class="col-sm-9">
                  <h4 class="nomargin">{{ $details['name'] }}</h4>
              </div>
          </div>
      </td>

      <td data-th="Price">${{ $details['price'] }}</td>
      <td data-th="Subtotal" class="text-center">${{ $details['price']  }}</td>
      <td class="actions" data-th="">
        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
        {{-- <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button> --}}
    </td>
</tr>
@endforeach
@endif
</tbody>

<tfoot>
  <tr class="visible-xs">
      <td class="text-center"><strong>Total {{ $total }}</strong></td>
  </tr>


  <tr>
    <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
    <td colspan="2" class="hidden-xs"></td>
    <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
</tr>
</tfoot>
</table>



{{-- <div  id="footerSection">
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
</div> --}}

  
  <script src="{{ url('js/front_js/jquery.js')}}" type="text/javascript"></script>
<script src="{{ url('js/front_js/front.min.js')}}" type="text/javascript"></script>
<script src="{{ url('js/front_js/google-code-prettify/prettify.js')}}"></script>

<script src="{{ url('js/front_js/front.js')}}"></script>
<script src="{{ url('js/front_js/jquery.lightbox-0.5.js')}}"></script>


