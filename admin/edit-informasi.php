<?php include 'header.php' ?>

<?php
	$informasi 	= mysqli_query($conn, "SELECT * FROM pesanan WHERE id = '".$_GET['id']."' ");

	if(mysqli_num_rows($informasi) == 0){
		echo "<script>window.location='informasi.php'</script>";
	}

	$p = mysqli_fetch_object($informasi);
?>

		<!-- content -->
		<div class="content">

			<div class="container">

				<div class="box">

					<div class="box-header">
						Edit Pesanan
					</div>

					<div class="box-body">
						
						<form action="" method="POST" enctype="multipart/form-data">

							<div class="form-group">
                                <label>Proses saat ini</label></select>
                                <select class="input-control" name="status">
                                    <option selected disabled><?= $p->status ?></option>
                                    <option value="Batal">Belum Proses</option>
									<option value="Proses">Proses</option>
                                    <option value="Selesai">Selesai</option>
                                    <option value="Batal">Batal</option>
                                </select>
                            </div>

							<button type="button" class="btn" onclick="window.location = 'informasi.php'">Kembali</button>
							<input type="submit" name="submit" value="Simpan" class="btn btn-blue">

						</form>

						<?php

							if(isset($_POST['submit'])){

								$status 	= addslashes($_POST['status']);

								$update = mysqli_query($conn, "UPDATE pesanan SET status = '".$status."' WHERE id = '".$_GET['id']."'");


								if($update){
									echo "<script>window.location='informasi.php?success=Edit Data Berhasil'</script>";
								}else{
									echo 'gagal edit '.mysqli_error($conn);
								}

							}

						?>

					</div>

				</div>

			</div>

		</div>

<?php include 'footer.php' ?>