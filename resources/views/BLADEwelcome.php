<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Index page</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <script src="{{ asset('js/index.js') }}"></script>
</head>
<body  ng-app="myApp" ng-controller="ctrl">
  <nav class="navbar navbar-default navbar-static">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Rubbish Site</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
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
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown open">
            <div class="nav-shopcart">
              <span class="icon-lock"></span>
              <span class="glyphicon glyphicon-shopping-cart"></span> 
            </div>
            <div class="dropdown-content">
              <form action="#" method="post" class="form-horizontal loginFrm padding">
                <div class="control-group">
                  <input type="text" class="span2" id="inputEmail" placeholder="Email">
                </div>
                <div class="control-group">
                  <input type="password" class="span2" id="inputPassword" placeholder="Password">
                </div>
                <div class="control-group">
                  <label class="XXXXXX">
                    <input type="checkbox">
                    Remember me
                  </label>
                  <button type="submit" class="shopBtn btn-block">Sign in</button>
                </div>
              </form>
            </div>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container header">
    <div>
      <p class="user_category">this is a information row</p>
    </div>
  </div>

  <div class="container">
    <div class="col-sm-3 category">
      <ul class="sidebar-nav nav navbar-default">
        <li class="sidebar-brand active">
          <a href="#home" class=""><span class="fa fa-home solo">Home</span></a>
        </li>
        <li class="category_list">
         <a href="#anch1" data-scroll="" class=""><span class="fa fa-anchor solo">Anchor 1</span></a>
       </li>
       <li class="category_list">
        <a href="#anch2" data-scroll="" class=""><span class="fa fa-anchor solo">Anchor 2</span></a>
      </li>
      <li class="category_list">
        <a href="#anch3" data-scroll="" class=""><span class="fa fa-anchor solo">Anchor 3</span></a>
      </li>
      <li class="category_list">
        <a href="#anch4" data-scroll="" class=""><span class="fa fa-anchor solo">Anchor 4</span></a>
      </li>
    </ul>
  </div>
  <div class="col-sm-9">
    <div class="alert alert-danger hidden">
      <strong>Error!</strong> data can not load successfully.
    </div>
    <div ng-repeat="data in dataset" class="col-sm-4 col-md-3 col-xs-4 grid_product">
      <div class="padding">
      {{data}}
        <div class="product_photo">
          <img src="{{asset('img/food.png')}}">
        </div>
        <div class="name">
          <a href="/product" data-ajax="false" data-link="/Product-ARROWHEAD-MILLS/ORGANIC-SPLIT-GREEN-PEAS/p/BP_426705">ARROWHEAD MILLS ORGANIC SPLIT GREEN PEAS</a>
        </div>
        <div class="price">$123</div>
        <div class="add_cart">
          <button>add to cart</button>
        </div>
      </div>
    </div>
  </div>
</div>


<section class="content"></section>
<footer class="footer"></footer>

</body>
</html>
