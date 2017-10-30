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


var app = angular.module("myApp",[]);


app.controller('ctrl',['$scope','$http','$location',function($scope,$http,$location){
  $scope.key=key;
  $scope.total=0.0;
  $scope.shopCartModel = {
    data : []
  };
  $web =  $location.search();
  console.log($web);
  $http.post("api/productList").then(function success(response){
    console.log(response['data']);
    $scope.dataset=response['data']['content'];
  },function error(response){
    $scope.dataset="";
    $('.alert').removeClass('hidden');
  });

  $http.post("api/categoryList").then(function success(response){
    console.log(response['data']);
    $scope.category=response['data']['content'];
  },function error(response){
    $scope.category="";
    $('.alert').removeClass('hidden');
  });
  $scope.search=function(){
  	return 1;
  }
  $scope.addToCart=function(data){
  	if(shopItem[data.Pid] != null){
  		shopItem[data.Pid]+=1;
  	}
  	else{
  		shopItem[data.Pid]=1;
  		$scope.shopCartModel.data = $scope.shopCartModel.data.concat(data);
  	}
  	$scope.total+=data.SellingPrice;
  	data.currQuality=shopItem[data.Pid];
  	
  	
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
      console.log(id);
      var data = {
        "Catid":id
      }
      $http.post("api/getProductByCatid",data).then(function success(response){
        console.log(response['data']);
        $scope.dataset=response['data']['content'];
      },function error(response){
        $scope.dataset="";
        $('.alert').removeClass('hidden');
      });
    });





  });

}]);
