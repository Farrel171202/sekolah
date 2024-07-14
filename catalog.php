<?php include 'header.php'; ?>
    
    <div class="section">
        <div class="container">
            <p class="lead" style="margin: 5px 0"><a href="jurusan.php">Catalog</a> >         
                <?php
                $tanggal = date_default_timezone_set("Asia/Jakarta");

                $page = $_GET['page'];
                
                $ambil = mysqli_query($conn, "SELECT page FROM jurusan where page = '$page'");
                $pages = array();
                while ($row = mysqli_fetch_assoc($ambil)) {
                    $pages[] = $row['page'];
                }

                if ($page == 'addlogo'){
                ?>
                <div class="row">
                <div class="col-md-3 text-center">
                    <img class="img-responsive img-thumbnail" src="uploads/jurusan/logo.png" style="width:250px">
                </div>
                
                <div class="col-md-6">
                    <h4>Logo</h4>
                    <p></p>
                    <h4>Masukan Data Logo</h4>
                    <div class="box">
                        <div class="box-body">
                        <form method="post" enctype="multipart/form-data">
                            <class="modal-body">
                            <div class="form-group">
                                <label>Masukkan nama</label>
                                <input type="text" name="nama" class="input-control"required>
                            </div>
                            <div class="form-group">
                                <label>Masukkan nomor hp</label>
                                <input type="text" name="hp" class="input-control"required>
                            </div>
                            <div class="form-group">
                                <label>Masukkan warna</label>
                                <input type="text" name="warna" class="input-control"required>
                            </div>
                            <div class="form-group">
                                <label>Masukan gambar</label>
                                <input type="file" name="gambar" class="input-control" required>
                            </div>
                            <div class="form-group">
                                <label>Ukuran</label></select>
                                <select class="input-control" name="ukuran">
                                    <option selected disabled>Ukuran</option>
                                    <option value="3x4">3 x 4</option>
                                    <option value="4x6">4 x 6</option>
                                    <option value="8x12">8 x 12</option>
                                </select>
                            </div>
                            <div class="form-group">>
                                <label>Jumlah</label>
                                <input type="text" name="jumlah" class="input-control" required></select>
                            <div>
                            <input type="text" name="jenis" value="logo" class="form-control"hidden>
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
                                $rename 	= 'logo'.time().'.'.$formatfile;

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

            <?php 
                } else if($page == 'addbet'){
            ?>
                <div class="row">
                <div class="col-md-3 text-center">
                    <img class="img-responsive img-thumbnail" src="uploads/jurusan/bet.jpeg" style="width:250px">
                </div>
                
                <div class="col-md-6">
                    <h4>Bet</h4>
                    <p></p>
                    <h4>Masukan Data Bet</h4>
                    <div class="box">
                        <div class="box-body">
                        <form method="post" enctype="multipart/form-data">
                            <class="modal-body">
                            <div class="form-group">
                                <label>Masukkan nama</label>
                                <input type="text" name="nama" class="input-control"required>
                            </div>
                            <div class="form-group">
                                <label>Masukkan nomor hp</label>
                                <input type="text" name="hp" class="input-control"required>
                            </div>
                            <div class="form-group">
                                <label>Masukkan warna</label>
                                <input type="text" name="warna" class="input-control"required>
                            </div>
                            <div class="form-group">
                                <label>Masukan gambar</label>
                                <input type="file" name="gambar" class="input-control" required>
                            </div>
                            <div class="form-group">
                                <label>Ukuran</label></select>
                                <select class="input-control" name="ukuran">
                                    <option selected disabled>Ukuran</option>
                                    <option value="3x4">3 x 4</option>
                                    <option value="4x6">4 x 6</option>
                                    <option value="8x12">8 x 12</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="text" name="jumlah"class="input-control" required></select>
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

            <?php 
            }else if($page == 'addcustome'){
            ?>
                <div class="row">
                <div class="col-md-3 text-center">
                    <img class="img-responsive img-thumbnail" src="uploads/jurusan/baju_polo.jpg" style="width:250px">
                </div>
                
                <div class="col-md-6">
                    <h4>Custome</h4>
                    <p></p>
                    <h4>Masukan Data Custome Baju</h4>
                    <div class="box">
                        <class="box-body">
                        <form method="post" enctype="multipart/form-data">
                            <class="modal-body">
                            <div class="form-group">
                                <label>Masukkan nama</label>
                                <input type="text" name="nama" class="input-control"required>
                            </div>
                            <div class="form-group">
                                <label>Masukkan nomor hp</label>
                                <input type="text" name="hp" class="input-control"required>
                            </div>
                            <div class="form-group">
                                <label>Masukkan warna</label>
                                <input type="text" name="warna" class="input-control"required>
                            </div>
                            <div class="form-group">
                                <label>Masukan gambar</label>
                                <input type="file" name="gambar"class="input-control" required>
                            </div>
                            <div class="form-group">
                                <label>Ukuran</label></select>
                                <select class="input-control" name="ukuran">
                                    <option selected disabled>Ukuran</option>
                                    <option value="3x4">3 x 4</option>
                                    <option value="4x6">4 x 6</option>
                                    <option value="8x12">8 x 12</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="text" name="jumlah"class="input-control" required></select>
                            <div>
                            <input type="text" name="jenis" value="Custome Baju" class="form-control"hidden>
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
                            $rename 	= 'custome'.time().'.'.$formatfile;
                            
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

            <?php 
            }
            ?>
        </div>
    </div>


<?php include 'footer.php'; ?>