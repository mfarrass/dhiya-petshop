<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Barang Pembelian
            </div>
            <div class="panel-body">
                <div class="table">
                    <table class="table table-striped table-bordered table-hover" id="tabelku">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Harga Beli</th>
                                <th>Item</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
							// query untuk menampilkan barang pembelian
								include "koneksi.php";
								$no = 1;
                                $qry = mysqli_query($conn, "SELECT * FROM barang_pembelian WHERE status = '0'");
								$jumdata = mysqli_num_rows($qry);
								if($jumdata < 1) { 
									error_reporting(0);
								} else {
									while ($data = mysqli_fetch_array($qry)) { ?>
									
									<tr class="odd gradeX">
										<td><?php echo $no++; ?></td>
										<td><?php echo $data['nama_barang_beli']; ?></td>
										<td><?php echo $data['satuan']; ?></td>
										<td><?php echo number_format($data['harga_beli']); ?></td>
										<td><?php echo $data['item']; ?></td>
										<td>
											<a href="index.php?page=simpanbaranggudang&kdbl=<?php echo $data['kd_barang_beli']; ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i> Masukan Ke Gudang</button>
										</td>
									</tr>	
							<?php
								}}
                            ?>
                        </tbody>
                    </table>
                </div>   
            </div>
        </div>
    </div>
</div>