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
    $('#jadwal_audit').load("<?php echo base_url();?>audit/ajax_get_jadwal_audit");
    $('#list_audit').load("<?php echo base_url();?>audit/ajax_get_jadwal_audit");
    $('#Optjenisaudit').load("<?php echo base_url();?>audit/ajax_get_jenis_audit2");
    $('#Optcabang').load("<?php echo base_url();?>audit/ajax_get_cabang2");

    

    function search() {
            var username =$('#username').val();
            var nama = $('#nama').val();

            if (username!='' && nama!='') {
                $.ajax({
                    type:"post",
                    url:"<?php echo base_url() ?>master_data/search_data_user",
                    data:"username="+username+"&nama="+nama,
                    success:function(data){
                      $("#user").html(data);
                      $("#search").val("");
                    }
                });
            }else{
                if (username!= '' && nama=='') {
                    $.ajax({
                    type:"post",
                    url:"<?php echo base_url() ?>master_data/search_data_user",
                    data:"username="+username,
                    success:function(data){
                      $("#user").html(data);
                      $("#search").val("");
                    }
                });
                } else {
                    if (username==''&& nama!='') {
                        $.ajax({
                        type:"post",
                        url:"<?php echo base_url() ?>master_data/search_data_user",
                        data:"nama="+nama,
                        success:function(data){
                        $("#user").html(data);
                        $("#search").val("");
                    }
                    });
                    }else{
                        $('#user').load("<?php echo base_url();?>master_data/ajax_get_user");  
                    }
                }
            }
        }

        $('#caribtn').click(function() {
            search();
        });

        $('#username').keyup(function(e) {
          if(e.keyCode == 13) {
             search();
          }else{
              if (e.keyCode == 9) {
                  $('#nama').focus();
              }
          }
      });
        $('#nama').keyup(function(e) {
          if(e.keyCode == 13) {
             search();
          }
      });
    });

    function edit(id) {
        // var id = $(this).attr('data-id');
        $.ajax({
            url: "<?php echo base_url().$this->uri->segment(1) ?>/edit_user",
            type: 'post',
            data:"id="+id,
            dataType:'html',
            success: function(data) {
                $('#data_input').html(data);
            }

        });
      }

    
    </script>

</body>

</html>