<?php  

$sql = 
	   "UPDATE produtos 
	  		SET idmarca = 1 WHERE marca = 'nokia';

		UPDATE produtos 
			SET idmarca = 2 WHERE marca = 'apple';

		UPDATE produtos 
			SET idmarca = 3 WHERE marca = 'samsung';	

		UPDATE produtos
			SET idmarca = 4 WHERE marca = 'lg';

		UPDATE produtos
			SET idmarca = 5 WHERE marca = 'asus';

		UPDATE produtos
			SET idgen = 1 WHERE gen = 'celular';

		UPDATE produtos
			SET idsubgen = 1 WHERE subgen = 'android';

		UPDATE produtos
			SET idsubgen = 2 WHERE subgen = 'ios';

		UPDATE produtos
			SET idsubgen = 3 WHERE subgen = 'windows phone';
			";
	if($query = mysqli_multi_query($con,$sql)){
	}else{
		$error = $con->errno . ' ' . $con->error;
    	echo $error;
	}
	//sqlend

?>