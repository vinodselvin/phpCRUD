    <script src="<?php echo base_url(); ?>assets/bootstrap/js/tether.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/angular/js/angular.js"></script>  
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/boot-ui.js"></script>  
    <script src="<?php echo base_url(); ?>assets/angular/js/angular-route.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>-->
    <script src="<?php echo base_url(); ?>my_assets/js/app.js"></script>
    
        <?php foreach ($js as $key => $value) { ?>
            <script src="<?php echo $value?>"></script>
        <?php } ?>
    </body>
</html>
<!-- Footer Closed  -->