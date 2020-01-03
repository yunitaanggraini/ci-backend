<div class="wrapper wrapper-content m-t-xl wrapper wrapper-content animated fadeInRight">
            
            <!-- <div class="row">
                <div class="col-lg-12">
                <div class="panel panel-success">
                    <div class="panel-body">
                        <div>
                                <div class="form-group"><label class="col-sm-3 control-label">Pencarian Berdasarkan Lokasi Inventory</label>
                                <div class="col-sm-7"><input type="text" class="form-control" id="Inlokasi"></div>
                                
                                    <div class="col-sm-2 text-center">
                                    <button class="btn btn-w-m btn-info" id="caribtn">Cari Data</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div> -->

            <div class="row">
                <div class="col-lg-12" id="data_input">
            </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="ibox-title float-e-margins">
                            <label class="col-sm-3"> <h5>List Inventory Office</h5></label>
                            <div class="col-sm-9 text-right">
                                <a href="<?php echo base_url() ?>transaksi/management_office" value="Add Data" id="add" name="add" class="btn btn-success"> Tambah Inventory </a>
                            </div>
                      <span id="info_message"></span>
                    </div>
                    <div class="panel-body">

                    

                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th class="text-center" width="3%">NO</th>
                        <th class="text-center" width="5%">AKSI</th>
                        <th class="text-center">ID INVENTORY OFFICE</th>
                        <th class="text-center">JENIS INVENTORY</th>
                        <th class="text-center">SUB INVENTORY</th>
                        <th class="text-center">NILAI AWAL</th>
                        <th class="text-center">TANGGAL BARANG DITERIMA</th>
                        <th class="text-center">VENDOR</th>
                        <th class="text-center">PEMBAYARAN</th>
                        <th class="text-center">LOKASI</th>
                        <th class="text-center">PENGGUNA</th>
                        <th class="text-center">KETERANGAN</th>
                        
                    </tr>
                    </thead>
                    <tbody id="inv_office">
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="text-center">AKSI</th>
                        <th class="text-center">ID INVENTORY OFFICE</th>
                        <th class="text-center">JENIS INVENTORY</th>
                        <th class="text-center">SUB INVENTORY</th>
                        <th class="text-center">NILAI AWAL</th>
                        <th class="text-center">TANGGAL BARANG DITERIMA</th>
                        <th class="text-center">VENDOR</th>
                        <th class="text-center">PEMBAYARAN</th>
                        <th class="text-center">LOKASI</th>
                        <th class="text-center">PENGGUNA</th>
                        <th class="text-center">KETERANGAN</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
</div>

