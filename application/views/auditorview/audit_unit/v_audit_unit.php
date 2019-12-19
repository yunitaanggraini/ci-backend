<div class="wrapper wrapper-content m-t-xl wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                <div class="panel panel-bluedark">
                    <div class="panel-heading">
                        <h3><i class="fa fa-info-circle"></i> Data Audit Unit</h3>
                    </div>
                    <div class="panel-body">
                        
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">

                                <div class="col-sm-4">
                                    <label>Cabang</label>
                                    <div class="form-group">
                                        <select name="id_cabang" class="form-control" id="OptCabang"></select>
                                    </div>
                                            
                                </div> 



                                <div class="col-sm-4">
                                        <label>Periode Tanggal</label>
                                        <div class="form-group" id="data_5">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" class="input-m form-control" name="tgl_awal" value="05/14/2019"/>
                                                <span class="input-group-addon" id="tgl_awal">to</span>
                                                <input type="text" class="input-m form-control" name="tgl_akhir" value="05/22/2019" />
                                            </div>
                                        </div>
                                        
                                </div>  

                                <div class="col-sm-4">
                                    <label>Status Unit</label>
                                    <div class="form-group">
                                    <select name="status_unit" class="form-control" id="status_unit" onchange="tampil()">
                                    <option value="hide">--- Pilih Status Audit Unit ---</option>
                                    <option value="Sesuai" id="sesuai">Sesuai</option>
                                    <option value="Belum Sesuai" id="belum_sesuai">Belum Sesuai</option>
                                    <option value="Tidak Ditemukan" id="tidak_ditemukan">Tidak Ditemukan</option>
                                    </select>
                                    </div>      
                                </div>
                            
                            


                            <!-- <form role="form" class="form-inline">
                            <div class="form-group col-sm-7"><label>Cari Status Audit</label><br>
                                <div class="form-group">
                                <select name="status_unit" class="form-control" id="status_unit" onchange="tampil()">
                                <option value="hide">--- Pilih Status Audit Unit ---</option>
                                <option value="Sesuai" id="sesuai">Sesuai</option>
                                <option value="Belum Sesuai" id="belum_sesuai">Belum Sesuai</option>
                                <option value="Tidak Ditemukan" id="tidak_ditemukan">Tidak Ditemukan</option>
                                </select>
                                </div>

                                <button class="btn btn-w-m btn-success" id="caribtn"  onclick="showhide()">Cari Data</button>
                                <input type="submit" value="Add Data" id="add" name="add" class="btn btn-success"  onclick="show()">
                            </div>
                            </form>                          -->
                                   
                           
                            </div>
                        
                    </div>
                </div>
            </div>

                    <div class="row"  id="tampil">
                        <div class="col-lg-12" >
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example gray-bg" >
                    <thead>
                    <tr >
                        <th class="text-center" width="3%">No</th>
                        <th class="text-center" width="3%">Aksi</th>
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
                        <th class="text-center">Tahun</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Kode Item</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Is Ready</th>
                        <th class="text-center">Tanggal Audit</th>
                    </tr>
                    </thead>
                    <tbody id="audit_unit">
                    </tbody >
                    <tfoot>
                    <tr>
                        <th class="text-center" width="3%">No</th>
                        <th class="text-center" width="3%">Aksi</th>
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
                        <th class="text-center">Tahun</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Kode Item</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Is Ready</th>
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



