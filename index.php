<?php session_start(); include("fonksiyon.php"); $chat = new chatApplication(); 
$chat->loginControl($db,true);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<link rel="stylesheet" href="css/bizim.css">
    
<title>CHAT GİRİŞ</title>

</head>
<body>
<div class="container text-center">
<div class="row text-center"> 
        
        
        <div class="col-md-4  mx-auto text-center" id="log">
        
        <?php 	if (!$_POST) :	?>   
		
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="col-md-12 "><h3 class="bas">CHAT GİRİŞ</h3></div>
        <div class="col-md-12"><input type="text" name="kulad" class="form-control mt-2" required="required" placeholder="Kullanıcı Adınız" autofocus="autofocus" /></div>
        <div class="col-md-12"><input type="password" name="sifre" class="form-control mt-2" required="required" placeholder="Şifreniz" /></div>
        
  <div class="col-md-12"><input type="submit" name="buton" class="btn btn-dark btn-block mt-2" value="GİRİŞ" /></div>
        </form>
        
        
        
        <?php
		
		else:
		@$sifre=htmlspecialchars(strip_tags($_POST["sifre"]));
		@$kulad=htmlspecialchars(strip_tags($_POST["kulad"]));
		
			if ($sifre=="" ||  $kulad=="") :
			
			echo "Bilgiler boş olamaz";
			
			header("refresh:2,url=index.php");
			
			
			else:	
			
			
        // KULLANICI GİRİŞ KONTROLÜ
            $chat->login($db, $kulad, $sifre);
			
			
			endif;
		
		
		
		
		
		endif;
		
	
		
        
        ?>
        </div>
        
        
        
        
        
        
        
        
       

</div>

</div>
</body>
</html>