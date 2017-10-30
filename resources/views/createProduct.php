<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Index page</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="http://13.59.52.101/css/styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <script src="http://13.59.52.101/js/createProduct.js"></script>
</head>
<body  ng-app="myApp" ng-controller="ctrl">
  <nav class="navbar navbar-inverse navbar-static">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Admin Panel</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse" aria-expanded="false">
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
              <form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="shopcart" class="form-horizontal loginFrm padding">
                <div class="form-group noMargin">
                  <div class="shopCartHeader noMargin row">
                    <div class="shopCartHeader ">Shopping List</div>
                    <div class="shopCartHeader right">(Total:${{ getTotal() }}.00)</div>

                  </div>
                  <div ng-repeat="data in shopCartModel.data track by $index">
                    <div class="shopCartElement noMargin row">
                      <div class="shopCartElement_name col-md-6">{{data.Name}}</div>
                      <div class="shopCartElement_quatity col-md-3">
                        <input type="text" name="currQuality" ng-model="data.currQuality">
                      </div>
                      <div class="shopCartElement_price col-md-3">@{{data.SellingPrice}}</div>
                    </div>
                  </div>
                </div>
                <div class="control-group">
                  <button type="submit"  class="shopBtn btn-block">checkout</button>
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
        <li ng-repeat="cat in category" class="category_list">
         <a href="" data-scroll="" class=""><span class="id hidden">{{cat.Catid}}</span><span class="fa fa-anchor solo">{{cat.Catname}}</span></a>
       </li>
     </ul>
   </div>


   <div class="col-sm-9">
          <form id="target">
            <div class="form-group">
              <label for="Name">Name:</label>
              <input type="Name" class="form-control" name="Name" ng-value="dataset.Name" required>
            </div>
            <div class="form-group">
              <label for="pwd">Description:</label>
              <input type="Name" class="form-control" name="Description" ng-value="dataset.Description" required>
            </div>
            <div class="form-group">
              <label for="pwd">Category:</label>
              <input type="Name" class="form-control" name="Catid"  ng-value="dataset.Catid" required>
            </div>
<!--             <div class="form-group">
              <label for="image">Image:</label>
              <input type="file" class="form-control" name="image" required>
            </div> -->
            <div class="form-group">
              <label for="image">Sku:</label>
              <input type="Name" class="form-control" name="Sku" ng-value="dataset.Sku" required>
            </div>
            <div class="form-group">
              <label for="image">Cost:</label>
              <input type="Name" class="form-control" name="Cost" ng-value="dataset.Cost" required>
            </div>
            <div class="form-group">
              <label for="image">MarkedPrice:</label>
              <input type="Name" class="form-control" name="MarkedPrice" ng-value="dataset.MarkedPrice" required>
            </div>
            <div class="form-group">
              <label for="image">SellingPrice:</label>
              <input type="Name" class="form-control" name="SellingPrice" ng-value="dataset.SellingPrice" required>
            </div>
             <div class="form-group">
              <label for="image">Barcode:</label>
              <input type="Name" class="form-control" name="Barcode" ng-value="dataset.Barcode" required>
            </div>
             <div class="form-group">
              <label for="image">Quanity:</label>
              <input type="Name" class="form-control" name="Quanity" ng-value="dataset.Quanity" required>
            </div>
            <button type="submit" class="btn btn-default" id="submit">Submit</button>
          </form>





          <!-- <div class="alert alert-danger hidden">
            <strong>Error!</strong> data can not load successfully.
          </div>
          <div ng-repeat="data in dataset|limitTo:10" class="col-sm-4 col-md-3 col-xs-4 grid_product">
            <div id="product-{{data.Pid}}" class="hidden">
              {{data.Pid}}
            </div>
            <div class="padding">
              <div class="product_photo">
                <img class="img-responsive" ng-src="img/{{data.Pid}}_{{data.Catid}}_{{data.Name}}.png">
              </div>
              <div class="name">
                <a ng-href="/product?Pid={{data.Pid}}" data-ajax="false" data-link="/Product-ARROWHEAD-MILLS/ORGANIC-SPLIT-GREEN-PEAS/p/BP_426705">{{data.Name}}</a>
              </div>
              <div class="price">${{data.SellingPrice}}</div>
              <div class="add_cart">
                <button ng-click="addToCart(data)">add to cart</button>
              </div>
            </div>
          </div> -->
        </div>
      </div>


      <section class="content"></section>
      <footer class="footer"></footer>

    </body>
    </html>
