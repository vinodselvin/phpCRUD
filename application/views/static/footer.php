	<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery.js"></script>
    <?php foreach ($js as $key => $value) { ?>
                <script src="<?php echo $value?>"></script>
    <?php } ?>
                
    </body>
</html>
<!-- Footer Closed  -->