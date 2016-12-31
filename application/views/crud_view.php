<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "<pre>";
print_r($result);
echo "</pre>";

?>
<div class="row">
    <h4 class="col-sm-4">PHP CRUD</h4>
</div>

<div ng-controller="tableData" >
    <div class="row">
        <div class="col-sm-4">
            <?php echo 'Table Name'; ?>
        </div>
        <div class="col-sm-6">
            <div class="col-xs-4">
                <input class="form-control width-250" name="search_all_col" type="search" placeholder="search all columns">
            </div>
        </div>
        <div class="col-sm-2">
            <p class="text-right">
                <?php echo 'Date :'.date("d - m - y"); ?>
            </p>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table" ng-init="results = <?php echo htmlspecialchars(json_encode($result)); ?>">
            <thead>
                <tr ng-repeat="row in results | limitTo : 1">
                    <td ng-repeat="(key,value) in row">
                        <input type="search" placeholder="Search by {{key}} " class="form-control" >
                    </td>
                </tr>
                <tr ng-repeat="row in results | limitTo : 1" >
                    <th ng-repeat="(key, value) in row">
                        {{key}}
                    </th>
                    <th>
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
                        <a href="crud_controller/edit" class="">
                            Edit 
                        </a>
                        |
                        <a href="crud_controller/delete/<?php echo $value1.'/'.$key1 ?>"  class="">
                            Delete
                        </a>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <?php echo 'No records found (#in case empty)'; ?>
        </div>

        <div class="col-sm-4">
            <label>
                No. of rows 
            </label>

            <input type="text" name="no." class="s">
        </div>

        <div class="col-sm-4">

            <ul class="pagination">
                <li>
                    <a href="#">1</a>
                </li>
            </ul>
        </div>
    </div>
</div>



