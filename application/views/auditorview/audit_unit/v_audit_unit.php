<div class="wrapper wrapper-content m-t-xl wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <h3><i class="fa fa-info-circle"></i> Data Audit Unit</h3>

                      <span id="info_message"></span>
                    </div>
                    <div class="panel-body">
                        
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <div>
                            <div class="form-group"><label class="col-sm-4 control-label">Pencarian Berdasarkan Status Audit</label>
                            <div class="col-sm-6"><select name="status_unit" class="form-control" id="status_unit" onchange="TampilStatus(this.value)">
                            <option value="">--- Pilih Status Audit Unit ---</option>
                            <option value="Sesuai">Sesuai</option>
                            <option value="Belum Sesuai">Belum Sesuai</option>
                            <option value="Tidak Ditemukan">Tidak Ditemukan</option>
                            </select></div>
                                
                            <div class="col-sm-2 text-center">
                                    <button class="btn btn-w-m btn-success" id="caribtn">Cari Data</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>

                    
                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example gray-bg" >
                    <thead>
                    <tr >
                        <th class="text-center" width="3%">No</th>
                        <th class="text-center" width="5%">Aksi</th>
                        <th class="text-center">ID Unit</th>
                        <th class="text-center">No Mesin</th>
                        <th class="text-center">No Rangka</th>
                        <th class="text-center">Cabang</th>
                        <th class="text-center">Lokasi</th>
                        <th class="text-center">Umur Unit</th>
                        <th class="text-center">Status Unit</th>
                        <th class="text-center">Aki</th>
                        <th class="text-center">Spion</th>
                        <th class="text-center">Helm</th>
                        <th class="text-center">Tools</th>
                        <th class="text-center">Buku Servis</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Tanggal Audit</th>
                    </tr>
                    </thead>
                    <tbody id="audit_unit">
                    </tbody >
                    <tfoot>
                    <tr>
                        <th class="text-center" width="3%">No</th>
                        <th class="text-center" width="5%">Aksi</th>
                        <th class="text-center">ID Unit</th>
                        <th class="text-center">No Mesin</th>
                        <th class="text-center">No Rangka</th>
                        <th class="text-center">Cabang</th>
                        <th class="text-center">Lokasi</th>
                        <th class="text-center">Umur Unit</th>
                        <th class="text-center">Status Unit</th>
                        <th class="text-center">Aki</th>
                        <th class="text-center">Spion</th>
                        <th class="text-center">Helm</th>
                        <th class="text-center">Tools</th>
                        <th class="text-center">Buku Servis</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Tanggal Audit</th>
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

