<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$table_data = $result['table_data'];
$primary_key = $result['primary_key'];
?>

<div class="h1">
    PHP CRUD
</div>
<div ng-controller="tableData" ng-init="primary_key = <?php echo htmlspecialchars(json_encode($primary_key));?>">
    <div>
        <div class="col-lg-4 text-md-center">
            <b>
                Table: <u>
                            <input type="text" id="table_name" value="<?php echo htmlspecialchars($result['table_name']); ?>" disabled>
                        </u>
            </b>
        </div>
        <div class="col-lg-4">
            <div >
                <input class="form-control width-250" name="search_all_col" type="search" placeholder="search all columns" ng-model="searchBy.$">
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
        <table class="table table-striped" ng-init="results = <?php echo htmlspecialchars(json_encode($table_data)); ?>;">
            <thead class="breadcrumb">
                <tr ng-repeat="row in results | limitTo : 1">
                    <td ng-repeat="(key,value) in row">
                        <input type="search" placeholder="Search by {{key}} " class="form-control" ng-model="searchBy[$index]">
                    </td>
                    <td colspan="2"></td>
                </tr >
                <tr ng-repeat="row in results | limitTo : 1" class='bg-primary text-white'>
                    <th ng-repeat="(key, value) in row" >
                        <span ng-if="primary_key == key" class='text-warning' title='Primay Key'>
                          {{key}}
                        </span>
                        <span ng-if="primary_key != key">
                          {{key}}
                        </span>
                    </th>
                    <th colspan="2">
                        Control
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="row in results | filter : searchBy" >
                    <td ng-repeat="col in row track by $index">
                        {{col}}
                    </td>
                    <td>
                        <button class="btn btn-danger" ng-click="edit(row, primary_key)" data-toggle="modal" data-target="#myModal">
                            Edit
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-primary" ng-click="delete()">
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>This is a large modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
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
