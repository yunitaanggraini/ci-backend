    <script src="<?php echo base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
    <script>
     $('#Optcabang').load("<?php echo base_url() ?>audit/ajax_get_cabang2");
     $('#jenis_audit').load("<?php echo base_url();?>audit/ajax_get_jenis_audit2");
        $( "#FormJadwalAudit" ).validate({
        rules: {
            idjadwal_audit:{
                required: true,
                maxlength: 5,
                minlength:3
            },
            auditor:{
                required:true
            },
            tanggal:{
                required:true
            },
            waktu:{
                required:true
            },
            id_cabang:{
                required:true
            }

        }
        });
    </script>


</body>

</html>
