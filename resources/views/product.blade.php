@extends('layouts.menuBar')
@section('style')
<link rel="stylesheet" type="text/css" href="css/styles.css">
@endsection
@section('script')
<script src="js/product.js"></script>
@endsection
@section('content')

  <div class="container">
    <div class="col-sm-3 category">
      <ul class="sidebar-nav nav navbar-default">

        <li class="sidebar-brand active">
          <a href="#home" class=""><span class="fa fa-home solo">Home</span></a>
        </li>
        <li ng-repeat="cat in category" class="category_list">
         <a href="" data-scroll="" class=""><span class="id hidden"><%cat.Catid%></span><span class="fa fa-anchor solo"><%cat.Catname%></span></a>
       </li>
    </ul>
  </div>
  <div class="col-sm-9">
    <div class="alert alert-danger hidden">
      <strong>Error!</strong> data can not load successfully.
    </div>
      <div ng-repeat="data in dataset" class="grid_product product_detail">
        <div id="product-<%data.Pid%>" class="hidden">
          <%data.Pid%>
        </div>
        <div class="padding">
          <div class="product_photo">
            <img class="img-responsive" ng-src="./images/<%data.Pid%>_<%data.Catid%>_<%data.Name%>">
          </div>
          <div class="name">
            <a href="/product" data-ajax="false" data-link="/Product-ARROWHEAD-MILLS/ORGANIC-SPLIT-GREEN-PEAS/p/BP_426705"><%data.Name%></a>
          </div>
          <div class="price">$<%data.SellingPrice%></div>
          <div class="price">$<%data.Description%></div>
          <div class="add_cart">
            <button ng-click="addToCart(data)">add to cart</button>
          </div>
        </div>
      </div>
  </div>
</div>


<section class="content"></section>
<footer class="footer"></footer>


@endsection