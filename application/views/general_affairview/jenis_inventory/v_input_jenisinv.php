<div class="ibox float-e-margins animated fadeInDown">
            <div class="panel panel-success">     
                <div class="panel-heading">
                    <i class="fa fa-info-circle"></i> Input Jenis Inventory                        
                </div>  
                <div class="panel-body">
                    <form method="post" id="FormJenisInv" class="form-horizontal" action="<?php echo base_url() ?>master_data/post_jenis_inv">
                    <div>
                                <div class="form-group"><label class="col-sm-2 control-label">ID Jenis Inventory</label>
                                <div class="col-sm-4"><input type="text" class="form-control" name="idjenis_inventory" id="idjenis_inventory" ></div>
                    </div>

                    <div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jenis Inventory</label>
                                <div class="col-sm-6"><input type="text" class="form-control" name="jenis_inventory" id="jenis_inventory"></div>

                                <div class="col-sm-4 text-right">
                                <input type="button" value="Batal" class="btn btn-m btn-danger" id="batal" onclick="hide()">
                                <input type="submit" class="btn btn-m btn-success" id="submit" name="submit" value="Submit"> 
                                </div>
                    </div>        
                            
                    </form>    
                    </div>
                    </div>
                </div>