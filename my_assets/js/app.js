/*
 * @Author: Vinod Selvin
 * @Desc: Constants for developement and production
 */

var HOSTNAME = window.location.hostname;
var PROTOCOL = window.location.protocol;

var app = angular.module("phpCrud", ["ui.bootstrap","ngRoute"]);

//var app = angular.module('phpCrud', ['ngAria', 'ngMaterial', 'miniapp', 'ngAnimate', 'ui.bootstrap', 'ngSanitize']);
app.controller("tableData", function ($scope, $http, $location) {

    $scope.page = 1;

    $scope.edit = function (row, primary_key, data_type) {
            
        console.log(data_type);
        delete row.$$hashKey;

        var data = {'table_name': angular.element('#table_name').val(),
            'row': row,
            'primary_key': primary_key,
            'data_type': data_type};

        $http({
            url: BASE_URL + "/crud_controller/edit",
            method: "POST",
            data: $.param(data),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
        .then(function successCallback(response)
        {
            console.log(response);
        }
        , function errorCallback(response)
        {

        });
        
    };
    
    /*
    * @Author: Pratik Pathak
    * @Desc: Added delete feature for each row
    */
    
    $scope.delete = function () {
        
        row = $scope.selected_row;
        pk = $scope.primary_key;
        delete row.$$hashKey;
        
        var data = {
                            'table_name': angular.element('#table_name').val(),
                            'row': row,
                            'primary_key': $scope.primary_key
                         };

        $http({
            url: BASE_URL + "/crud_controller/delete",
            method: "POST",
            data: $.param(data),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
        .then(function successCallback(response)
        {
            location.reload();
        }
        , function errorCallback(response)
        {

        });
        
    };
    
    /*
    * @Author: Pratik Pathak
    * @Desc: saves selected row
    */
   
    $scope.setSelected = function (row) {
            
            $scope.selected_row = row;
    };

    $scope.pageChanged = function () {
//	  var startPos = ($scope.page - 1) * 10;
//	  console.log(filteredArray.length);
    };

});
