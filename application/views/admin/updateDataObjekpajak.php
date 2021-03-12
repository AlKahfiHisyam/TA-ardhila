        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>

            </div>

            <div class="card" style="width: 60%; margin-bottom: 100px">
                <div class="card-body">

                    <?php foreach ($objekpajak as $o) : ?>
                        <form method="POST" action="<?php echo base_url('admin/dataObjekpajak/updateDataAksi') ?>">


                            <div class="form-group">
                                <label>NOP</label>
                                <input type="hidden" name="id_objekpajak" class="form-control" value="<?php echo $o->id_objekpajak  ?>">
                                <input type="text" name="nop" class="form-control" value="<?php echo $o->nop  ?>">
                                <?php echo form_error('nop', '<div class="text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Nama Wajib Pajak</label>
                                <select type="text" name="nama_wajibpajak" class="form-control">
                                    <option selected value="<?php echo $o->id_wajibpajak?>"><?php echo $o->nama_wajibpajak?></option>
                                    <?php foreach($wajibpajak as $wp):?>
                                        <option value="<?php echo $wp->id_wajibpajak?>"><?php echo $wp->nama_wajibpajak?></option>
                                    <?php endforeach;?>    
                                </select>                          
                            </div>
                            <div class="form-group">
                                <label>Alamat Objek Pajak</label>
                                <input type="text" name="alamat_objekpajak" class="form-control" value="<?php echo $o->alamat_objekpajak  ?>">
                                <?php echo form_error('alamat_objekpajak', '<div class="text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Luas Bumi</label>
                                <input type="number" name="luas_bumi" class="form-control" value="<?php echo $o->luas_bumi  ?>">
                                <?php echo form_error('luas_bumi', '<div class="text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Luas Bangunan</label>
                                <input type="number" name="luas_bangunan" class="form-control" value="<?php echo $o->luas_bangunan ?>">
                                <?php echo form_error('luas_bangunan', '<div class="text-small text-danger"></div>') ?>
                            </div>

                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    <?php endforeach; ?>
                </div>
            </div>



        </div>
        <!-- /.container-fluid -->