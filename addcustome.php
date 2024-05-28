	<?php include 'header.php'; ?>
	
	<div class="section">
		<div class="container">

		<p class="lead" style="margin: 25px 0"><a href="jurusan.php">Catalog</a> > 
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="uploads/jurusan/baju_polo.jpg">
        </div>
        <div class="col-md-6">
          <h4>Custome</h4>
          <p></p>
          <h4>Masukan Ukuran Baju</h4>
          <form method="post">
            <div class="modal-body">
              <label> masukan gambar</label>
              <input type="text" name="masukan_gambar"class="form-control" required><br>
              <label> ukuran</label></select><br>
              <select class="form-control" name="ukuran">
                <option selected disabled>default</option>
                <option value="3_x_4">3 x 4</option>
                <option value="3_x_4">3 x 4</option>
                <option value="3_x_4">3 x 4</option>
              </select><br>
              <label> jumlah</label>
              <input type="text" name="jumlah"class="form-control" required></select><br>
            <input type="hidden" name="bookisbn" >
            <input type="submit" name="addlogo" class="btn btn-primary">
          </form>
       	</div>
      </div>
		</div>
	</div>

	<?php include 'footer.php'; ?>