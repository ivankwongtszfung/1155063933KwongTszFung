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

  function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
  }
  var searchObject =getParameterByName('Pid');
  console.log(searchObject);
  var data = {
    "Pid" : searchObject
  }
  $http.post("http://13.59.52.101/api/getProductByPid",data).then(function success(response){
    console.log(response['data']);
    $scope.dataset=response["data"]["content"][0];

  },function error(response){
    $scope.dataset="";
    $('.alert').removeClass('hidden');
  });

  $http.post("http://13.59.52.101/api/categoryList").then(function success(response){
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
    $("form").submit(function(){
        function getParameterByName(name, url) {
          if (!url) url = window.location.href;
          name = name.replace(/[\[\]]/g, "\\$&");
          var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
              results = regex.exec(url);
          if (!results) return null;
          if (!results[2]) return '';
          return decodeURIComponent(results[2].replace(/\+/g, " "));
        }
        var searchObject =getParameterByName('Pid');
        console.log(searchObject);
        var data = {
          "Pid" : searchObject
        }
        var data = $('form').serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});
        data["Pid"]=searchObject
        $http.post("http://13.59.52.101/api/createProduct",data).then(function success(response){
          console.log(response['data']);
          alert("create success");
          location.href="http://13.59.52.101/adminPanel/";
        },function error(response){
          $scope.dataset="";
          $('.alert').removeClass('hidden');
        });


    });



  });

}]);
