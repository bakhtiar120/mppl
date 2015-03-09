<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SI KLIK</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="<?php echo base_url('assets/js/morris/morris-0.4.3.min.css') ?>" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- DATEPICKER STYLES-->
    <link href="assets/js/dataTables/bootstrap-datepicker.min.css" rel="stylesheet" />
    <!-- SELECT2 STYLES-->
    <link href="<?php echo base_url('assets/css/select2.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/select2-bootstrap.css') ?>" rel="stylesheet" />
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url('assets/js/jquery-2.1.3.min.js') ?>"></script>
    <!-- SELECT2 SCRIPTS-->
    <script src="<?php echo base_url('assets/js/select2.js') ?>"></script>
    <script type="text/javascript">
    $(document).ready(function() 
    {
        $(".basic-select2").select2({
            allowClear: true
        });

        $(".catatan-select2").select2({
        });
    });
    </script>