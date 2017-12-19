<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Index page</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/styles.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <script src="js/adminPanel.js"></script>
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
                    <div class="shopCartHeader right">(Total:$<% getTotal() %>.00)</div>

                  </div>
                  <div ng-repeat="data in shopCartModel.data track by $index">
                    <div class="shopCartElement noMargin row">
                      <div class="shopCartElement_name col-md-6"><%data.Name%></div>
                      <div class="shopCartElement_quatity col-md-3">
                        <input type="text" name="currQuality" ng-model="data.currQuality">
                      </div>
                      <div class="shopCartElement_price col-md-3">@<%data.SellingPrice%></div>
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
    <div class=row>
    <span class="user_category">this is a information row</span>
      <a type="button" class="btn btn-success pull-right" href="adminPanel/createProduct">create product</a>
    </div>

  </div>

  <div class="container">
    <div class="col-sm-3 category">
      <ul class="sidebar-nav nav navbar-default">

        <li class="sidebar-brand active">
          <a  class="home"><span class="fa fa-home solo">Home</span></a>
        </li>
        <li ng-repeat="cat in category" class="category_list">
         <a href="" data-scroll="" class=""><span class="id hidden"><%cat.Catid%></span><span class="fa fa-anchor solo"><%cat.Catname%></span></a>
       </li>
     </ul>
   </div>


   <div class="col-sm-9">

    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Catid</th>
          <th>Sku</th>
          <th>Name</th>
          <th>Description</th>
          <th>SellingPrice</th>
          <th>Quanity</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="data in dataset|limitTo:20">
          <th scope="row"><%data.Pid%></th>
          <td><%data.Catid%></td>
          <td><%data.Name%></td>
          <td><%data.Sku%></td>
          <td><%data.Description|limitTo: 50%></td>
          <td><%data.SellingPrice%></td>
          <td><%data.Quanity%></td>
          <td>
            <a class="glyphicon glyphicon-edit edit" ng-href="/adminPanel/editProduct?Pid=<%data.Pid%>"></a>
            <i ></i>
            <i id="<%data.Pid%>" class="glyphicon glyphicon-remove delete" ></i>
          </td>
        </tr>
      </tbody>
    </table>




    <div class="alert alert-danger hidden">
      <strong>Error!</strong> data can not load successfully.
    </div>

  </div>
</div>


<section class="content"></section>
<footer class="footer"></footer>

</body>
</html>
