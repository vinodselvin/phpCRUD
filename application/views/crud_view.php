<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$table_data = $result['table_data'];
$primary_key = $result['primary_key'];
?>

<div class="h1 container-fluid">
    PHP CRUD
</div>
<div ng-controller="tableData" ng-init="primary_key = <?php echo htmlspecialchars(json_encode($primary_key));?>">
    <div class="container-fluid">
    <div class='row'> 
        <div class=" form-inline col-lg-6">
            <div class="input-group">
                <div class="input-group-addon">Table Name</div>
                <input type="text" class="form-control" id="inlineFormInputGroup" value="<?php echo htmlspecialchars($result['table_name']); ?>" disabled>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="text-right">
                <input class="form-control width-250" name="search_all_col" type="search" placeholder="search all columns" ng-model="searchBy.$">
            </div>
        </div>
    </div>
    </div>
    <div class="table-responsive">
        <table class="container table table-striped" ng-init="results = <?php echo htmlspecialchars(json_encode($table_data)); ?>;">
            <thead class="breadcrumb">
                <?php foreach ($table_data as $table_value){?>
                <tr>
                    <?php foreach ($table_value as $col_name => $col_value){?>
                    <td>
                        <input type="search" placeholder="Search by <?php echo $col_name; ?>" class="form-control" ng-model="searchBy.<?php echo $col_name; ?>">
                    </td>
                    <?php } ?>
                    <td colspan="2"></td>
                </tr >
                <?php break;}?>
                <tr ng-repeat="row in results | limitTo : 1" class='bg-primary text-white'>
                    <th ng-repeat="(key, value) in row" >
                        <span ng-if="primary_key == key" style="color:burlywood" title='Primay Key'>
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
                <tr ng-repeat="row in filterData = (results | filter : searchBy : strict) | limitTo:10:10*(page-1)" >
                    <td ng-repeat="col in row track by $index">
                        {{col}}
                    </td>
                    <td>
                        <button class="btn btn-primary glyphicon glyphicon-edit" ng-click="edit(row, primary_key)" data-toggle="modal" data-target="#myModal">
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-danger glyphicon glyphicon-trash" ng-click="delete()">
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-5 text-sm-center">
                <uib-pagination  class="pagination" total-items="filterData.length" 
                ng-model="page"
                ng-change="pageChanged()" 
                previous-text="&lsaquo;" 
                next-text="&rsaquo;" 
                items-per-page=10>
                    
                </uib-pagination 
            </div>
        </div>
    </div>
</div>
