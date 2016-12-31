<!doctype html>
<html>
    <head>
        <title><?php echo $title;?></title>
        
        <?php foreach ($css as $key => $value) { ?>
            <link rel="stylesheet" type="text/css" href="<?php echo $value;?>">
        <?php } ?>
            
    </head>
    <body ng-app="phpCrud">
