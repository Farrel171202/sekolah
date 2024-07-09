<?php include 'header.php' ?>

<?php
	$keranjang 	= mysqli_query($conn, "SELECT * FROM pesanan WHERE id = '".$_GET['id']."' ");

	if(mysqli_num_rows($keranjang) == 0){
		echo "<script>window.location='jurusan.php'</script>";
	}

	$p = mysqli_fetch_object($keranjang);
?>
<!-- content -->
<div class="content">

    <div class="container">

        <div class="box">

            <div class="box-header">
                Edit Keranjang
            </div>

            <div class="col-md-6">
                    <div class="box">
                        <div class="box-body">
                        <form method="post" enctype="multipart/form-data">
                            <class="modal-body">
                            <div class="form-group">
                                <label>Warna</label>
                                <input type="text" name="warna" class="input-control" value="<? $p->warna ?>" required>
                            </div>
                            <div class="form-group">
								<label>Gambar</label>
								<img src="uploads/jurusan/<?= $p->gambar ?>" width="200px" class="image">
								<input type="hidden" name="gambar2" value="<?= $p->gambar ?>">
								<input type="file" name="gambar" class="input-control">
							</div>
                            <div class="form-group">
                                <label>Ukuran</label></select>
                                <select class="input-control" name="ukuran" value="<? $p->nama ?>">
                                    <option selected disabled>Ukuran</option>
                                    <option value="3x4">3 x 4</option>
                                    <option value="4x6">4 x 6</option>
                                    <option value="8x12">8 x 12</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="text" name="jumlah"class="input-control" value="<? $p->jumlah ?>" required></select>
                            <div>
                            <input type="text" name="jenis" value="bet" class="form-control"hidden>
                            <input type="submit" name="submit" class="btn btn-primary">
                        </form>
                        <?php
                        if(isset($_POST['submit'])){
                            // print_r($_FILES['gambar']);
                            $nama 	= addslashes(ucwords($_POST['nama']));
                            $hp 	= addslashes($_POST['hp']);
                            $jenis 	= addslashes($_POST['jenis']);
                            $warna 	= addslashes($_POST['warna']);
                            $ukuran = addslashes($_POST['ukuran']);
                            $jumlah = addslashes($_POST['jumlah']);
                        
                            $filename 	= $_FILES['gambar']['name'];
                            $tmpname 	= $_FILES['gambar']['tmp_name'];
                            $filesize 	= $_FILES['gambar']['size'];

                            $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                            $rename 	= 'bet'.time().'.'.$formatfile;
                            
                            $allowedtype = array('png', 'jpg', 'jpeg', 'gif');
                        
                            if(!in_array($formatfile, $allowedtype)){

                                echo '<div class="alert alert-error">Format file tidak diizinkan.</div>';

                            }elseif($filesize > 1000000){

                                echo '<div class="alert alert-error">Ukuran file tidak boleh lebih dari 1 MB.</div>';

                            }else{

                                move_uploaded_file($tmpname, "uploads/jurusan/".$rename);
                                    $simpan = mysqli_query($conn, "INSERT INTO pesanan VALUES (
                                        null,
                                        '".$nama."',
                                        '".$hp."',
                                        '".$jenis."',
                                        '".$warna."',
                                        '".$ukuran."',
                                        '".$rename."',
                                        '".$jumlah."',
                                        '".$tanggal."',
                                        'Belum proses'
                                    )");
                        
                                    if($simpan){
                                        echo '<div class="alert alert-success">Simpan Berhasil</div>';
                                    } else {
                                        echo 'gagal simpan '.mysqli_error($conn);
                                
                            }
                        }
                    }

                ?>
                    </div>
                </div>
                </div>
                    
            </div>

        </div>

    </div>

</div>

<?php include 'footer.php' ?>
