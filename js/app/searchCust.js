'use strict';


var myApp=angular.module('custsearch', [
    'ngRoute',   
    'LocalStorageModule',
    'ui.router'
]);

myApp.controller('customerlisting',['$scope','$http', function($scope,$http){

  $scope.custList=function() {


  	var data_input = {
 name:$scope.cust_name,
  email:$scope.email_id,
   cname:$scope.cname
};

var config = {
 params: data_input,
 headers : {'Accept' : 'application/json'}
};

    $http.get('srchcust.php',config).then(function(response){
      if(response.status==200){
      	
          $scope.data=response.data;   
        
      }
  })
}


$scope.foo = function ($rowvalue,$id) {
  
  window.opener.$("#hdn_custid").attr('value', $id);
  window.opener.$("#cust_name").val($rowvalue.child_name);
  window.opener.$("#sel_cust").text($rowvalue.child_name);
  window.opener.$("#email_id").val($rowvalue.email_id);
  window.opener.$("#bal_points").val($rowvalue.current_points);
  window.opener.$("#hdn_bal_points").val($rowvalue.current_points);
  window.opener.$("#hdn_activeplan_id").val($rowvalue.plan_id);


  window.close();
    //$event.stopPropagation();
};

}]);