<div class="wrapper wrapper-content m-t-xl wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                    <div class="panel-body">
                    <div class="row form-horizontal">
                        <div class="col-sm-10">
                            <div>
                                <div class="form-group"><label class="col-sm-4 control-label">Pencarian Berdasarkan Username</label>
                                <div class="col-sm-8"><input type="text" class="form-control" id="username"></div></div>        
                            </div>        
                    
                            <div>
                                <div class="form-group"><label class="col-sm-4 control-label">Pencarian Berdasarkan Nama</label>
                                <div class="col-sm-8"><input type="text" class="form-control" id="nama"></div></div>
                            </div>
                        </div>

                        <div class="col-sm-2 text-center m-t-lg">
                            <button class="btn btn-w-m btn-info" id="caribtn">Cari Data</button>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel">
                        <h5 class="col-sm-3">List Data User</h5>
                        <div class="col-sm-9 text-right">
                        <a href="<?php echo site_url('master_data/input_user'); ?>" type="button" class="btn btn-m btn-success">Add Data</a>
                        </div>
                      <span id="info_message"></span>
                    </div>
                    <div class="panel-body">
                    <?php if($this->session->flashdata('info')){
                        ?>
                        <div class="alert alert-success alert-dismissable col-6">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Data user <?php echo $this->session->flashdata('info');
                                
                                ?>
                            </div>
                        <?php
                        } ?>
                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Aksi</th>
                        <th>NIK</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Perusahaan</th>
                        <th>Cabang</th>
                        <th>Lokasi</th>
                        <th>User Group</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody id="user">
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Aksi</th>
                        <th>NIK</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Perusahaan</th>
                        <th>Cabang</th>
                        <th>Lokasi</th>
                        <th>User Group</th>
                        <th>Status</th>
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

