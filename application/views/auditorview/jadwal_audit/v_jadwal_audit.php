<div class="wrapper wrapper-content m-t-xl wrapper wrapper-content animated fadeInRight">
<div class="row">
                <div class="col-lg-12">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('audit/post_jadwal_audit') ?>" id="FormJadwalAudit">
                    <div class="panel panel-success"  >
                        <div class="ibox-title">
                            <h5 class="col-md-10">Input Jadwal Audit</h5>
                            <div class="col-sm-2 text-right">
                            <a href="<?php echo base_url('audit/input_jadwal') ?>" type="submit" class="btn btn-m btn-danger">Batal</a>
                            <button type="submit" class="btn btn-primary btn-m" id="btn-simpan">Simpan</button>
                            </div>
                        </div>
                        <div class="ibox-content">
                                <div class="form-group"><label class="col-sm-2 control-label">ID Jadwal Audit</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="idjadwal_audit" id="idjadwal_audit"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Auditor</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="auditor"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Jenis Audit</label>
                                    <div class="col-sm-5"><select class="form-control m-b" name="idjenis_audit"  id="Optjenisaudit">
                                    </select>
                                    </div>
                                </div>
                                
                                <div class="form-group"><label class="col-sm-2 control-label">Cabang</label>
                                    <div class="col-sm-5"><select class="form-control m-b" name="id_cabang"  id="Optcabang">
                                    </select>
                                    </div>
                                </div>

                                <!-- <div class="form-group"><label class="col-sm-2 control-label">Lokasi</label>
                                    <div class="col-sm-5"><select class="form-control m-b" name="id_lokasi"  id="Optlokasi" disabled="">
                                    </select>
                                    </div>
                                </div> -->
                                
                                <div class="form-group"><label class="col-sm-2 control-label">Tanggal</label>
                                    <div class="col-sm-5"><input type="date" class="form-control" name="tanggal" ></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Waktu</label>
                                    <div class="col-sm-5"><input type="time" class="form-control" name="waktu" id="password" oncopy="return false" onpaste="return false"></div>
                                </div>

                                

                                

                                <input type="hidden" name="data_insert" id="data_insert" value="Insert"/>
                        </div>
                    </div>
                            </form>
                </div>
            </div>
        </div>