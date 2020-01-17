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
    // $('#usergroup').load("<?php echo base_url() ?>master_data/ajax_get_usergroup");
    $(document).on('click', '.pagination li a', function(event) {
        event.preventDefault();
        var page = $(this).data('ci-pagination-page');
        get_data(page);
        
    });
    get_data(1);
    function get_data(page) {
    $("#usergroup").html('<tr> <td colspan="4" id="loading"> </td></tr>');
        $.ajax({
            type: 'POST',
            dataType:'JSON',
            url:"<?php echo base_url() ?>master_data/ajax_get_usergroup/"+page,
            success:function(data){
                $('#usergroup').html(data.output);
                $('#pagination').html(data.pagination);
            }
        })
    }
    function search() {
            var usergroup =$('#Inusergroup').val();
            console.log(usergroup);
            $("#usergroup").html('<tr> <td colspan="4" id="loading"> </td></tr>');
            if (usergroup!='') {
                $.ajax({
                    type:"post",
                    dataType:'JSON',
                    url:"<?php echo base_url() ?>master_data/search_data_usergroup",
                    data:"id="+usergroup,
                    success:function(data){
                      $("#usergroup").html(data);
                      $("#search").val("");
                    }
                });
            }else{
                get_data();
            }
        }
        $('#caribtn').click(function(){
            search();
        });
        $('#Inusergroup').keyup(function(e) {
          if(e.keyCode == 13) {
             search();
          }
      });
    });

    function edit(id) {
        // var id = $(this).attr('data-id');
        
        $.ajax({
            url: "<?php echo base_url().$this->uri->segment(1) ?>/edit_usergroup",
            type: 'get',
            data:"id="+id,
            dataType:'html',
            success: function(data) {
                $('#data_input').html(data);
            }

        });
      }
      
    function show() {
        $('#add').attr('disabled', true);
        
        $.ajax({
            url: "<?php echo base_url().$this->uri->segment(1) ?>/input_usergroup",
            type: 'post',
            dataType:'html',
            success: function(data) {
                $('#data_input').html(data);
            }

        });
    }

    function hide() {
        $('#add').attr('disabled', false);
        $('#data_input').html('');
    }
    </script>

</body>

</html>
