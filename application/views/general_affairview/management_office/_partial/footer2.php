    <script src="<?php echo base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {
            $('#OptStatusInv').load("<?php echo base_url() ?>transaksi_ga/ajax_get_statusinv2");
            $('#OptJenisInv').load("<?php echo base_url() ?>transaksi_ga/ajax_get_jenisinv2");
            $('#OptSubInv').load("<?php echo base_url() ?>transaksi_ga/ajax_get_subinv2");
        });
        $( "#FormInventory" ).validate({
        rules: {
            idtransaksi_inv:{
                required: true,
                maxlength: 8,
                minlength:3
            },
            idstatus_inventory:{
                required:true
            },
            idsub_inventory:{
                required:true
            },
            idstatus_inventory:{
                required:true
            }
            

        }
        });
    </script>


</body>

</html>
