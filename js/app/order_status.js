'use strict';


var myApp=angular.module('order_status', [
    'ngRoute',   
    'LocalStorageModule',
    'ui.bootstrap'
]);

myApp.run(function($rootScope) {
  $rootScope.days = ""
  $rootScope.rdays   = "" 
  $rootScope.rorderid = ""
  $rootScope.rcustomerid = ""
  $rootScope.deductamount = false
});


myApp.controller('orderlisting',['$scope','$uibModal','$http','$rootScope', function($scope,$uibModal,$http,$rootScope){

 $scope.latedays = "";
 $scope.orderid = "";

 $scope.checkdelay = function () {
  // console.log("yes called");
      if(  $rootScope.rdays>=0) 
      {
            $rootScope.deductamount = true;
            return true;
      }
      else
      {
            $rootScope.deductamount = false;
            return false;
      }

    };

 
  $scope.open_orderStatus = function (orderid,customer_id,latedays) {
    console.log(orderid)
    console.log(latedays)
    console.log(customer_id)
  //$rootScope.days   = days;  
  $rootScope.rdays   = latedays;  
  $rootScope.rorderid = orderid ;
  $rootScope.rcustomerid = customer_id;

 var ddlid = "#ddltask"+orderid;
      var selectedtask = $(ddlid).val();
     // alert(selectedtask);
      console.log(selectedtask);
      var selectpage  = 'order_status.html'


  //call function to get totalpoints starts

  var data_input = {
              days:$rootScope.rdays ,
              orderid:$rootScope.rorderid 
            };

var config = {
            params: data_input,
            headers : {'Accept' : 'application/json'}
        };

if (selectedtask=="partial" || selectedtask=="lost")
{
  $http.get('getorder_pointsdeduct_partial.php',config).then(function(response){
      if(response.status==200){
        console.log(response);
         $('#points_deducted').val(response.data.points);
          $rootScope.toylist   = response.data.toylist;  
      }
      else
      {
         $('#points_deducted').val('0');
       // console.log("inside -1 ");
      }
    })
}
else
{
    $http.get('getorder_pointsdeduct.php',config).then(function(response){
      if(response.status==200){
        console.log(response);
         $('#points_deducted').val(response.data);
      }
      else
      {
         $('#points_deducted').val('0');
       // console.log("inside -1 ");
      }
    })
  }

//call function to get totalpoints ends

  if(  $rootScope.rdays>=0) 
          $rootScope.deductamount = true;


     
      
        if (selectedtask=="close")
        {
          selectpage ='order_status.html';
        }
        else if (selectedtask=="lost")
        {
          selectpage ='toy_damaged.html';
        }
         else if (selectedtask=="partial")
        {
          selectpage ='order_partial.html';
        }
        else if (selectedtask=="cancel" )
        {
           selectpage ='order_cancel.html';
        } 
        

   $uibModal.open({
      templateUrl: selectpage,
      size: 'lg',
      backdrop: 'static',
      resolve: {
        items: function () {
          return $scope.items;
        }
      }
     }).result.then(function(){}, function(res){});
  };


$scope.save = function()
{
//   console.log($rootScope);
// console.log($rootScope.rdays);
// console.log($rootScope.rorderid);
// console.log($rootScope.rcustomerid);
// console.log($rootScope.rcustomerid);
// console.log($('#txt_chargeAmount').val());
// console.log($('#points_deducted').val());
// console.log($rootScope.deductamount);

//$rootScope.deductamount = false;

var amt = $('#txt_chargeAmount').val();
var pointstobededucted = $('#points_deducted').val();

var retVal = false;

if($rootScope.rdays>0 && ($rootScope.deductamount == false))
{
  retVal = confirm("Are you Sure, you don't wanna charge for Extra Days?");
}
else
{
  retVal = true; 
}

if(retVal==true)
{

  var data_input = {
              latedays:$rootScope.rdays ,
              orderid:$rootScope.rorderid ,
              customer_id:$rootScope.rcustomerid ,
              deductamount:$rootScope.deductamount ,
              defectamount:amt,
              pointstobededucted:pointstobededucted
            };

var config = {
            params: data_input,
            headers : {'Accept' : 'application/json'}
        };

    $http.get('update_order_status.php',config).then(function(response){
      if(response.status==200){
        console.log("inside");
          $scope.data=response.data;   
          // $scope.$apply();
           alert("Order Closed Successfully");
           window.location.reload();
      }
      else
      {
        console.log("inside -1 ");
        alert("Error Occured While Closing Order!!Try Again Later");
        window.location.reload();
      }
    })
  }
  else
  {
    window.location.reload();
  }
}


$scope.cancel_order = function()
{
  var data_input = {
              orderid:$rootScope.rorderid ,
              customer_id:$rootScope.rcustomerid
            };

  var config = {
            params: data_input,
            headers : {'Accept' : 'application/json'}
        };

    $http.get('cancel_order.php',config).then(function(response){
      if(response.status==200){
          $scope.data=response.data;   
           alert("Order Cancelled Successfully");
           window.location.reload();
      }
      else
      {
        alert("Error Occured While Cancelling Order!!Try Again Later");
        window.location.reload();
      }
    })
  }

$scope.partial_save = function()
{
//   console.log($rootScope);
// console.log($rootScope.rdays);
// console.log($rootScope.rorderid);
// console.log($rootScope.rcustomerid);
// console.log($rootScope.rcustomerid);
// console.log($('#txt_chargeAmount').val());
// console.log($('#points_deducted').val());
// console.log($rootScope.deductamount);

//$rootScope.deductamount = false;
var toylist_comments = $rootScope.toylist ;
  var data_input = {
              orderid:$rootScope.rorderid ,
              toy_list:JSON.stringify(toylist_comments)
            };

var config = {
            params: data_input,
            headers : {'Accept' : 'application/json'}
        };

    $http.get('order_partial_script.php',config).then(function(response){
      if(response.status==200){
           alert("Order Closed Successfully");
           window.location.reload();
      }
      else
      {
        alert("Error Occured While Closing Order!!Try Again Later");
        window.location.reload();
      }
    })
}




$scope.cancel = function()
{

  //$uibModal.dismiss('cancel');
  //console.log($uibModal);
  //alert("cancel");
  /*$('#childcontent').hide();
  $('#childheader').hide();
  $('modal-dialog modal-lg').hide();
  $('.modal-backdrop fade ng-scope in').hide();
  $('.modal-backdrop').hide();*/
  window.location.reload();

  //$uibModal.dismiss('cancel');
  //$scope.modalInstance.close();
};

$scope.clear = function()
{
  $scope.txtquery = "";
};

}]);