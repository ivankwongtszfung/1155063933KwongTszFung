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
  <script src="https://code.angularjs.org/1.5.0/angular-messages.min.js"></script>
  <script src="http://13.59.52.101/js/editProduct.js"></script>
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
         <a href="" data-scroll="" class=""><span class="id hidden"><%cat.Catid%></span><span class="fa fa-anchor solo"><%cat.Catname%></span></a>
       </li>
     </ul>
   </div>


   <div class="col-sm-9">
          <form id="target" name="myForm" ng-submit="submitMyForm()" novalidate>


            <div class="form-group"  >
              <label for="Name">Name:</label>
              <input type="Name" class="form-control" name="Name"  ng-model="myData.Name" ng-minlength="5" ng-maxlength="20" required >

              <div ng-messages="myForm.Name.$error" ng-show="myForm.Name.$touched" style="color:maroon" role="alert">
                <div ng-cloak class="stringRequired" ng-message="required">You did not enter a field</div>
                <div ng-cloak class="stringMinlength" ng-message="minlength">Your field is too short</div>
                <div ng-cloak class="stringMaxlength" ng-message="maxlength">Your field is too long</div>
              </div>
            </div>



            <div class="form-group">
              <label for="pwd">Description:</label>
              <input type="Name" class="form-control" name="Description" ng-model="myData.Description" required>
              <div ng-messages="myForm.Description.$error" ng-show="myForm.Description.$touched" style="color:maroon" role="alert">
                <ng-message when="required">...</ng-message>
                <div ng-cloak class="stringRequired" ng-message="required">You did not enter a field</div>
                <div ng-cloak class="stringMinlength" ng-message="minlength">Your field is too short</div>
                <div ng-cloak class="stringMaxlength" ng-message="maxlength">Your field is too long</div>
              </div>
            </div>


            <div class="form-group">
              <label for="pwd">Category:</label>
              <select class="form-control" name="Catid"  ng-model="myData.Catid" ng-options="cat.Catid as cat.Catname for cat in category"></select>
              <div ng-messages="myForm.Catid.$error" ng-show="myForm.Catid.$touched" style="color:maroon" role="alert">
                <div class="stringRequired" ng-message="required"></div>
              </div>
            </div>
<!--             <div class="form-group">
              <label for="image">Image:</label>
              <input type="file" class="form-control" name="image" required>
            </div> -->
            <div class="form-group">
              <label for="image">Sku:</label>
              <input type="Name" class="form-control" name="Sku" ng-model="myData.Sku" ng-minlength="7" ng-maxlength="7" required>
              <div ng-messages="myForm.Sku.$error" ng-show="myForm.Sku.$touched" style="color:maroon" role="alert">
                <div ng-cloak class="stringRequired" ng-message="required">You did not enter a field</div>
                <div ng-cloak class="skuLength" ng-message="minlength">sku should contain 7 characters only</div>
                <div ng-cloak class="skuLength" ng-message="maxlength">sku should contain 7 characters only</div>
              </div>
            </div>


            <div class="form-group">
              <label for="image">Cost:</label>
              <input type="number" min="0" max="100" class="form-control" name="Cost" ng-model="myData.Cost" step="any"  required>
              <div ng-messages="myForm.Cost.$error" ng-show="myForm.Cost.$touched" style="color:maroon" role="alert">
                <div ng-cloak class="stringRequired" ng-message="required">You did not enter a field</div>
                <div ng-cloak class="stringNumber" ng-message="number">Your field is not a number</div>
                <div ng-cloak class="stringMin" ng-message="min">Cost cannot be negative</div>
                <div ng-cloak class="stringMax" ng-message="max">Cost is too large</div>
              </div>
            </div>


            <div class="form-group">
              <label for="image">MarkedPrice:</label>
              <input type="number" min="0" max="100" class="form-control" name="MarkedPrice" ng-model="myData.MarkedPrice"  step="any" required>
              <div ng-messages="myForm.MarkedPrice.$error" ng-show="myForm.MarkedPrice.$touched" style="color:maroon" role="alert">
                <div ng-cloak class="stringRequired" ng-message="required">You did not enter a field</div>
                <div ng-cloak class="stringNumber" ng-message="number">Your field is not a number</div>
                <div ng-cloak class="stringMin" ng-message="min">MarkedPrice cannot be negative</div>
                <div ng-cloak class="stringMax" ng-message="max">MarkedPrice is too large</div>
              </div>
            </div>


            <div class="form-group">
              <label for="image">SellingPrice:</label>
              <input type="number" min="0" max="100" class="form-control" name="SellingPrice" ng-model="myData.SellingPrice" step="any"  required>
              <div ng-messages="myForm.SellingPrice.$error" ng-show="myForm.SellingPrice.$touched" style="color:maroon" role="alert">
                <div ng-cloak class="stringRequired" ng-message="required">You did not enter a field</div>
                <div ng-cloak class="stringNumber" ng-message="number">Your field is not a number</div>
                <div ng-cloak class="stringMin" ng-message="min">MarkedPrice cannot be negative</div>
                <div ng-cloak class="stringMax" ng-message="max">MarkedPrice is too large</div>
              </div>
            </div>


             <div class="form-group">
              <label for="image">Barcode:</label>
              <input ng-minlength="10" ng-maxlength="70" type="Name" class="form-control" name="Barcode" ng-model="myData.Barcode" required>
              <div ng-messages="myForm.Barcode.$error" ng-show="myForm.Barcode.$touched" style="color:maroon" role="alert">
                
                <div ng-cloak class="stringRequired" ng-message="required">You did not enter a field</div>
                <div ng-cloak class="skuLength" ng-message="minlength">sku should contain more than 10 characters only</div>
                <div ng-cloak class="skuLength" ng-message="maxlength">Barcode should not be exceed 70 characters</div>
              </div>
            </div>


             <div class="form-group">
              <label for="image">Quanity:</label>
              <input type="number" min="1" max="10" class="form-control" name="Quanity" ng-model="myData.Quanity" step='1' required>
              <div ng-messages="myForm.Quanity.$error" ng-show="myForm.Quanity.$error" style="color:maroon" role="alert">
                <div ng-cloak ng-message="required">You did not enter a field</div>
                <div ng-cloak ng-message="number">Your field is not a number</div>
                <div ng-cloak ng-message="min">Quanity should be larger than 0</div>
                <div ng-cloak ng-message="max">Quanity should not more than 10</div>
                <div ng-cloak ng-message="step">Quanity should be integer</div>
              </div>
            </div>
            <button type="submit" class="btn btn-default" id="submit" ng-disabled="myForm.$invalid">Submit</button>
          </form>

          
        </div>
      </div>


      <section class="content"></section>
      <footer class="footer"></footer>

    </body>
    </html>
