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
            idjenis_inventory:{
                required:true
            },
            idsub_inventory:{
                required:true
            },
            nilai_awal:{
                required:true
            },
            ddp:{
                required:true
            },
            nilai_asset:{
                required:true
            },
            nilai_total_keseluruhan:{
                required:true
            },
            tanggal_barang_terima:{
                required:true
            },
            id_vendor:{
                required:true
            },
            jenis_pembayaran:{
                required:true
            },
            id_cabang:{
                required:true
            },
            id_lokasi:{
                required:true
            },
            nama_pengguna:{
                required:true
            },
            keterangan:{
                required:true
            },
            stok:{
                required:true
            },
            foto:{
                required:true
            },
            asal_hadiah:{
                required:true
            },
            ppn:{
                required:true
            },
            ket_ppn:{
                required:true
            },
            merk:{
                required:true
            },
            aksesoris_tambahan:{
                required:true
            },
            serial_number:{
                required:true
            },
            uang_muka:{
                required:true
            },
            cicilan_perbulan:{
                required:true
            },
            tenor:{
                required:true
            },
            nilai_total:{
                required:true
            },

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
    $('#user').load("<?php echo base_url();?>master_data/ajax_get_user");
    $('#OptStatusInv').load("<?php echo base_url() ?>transaksi_ga/ajax_get_statusinv2");
    $('#OptVendor').load("<?php echo base_url() ?>transaksi_ga/ajax_get_vendor2");
    $('#OptJenisInv').load("<?php echo base_url() ?>transaksi_ga/ajax_get_jenisinv2");
   $('#OptJenisInv').on('change', function(){
       var idjenis_inventory = $(this).val();

       if(idjenis_inventory == "")
       {
        $('#OptSubInv').prop('disabled',true);
       }
       else
       {
        $('#OptSubInv').prop('disabled',false);
        $.ajax({
            url:"<?php echo base_url();?>transaksi_ga/ajax_get_subinv2",
            type: "POST",
            data: {'idjenis_inventory':idjenis_inventory},
            success: function(data){
                $('#OptSubInv').html(data);
            }
        });
       }
   })
   $('#OptCabang').load("<?php echo base_url() ?>transaksi_ga/ajax_get_cabang2");
   $('#OptCabang').on('change', function(){
       var id_cabang = $('#OptCabang').val();

       if(id_cabang == "")
       {
        $('#OptLokasi').prop('disabled',true);
       }
       else
       {
        $('#OptLokasi').prop('disabled',false);
        $.ajax({
            url:"<?php echo base_url();?>transaksi_ga/ajax_get_lokasi2",
            type: "POST",
            data: {'id_cabang':id_cabang},
            success: function(data){
                $('#OptLokasi').html(data);
            }
        });
       }
   })
    

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
