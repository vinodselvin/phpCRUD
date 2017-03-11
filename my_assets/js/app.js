/*
 * @Author: Vinod Selvin
 * @Desc: Constants for developement and production
 */
var HOSTNAME = window.location.hostname;
var PROTOCOL = window.location.protocol;
var BASE_URL = HOSTNAME;

if(HOSTNAME == 'localhost' || HOSTNAME == '127.0.0.1')
{
    BASE_URL = PROTOCOL + "//" + HOSTNAME + "/phpCrud/";
}

var app = angular.module("phpCrud",["ui.bootstrap"]);

//var app = angular.module('phpCrud', ['ngAria', 'ngMaterial', 'miniapp', 'ngAnimate', 'ui.bootstrap', 'ngSanitize']);
app.controller("tableData", function($scope, $http) {

    $scope.page = 1;
    
    $scope.edit = function(row, primary_key){

    delete row.$$hashKey;

    var arr = $.map(row, function(value, index) {
        return [value];
    });

    var data = {'table_name': angular.element('#table_name').val(),
                'row': arr,
                'primary_key': primary_key};

    $http({
            url: BASE_URL + "crud_controller/edit",
            method: "POST",
            data: $.param(data),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
        .then(function successCallback(response)
        {
          console.log(response);
        }
        ,function errorCallback(response)
        {

        });
    };

    $scope.delete = function(){

      $http({
              url: BASE_URL + "crud_controller/delete",
              method: "POST",
              data: $.param(data),
              headers: {'Content-Type': 'application/x-www-form-urlencoded'}
          })
          .then(function successCallback(response)
          {
  //            console.log(response.data);
          }
          ,function errorCallback(response)
          {

          });
    }

    $scope.pageChanged = function() {
//	  var startPos = ($scope.page - 1) * 10;
//	  console.log(filteredArray.length);
	};
        
});
