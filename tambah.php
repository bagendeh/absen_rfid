

<?php
    include "koneksi.php";

    if(isset($_POST['btnsimpan']))
    {

        $nokartu    = $_POST['nokartu'];
        $nama       = $_POST['nama'];
        $kelas      = $_POST['kelas'];

        $simpan = mysqli_query($konek, "insert into siswa(nokartu, nama, kelas)values('$nokartu', '$nama', '$kelas')");

        
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
        <title>Tambah Data Siswa</title>

        
        <script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
				$("#norfid").load('nokartu.php')
			}, 0); 
		});
	</script>

    </head>
<body>

    <?php include "menu.php"; ?>

    <!-- isi -->
    <div class="container-fluid">
        <h3>Tambah Data Siswa</h3>

        <form method="POST">
            
            <div id="norfid"></div>

            <div class="form-group">
            <label>Nama Siswa</label>
            <input type="text" name="nama" id="nama" placeholder
            ="Nama Siswa" class="form-control" style="width:200px">
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
