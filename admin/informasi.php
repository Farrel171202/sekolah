<?php include 'header.php' ?>

		<!-- content -->
		<div class="content">

			<div class="container">

				<div class="box">

					<div class="box-header">
						Informasi
					</div>

					<div class="box-body">
						
						<a href="tambah-informasi.php" class="text-green"><i class="fa fa-plus"></i>  Tambah</a>

						<?php
							if(isset($_GET['success'])){
								echo "<div class='alert alert-success'>".$_GET['success']."</div>";
							}
						?>

						<form action="">
							<div class="input-group">
								<input type="text" name="key" placeholder="Pencarian">
								<button type="submit"><i class="fa fa-search"></i></button>
							</div>
						</form>


						<table class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Handphone</th>
									<th>Gambar</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php
								$no = 1;

									$where = " WHERE 1=1 ";
									if(isset($_GET['key'])){
										$where .= " AND judul LIKE '%".addslashes($_GET['key'])."%' ";
									}

									$informasi = mysqli_query($conn, "SELECT * FROM pesanan $where ORDER BY id DESC");
									if(mysqli_num_rows($informasi) > 0){
										$total = 0;
										while($p = mysqli_fetch_array($informasi)){
								?>

								<tr>
									<td><?= $no++ ?></td>
									<td><?= $p['nama'] ?></td>
									<td><?=  $p['handphone']?></td>
									<td><img src="../uploads/jurusan/<?= $p['gambar'] ?>" width="100px"></td>
									<td>
										<a href="edit-informasi.php?id=<?= $p['id'] ?>" title="Edit Data" class="text-orange"><i class="fa fa-edit"></i></a> 
										<a href="hapus.php?idinformasi=<?= $p['id'] ?>" onclick="return confirm('Yakin ingin hapus ?')" title="Hapus Data" class="text-red"><i class="fa fa-times"></i></a>
										<a href="#" class="badge-confirm" onclick="return confirm('Konfirmasi pesanan anda? ?')">Konfirmasi</a>
									</td>
								</tr>

							<?php }}else{ ?>
								<tr>
									<td colspan="5">Data tidak ada</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>

					</div>

				</div>

			</div>

		</div>

<?php include 'footer.php' ?>