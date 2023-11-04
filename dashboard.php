<div class="row">
  <div class="col-md-12">
    <h2><b>Inventori Dhiya Petshop</b></h2>
    <h5>Pencatatan Keluar Masuk Barang</h5>
  </div>
</div>
<hr />
<?php 
	// menghitung penjualan hari ini 
		include "koneksi.php";
		$hari = date("Y-m-d");
		$qry = mysqli_query($conn, "SELECT * FROM penjualan WHERE tgl_penjualan = '$hari'");
		$hitungpenjualan = mysqli_num_rows($qry);
		
	// menghitung pembelian hari ini
		$qry2 = mysqli_query($conn, "SELECT * FROM pembelian WHERE tgl_pembelian = '$hari'");
		$hitungpembelian = mysqli_num_rows($qry2);
?>
<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-6">           
		<div class="panel panel-back noti-box">
            <span class="icon-box bg-color-green set-icon">
                <i class="fa fa-money"></i>
            </span>
           	<div class="text-box" >
                <p class="main-text"><?php echo $hitungpenjualan; ?> New</p>
                <p class="text-muted">Penjualan Hari Ini</p>
            </div>
        </div>
		</div>
	<div class="col-md-6 col-sm-6 col-xs-6">           
		<div class="panel panel-back noti-box">
            <span class="icon-box bg-color-red set-icon">
                <i class="fa fa-shopping-cart"></i>
            </span>
        	<div class="text-box" >
                <p class="main-text"><?php echo $hitungpembelian; ?> New</p>
                <p class="text-muted">Pembelian Hari Ini</p>
            </div>
        </div>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Barang
            </div>
            <div class="panel-body">
                <div class="table">
                    <table class="table table-striped table-bordered table-hover" id="tabelku">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama</th>
                                <th>Satuan</th>
                                <th>Harga Jual</th>
                                <th>Harga Beli</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
								$no = 1;
                                $qry = mysqli_query($conn, "SELECT * FROM barang ORDER BY nama_barang ASC");
								while ($data = mysqli_fetch_array($qry)) { ?>
							
								<tr class="odd gradeX">
									<td><?php echo $no++; ?></td>
									<td><?php echo $data['kd_barang']; ?></td>
									<td><?php echo $data['nama_barang']; ?></td>
									<td><?php echo $data['satuan']; ?></td>
									<td><?php echo number_format($data['harga_jual']); ?></td>
									<td><?php echo number_format($data['harga_beli']); ?></td>
									<td><?php echo $data['stok']; ?></td>
									<td>
										<a href="index.php?page=ubahbarang&id=<?php echo $data['kd_barang']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a>
										<a href="index.php?page=barang&hapus=<?php echo $data['kd_barang']; ?>" class="btn btn-danger btn-xs" id="alertHapus"><i class="fa fa-trash"></i> Hapus</a>
									</td>
								</tr>
							
							<?php
								}
                            ?>
                            
                        </tbody>
                    </table>
                </div>   
            </div>
            <div class="panel-footer">
                <a href="index.php?page=tambahbarang" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Barang</a>
				<a href="laporan/cetakopname.php" class="btn btn-warning"><i class="fa fa-print"></i> Cetak Stok</a>
            </div>
        </div>