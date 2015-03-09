<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url('assets/js/jquery.metisMenu.js') ?>"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="<?php echo base_url('assets/js/morris/raphael-2.1.0.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/morris/morris.js') ?>"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="<?php echo base_url('assets/js/dataTables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/dataTables/dataTables.bootstrap.js') ?>"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
    <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
    <!-- DATEPICKER SCRIPTS -->
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js') ?>"></script>
    <script>
        $('.datepicker-month').datepicker( {
            format: "mm-yyyy",
            viewMode: "months", 
            minViewMode: "months"
        });
        $('.datepicker').datepicker({
            format: 'mm/dd/yyyy'
        });
    </script>