<!doctype html>
<html>
    <head>
        <title><?php echo $title;?></title>
        <link rel='stylesheet' type='text/css' href="<?php echo base_url( $dir . '/assets/bootstrap/css/bootstrap.min.css'); ?>">
        <link rel='stylesheet' type='text/css' href="<?php echo base_url($dir . '/assets/app.css'); ?>">
        <?php foreach($css as $key => $value){?>
    	<link rel='stylesheet' type='text/css' href="<?php echo base_url($dir . $value); ?>">
    	<?php } ?>
    	<meta content="utf-8" http-equiv="encoding">
    </head>
    <body ng-app="phpCrud">
