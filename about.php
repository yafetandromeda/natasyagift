<?php session_start(); ?>

<?php 
	include('connectdb.php');

    //menghilangkan notice
    $idkat=isset($_GET['idkat'])?$_GET['idkat']:null;
    $tabel=isset($_GET['tbl'])?$_GET['tbl']:null;
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Natasya Gift</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="StyleSheet" href="reset.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/flexslider.css" media="screen">

    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.flexslider.js"></script>
    <script type="text/javascript">
        $(window).load(function(){
            $('.flexslider').flexslider({
                animation: "slide"
            })
        })
    </script>
</head>
<body>

<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
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

<br class="clearfloat">

<div class="LeftContent">
<?php 

    $countkat = "SELECT idkat FROM kategori";
    $exekat=mysql_query($countkat);
    $hasilkat=mysql_num_rows($exekat);
   ?>
   <div class="kat">
  <div class="kategori">
    <form>
      <table>
      <tr><td><?php echo $hasilkat; ?> Kategori :</td></tr>
      <tr><td>&nbsp</td></tr>  
      <?php 
          $sql = mysql_query('SELECT * FROM kategori');
          while ($kat = mysql_fetch_array($sql)){
          $id = $kat['idkat'];
          $nama = $kat['namakat'];
          echo "<tr><td><a href='index.php?tbl=kategori&idkat=".$id."'>".$nama."</a></td><tr>";
      }
       ?>
      </table>
    </form>  
  </div>
</div>

  <?php 

    $countTesti = "SELECT idtes FROM testimoni";
    $exe=mysql_query($countTesti);
    $hasiltesti=mysql_num_rows($exe);
   ?>
  <div class="testi">
    <form>
    <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="3" direction="up" width="200px" height="230px" align="center">
      <table>
      <tr><td> Testimoni :</td></tr>
      <tr><td>&nbsp</td></tr>
        <?php 
          $sql = mysql_query('SELECT * FROM testimoni');
          while ($tes = mysql_fetch_array($sql)){
          $id = $tes['idtes'];
          $testi = $tes['testi'];
          echo "<tr><td><img src='".$testi."' width='150px' height='150px'></td></tr>";
          }
       ?>
      </table>
      </marquee>
    </form>
</div>   
</div>
<div class="post">
<div id="about">

<p>Natasya Gift and Souvenir adalah usaha yang bergerak dalam bidang souvenir dan gift</p>
<p> Kami menyediakan segala perlengkapan dan kebutuhan ulang tahun anak , baby born , manyek/baby one month , wedding , engagement , hampers baby , personal gift , customer gift , etc.</p>
<p> Kualitas produk dan kejujuran adalah hal yang kami utamakan. Terimakasih telah mengunjungi website kami.</p>
<p>&nbsp</p>
<p>&nbsp</p>
<p>Regards,</p>
<p>&nbsp</p>
<p>Natasya Gift and Souvenir</p>	

<br class="clearfloat"><br><br>


</div>
</div>
    <div class='cp'>
        <div class='isicp'>
        <form>
        <table>
            <tr><td>Contact Person :</td></tr>
        </table><br>
        <table>
            <tr><td align="center" width="70px"><img src='Contact/WA.png' width='30px' height='30px'></td><td>0822 222 69692</td></tr>
            <tr><td align="center"><img src='Contact/Line.png' width='30px' height='30px'></td><td>@natasya_gift</td></tr>
            <tr><td align="center"><img src='Contact/fb.png' width='30px' height='30px'></td><td><a href="http://www.facebook.com/natasya.scrap">Natasya Gift</a></td></tr>
            <tr><td align="center"><img src='Contact/instagram.png' width='30px' height='30px'></td><td><a href="http://www.instagram.com/natasyagift">Natasya Gift</a></td></tr>
            <tr><td align="center"><img src='Contact/BBM.png' width='30px' height='30px'></td><td>5F2ADE02</td></tr>
          </table>
          </form>
        </div>
        <div class='rek'>
            <form>
                <table>
                <tr><td align="center" width="100px"><img src='Contact/BCA.png' width="80px"></td></tr><tr><td align="center">456-495-3328 a/n Wina Oni .K</td></tr>
                <tr><td><br></td></tr>
                <tr><td align="center" width="100px"><img src='Contact/email.png' width="60px"></td></tr><tr><td align="center">anastasyagabb@gmail.com</td></tr>
                </table>
          </form>
        </div>
    </div>
</div>
<div class="footer">
    <p align="center">created by Yafet Andromeda </a></p>
</div>
</div>

</body></html>
<!--</body>
</html>-->