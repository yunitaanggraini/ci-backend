<div class="wrapper wrapper-content m-t-xl wrapper wrapper-content animated fadeInRight">
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success"  >
                        <div class="ibox-title">
                            <h5 class="col-md-10">Edit Data User</h5>
                            <div class="col-sm-2 text-right">
                            <a href="<?php echo base_url('user') ?>" type="submit" class="btn btn-m btn-danger">Batal</a>
                            <button type="submit" class="btn btn-primary btn-m" id="btn-simpan">Simpan</button>
                            </div>
                        </div>
                        <div class="panel-body">
                        <form method="post" id="FormUser" class="form-horizontal" action="<?php echo base_url() ?>lokasi_inventory/edit_lokasiinv">
                            
                                <div class="form-group"><label class="col-sm-2 control-label">ID User</label>
                                <input type="hidden" class="form-control" name="nik" id="nik" value="">
                                    <div class="col-sm-10"><input type="text" class="form-control"  value="" disabled></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="username" value=""></div>
                                </div>

                                
                                <div class="form-group"><label class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="nama" value=""></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-8"><input type="password" class="form-control" name="password" id="password" ></div>
                                    <div class="col-sm-2"><button type="reset" class="btn btn-warning btn-m" id="btn-reset">Reset Password</button></div>
                                </div>


                                <div class="form-group"><label class="col-sm-2 control-label">Confirm Password</label>
                                    <div class="col-sm-10"><input type="password" class="form-control" name="confirm_password" ></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">User Group</label>
                                    <div class="col-sm-5"><select class="form-control m-b" name="usergroup"  id="Optusergroup">
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Divisi</label>
                                    <div class="col-sm-5"><select class="form-control m-b" name="divisi" id="Optdivisi" >
                                    </select>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>