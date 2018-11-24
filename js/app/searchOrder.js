'use strict';


var myApp=angular.module('ordersearch', [
    'ngRoute',   
    'LocalStorageModule',
    'ui.router'
]);

myApp.controller('orderlisting',['$scope','$http', function($scope,$http){

  $scope.orderList=function() {


  	var data_input = {
		order_no:$scope.order_no,
		order_type:$scope.order_type,
		cust_id:$scope.cust_id
};

var config = {
 params: data_input,
 headers : {'Accept' : 'application/json'}
};

    $http.get('srchorder.php',config).then(function(response){
      if(response.status==200){
      	
          $scope.data=response.data;   
        
      }
  })
}


$scope.foo = function ($rowvalue,$id) {
  
  window.opener.$("#hdn_orderid").attr('value', $id);
 // window.opener.$("#hdn_custid").val($rowvalue.child_name);
  window.opener.$("#ord_id").val($rowvalue.order_id);
  window.opener.$("#ord_amnt").val($rowvalue.order_amount);
  //window.opener.$("#hdn_bal_points").val($rowvalue.current_points);
 // window.opener.$("#hdn_activeplan_id").val($rowvalue.plan_id);


  window.close();
    //$event.stopPropagation();
};

}]);