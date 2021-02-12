<?php	

		if (isset($_GET['marca'])) {
			echo $_GET['marca'];
			entrymarca($link);
		}else{printf("post marca = %s falhou\n",$_GET['marca']);}

		if (isset($_GET['gen'])) {
			echo $_GET['marca'];
			entrygen($link);
		}else{printf("post gen = %s falhou\n",$_GET['gen']);}

		if (isset($_GET['subgen'])) {
			echo $_GET['marca'];
			entrysubgen($link);
		}else{printf("post subgen = %s falhou\n",$_GET['subgen']);}

		$arquivo = fopen('updateids.txt', 'a');

		function entrymarca($link){
			$existe = false;

			if ($result = mysqli_query($link, "SELECT idmarca, marca FROM produtos")) {
				//percorrer array com select
				//se marca existir var = true, se nao false
					while($marcas = $result->fetch_assoc()) {
						if($_GET['marca'] == $marcas["marca"]){
		        			$existe = true;
		        			echo "marca existe\n";
		        		}
		    		}
				if ($existe == false) {//se var false executar
					$idmarca_cnt = mysqli_num_rows($result);
				    $idmarcap1 = $idmarca_cnt + 1;
				    printf("quantidade de marcas = %d, marcas+1 = %d",$idmarca_cnt,$idmarcap1);

				    $data=
					"$sql='UPDATE produtos 
							SET idmarca = ".$idmarcap1."WHERE marca = '".$_GET['marca']."';
					if($query = mysqli_multi_query($link,$sql)){
					}else{
						$error = $link->errno . ' ' . $link->error;
				    	echo $error;
					}";
					fwrite($arquivo, $data);
					fclose($arquivo);

				    mysqli_free_result($result);
				}
				    
			}
			exit;
		}

		function entrygen($link){
			$existe = false;

			if ($result = mysqli_query($link, "SELECT idgen, gen FROM produtos")) {
					while($gens = $result->fetch_assoc()) {
						if($_GET['gen'] == $gens["gen"]){
		        			$existe = true;
		        			echo "idgen existe\n";
		        		}
		    		}
				if ($existe == false) {
					$idgen_cnt = mysqli_num_rows($result);
				    $idgenp1 = $idgen_cnt + 1;
				    printf("quantidade de gens = %d, gens+1 = %d\n",$idgen_cnt,$idgenp1);

				    $data=
					"$sql='UPDATE produtos 
							SET idgen = ".$idgenp1."WHERE gen = '".$_GET['gen']."';
					if($query = mysqli_multi_query($link,$sql)){
					}else{
						$error = $link->errno . ' ' . $link->error;
				    	echo $error;
					}";
					fwrite($arquivo, $data);
					fclose($arquivo);

				    mysqli_free_result($result);
				}
				    
			}
			exit;
		}

		function entrysubgen($link){
			$existe = false;

			if ($result = mysqli_query($link, "SELECT idsubgen, subgen FROM produtos")) {
					while($subgens = $result->fetch_assoc()) {
						if($_GET['subgen'] == $subgens["subgen"]){
		        			$existe = true;
		        			echo "subgen existe\n";
		        		}
		    		}
				if ($existe == false) {
					$idsubgen_cnt = mysqli_num_rows($result);
				    $idsubgenp1 = $idsubgen_cnt + 1;
				    printf("quantidade de subgen = %d, subgen+1 = %d",$idsubgen_cnt,$idsubgenp1);

				    $data=
					"$sql='UPDATE produtos 
							SET idsubgen = ".$idsubgenp1."WHERE subgen = '".$_GET['subgen']."';
					if($query = mysqli_multi_query($link,$sql)){
					}else{
						$error = $link->errno . ' ' . $link->error;
				    	echo $error;
					}";
					fwrite($arquivo, $data);
					fclose($arquivo);

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