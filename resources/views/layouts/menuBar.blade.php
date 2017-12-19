<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Index page</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @yield('style')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  @yield('script')
  
</head>
<body  ng-app="myApp" ng-controller="ctrl">
	<nav class="navbar navbar-default navbar-static">
		<div class="container">
			<div class="navbar-header">
				<!-- menu button -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<!-- brand image -->
				<a class="navbar-brand" href="#">Rubbish Site</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse" aria-expanded="false">
				<!-- Left Side Of Navbar -->
				<ul class="nav navbar-nav">
<!-- 					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li role="separator" class="divider"></li>
							<li class="dropdown-header">Nav header</li>
							<li><a href="#">Separated link</a></li>
							<li><a href="#">One more separated link</a></li>
						</ul>
					</li> -->
				</ul>
				<!-- Right Side Of Navbar -->
				<ul class="nav navbar-nav navbar-right">
					<!-- Authentication Links -->
					@if (Auth::guest())
					<li><a href="{{ route('login') }}">Login</a></li>
					<li><a href="{{ route('register') }}">Register</a></li>
					@else
					<li class="dropdown open">
						<div class="nav-shopcart">
							<span class="icon-lock"></span>
							<span class="glyphicon glyphicon-shopping-cart"></span> 
						</div>
						<div class="dropdown-content">
							<form  action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="shopcart" class="form-horizontal loginForm padding" >
								{{ csrf_field() }}
								<div class="form-group noMargin">
									<div class="shopCartHeader noMargin row">
										<div class="shopCartHeader ">Shopping List</div>
										<div class="shopCartHeader right">(Total:$<% getTotal() %>.00)</div>

									</div>
									<div ng-repeat="data in shopCartModel.data track by $index">
										<div class="shopCartElement noMargin row">
											<div class="shopCartElement_name col-md-6"><%data.Name%>
											</div>
											<input type="hidden" name="cmd" value="_cart" />
											<div class="shopCartElement_quatity col-md-3">
												<input type="text" name="currQuality" ng-model="data.currQuality" ng-change="change()">
											</div>
											<div class="shopCartElement_price col-md-3">@<%data.SellingPrice%></div>
										</div>
									</div>
								</div>
								<input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="upload" value="1" />
								<input type="hidden" name="business" value="ivankwongtszfung@gmail.com" />
								<input type="hidden" name="currency_code" value="HKD" />
								<input type="hidden" name="charset" value="utf-8" />
								<input type="hidden" name="custom" value="0" />
								<input type="hidden" name="invoice" value="0" />
								<div class="control-group">
									<button id="btncheckout" type="submit"  value="submit" class="shopBtn btn-block">Checkout</button>
								</div>
							</form>
						</div>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<ul class="dropdown-menu" role="menu">
								<li>
									<a href="{{ route('logout') }}"
									onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
									Logout
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</li>

				@endif
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>

  <div class="container header">
    <div>
      <p class="user_category"></p>
    </div>
  </div>
@yield('content')


  </body>
</html>
