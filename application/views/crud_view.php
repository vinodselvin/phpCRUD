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

<div class="row">
  <div class="col-sm-4"><?php echo 'Table Name'; ?></div>
  <div class="col-sm-6"><div class="col-xs-4"><input class="form-control width-250" name="search_all_col" type="search" placeholder="search all columns"></div></div>
  <div class="col-sm-2"><p class="text-right"><?php echo 'Date :'.date("d - m - y"); ?></p></div>
</div>
 

<div class="table-responsive">
	<table class="table">
	<thead>
	<tr>
		<?php foreach ($result as $key => $value) {
		foreach ($value as $key1 => $value1) {
		?>
			<td><input type="search" placeholder="Search by <?php echo $key1; ?> " class="form-control" ></td>

			<?php  } break;}?>
		
		</tr>
	<tr>
		<?php foreach ($result as $key => $value) {
		foreach ($value as $key1 => $value1) {
		?>
			<th><?php echo $key1; ?></th>

			<?php  } break;}?>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($result as $key => $value) {?>
		<tr>
	<?php foreach ($value as $key1 => $value1) { ?>
			<td><?php echo $value1; ?></td>
			<?php }?>
	<td><a href="crud_controller/edit" class="">Edit </a>|<a href="crud_controller/delete/<?php echo $value1.'/'.$key1 ?>"  class=""> Delete</a></td>

			<?php }?>

			</tr>

	</tbody>
	</table>
</div>

<div class="row">
  <div class="col-sm-4">
  	<?php echo 'No records found (#in case empty)'; ?>
  </div>

  <div class="col-sm-4">
  		<label">No. of rows </label>
  		<input type="text" name="no." class="s">
  </div>
<div class="col-sm-4">
	<ul class="pagination">
    	<li><a href="#">1</a></li>
    	<li><a href="#">2</a></li>
    	<li><a href="#">3</a></li>
    	<li><a href="#">4</a></li>
    	<li><a href="#">5</a></li>
  	</ul>
</div>
</div>



