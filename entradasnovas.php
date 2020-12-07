<?php	

		if (isset($_POST['marca'])) {
			entrymarca();
		}else{printf("post marca = %s falhou\n",$_POST['marca']);}

		if (isset($_POST['gen'])) {
			entrygen();
		}else{printf("post gen = %s falhou\n",$_POST['gen']);}

		if (isset($_POST['subgen'])) {
			entrysubgen();
		}else{printf("post subgen = %s falhou\n",$_POST['subgen']);}

		function entrymarca(){
			$existe = false;

			if ($result = mysqli_query($con, "SELECT idmarca, marca FROM produtos")) {
				//percorrer array com select
				//se marca existir var = true, se nao false
					while($marcas = $result->fetch_assoc()) {
						if($_POST['marca'] == $marcas["marca"]){
		        			$existe = true;
		        		}
		    		}
				if ($existe == false) {//se var false executar
					$idmarca_cnt = mysqli_num_rows($result);
				    $idmarcap1 = $idmarca_cnt + 1;
				    printf("quantidade de marcas = %d, marcas+1 = %d",$idmarca_cnt,$idmarcap1);

				    $data=
					"$sql='UPDATE produtos 
							SET idmarca = ".$idmarcap1."WHERE marca = '".$_POST['marca']."';
					if($query = mysqli_multi_query($con,$sql)){
					}else{
						$error = $con->errno . ' ' . $con->error;
				    	echo $error;
					}";
					$filecontent=file_get_contents('updateids.php');
					/* position of "?>"*/
					$sqlend=strpos($filecontent, '//sqlend');
					$eof=strpos($filecontent, '?>');
					$filecontent=substr($filecontent, $sqlend, $eof).$data."\r\n".substr($filecontent, $eof);
					file_put_contents("file.php", $filecontent);

				    mysqli_free_result($result);
				}
				    
			}
			exit;
		}

		function entrygen(){
			$existe = false;

			if ($result = mysqli_query($con, "SELECT idgen, gen FROM produtos")) {
					while($gens = $result->fetch_assoc()) {
						if($_POST['gen'] == $gens["gen"]){
		        			$existe = true;
		        		}
		    		}
				if ($existe == false) {
					$idgen_cnt = mysqli_num_rows($result);
				    $idgenp1 = $idgen_cnt + 1;
				    printf("quantidade de gens = %d, gens+1 = %d\n",$idgen_cnt,$idgenp1);

				    $data=
					"$sql='UPDATE produtos 
							SET idgen = ".$idgenp1."WHERE gen = '".$_POST['gen']."';
					if($query = mysqli_multi_query($con,$sql)){
					}else{
						$error = $con->errno . ' ' . $con->error;
				    	echo $error;
					}";
					$filecontent=file_get_contents('updateids.php');
					/* position of "?>"*/
					$sqlend=strpos($filecontent, '//sqlend');
					$eof=strpos($filecontent, '?>');
					$filecontent=substr($filecontent, $sqlend, $eof).$data."\r\n".substr($filecontent, $eof);
					file_put_contents("file.php", $filecontent);

				    mysqli_free_result($result);
				}
				    
			}
			exit;
		}

		function entrysubgen(){
			$existe = false;

			if ($result = mysqli_query($con, "SELECT idsubgen, subgen FROM produtos")) {
					while($subgens = $result->fetch_assoc()) {
						if($_POST['subgen'] == $subgens["subgen"]){
		        			$existe = true;
		        		}
		    		}
				if ($existe == false) {
					$idsubgen_cnt = mysqli_num_rows($result);
				    $idsubgenp1 = $idsubgen_cnt + 1;
				    printf("quantidade de subgen = %d, subgen+1 = %d",$idsubgen_cnt,$idsubgenp1);

				    $data=
					"$sql='UPDATE produtos 
							SET idsubgen = ".$idsubgenp1."WHERE subgen = '".$_POST['subgen']."';
					if($query = mysqli_multi_query($con,$sql)){
					}else{
						$error = $con->errno . ' ' . $con->error;
				    	echo $error;
					}";
					$filecontent=file_get_contents('updateids.php');
					/* position of "?>"*/
					$sqlend=strpos($filecontent, '//sqlend');
					$eof=strpos($filecontent, '?>');
					$filecontent=substr($filecontent, $sqlend, $eof).$data."\r\n".substr($filecontent, $eof);
					file_put_contents("file.php", $filecontent);

				    mysqli_free_result($result);
				}
				    
			}
			exit;
		}


	/*get count idmarca
	if marca nao existe
		idmarca++
		write cadastrar.php 
		update idmarca = x where marca = y
	get count idgen
	if gen nao existe
		idgen++
		write cadastrar.php 
		update idgen = x where gen = y
	get count idsubgen
	if subgen nao existe
		idsubgen++
		write cadastrar.php 
		update idsubgen = x where subgen = y*/

?>