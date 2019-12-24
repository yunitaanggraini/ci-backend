<div class="wrapper wrapper-content m-t-xl wrapper wrapper-content animated fadeInRight">
<!--             
            <div class="row">
                <div class="col-lg-4">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-info-circle"></i> Silahkan Pilih Proses Audit                       
                </div>
                    <div class="panel-body">
                    <div>                        
                         <a href="<?php echo site_url('transaksi_auditor/manual_audit'); ?>" type="button" class="btn btn-lg btn-default"><i class="fa fa-check"></i>Manual</a><br><br> 
                    </div>
                        <a href="<?php echo site_url('transaksi_auditor/scaning_audit'); ?>" type="button" class="btn btn-lg btn-default"><i class="fa fa-check"></i>Scaning</a>
                        </div>

                    </div>
                </div>
                </div> -->


            <div class="row">
                <div class="col-lg-12">
                <div class="panel panel-bluedark">
                <div class="panel-heading">
                    <i class="fa fa-info-circle"></i> AUDIT PROSES                      
                </div>
                    <div class="panel-body">
                            <div class="form-group"><label class="col-sm-2 control-label">Data Unit </label>
                            <div class="col-sm-7"><input type="text" class="form-control" placeholder="Masukkan No Mesin/ No Rangka" id="cari"></div>
                            <div>
                            <button class="btn btn-success btn-m">Scan Data</button>
                            </div>
                            </div>

                            <!-- <div class="text-right col-sm-11 ">
                            <button class="btn btn-info btn-w-m ">Preview Data Audit</button>
                            </div> -->
                    </div>


<hr>
                    <div class="row">
                    <div class="panel-body">
                    <form method="post" class="form-horizontal" id="Formcabang" action="<?php echo base_url() ?>transaksi_auditor/post_manual">
                        
                        
                        <!-- <div class="form-group"><label class="col-sm-2 control-label">ID Unit</label>
                            <div class="col-sm-4"><input type="text" class="form-control" name="id_unit" id="id_unit"></div>
                        </div> -->

                        <div class="form-group"><label class="col-sm-2 control-label">No Mesin</label>
                            <div class="col-sm-4"><input type="text" class="form-control" name="no_mesin" id="no_mesin" ></div>
                           <!--  <div class="col-sm-6"><button type="button" class="btn btn-success" id="btn-cari">Cari</button> <span id="loading">LOADING...</span></div> -->
                        </div>

                        <div class="form-group"><label class="col-sm-2 control-label">No Rangka</label>
                            <div class="col-sm-4"><input type="text" class="form-control" name="no_rangka" id="no_rangka"></div>
                        </div>

                        <div class="form-group"><label class="col-sm-2 control-label">Kode Item</label>
                            <div class="col-sm-4"><input type="text" class="form-control" name="kode_item" id="kode_item"></div>
                        </div>
                    </form>
                    </div>
                </div>




                </div>
                </div>
                </div>


                

        </div>



