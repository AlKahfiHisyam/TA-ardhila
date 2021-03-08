        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
            </div>
			<div class="card mb-3">
			  <div class="card-header bg-primary text-white">
			    Filter Transaksi Penerimaan Pajak
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
					    <a href="" class="btn btn-success mb-2 ml-3"><i class="fas fa-plus"></i>Input Transaksi</a>
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

            <div class="alert alert-info">
            	Menampilkan Data Transaksi Penerimaan Pajak Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span>  Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
            </div>

            <table class="table table-bordered table-striped">
            	<tr>
            		<td class="text-center">No</td>
            		<td class="text-center">NOP</td>
            		<td class="text-center">NPWP</td>
            		<td class="text-center">Wajib Pajak</td>
            		<td class="text-center">Bumi</td>
            		<td class="text-center">Bangunan</td>
            		<td class="text-center">Alamat Objek</td>
            		<td class="text-center">Alamat Pemilik</td>
            		<td class="text-center">PBB Terutang</td>
            		<td class="text-center">Pembayaran</td>
            		<td class="text-center">Penagih</td>
            		<td class="text-center">Action</td>
            	</tr>
            	
            </table>

        

        </div>
        <!-- /.container-fluid -->





