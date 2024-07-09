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
									<th>Jumlah</th>
									<th>Harga</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
							<?php
                        $no = 1;

                            $where = " WHERE 1=1 ";
                            
                            $informasi = mysqli_query($conn, "SELECT p.id, p.nama, p.handphone, p.gambar, p.jumlah, p.status, j.price FROM pesanan p inner join jurusan j on p.jenis = j.jenis $where ORDER BY p.id DESC");
                            if(mysqli_num_rows($informasi) > 0){
                                $total = 0;
                                while($p = mysqli_fetch_array($informasi)){
                                    $total += ($p['jumlah']*$p['price'])
                        ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $p['nama'] ?></td>
                            <td><?=  $p['handphone']?></td>
                            <td><img src="../uploads/jurusan/<?= $p['gambar'] ?>" width="100px"></td>
                            <td><?= $p['jumlah'] ?></td>
                            <td>Rp.<?= $p['jumlah']*$p['price'] ?></td>
                            <td><?= $p['status'] ?></td>
							<td>
								<a href="edit-informasi.php?id=<?= $p['id'] ?>" title="Edit Data" class="text-orange"><i class="fa fa-edit"></i></a> 
							</td>
                        </tr>

                    <?php }}else{ ?>
                        <tr>
                            <td colspan="7">Data tidak ada</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

					</div>

				</div>

			</div>

		</div>

<?php include 'footer.php' ?>