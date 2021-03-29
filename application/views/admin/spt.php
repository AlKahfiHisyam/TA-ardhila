        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
            </div>
			<div class="card mb-3">
			  <div class="card-header bg-primary text-white">
			    Filter Data SPT
			  </div>
			  <div class="card-body">
			    <form class="form-inline">
					  <div class="form-group mb-3">
					    <label for="staticEmail2" class="">Bulan : </label>
					    <select class="form-control ml-2" name="bulan">
					    	<option value="">--Pilih Bulan--</option>
					    	<option value="01">Januari</option>
					    	<option value="02">Februari</option>
					    	<option value="03">Maret</option>
					    	<option value="04">April</option>
					    	<option value="05">Mei</option>
					    	<option value="06">Juni</option>
					    	<option value="07">Juli</option>
					    	<option value="08">Agustus</option>
					    	<option value="09">September</option>
					    	<option value="10">Oktober</option>
					    	<option value="11">November</option>
					    	<option value="12">Desember</option>
					    </select>
					  </div>

					  <form class="form-inline">
					  <div class="form-group mb-2 ml-5">
					    <label for="staticEmail2" class="">Tahun : </label>
					    <select class="form-control ml-3" name="tahun">
					    	<option value="">--Pilih Tahun--</option>
					    	<?php $tahun = date('Y');
					    	for($i=2021;$i<$tahun+8;$i++) { ?>
					    		<option value="<?php echo $i ?>"><?php echo $i ?></option>
					    	<?php } ?>
					    </select>
					  </div>

					  
					    <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i>Tampilkan Data</button>
					    <a href="<?php echo base_url('admin/spt/tambahData') ?>" class="btn btn-success mb-2 ml-3"><i class="fas fa-plus"></i>Input SPT</a>
					  </div>
					</form>
			  </div>
			</div>

			<?php 
				if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
					$bulan = $_GET['bulan'];
					$tahun = $_GET['tahun'];
					$bulantahun = $bulan.$tahun;
				}else{
					$bulan = date('m');
					$tahun = date('Y');
					$bulantahun = $bulan.$tahun;
				}
			 ?>

            <div class="alert alert-info px-3">
            	Menampilkan Data SPT Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span>  Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
            </div>

			<table class="table table-bordered table-striped">
            	<tr>
            		<td class="text-center">No</td>
            		<td class="text-center">NOP</td>
            		<td class="text-center">NPWP</td>
            		<td class="text-center">Wajib Pajak</td>
            		<td class="text-center">Bumi</td>
            		<td class="text-center">Bangunan</td>
            		<td class="text-center">Alamat Pemilik</td>
            		<td class="text-center">Alamat Objek</td>
            		<td class="text-center">NJOP Dasar</td>
            		<td class="text-center">NJOPTK</td>
            		<td class="text-center">NJOP Perhitungan</td>
            		<td class="text-center">PBB Terutang</td>
            		<td class="text-center">Jatuh Tempo</td>
            		<td class="text-center">Action</td>
            	</tr>

            	<?php $no=1; foreach($spt as $s) : ?>
        		<tr>
        			<td><?php echo $no++ ?></td>
        			<td><?php echo $s->nop ?></td>
        			<td><?php echo $s->npwp ?></td>
        			<td><?php echo $s->nama_wajibpajak ?></td>
        			<td><?php echo $s->luas_bumi ?></td>
        			<td><?php echo $s->luas_bangunan ?></td>
        			<td><?php echo $s->alamat_wajibpajak ?></td>
        			<td><?php echo $s->alamat_objekpajak ?></td>
        			<td>Rp.<?php echo number_format($s->njop_dasar,0,',','.') ?></td>
        			<td>Rp.<?php echo number_format($s->njoptk,0,',','.') ?></td>
        			<td>Rp.<?php echo number_format($s->njop_dasar - $s->njoptk,0,',','.') ?></td>
        			<td>Rp.<?php echo number_format($s->njop_perhitungan,0,',','.') ?></td>
        			<td><?php echo $s->tgl_jatuhtempo ?></td>

        			<td>
        				<center>
        					<a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/spt/updateData/'.$s->id_spt) ?>"><i class="fas fa-edit"></i></a>
        					<a onclick="return confirm('Yakin Hapus')"class="btn btn-sm btn-danger" href="<?php echo base_url('admin/spt/deletedata/'.$s->id_spt) ?>"><i class="fas fa-trash"></i></a>
        				</center>
        			</td>
        		</tr>
        	<?php endforeach; ?>
            </table>


        

        </div>
        <!-- /.container-fluid -->





