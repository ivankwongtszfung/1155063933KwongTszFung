var key=0;
var shopItem=[];
$( document ).ready(function(){
 //    var category="category";
	// $(".user_category").text(category);
	// $("div.category").on("click",".category_list",function(){
	// 	var userCategory=">";
	// 	var categoryTag=$(this).find("span.solo").contents();
	// 	var id=$(this).find("span.id").contents();
	// 	id= id.text();
	// 	userCategory+=categoryTag.text();
	// 	$(".user_category").text(category+userCategory);
	// 	key=parseInt(id);
	// });
});


var app = angular.module("myApp",[], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });


app.controller('ctrl',['$scope','$http','$location',function($scope,$http,$location){
  $scope.key=key;
  $scope.total=0.0;
  $scope.shopCartModel = {
    data : []
  };
  $web =  $location.search();

  $http.post("api/productList").then(function success(response){
    //load data in scope dataset to list product

    $scope.dataset=response['data']['content'];
    //check session storage, load session data
    if(typeof(Storage) !== "undefined") {
      storedNames = JSON.parse(sessionStorage.getItem("shopItem"));
      console.log(storedNames);
      var data;
     //this is a parse function to releated array key to pid
     //since the listed products are not having a sequence of pid
      var parse = [];
      angular.forEach(response['data']['content'], function(value, key) {
      	this.push(value.Pid);
      }, parse);
      console.log(parse)
 	//load session data into shopcart
      $.each(storedNames, function( index, value ) {
        if(value){
          data=response['data']['content'][parse.indexOf(index)];
          data['currQuality']=value;
          $scope.shopCartModel.data = $scope.shopCartModel.data.concat(data);

        }
        //

      }); 
      
      //
    } else {
        console.log("no session sorry");
    }
  },function error(response){
    $scope.dataset="";
    $('.alert').removeClass('hidden');
  });

  $http.post("api/categoryList").then(function success(response){
    $scope.category=response['data']['content'];
  },function error(response){
    $scope.category="";
    $('.alert').removeClass('hidden');
  });
  $scope.search=function(){
  	return 1;
  }



  $scope.change = function() {
    console.log(this)
    if(typeof(Storage) !== "undefined") {
        storedNames = JSON.parse(sessionStorage.getItem("shopItem"));
        //checking the product is saved or not
        if (this.data.currQuality>0) {
            console.log('session is here')
            storedNames[this.data.Pid] = this.data.currQuality;
        }
        else{
            storedNames[this.data.Pid]=null;
            console.log(this.data.Pid)
            console.log(storedNames);
            $scope.shopCartModel.data.splice(this.$index, 1);

        }
        
        sessionStorage.setItem("shopItem", JSON.stringify(storedNames));
    } else {
        console.log("no session sorry");
    }


  };


  $scope.addToCart=function(data){
    var formattedData;
    console.log(data.Pid)
    if(typeof(Storage) !== "undefined") {
        storedNames = JSON.parse(sessionStorage.getItem("shopItem"));
        //array initialisation
        if(!storedNames){
          storedNames=[];
        }
        //checking the product is saved or not
        if (storedNames && storedNames[data.Pid]) {
            console.log('session is here')
            console.log(data)
            storedNames[data.Pid] += 1;
            data.currQuality=storedNames[data.Pid]
        } else {
            console.log('initialization')
            storedNames[data.Pid]=1;
            data.currQuality=1;          
            $scope.shopCartModel.data = $scope.shopCartModel.data.concat(data);
        }
        //updateCart(data.Pid);
        sessionStorage.setItem("shopItem", JSON.stringify(storedNames));
    } else {
        console.log("no session sorry");
    }
    
  	
  }

  $scope.getTotal=function(){
  	var total = 0;
    for(var i = 0; i < $scope.shopCartModel.data.length; i++){
      var product = $scope.shopCartModel.data[i];
      total += (product.SellingPrice * product.currQuality);
    }
    return total;
  }



  $(function(){
    var category="category";
    $(".user_category").text(category);
    $("div.category").on("click",".category_list",function(){
      var userCategory=">";
      var categoryTag=$(this).find("span.solo").contents();
      var id=$(this).find("span.id").contents();
      id= id.text();
      userCategory+=categoryTag.text();
      $(".user_category").text(category+userCategory);
      key=parseInt(id);
      var data = {
        "Catid":id
      }
      $http.post("api/getProductByCatid",data).then(function success(response){
        $scope.dataset=response['data']['content'];
      },function error(response){
        $scope.dataset="";
        $('.alert').removeClass('hidden');
      });
    });





  });

}]);
