<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$table_data = $result['table_data'];

?>

<div class="h1">
    PHP CRUD
</div>
<div ng-controller="tableData">
    <div>
        <div class="col-lg-4 text-md-center">
            <b>
                Table: <u>
                            <?php echo $result['table_name']; ?>
                        </u>
            </b>
        </div>
        <div class="col-lg-4">
            <div >
                <input class="form-control width-250" name="search_all_col" type="search" placeholder="search all columns">
            </div>
        </div>
        <div class="col-lg-4 text-md-center">
            <p class="text-right text-primary">
                <b>
                    Date: 
                        <?php echo date("dS, M Y"); ?>
                </b>
            </p>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" ng-init="results = <?php echo htmlspecialchars(json_encode($table_data)); ?>">
            <thead class="breadcrumb">
                <tr ng-repeat="row in results | limitTo : 1">
                    <td ng-repeat="(key,value) in row">
                        <input type="search" placeholder="Search by {{key}} " class="form-control" >
                    </td>
                    <td colspan="2"></td>
                </tr >
                <tr ng-repeat="row in results | limitTo : 1" class='bg-primary text-white'>
                    <th ng-repeat="(key, value) in row" >
                        {{key}}
                    </th>
                    <th colspan="2">
                        Control
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="row in results" >
                    <td ng-repeat="col in row track by $index">
                        {{col}}
                    </td>
                    <td>
                        <button class="btn btn-danger" ng-click="edit()">
                            Edit 
                        </button>
                    </td>
                    <td>
                        <a href="crud_controller/delete/<?php echo $value1.'/'.$key1 ?>"  class="btn btn-primary">
                            Delete
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <?php echo 'No records found (#in case empty)'; ?>
            </div>
            <div class="col-sm-3">
                <label for="no_of_rows" class="text-primary font-weight-bold">No. of rows to Display:</label>
                    <select class="form-control text-primary" id="no_of_rows">
                        <option>10</option>
                        <option>50</option>
                        <option>100</option>
                        <option>500</option>
                        <option>1000</option>
                    </select>
            </div>
            <div class="col-sm-5 text-sm-center">
                <ul class="pagination">
                    <li>
                        <a href="#">1</a>
                    </li>
                </ul>
                
            </div>
        </div>
    </div>
</div>