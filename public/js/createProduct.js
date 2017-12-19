var key=0;
var shopItem=[];



var app = angular.module("myApp", ['ngMessages']);

app.config(function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });


app.controller('ctrl',['$scope','$http','$location',function($scope,$http,$location){
  $scope.key=key;
  $scope.total=0.0;
  $scope.shopCartModel = {
        data : []
      };



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
  $("form#target").submit(function(e) {
    console.log(this);
    if($scope.myForm.$invalid){
      alert('data is invalid');
    }  
    else{
       e.preventDefault();    
      var formData = new FormData(this);
      console.log(formData);
      $.ajax({
          url: "http://13.59.52.101/api/createProduct",
          type: 'POST',
          data: formData,
          success: function (data) {
              alert(data)
          },
          cache: false,
          contentType: false,
          processData: false
      });
    }
    
});
  // $scope.submitMyForm=function(){
  //       /* while compiling form , angular created this object*/
  //       var data=$scope.myData;
  //       data['image'] = $('input:file')[0].files[0];
  //       console.log(data);
  //       if($scope.myForm.$invalid){
  //         alert('data is invalid');
  //       }  
  //       else{
  //         $http.post("http://13.59.52.101/api/createProduct",data).then(function success(response){
  //           console.log(response['data']);
  //           alert("create success");
  //           location.href="http://13.59.52.101/adminPanel/";
  //         },function error(response){
  //           $scope.dataset="";
  //           $('.alert').removeClass('hidden');
  //         });   
  //       }
  //       /* post to server*/
   
   // }



}]);
