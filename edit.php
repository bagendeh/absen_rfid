

<?php 
	include "koneksi.php";

	//baca ID data yang akan di edit
	$id = $_GET['id'];

	//baca data karyawan berdasarkan id
	$cari = mysqli_query($konek, "SELECT * FROM siswa where id='$id'");
	$hasil = mysqli_fetch_array($cari);

    if(isset($_POST['btnsimpan']))
    {
        $nokartu    = $_POST['nokartu'];
        $nama       = $_POST['nama'];
        $kelas      = $_POST['kelas'];

        $simpan = mysqli_query($konek, "UPDATE siswa SET nokartu='$nokartu', nama='$nama', kelas='$kelas' where id='$id'");

        
        if($simpan)
        {
			echo "
				<script>
					alert('Tersimpan');
					location.replace('datasiswa.php');
				</script>
			";
		}
		else
		{
			echo "
				<script>
					alert('Gagal Tersimpan');
					location.replace('datasiswa.php');
				</script>
			";
		}

	}
    mysqli_query($konek, "delete from tmprfid");
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include "header.php"; ?>
        <title>Edit Data Siswa</title>
    </head>
<body>

    <?php include "menu.php"; ?>

    <!-- isi -->
    <div class="container-fluid">
        <h3>Edit Data Siswa</h3>

        <form method="POST">
			<div class="form-group">
				<label>No. Kartu</label>
				<input type="text" name="nokartu" id="nokartu" placeholder="Tempelkan Kartu RFID" class="form-control" style="width: 200px" value="<?php echo $hasil['nokartu']; ?>">
			</div>

            <div class="form-group">
            <label>Nama Siswa</label>
            <input type="text" name="nama" id="nama" placeholder
            ="Nama Siswa" class="form-control" style="width:200px" value="<?php echo $hasil['nama']; ?>">
            </div>

            <div class="form-group">
            <label>Kelas</label>
            <select type="text" name="kelas" id="kelas" class="form-control" style="width:200px">
            <option ></option>
            <option value="12 TKJ 1">12 TKJ 1</option>
            <option value="12 TKJ 2">12 TKJ 2</option>
            <option value="12 TKJ 3">12 TKJ 3</option>  
            </select>
            </div>

            <button class="btn btn-primary" name="btnsimpan" id="btnsimpan">simpan</button>
        </form>
    </div>

    <?php include "footer.php"; ?>
