<div class="wrapper wrapper-content m-t-xl wrapper wrapper-content animated fadeInRight">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-info-circle"></i> Masukkan Kode Barang                       
                </div>
                    <div class="panel-body">
                    <form method="post" id="FormBarcode" class="form-horizontal" action="<?php echo base_url() ?>barcode/post_barcode">
                    <div>
                                <div class="form-group"><label class="col-sm-2 control-label">Masukkan Kode Inventory</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="id_inventory" id="id_inventory"></div>
                    </div>

                    <div>
                                <div class="col-sm-4 text-right">
                                <input type="button" value="Batal" class="btn btn-m btn-danger" id="batal" onclick="hide()">
                                <input type="submit" class="btn btn-m btn-success" id="submit" name="submit" value="Submit"> 
                                </div>
                    </div>        
                            
                    </form>    
                    </div>
            </div>
    </div>