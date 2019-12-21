<div class="wrapper wrapper-content m-t-xl wrapper wrapper-content animated fadeInRight">
<div class="row">
                <div class="col-lg-12">
                <div class="panel panel-bluedark"  >
                        <div class="panel-heading">

                        <div class="col-lg-10" ><h4><i class="fa fa-info-circle"></i> Edit Unit</h4></div>
                        <div >
                        <a href="<?php echo base_url('audit/input_jadwal') ?>" type="submit" class="btn btn-m btn-danger">Batal</a>
                        <button type="submit" class="btn btn-success btn-m" id="btn-simpan">Simpan</button>                        
                        </div>
                      
                    </div>
                        <div class="panel-body">
                        <form method="post" id="FormUnit" class="form-horizontal" action="<?php echo base_url() ?>transaksi_auditor/audit_unit">
                            
                            
                                <div class="form-group"><label class="col-sm-2 control-label">ID Unit</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="id_unit" id="id_unit" value="" disabled></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">No Mesin</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="no_mesin" id="no_mesin" value=""></div>
                                </div>

                                
                                <div class="form-group"><label class="col-sm-2 control-label">No Rangka</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="no_rangka" id="no_rangka" value=""></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Cabang</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="id_cabang" id="id_cabang" value=""></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Lokasi</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="id_lokasi" id="id_lokasi" value=""></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Umur Unit</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="umur_unit" id="umur_unit" value=""></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Status Unit</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="status_unit" id="status_unit" value=""></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Aki</label>
                                <div class="i-checks"><label> <input type="checkbox" value="1"> <i></i> </label></div>
                                </div> 

                                <div >
                                <div class="form-group"><label class="col-sm-2 control-label">Spion</label>
                                <div class="i-checks"><label> <input type="checkbox" value="1"> <i></i> </label></div>
                                </div> 

                                <div >
                                <div class="form-group"><label class="col-sm-2 control-label">Helm</label>
                                <div class="i-checks"><label> <input type="checkbox" value="1"> <i></i> </label></div>
                                </div> 

                                <div >
                                <div class="form-group"><label class="col-sm-2 control-label">Tools</label>
                                <div class="i-checks"><label> <input type="checkbox" value="1"> <i></i> </label></div>
                                </div> 

                                <div >
                                <div class="form-group"><label class="col-sm-2 control-label">Buku Servis</label>
                                <div class="i-checks"><label> <input type="checkbox" value="1"> <i></i></label></div>
                                </div>
                                </div>
                                </div>  
                            </div>
                        </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Tahun</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="tahun" id="tahun" value=""></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Type</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="type" id="type" value=""></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Kode Item</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="kode_item" id="kode_item" value=""></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Foto</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="foto" id="foto" value=""></div>
                                </div>
                                
                                <div class="form-group"><label class="col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="keterangan" id="keterangan" value=""></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Is Ready</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="kode_item" id="kode_item" value=""></div>
                                </div>
                             
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>