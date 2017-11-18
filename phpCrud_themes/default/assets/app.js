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
			var this_scope = angular.element("#editModal").scope();
				
				
			data_input = JSON.stringify(response.data);
			   json2Html('edit_row').setJson(data_input);
			   json2Html('edit_row').getHtml(function (html) {
					//document.getElementById("edit_modal_body").innerHTML=html;
					this_scope.edit_modal = html;
				});	
			//this_scope.$apply();
           
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
    
    /*
     * @Author: Vinod Selvin
     * @param {type} table_id
     * @returns {Boolean|Window|sa}
     * @Desc: We may need it in future
     */
    $scope.downloadAsExcel = function(table_id){
        
        var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";

        var j=0;

        var tab = document.getElementById(table_id); // id of table

        for(j = 0 ; j < tab.rows.length ; j++) 
        {     console.log(tab_text+tab.rows[j].innerHTML);return false;
            tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        }

        tab_text=tab_text+"</table>";
        tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
        tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
        tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE "); 

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
        {
            txtArea1.document.open("txt/html","replace");
            txtArea1.document.write(tab_text);
            txtArea1.document.close();
            txtArea1.focus(); 
            sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
        }  
        else                 //other browser not tested on IE 11
            sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

        return (sa);
    }
    
    /*
     * @Author: Vinod Selvin
     * @param {Array} Results
     * @returns {file}
     * @Desc: Export Array to CSV
     */
    $scope.exportAsCsv = function (Results) {
        
        var table_name = document.getElementById("table_name").value + ".csv";
        
        var file_name = prompt("Please choose the name for the file, to be downloaded!", table_name);
        
        if (file_name != null) {
            
            var csv = "";
            var csv_head = "";
            
            Results.forEach(function (row, index) {
                
                csv_head = "";
                
                for (var col in row) {
                    
                    if(col != '$$hashKey'){
                        csv_head += col + ',';
                        csv      += row[col] + ',';
                    }
                }
                
                csv_head += "\r\n";
                csv += "\r\n";
            });
            
            csv = csv_head + csv;
            
            csv = "data:application/csv," + encodeURIComponent(csv);

            var x = document.createElement("A");

            x.setAttribute("href", csv);

            x.setAttribute("download", table_name);

            document.body.appendChild(x);

            x.click();
        }
    }
	
	/*
    * @Author: Manoj Selvin
    * @Desc: Added Update feature for each row
    */
    
    $scope.update = function () {
        
        row = $scope.selected_row;
        pk = $scope.primary_key;
		delete row.$$hashKey;
        
        
        var data = {
                            'table_name': angular.element('#table_name').val(),
                            'row': row,
                            'primary_key': $scope.primary_key
                         };

        $http({
            url: BASE_URL + "/crud_controller/update",
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
});
