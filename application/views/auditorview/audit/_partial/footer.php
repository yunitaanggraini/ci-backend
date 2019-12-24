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
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Idle Timer plugin -->
    <script src="<?php echo base_url() ?>assets/js/plugins/idle-timer/idle-timer.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url() ?>assets/js/inspinia.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/pace/pace.min.js"></script>

    <script src="<?php echo base_url() ?>assets/js/plugins/toastr/toastr.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/iCheck/icheck.min.js"></script>


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
    $('#jadwal_audit').load("<?php echo base_url() ?>audit/ajax_get_jadwal_audit");
    $('#Optcabang').load("<?php echo base_url() ?>master_data/ajax_get_cabang2");


    
    function scan_getdata() {
            var cari =$('#cari').val();
            console.log(cari);

            if (cari!='') {
                $.ajax({
                    type:"post",
                    url:"<?php echo base_url() ?>transaksi_auditor/scan_data_unit",
                    data:"id="+cari,
                    success:function(data){
                      $("#no_mesin").val();
                      $("#no_rangka").val();
                      $("#kode_item").val();
                    }
                });
            }else{

                alert ('data not found')
                    }
        }
        $('#cari').click(function(){
            scan_getdata();
        });
        $('#cari').keyup(function(e) {
          if(e.keyCode == 13) {
              scan_getdata();
             
          }
      });
    });


    $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
    });
    
    // $(document).scannerDetection({
    //     timeBeforeScanTest: 200, // wait for the next character for upto 200ms
    //     endChar: [13], // be sure the scan is complete if key 13 (enter) is detected
    //     avgTimeByChar: 40, // it's not a barcode if a character takes longer than 40ms
    //     ignoreIfFocusOn: 'input', // turn off scanner detection if an input has focus
    //     onComplete: function(barcode, qty){ ... }, // main callback function
    //     scanButtonKeyCode: 116, // the hardware scan button acts as key 116 (F5)
    //     scanButtonLongPressThreshold: 5, // assume a long press if 5 or more events come in sequence
    //     onScanButtonLongPressed: showKeyPad, // callback for long pressing the scan button
    //     onError: function(string){alert('Error ' + string);}
    // });


    // function () {
    //     $('#no_mesin').change(function () {
    //         ver no_mesin = $('#no_mesin').val();

    //         $.ajax({
    //             url: 
    //         })
    //     })
        
    // }
    </script>

</body>

</html>
