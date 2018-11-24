'use strict';


var myApp=angular.module('toysearch', [
    'ngRoute',   
    'LocalStorageModule',
    'ui.bootstrap'
]);

myApp.run(function($rootScope) {

   $rootScope.toylist =  [];
   $rootScope.toyids =  '';
   $rootScope.rent_amount =  '0';
   $rootScope.selling_amount =  '0';
   // $scope.searchResult = {};

  //   $rootScope.toylist =  [{ 
  //   'toy_id' : '1',
  //   'toy_name':'sad', 
  //   'toy_code': 'a344sd', 
  //   'points':'asd432asaddsda'
  // }];
});


myApp.controller('toylisting',['$scope','$uibModal','$http','$rootScope', function($scope,$uibModal,$http,$rootScope){


 $scope.checkItem = "";
 $scope.txtquery = "";

    // $scope.show = function() {
   /*  $scope.show = function () {
    $uibModal.open({
      animation: true,
      templateUrl: 'search_toy.html',
      controller: function ($scope, $uibModalInstance) {
        $scope.ok = function () {
          $uibModalInstance.close();
        };
      
        $scope.cancel = function () {
          $uibModalInstance.dismiss('cancel');
        };
      }
    })
  };*/


  $scope.show = function () {

    var modalInstance = $uibModal.open({
      templateUrl: 'search_toy_update.html',
    //  controller: 'ModalInstanceCtrl',
      size: 'lg',
      resolve: {
        items: function () {
          return $scope.items;
        }
      }
    });

    /*modalInstance.result.then(function (selectedItem) {
      $scope.selected = selectedItem;
    }, function () {
      //$log.info('Modal dismissed at: ' + new Date());
    });*/
  };


$scope.test = function () {

console.log('a1');
//            $modalInstance.close();
        };

$scope.ok = function () {

console.log('a1');
//            $modalInstance.close();
        };

$scope.cancel = function () {
          console.log('a');
  //          $modalInstance.dismiss('cancel');
        };


// Fetch data
   $scope.gettoyslist = function(){
                
      var searchText_len = $scope.searchText.trim().length;

      // Check search text length
      if(searchText_len > 0){
         $http({
           method: 'post',
           url: 'gettoys_code.php',
           data: {searchText:$scope.searchText}
         }).then(function successCallback(response) {
           $scope.searchResult = response.data;
         });
      }else{
         $scope.searchResult = {};
      }
                
   }

   // Set value to search box
   $scope.setValue = function(index,$event){
      $scope.searchText = $scope.searchResult[index].name;
      $scope.searchResult = {};
      $event.stopPropagation();
   }

   $scope.searchboxClicked = function($event){
      $event.stopPropagation();
   }

   $scope.containerClicked = function(){
      $scope.searchResult = {};
   }
 

$scope.toyList=function() {
  	var data_input = {
/* toy_name:$scope.toy_name,
  toy_code:$scope.toy_code,
   toy_category:$scope.toy_category,*/
   query:$scope.txtquery 
};



var config = {
 params: data_input,
 headers : {'Accept' : 'application/json'}
};
console.log(config);

    $http.get('srchtoy.php',config).then(function(response){
      if(response.status==200){
          $scope.data=response.data;   
           $scope.$apply();
      }
  })
}


$scope.select = function ($rowvalue,$id) {
//console.log('asdsad');
console.log($rootScope);
console.log($rowvalue.toy_name);
console.log($rootScope.toylist.indexOf($rowvalue.toy_name));
console.log("answer");
console.log($rootScope.toylist.findIndex(x => x.toy_name === $rowvalue.toy_name))

// if ($rootScope.toylist.indexOf($rowvalue.toy_name) == -1) 
if($rootScope.toylist.findIndex(x => x.toy_name === $rowvalue.toy_name)==-1)
{
var toy =  { 
     'toy_id' : $scope.toylist.length,
    'toy_name':$rowvalue.toy_name, 
    'toy_code': $rowvalue.toy_code, 
    'points':$rowvalue.points ,
    'rent_amount':$rowvalue.rent_amount ,
    'selling_amount':$rowvalue.selling_amount 
    
  };
$rootScope.toylist.push(toy);
console.log(toy);
 $rootScope.toyids  = $rootScope.toyids + $id + ',';

 $rootScope.rent_amount = parseFloat( parseFloat($rootScope.rent_amount) +parseFloat( $rowvalue.rent_amount ));
 $rootScope.selling_amount =parseFloat (parseFloat($rootScope.selling_amount )+parseFloat( $rowvalue.selling_amount) );
 
}
else
{
alert('Toy already added');
}
//$scope.getrent_amount();
  /*window.opener.$("#hdn_toyid").attr('value', $id);
  window.opener.$("#toy_name").val($rowvalue.toy_name);
  window.opener.$("#toy_code").val($rowvalue.toy_code);
  window.opener.$("#toy_points").val($rowvalue.points);

  window.close();
*/
};



$scope.clear = function()
{
  $scope.txtquery = "";
};


$scope.addquery = function () { 
  if ($scope.txtquery=="")
      {
        if ( $scope.searchtype == "points_btw")
        {
          $scope.txtquery = $scope.txtquery + " " + $scope.searchtype +  " between "+   $scope.search_value ; 
        }
        else
        {
          $scope.txtquery = $scope.txtquery + " " + $scope.searchtype +" like '%"+   $scope.search_value + "%'";  
        }
        
      }
      else
      {
        if ( $scope.searchtype =="points_btw")
        {
          $scope.txtquery = $scope.txtquery + " and " + $scope.searchtype+  " between  "+   $scope.search_value; 
        }
        else
        {
          $scope.txtquery = $scope.txtquery + " and " +$scope.searchtype+ " like "+   $scope.search_value +"%'"; 
        }
  }
  $scope.search_value ='';
};

}]);

 