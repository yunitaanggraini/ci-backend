<div id="wrapper">
<div class="wrapper wrapper-content m-t-xl animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Filter Report Audit</h5>

                    </div>
                    <div class="ibox-content">
                        <div class="row form-horizontal">
                        <div class="col-sm-7">
                            <div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tanggal Awal</label>
                                    <div class="col-sm-9"><input type="date" class="form-control" id="tanggal_awal">
                                    </div>
                                </div>        
                            </div>        
                    
                            <div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tanggal_Akhir</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="tanggal_akhir">
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Cabang</label>
                                    <div class="col-sm-9">
                                    <select class="form-control m-b" name="id_cabang" id="OptCabang"></select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-5 text-center m-t-lg">
                        <a href="<?php echo site_url('laporan_auditor/filter_cabang'); ?>" type="button" class="btn btn-m btn-success">Next</a>
                        </div>
                    </div></div>

                </div>
            </div>
        </div>
    </div>