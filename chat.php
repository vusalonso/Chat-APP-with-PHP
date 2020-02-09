<?php session_start(); include("fonksiyon.php"); $chat = new chatApplication(); 
$chat->loginControl($db,false);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>AJAX CHAT GİRİŞ</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/bizim.css">
</head>
<body class="bg-light">
	<audio id="notification" src="audio/<?php echo $chat->notification?>" preload></audio>
<div class="container ">
		<div class="row text-center">
			<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mx-auto anaiskelet">
						<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 bg-dark">							
								<h4 class="text-warning pt-1">NV Chat</h4>
								
								</div>
								
								
								
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">							
										<div class="row">
												<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 isimler">
														 <div class="row isimmenusu">	
															<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12"> 
																<div class="row username area"></div>
															</div>	
															
														</div>
														
													<div class="row altmenu">	
															<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
															
																<a href="" id="colorsettings"><i class="icon ion-md-switch"></i></a>	
																<a href=""><i class="icon ion-md-document"></i></a>	
																<a href=""><i class="icon ion-md-close-circle-outline"></i></a>	
																<a href="chat.php?working=exit"><i class="icon ion-md-return-right"></i></a>	

															</div>	
															
														</div>	
														
												</div>
												
												<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 sag">
														<div class="row">	
															<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 yazilar text-left border-bottom">

															</div>	
															<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 writing text-left">
																
															</div>	
															<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 gonder pb-3">
																<form id="mesajgonder">
																	<textarea id="gonder" name="message" maxlength ='100' cols="10" rows="3" class="form-control mt-2 text-left textarea" data-id="<?php echo $_SESSION["username"];?>"></textarea>
																</form>											 
															</div>			
														</div>	
												</div>			
										</div>
								
								</div>
						</div>
			
			
			
			
			
			
			</div>
		
		
		
		</div>
		<div class="row">
			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 mx-auto settingsschema">
				<div class="row text-center">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
						<form id="backgroundColor" class="mt-2"><span class="font-weight-bold">Arxa plan rəngi</span><br>
							<input type="text" name="background_color" class="form-control jscolor mt-2 mb-2" value="<?php echo $chat->backColor;?>">
							<input type="submit" value="Dəyişdir" id="back_button" class="btn btn-sm btn-info mb-2">
						</form>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
						<form id="textColor" class="mt-2"><span class="font-weight-bold">Yazı rəngi</span>
							<input type="text" name="text_color" class="form-control jscolor mt-2 mb-2" value="<?php echo $chat->textColor;?>">
							<input type="submit" value="Dəyişdir" id="text_button" class="btn btn-sm btn-info mb-2">
						</form>
					</div>
				</div>
			<div class="row mt-3 pb-5 text-center">
				<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 mx-auto" id="icon">
				<div class="row">
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mx-auto baslikcizgi"><span class="font-weight-bold">İCON</span>
						</div>	

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto">
						<form id="iconform">
						<select name="icon" class="form-control mt-1 p-2"><?php 
						foreach($chat->icons as $key=>$value){
							echo '<option value="'.$value.'">'.$key.'</option>';
						}							
						?></select>
						</div>	

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto"><input type="button" id="iconbuton" class="btn btn-danger mt-1 mb-2 btn-block btn-sm" value="SEÇ">
						</form></div>			
										</div>		
														
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 alert alert-info p-0 p-1 border border-secondary mt-2 iconsonuc text-center font-weight-bold"></div>			
												</div>

							<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 mx-auto" id="sound">
								<div class="row">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto baslikcizgi"><span class=" font-weight-bold">SƏS</span>
									</div>	

									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto">
									<form id="sesform">
									<select name="ses" class="form-control mt-1 p-2"><?php 
										foreach($chat->sound as $key=>$value){
											echo '<option value="'.$value.'">'.$key.'</option>';
										}							
										?></select>
									</div>	

									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto"><input type="button" id="sesbuton" class="btn btn-danger btn-block btn-sm mt-1 mb-2" value="SEÇ">
									</form></div>								
																	
										</div>	
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 alert alert-info p-0 p-1 border border-secondary mt-2 sessonuc text-center font-weight-bold"></div>	
							</div>

							<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 mx-auto" id="backimage">
							
							<div class="row">	
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto baslikcizgi"><span class=" font-weight-bold">ARXA ŞƏKİL</span>
								</div>	
								
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto">
								<form id="arkaplanimageform">
								<select name="arkaplanimage" class="form-control mt-1 p-2"><?php 
								foreach($chat->back as $key=>$value){
									echo '<option value="'.$value.'">'.$key.'</option>';
								}							
								?></select>
								</div>	
								
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto"><input type="button" id="arkaplanimagebuton" class="btn btn-danger mt-1 mb-2 btn-block btn-sm" value="SEÇ">
								</form></div>	
															
								</div>	
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 alert alert-info p-0 p-1 border border-secondary mt-2 arkaplanimagesonuc text-center font-weight-bold"></div>	
											
										</div>	
										</div>

			</div>
			<div class="alert alert-info notification mx-auto mt-2">Dəyişdirildi</div>
		</div>
		


</div>

<?php 
if(@$_GET["working"] == 'exit'){
    $chat->loginOut($db);
}
?>
<script src="js/jscolor.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>