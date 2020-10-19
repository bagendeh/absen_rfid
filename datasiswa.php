<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
    <title>Data Siswa</title>
</head>
<body>

    <?php include "menu.php"; ?>

    <!--isi-->

    <div class="container-fluid">
        <h3>Data Siswa</h3>
        <table class="table table-bordered">
            <thead>
                <tr style="background-color: grey; color: white;">
                    <th style="width: 10px; text-align: center">No. </th>
                    <th style="width: 200px; text-align: center">No. Kartu</th>
                    <th style="width: 300px; text-align: center">Nama</th>
                    <th style="width: 200px; text-align: center">Kelas</th>
                    <th style="width: 150px; text-align: center">Action</th>
                </tr>
            </thead>
            <tbody>
                
                <?php 
                    //koneksi 
                    include "koneksi.php";

                    //read data karyawan
                    $sql = mysqli_query($konek, "SELECT * FROM siswa");
                    $no = 0;
                    while($data = mysqli_fetch_array($sql))
                    {
                        $no++;
                ?>

                <tr>
                    <td> <?php echo $no; ?></td>
                    <td> <?php echo $data['nokartu']; ?> </td>
                    <td> <?php echo $data['nama']; ?> </td>
                    <td> <?php echo $data['kelas']; ?> </td>
                    <td> 
                    <a href="edit.php?id=<?php echo $data['id']; ?>"> Edit</a> | <a href="hapus.php?id=<?php echo $data['id']; ?>"> Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- button tambah data -->
        <a href="tambah.php"> <button class="btn btn-primary">Tambah Data Siswa
                    </button></a>
    </div>

    <?php include "footer.php"; ?>

</body>
</html>