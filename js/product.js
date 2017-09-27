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
  // $http.get("data/data.json").then(function success(response){
  //   $scope.dataset=[response["data"][searchObject]];
  //   var category="category>category"+response["data"][searchObject]["Catid"]+">"+response["data"][searchObject]["Name"];
  //   $(".user_category").text(category)
  //   console.log(category);
  // },function error(response){
  //   $scope.dataset="";
  //   $('.alert').removeClass('hidden');
  // });

   // $http.get("data/data.json").then(function success(response){
  //   console.log(response['data']);
  //   $scope.dataset=response['data'];
  // },function error(response){
  //   $scope.dataset="";
  //   $('.alert').removeClass('hidden');
  // });
  var response=[
  {
    "Pid": 1,
    "Catid": 4,
    "Sku": "C8517-8",
    "Name": "noodles",
    "Description": "Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie.",
    "Cost": 11,
    "MarkedPrice": 81,
    "SellingPrice": 8,
    "Barcode": "eu sem. Pellentesque ut ipsum ac mi eleifend egestas.",
    "Quanity": 4
  },
  {
    "Pid": 2,
    "Catid": 5,
    "Sku": "E0734-9",
    "Name": "seafood",
    "Description": "Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum",
    "Cost": 38,
    "MarkedPrice": 98,
    "SellingPrice": 75,
    "Barcode": "Morbi neque tellus, imperdiet non, vestibulum nec, euismod in,",
    "Quanity": 5
  },
  {
    "Pid": 3,
    "Catid": 1,
    "Sku": "02A16-9",
    "Name": "cereals",
    "Description": "varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi",
    "Cost": 32,
    "MarkedPrice": 100,
    "SellingPrice": 22,
    "Barcode": "Duis a mi fringilla mi lacinia mattis. Integer eu",
    "Quanity": 3
  },
  {
    "Pid": 4,
    "Catid": 1,
    "Sku": "31F18-E",
    "Name": "sandwiches",
    "Description": "mollis. Integer tincidunt aliquam arcu. Aliquam ultrices iaculis odio. Nam interdum enim non nisi. Aenean eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non,",
    "Cost": 36,
    "MarkedPrice": 91,
    "SellingPrice": 16,
    "Barcode": "risus. In mi pede, nonummy ut, molestie in, tempus",
    "Quanity": 5
  },
  {
    "Pid": 5,
    "Catid": 3,
    "Sku": "1D330-3",
    "Name": "salads",
    "Description": "dui. Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non",
    "Cost": 3,
    "MarkedPrice": 98,
    "SellingPrice": 43,
    "Barcode": "gravida molestie arcu. Sed eu nibh vulputate mauris sagittis",
    "Quanity": 5
  },
  {
    "Pid": 6,
    "Catid": 5,
    "Sku": "357CE-7",
    "Name": "soups",
    "Description": "orci lacus vestibulum lorem, sit amet",
    "Cost": 10,
    "MarkedPrice": 84,
    "SellingPrice": 22,
    "Barcode": "Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet",
    "Quanity": 4
  },
  {
    "Pid": 7,
    "Catid": 6,
    "Sku": "9394D-3",
    "Name": "noodles",
    "Description": "magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus",
    "Cost": 9,
    "MarkedPrice": 89,
    "SellingPrice": 27,
    "Barcode": "sit amet luctus vulputate, nisi sem semper erat, in",
    "Quanity": 6
  },
  {
    "Pid": 8,
    "Catid": 5,
    "Sku": "6D6D9-2",
    "Name": "cereals",
    "Description": "suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo sit amet nulla. Donec non justo. Proin non massa non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis",
    "Cost": 25,
    "MarkedPrice": 84,
    "SellingPrice": 53,
    "Barcode": "dictum sapien. Aenean massa. Integer vitae nibh. Donec est",
    "Quanity": 5
  },
  {
    "Pid": 9,
    "Catid": 4,
    "Sku": "86C16-E",
    "Name": "desserts",
    "Description": "euismod et, commodo at, libero. Morbi accumsan",
    "Cost": 7,
    "MarkedPrice": 96,
    "SellingPrice": 78,
    "Barcode": "magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum",
    "Quanity": 4
  },
  {
    "Pid": 10,
    "Catid": 1,
    "Sku": "03939-2",
    "Name": "desserts",
    "Description": "Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu",
    "Cost": 44,
    "MarkedPrice": 90,
    "SellingPrice": 61,
    "Barcode": "Donec egestas. Aliquam nec enim. Nunc ut erat. Sed",
    "Quanity": 6
  },
  {
    "Pid": 11,
    "Catid": 3,
    "Sku": "CFA30-4",
    "Name": "desserts",
    "Description": "luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus. Duis a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc. In at pede. Cras vulputate velit",
    "Cost": 48,
    "MarkedPrice": 96,
    "SellingPrice": 18,
    "Barcode": "auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus. In",
    "Quanity": 3
  },
  {
    "Pid": 12,
    "Catid": 2,
    "Sku": "9AF7F-B",
    "Name": "pasta",
    "Description": "blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci lacus vestibulum lorem, sit amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut",
    "Cost": 50,
    "MarkedPrice": 90,
    "SellingPrice": 12,
    "Barcode": "sed leo. Cras vehicula aliquet libero. Integer in magna.",
    "Quanity": 3
  },
  {
    "Pid": 13,
    "Catid": 1,
    "Sku": "E5712-5",
    "Name": "soups",
    "Description": "pellentesque. Sed dictum.",
    "Cost": 28,
    "MarkedPrice": 93,
    "SellingPrice": 80,
    "Barcode": "nulla at sem molestie sodales. Mauris blandit enim consequat",
    "Quanity": 4
  },
  {
    "Pid": 14,
    "Catid": 5,
    "Sku": "C875A-F",
    "Name": "noodles",
    "Description": "fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in,",
    "Cost": 20,
    "MarkedPrice": 98,
    "SellingPrice": 59,
    "Barcode": "rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales",
    "Quanity": 3
  },
  {
    "Pid": 15,
    "Catid": 5,
    "Sku": "FAD1D-3",
    "Name": "salads",
    "Description": "vestibulum lorem, sit amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium",
    "Cost": 36,
    "MarkedPrice": 90,
    "SellingPrice": 80,
    "Barcode": "penatibus et magnis dis parturient montes, nascetur ridiculus mus.",
    "Quanity": 6
  },
  {
    "Pid": 16,
    "Catid": 1,
    "Sku": "903CD-D",
    "Name": "pasta",
    "Description": "scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce aliquet magna a neque. Nullam ut nisi a odio semper cursus. Integer mollis. Integer tincidunt aliquam arcu. Aliquam ultrices iaculis odio. Nam interdum enim non nisi. Aenean eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet",
    "Cost": 2,
    "MarkedPrice": 91,
    "SellingPrice": 46,
    "Barcode": "justo sit amet nulla. Donec non justo. Proin non",
    "Quanity": 6
  },
  {
    "Pid": 17,
    "Catid": 5,
    "Sku": "698BC-D",
    "Name": "seafood",
    "Description": "cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet",
    "Cost": 41,
    "MarkedPrice": 84,
    "SellingPrice": 24,
    "Barcode": "sem molestie sodales. Mauris blandit enim consequat purus. Maecenas",
    "Quanity": 6
  },
  {
    "Pid": 18,
    "Catid": 2,
    "Sku": "1A237-6",
    "Name": "pies",
    "Description": "Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus",
    "Cost": 34,
    "MarkedPrice": 89,
    "SellingPrice": 66,
    "Barcode": "felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam",
    "Quanity": 4
  },
  {
    "Pid": 19,
    "Catid": 6,
    "Sku": "9785B-D",
    "Name": "pies",
    "Description": "rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed",
    "Cost": 45,
    "MarkedPrice": 82,
    "SellingPrice": 70,
    "Barcode": "posuere, enim nisl elementum purus, accumsan interdum libero dui",
    "Quanity": 5
  },
  {
    "Pid": 20,
    "Catid": 5,
    "Sku": "1A4F1-D",
    "Name": "desserts",
    "Description": "ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus",
    "Cost": 45,
    "MarkedPrice": 95,
    "SellingPrice": 12,
    "Barcode": "Duis mi enim, condimentum eget, volutpat ornare, facilisis eget,",
    "Quanity": 5
  }
 ];
 console.log(response);
 $scope.dataset=[response[parseInt(searchObject)]];

  var category="category>category"+response[searchObject]["Catid"]+">"+response[searchObject]["Name"];
  $(".user_category").text(category);
  console.log(category);

  // $http.get("data/category.json").then(function success(response){
  //   console.log(response['data']);
  //   $scope.category=response['data'];
  // },function error(response){
  //   $scope.category="";
  //   $('.alert').removeClass('hidden');
  // });
  $scope.category=[
  {
    "Catid":1,
    "Catname": "category1"
  },
  {
    "Catid":2,
    "Catname":"category2"
  },
  {
    "Catid":3,
    "Catname":"category3"
  },
  {
    "Catid":4,
    "Catname":"category4"
  },
  {
    "Catid":5,
    "Catname":"category5"
  },
  {
    "Catid":6,
    "Catname":"category6"
  }

];
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

	$("div.category").on("click",".category_list",function(){
		var userCategory=">";
		var categoryTag=$(this).find("span.solo").contents();
		var id=$(this).find("span.id").contents();
		id= id.text();
		userCategory+=categoryTag.text();
		$(".user_category").text(category+userCategory);
		key=parseInt(id);
	});



  });

}]);
