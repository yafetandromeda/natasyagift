<?php 
	include('connectdb.php');
	session_start();
	if (empty($_SESSION['username'])){
		header('location:index.php');
	}

	if($_SESSION['username']!='tasya'){
		header('location:index.php');
	}

	$sukses=false;
	if(!empty($_POST['submit'])){
		$idkat=$_POST['idKat'];
		$namakat=$_POST['namaKat'];

		$cekdata="SELECT idkat FROM kategori WHERE idkat='$idkat'";
		$ada=mysql_query($cekdata) or die(mysql_error());
		if(mysql_num_rows($ada)>0){
			echo "error";
		} else{
			$query='INSERT INTO kategori VALUES("'.$idkat.'","'.$namakat.'")';
			$result=mysql_query($query);
			if($result){
				$sukses=true;
			} else{
				$sukses=false;
			}
		}	
	}
	$suksesU=false;
	if(!empty($_POST['update'])){
		$idkatU=$_POST['idkat'];
		$namakatU=$_POST['namakat'];

		if(empty($namakatU)){
			echo "error";
		} else{
			$query='UPDATE kategori SET namakat="'.$namakatU.'" WHERE idkat="'.$idkatU.'"';
			$result=mysql_query($query);
			if($result){
				$suksesU=true;
			} else{
				$suksesU=false;
			}
		}
	}
	
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Kategori</title>
 	<link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>

<div class="wrap">
 <div class="header">
		 	<?php 
                if(!empty($_SESSION['username'])){
                echo "<div id='loginindex'>Selamat datang, ".$_SESSION['username']." || <a href='changepassword.php'>Change Password</a> || <a href='logout.php'>Logout</a> ||</div>";
                }
            ?>
	</div>

<ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Categories</a>
                <ul class="submenu">
                    <?php 
                        $sql = mysql_query('SELECT * FROM kategori');
                        while ($kat = mysql_fetch_array($sql)){
                        $id = $kat['idkat'];
                        $nama = $kat['namakat'];
                        echo "<li><a href='index.php?tbl=kategori&idkat=".$id."'>".$nama."</a></li>";
                    }
                     ?>
                </ul>
            </li>
            <?php if(!empty($_SESSION['username'])){
                echo "<li><a href='produk.php'>Add Produk</a></li>";
                echo "<li><a href='kategori.php'>Add Category</a></li>";
                echo "<li><a href='testimoni.php'>Add Testimoni</a></li>";}
              ?>
            <li><a href="about.php">About</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
        </ul><br>


 	<h3>DAFTAR KATEGORI</h3>
 	<form class="insert" method="post" action="kategori.php" enctype="multipart/form-data">
 		<table id="tambahkat">
 			<tr><td></td><td><label id="label">TAMBAH KATEGORI</label></td></tr>
 			<tr></tr>
 			<tr><td><label>Id</label></td><td><input type="text" name="idKat"></td></tr>
 			<tr><td><label>Nama</label></td><td><input type="text" name="namaKat"></td></tr>
 			<tr><td></td><td><input type="submit" name="submit" value="insert"></td></tr>

 			<?php 
					if($sukses=true){
						echo "<tr><td></td><td><font color='blue'>Produk Berhasil Ditambah !</font></td></tr>";
					}
				 ?>
 		</table>
 	</form><br><br>

 	<form method="post" action="kategori.php" enctype="multipart/form-data">
 		<table> 			
 		<?php 
			
				$query="SELECT * FROM kategori";
				$result=mysql_query($query);

				if(empty($_GET['edit'])){
					echo "<table border='1'>";
					echo "<tr>
					<th>Id Kategori</th>
					<th>Nama</th>
					<th>Edit</th>
					<th>Delete</th>";
				}

				while($data=mysql_fetch_array($result)){
					$idkat=$data['idkat'];
					$nama=$data['namakat'];
					$input="";
					$buttonSave="";
					//$i=$i+1;					

					if(!empty($_GET['edit'])&&$idkat==$_GET['id']){

						echo "<form><table><tr><td><label>Id Kategori</label></td><td><input type='text' size='10px'  name='idkat' value='".$idkat."'></td></tr>";
					 	echo "<tr><td><label>Nama</label></td><td><input type='text' size ='15px' name='namakat' value='".$nama."'></td></tr>";
					 	echo '<input type="hidden" name="kolomkode" value="'.$idkat.'"><br>';
					 	echo "<tr><td></td><td><input type='image' name='update' value='update' src='Design/save.png' width='50px' height='50px'><a href='kategori.php'><img src='Design/cancel1.ico' width='60px' height='60px'></a></td></tr></form>";
					 	//$buttonSave="<td><input type='submit' name='update' value='update'></td><td><a href='produk.php'>cancel</a></td>";
					} else if(!empty($_GET['edit'])){
					} else{
					echo "<tr>
					<td align='center'>".$idkat."</td>
					<td align='left'>".$nama."</td>
					<td><a href='kategori.php?edit=true&&tbl=kategori&id=".$idkat."'><img src='Design/edit.png' width='50px' height='50px'></a></td>".$buttonSave."</td>
					<td><a href='delete.php?tbl=kategori&id=".$idkat."'><img src='Design/delete.ico' width='50px' height='50px'></a></td></tr>";
					}
				if($suksesU=false){
						echo "<tr><td colspan='9'><font color='blue'>Data Berhasil di Update !<font></td></tr>";
					}
				}
				
			 ?>
			</table>
		</form>
 		</table>
 	</form>
 	<br>
 	<div class='cp'>
        <div class='isicp'>
        <form>
        <table>
            <tr><td>Contact Person :
            <td><img src='Design/Natasyagift.png' width='60%'></td></td></tr>
            <tr><td align="center"><img src='Contact/WA.png' width='30px' height='30px'></td><td>0878 3858 4777</td></tr>
            <tr><td align="center"><img src='Contact/Line.png' width='30px' height='30px'></td><td>tasyagabb</td></tr>
            <tr><td align="center"><img src='Contact/fb.png' width='30px' height='30px'></td><td><a href="http://www.facebook.com/natasya.scrap">Natasya Gift</a></td></tr>
            <tr><td align="center"><img src='Contact/instagram.png' width='30px' height='30px'></td><td><a href="http://www.instagram.com/natasyagift">Natasya Gift</a></td></tr>
            <tr><td align="center"><img src='Contact/BBM.png' width='30px' height='30px'></td><td ><img src='Contact/pin.jpg' width='80px' height='80px'></td></tr><tr><td></td><td>7DA32DAA</td></tr>
          </table>
          </form>
        </div>
        <div class='rek'>
            <form>
                <table>
                <tr><td width="100px"><img src='Contact/BCA.png' width="100px"></td><td>456-495-3328 a/n Wina Oni .K</td></tr>
                <tr><td align="center" width="100px"><img src='Contact/email.png' width="80px"></td><td>anastasyagabb@gmail.com</td></tr>
                </table>
          </form>
        </div>
    </div>
    </div>
 </div>



 	<script type="text/javascript">
		
		document.getElementById('files').addEventListener('change', handleFileSelect, false);
		
		function handleFileSelect(evt) {
				var id='list';
		        var files = evt.target.files;
		        var f = files[0];
		        var reader = new FileReader();
		         
		          reader.onload = (function(theFile) {
		                return function(e) {
		                  document.getElementById(id).innerHTML = ['<img src="', e.target.result,'" title="', theFile.name, '" width="100px" />'].join('');
		                };
		          })(f);
		           
		          reader.readAsDataURL(f);
		}
	</script>
 </body>
 </html>