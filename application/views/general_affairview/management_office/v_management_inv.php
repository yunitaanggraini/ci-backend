<div class="wrapper wrapper-content m-t-xl wrapper wrapper-content animated fadeInRight">
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                            <form method="post" class="form-horizontal" id="FormInventory" action="<?php echo base_url() ?>inventory/post_inventory">
                        <div class="ibox-title">
                            <h5 class="col-md-10">Management Inventory</h5>
                            <div class="col-sm-2 text-right">
                            <a href="<?php echo base_url('transaksi/management_office') ?>" type="submit" class="btn btn-m btn-danger">Batal</a>
                            <input type="submit" class="btn btn-m btn-success" id="submit" name="submit" value="Submit">
                            </div>
                        </div>
                        <div class="panel-body">
                        
                                <div class="form-group"><label class="col-sm-2 control-label">ID transaksi_inv</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="idtransaksi_inv" id="idtransaksi_inv"></div>
                                    <div class="col-sm-2"><input type="submit" class="btn btn-m btn-success" id="submit" name="submit" value="Generate">
                                    </div>
                            </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Status Inventory</label>
                                    <div class="col-sm-5"><select class="form-control m-b" name="idstatus_inventory" id="OptStatusInv">

                                    </select>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Jenis Inventory</label>
                                    <div class="col-sm-5"><select class="form-control m-b" name="idjenis_inventory" id="OptJenisInv">
                                        
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Sub Inventory</label>
                                    <div class="col-sm-5"><select class="form-control m-b" name="idsub_inventory" id="OptSubInv" disabled>
                                        
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Nilai Awal</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="nilai_awal">
                                    <span class="help-block m-b-none">* Harga Sebelum PPn</span>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">DDP</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="ddp">
                                </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Nilai Asset</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="nilai_asset">
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Nilai Total Keseluruhan</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="nilai_total_keseluruhan">
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Tanggal Barang Terima</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="tanggal_barang_terima">
                                    </div>
                                </div>
                                
                                <div class="form-group"><label class="col-sm-2 control-label">Vendor</label>
                                    <div class="col-sm-5"><select class="form-control m-b" name="id_vendor" id="OptVendor">
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Jenis Pembayaran</label>
                                    <div class="col-sm-5"><select class="form-control m-b" name="jenis_pembayaran" id="OptJenisPemb">
                                        <option value="">--- Pilih Jenis Pembayaran ---</option>
                                        <option id="Cash">Cash</option>
                                        <option id="Kredit">Kredit</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Cabang</label>
                                    <div class="col-sm-5"><select class="form-control m-b" name="id_cabang" id="OptCabang">
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Lokasi</label>
                                    <div class="col-sm-5"><select class="form-control m-b" name="id_lokasi" id="OptLokasi" disabled>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Pengguna</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="nama_pengguna">
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="keterangan">
                                    </div>
                                </div>
                                
                                <div class="form-group"><label class="col-sm-2 control-label">Stok</label>
                                    <div class="col-sm-5"><select class="form-control m-b" name="stok" id="stok">
                                        <option value="YA">YA</option>
                                        <option valuer="TIDAK">TIDAK</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Foto</label>
                                    <div class="col-sm-5">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <span class="btn btn-default btn-file"><span class="fileinput-new">Select file</span>
                                        <span class="fileinput-exists">Change</span><input type="file" name="foto"/></span>
                                        <span class="fileinput-filename"></span>
                                        <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                                    </div> 
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Asal Hadiah</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="asal_hadiah" id="asal_hadiah">
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">PPn</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="ppn" id="ppn">
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Apakah Menggunakan PPn atau Tidak?</label>
                                    <div class="col-sm-5"><select class="form-control m-b" name="ket_ppn" id="ket_ppn">
                                        <option value="YA">YA</option>
                                        <option valuer="TIDAK">TIDAK</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Merk</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="merk" id="merk">
                                    </div>
                                </div>
                                
                                <div class="form-group"><label class="col-sm-2 control-label">Aksesoris Tambahan</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="aksesoris_tambahan">
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Serial Number</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="serial_number">
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Uang Muka</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="uang_muka">
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Cicilan Perbulan</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="cicilan_perbulan">
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Tenor</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="tenor">
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Nilai Total</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="nilai_total">
                                    </div>
                                </div>
                        </div>
                    </div>
                            </form>
                </div>
            </div>
        </div>
</div>