<div class="wrapper wrapper-content m-t-xl wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12" id="data_input">
            </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="form-group">
                            <label class="col-sm-3"> <h5>List Data Audit Unit Perlokasi</h5></label>
                            <div class="col-sm-9 text-right">
                            </div>
                        </div>

                      <span id="info_message"></span>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                    <form action="<?php echo base_url()?>laporan_auditor/cetakexcel" method="post">

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Cabang</label>
                                <div class="col-sm-9"><select name="id_cabang" class="form-control" id="OptCabang"></select>
                                </div>
                            </div>        
                        </div> 
                        <div class="col-sm-5">
                                <div class="form-group" id="data_5">
                                    <label class="col-sm-3 control-label">Periode Tanggal</label>
                                    <div class="col-sm-9">
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" class="input-m form-control" name="tgl_awal" id="tgl_awal" value="<?php echo $tgl ?>"/>
                                        <span class="input-group-addon" id="tgl_awal">s/d</span>
                                        <input type="text" class="input-m form-control" name="tgl_akhir" id="tgl_akhir" value="<?php echo $tgl ?>" />
                                    </div>
                                </div>
                                </div>
                        </div>
                        <div class="col-sm-3">
                            <input type="hidden" name="status" value="Sesuai" id="tgl_akhir"/>
                            <a onclick="preview()" class="btn btn-primary">Preview</a>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-print"></i> CETAK</button>
                        </div> 
                        </form>
                        </div>
                        <hr size="100px">
                        <div class="row">
                      <div class="col-lg-12">
                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        
                        <tr>
                        <th rowspan="2" class="text-center">No</th>
                        <th rowspan="2">Lokasi</th>
                        <th rowspan="2">Jumlah Unit</th>
                        <th colspan="5" class="text-center">Jumlah Aksesoris</th>
                        <th colspan="5" class="text-center">Selisih</th>
                        </tr>
                        
                        <tr>
                        <th>Aki</th>
                        <th>Spion</th>
                        <th>Helm</th>  
                        <th>Tools</th>  
                        <th>Buku Service</th> 
                        <th>Aki</th>
                        <th>Spion</th>
                        <th>Helm</th>  
                        <th>Tools</th>  
                        <th>Buku Service</th>  
                        </tr> 
                    </tr>
                    </thead>
                    <tbody id="unit_perlokasi">
                    </tbody >
                    </table>
                        </div>
                      </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
</div>

