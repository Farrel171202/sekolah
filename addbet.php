<?php include 'header.php'; ?>

<div class="section">
    <div class="container">

    <p class="lead" style="margin: 25px 0"><a href="jurusan.php">Catalog</a> > 
<div class="row">
    <div class="col-md-3 text-center">
    <img class="img-responsive img-thumbnail" src="uploads/jurusan/bet.jpeg">
    </div>
    <div class="col-md-6">
    <h4>Bet</h4>
    <p></p>
    <h4>Masukan Data Bet</h4>
    <form method="post">
        <div class="modal-body">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
        <label>Nomor Handphone</label>
        <input type="text" name="handphone" class="form-control" required>
        <label>Masukan Gambar</label>
        <input type="text" name="gambar"class="form-control" required><br>
        <label>Ukuran</label></select><br>
        <select class="form-control" name="ukuran">
            <option selected disabled>default</option>
            <option value="3x4">3 x 4</option>
            <option value="3x4">3 x 4</option>
            <option value="3x4">3 x 4</option>
        </select><br>
        <label>Jumlah</label>
        <input type="text" name="jumlah"class="form-control" required></select><br>
        <input type="submit" name="addlogo" class="btn btn-primary">
    </form>
    </div>
</div>

    </div>
</div>

<?php include 'footer.php'; ?>