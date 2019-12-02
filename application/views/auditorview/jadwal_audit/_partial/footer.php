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
            
                // setTimeout(function() {
                //     toastr.options = {
                //         positionClass: 'toast-bottom-left',
                //         closeButton: true,
                //         progressBar: true,
                //         showMethod: 'slideDown',
                //         timeOut: 4000
                //     };
                // //     toastr.success('Selamat Datang Username', 'Login berhasil');
        
                // }, 1300);
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
        $('#list_jadwal_audit').load("<?php echo base_url();?>audit/ajax_get_jadwal_audit");  
        $('#Optjenisaudit').load("<?php echo base_url();?>audit/ajax_get_jenis_audit2");
    $('#audit_part').load("<?php echo base_url() ?>transaksi_auditor/ajax_get_part");
    $('#Optcabang').load("<?php echo base_url() ?>master_data/ajax_get_cabang2");

    function search() {
        var auditor =$('#auditor').val();
            var tanggal_audit = $('#tanggal_audit').val();
            var jenis_audit = $('#jenis_audit').val();


            if (auditor!='' && tanggal_audit!='' && jenis_audit!='') {
                $.ajax({
                    type:"post",
                    url:"<?php echo base_url() ?>audit/search_data_audit",
                    data:"auditor="+auditor+"&tanggal_audit="+tanggal_audit+"&jenis_audit="+jenis_audit,
                    success:function(data){
                      $("#list_jadwal_audit").html(data);
                      $("#search").val("");
                    }
                });
            }else{
                if (auditor!='' && tanggal_audit=='' && jenis_audit=='') {
                    $.ajax({
                    type:"post",
                    url:"<?php echo base_url() ?>audit/search_data_audit",
                    data:"auditor="+auditor,
                    success:function(data){
                      $("#list_jadwal_audit").html(data);
                      $("#search").val("");
                    }
                });
                }else if (auditor=='' && tanggal_audit!='' && jenis_audit=='') {
                    $.ajax({
                    type:"post",
                    url:"<?php echo base_url() ?>audit/search_data_audit",
                    data:"tanggal_audit="+tanggal_audit,
                    success:function(data){
                      $("#list_jadwal_audit").html(data);
                      $("#search").val("");
                    }
                });
                } else {
                    if (auditor=='' && tanggal_audit=='' && jenis_audit!='') {
                        $.ajax({
                        type:"post",
                        url:"<?php echo base_url() ?>audit/search_data_audit",
                        data:"jenis_audit="+jenis_audit,
                        success:function(data){
                        $("#list_jadwal_audit").html(data);
                        $("#search").val("");
                    }
                    });
                    }else{
                        $('#list_jadwal_audit').load("<?php echo base_url();?>audit/ajax_get_jadwal_audit");
                    }
                }
            }
        }

        $('#caribtn').click(function() {
            search();
        });

        $('#auditor').keyup(function(e) {
          if(e.keyCode == 13) {
             search();
          }else{
              if (e.keyCode == 9) {
                  $('#tanggal_audit').focus();
              }else if(e.keyCode == 9){
                  $('#jenis_audit').focus();
              }
          }
      });
        $('#tanggal_audit').keyup(function(e) {
          if(e.keyCode == 13) {
             search();
          }
      });

      $('#jenis_audit').keyup(function(e) {
          if(e.keyCode == 13) {
             search();
          }
      });

    //   function (fobj) {
    //       elmTanggal= this.GetElements("Tanggal_Mulai");
    //       var CurrentDate = new Date();
    //       CurrentDate = ew_ParseDate(CurrentDate, 1);
    //       var SelectedDate = new Date($("#Tanggal_Mulai").val());
    //       SelectedDate = ew_ParseDate(SelectedDate,1);
    //       if(SelectedDate < CurrentDate){
    //           return this.OnError(elmTanggal,"Tanggal Mulai Baru")
    //       }
    //       return true;   
    //   }

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
