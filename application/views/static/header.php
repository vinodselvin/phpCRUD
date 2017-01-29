<!doctype html>
<html>
    <head>
        <title><?php echo $title;?></title>
        <link rel='stylesheet' type='text/css' href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
        <link rel='stylesheet' type='text/css' href="<?php echo base_url('my_assets/css/app.css'); ?>">

            <?php foreach ($css as $key => $value) { ?>
            <link rel="stylesheet" type="text/css" href="<?php echo $value;?>">
        <?php } ?>

    </head>
    <body ng-app="phpCrud">
