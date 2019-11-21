<div class="wrapper wrapper-content m-t-xl wrapper wrapper-content animated fadeInRight">
            
            <div class="row">
                <div class="col-lg-12">
                <div class="panel panel-success">
                     <div class="panel-body">
                    <div>
                            <div class="form-group"><label class="col-sm-3 control-label">Pencarian Berdasarkan User Group</label>
                            <div class="col-sm-7"><input type="text" class="form-control" id="Inusergroup"></div>
                                
                            <div class="col-sm-2 text-center">
                                    <button class="btn btn-w-m btn-info" id="caribtn">Cari Data</button>
                            </div>
                            </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12" id="data_input">
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="ibox-title float-e-margins">
                        <h5 class="col-sm-3">List Data User Group</h5>
                        <div class="col-sm-9 text-right">
                        <input type="submit" value="Add Data" id="add" name="add" class="btn btn-success"  onclick="show()">
                        </div>
                      <span id="info_message"></span>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th width="3%">No</th>
                        <th width="5%">Aksi</th>
                        <th>ID User Group</th>
                        <th>User Group</th>
                    </tr>
                    </thead>
                    <tbody id="usergroup">
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Aksi</th>
                        <th>ID User Group</th>
                        <th>User Group</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
                </div>
            </div>
</div>





