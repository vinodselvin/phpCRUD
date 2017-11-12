    <script src="<?php echo base_url($dir . '/assets/bootstrap/js/tether.min.js'); ?>"></script>
    <script src="<?php echo base_url($dir . '/assets/bootstrap/js/jquery.js'); ?>"></script>
    <script src="<?php echo base_url($dir . '/assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url($dir . '/assets/angular/js/angular.js'); ?>"></script>  
    <script src="<?php echo base_url($dir . '/assets/bootstrap/js/boot-ui.js'); ?>"></script>  
    <script src="<?php echo base_url($dir . '/assets/angular/js/angular-route.js'); ?>"></script>
    <script src="<?php echo base_url($dir . '/assets/app.js'); ?>"></script>
    <script src="<?php echo base_url($dir . '/assets/third_party/json_to_html_converter.js'); ?>"></script>
    <script src="http://d3js.org/d3.v3.js" charset="utf-8"></script>
    <?php foreach($js as $key => $value){?>
    <script src="<?php echo base_url($dir . $value); ?>"></script>
    <?php } ?>
    </body>
</html>
<!-- Footer Closed  -->