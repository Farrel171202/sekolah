<?php include 'header.php' ?>


<!-- content -->
<div class="content">

    <div class="container">

        <div class="box">

            <div class="box-header">
                Keranjang
            </div>

            <div class="box-body">
            

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
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;

                            $where = " WHERE 1=1 ";
                            $key = $_GET['key'];
                            if(isset($_GET['key'])){
                                $where .= "AND pesanan.handphone = '$key'";

                            $informasi = mysqli_query($conn, "SELECT * FROM pesanan inner join jurusan on jurusan.jenis = pesanan.jenis $where ORDER BY pesanan.id DESC");
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
                            <td>
                                <a href="edit-informasi.php?id=<?= $p['id'] ?>" title="Edit Data" class="text-orange"><i class="fa fa-edit"></i></a> 
                                <a href="hapus.php?idinformasi=<?= $p['id'] ?>" onclick="return confirm('Yakin ingin hapus ?')" title="Hapus Data" class="text-red"><i class="fa fa-times"></i></a>
                                <a href="#" class="text-red" onclick="return confirm('Apakah anda yakin pesanan anda sudah sesuai?')">Konfirmasi</a>
                            </td>
                        </tr>

                    <?php }}else{ ?>
                        <tr>
                            <td colspan="5">Data tidak ada</td>
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
