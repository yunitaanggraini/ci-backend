    <script src="<?php echo base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
    <script>
        $( "#FormLokasiInv" ).validate({
        rules: {
            idlokasi_inv:{
                required: true,
                maxlength: 5,
                minlength:3
            },
            lokasi_inv:{
                required:true
            }

        }
        });
    </script>


</body>

</html>
