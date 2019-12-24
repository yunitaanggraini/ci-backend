<div class="footer fixed">
            <div class="pull-right">
                <div id="stat">
                    <span class="label label-success"> <span class="text-info"><i class="fa fa-circle"></i></span> Online</span>
                </div>
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2017
            </div>
        </div>

        </div>

        </div>
        </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
    <script>
    $('#Optcabang').load("<?php echo base_url() ?>audit/ajax_get_cabang2");
     $('#Optjenisaudit').load("<?php echo base_url();?>audit/ajax_get_jenis_audit2");
        $( "#FormUser" ).validate({
        rules: {
            nik:{
                required: true,
                minlength: 8
            },
            username:{
                required: true,
                minlength: 5
            },
            nama:"required",
            usergroup:"required",
            divisi:"required",
            status:"required",
            password: {
                required: true,
                minlength:6
            },
            confirm_password: {
            equalTo: "#password"
            }

        }
        });
    </script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Idle Timer plugin -->
    <script src="<?php echo base_url() ?>assets/js/plugins/idle-timer/idle-timer.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url() ?>assets/js/inspinia.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/pace/pace.min.js"></script>

    <script src="<?php echo base_url() ?>assets/js/plugins/toastr/toastr.min.js"></script>

    <script src="<?php echo base_url() ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <script src="<?php echo base_url() ?>assets/js/plugins/clockpicker/clockpicker.js"></script>

    <script>
     $(document).ready(function() { 
        <?php if($this->session->flashdata('berhasil')) {?>
        setTimeout(function() {
                    toastr.options = {
                        positionClass: 'toast-bottom-left',
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.success('<?php echo $this->session->flashdata('berhasil') ?>', 'Status');
        
                }, 1300);
            <?php }?>
        <?php if($this->session->flashdata('gagal')) {?>
        setTimeout(function() {
                    toastr.options = {
                        positionClass: 'toast-bottom-left',
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.error('<?php echo $this->session->flashdata('gagal') ?>', 'Status');
        
                }, 1300);
            <?php }?>
        <?php if($this->session->flashdata('warning')) {?>
        setTimeout(function() {
                    toastr.options = {
                        positionClass: 'toast-bottom-left',
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.warning('<?php echo $this->session->flashdata('warning') ?>', 'Status');
        
                }, 1300);
            <?php }?>
                $( document ).idleTimer( 10000);
    });

    $( document ).on( "idle.idleTimer", function(event, elem, obj){
        document.getElementById("stat").innerHTML="<span class='label label-danger'> <span class='text-warning'><i class='fa fa-circle'></i></span> Offline</span>";
    });

    $( document ).on( "active.idleTimer", function(event, elem, obj, triggerevent ){
        // function you want to fire when the user becomes active again
        document.getElementById("stat").innerHTML="<span class='label label-success'> <span class='text-info'><i class='fa fa-circle'></i></span> Online</span>";
    });

    </script>
    <script>
    
     $(document).ready(function() {
        // $('#list_jadwal_audit').load("<?php echo base_url();?>audit/ajax_get_jadwal_audit");  
    $('#Optjenisaudit').load("<?php echo base_url();?>audit/ajax_get_jenis_audit2");
    $('#audit_part').load("<?php echo base_url() ?>transaksi_auditor/ajax_get_part");
    $('#OptCabang').load("<?php echo base_url() ?>audit/ajax_get_cabang2");

    $('#list_jadwal_audit').ready(function () {
        var valu = getUrlParameter('pages');
        console.log(valu);
        
        $.ajax({
            type:'post',
            url:"<?php echo base_url() ?>audit/ajax_get_jadwal_audit",
            data:"pages="+valu,
            success:function (res) {
                console.log(res);
                $('#list_jadwal_audit').html(res);
            }
        });
    });
    
    var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    };



    $('#data_1 .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });

    $('.clockpicker').clockpicker();

});
   
   
    </script>

</body>

</html>
