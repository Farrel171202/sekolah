	<?php include 'header.php'; ?>
	
	<div class="section">
		<div class="container">
			<h3 class="text-center">About Us</h3>
			
			<div class="col-4">
				<p style="margin-bottom: 10px;"><b>Alamat :</b> <br><?= $d->alamat ?></p>
				<p style="margin-bottom: 10px;"><b>Telepon :</b> <br><?= $d->telepon ?></p>
				<p style="margin-bottom: 10px;"><b>Email :</b> <br><?= $d->email ?></p>
			</div>

			<div class="box-gmaps">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.8474036446345!2d106.9092564!3d-6.2991482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed265f8d63c3%3A0x287fa824fcbfa97c!2sSEMAR%20JAYA%20BORDIR!5e0!3m2!1sen!2sid!4v1625246123456!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>


			</div>
			
		</div>
	</div>

	<?php include 'footer.php'; ?>