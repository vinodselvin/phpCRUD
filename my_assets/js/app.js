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

var app = angular.module("phpCrud",[]);

//var app = angular.module('phpCrud', ['ngAria', 'ngMaterial', 'miniapp', 'ngAnimate', 'ui.bootstrap', 'ngSanitize']);
app.controller("tableData", function($scope, $http) {
    
    $scope.edit = function(){
    alert($scope.table_name);
    var data = {'table_name': $scope.table_name};

    $http({
            url: BASE_URL + "crud_controller/edit",
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
    };
});
