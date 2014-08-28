<html>
	<head>
		<title>Convertitore</title>
		<link rel="stylesheet" media="all" href="conv.css" type="text/css" />
		
	</head>
	<body>

	<p id="titolo">Convertitore: binario-decimale-esadecimale</p>

		<?php
		
		//recupero tutti i valori del form
				
			
			
			
			
			if(isset($_POST['decimale']) && $_POST['decimale'] != NULL){
				$decimale = $_POST['decimale'];
				$pattern = '/[a-zA-Z!\-#$%&\'\"()*+,.\/:;<=>?@[\]\^_`{|}~\\£]/';
				$replacement = '';
				$subject = $decimale;
				$decimale= preg_replace($pattern, $replacement, $subject );
				
				//$decimale=$matches;
				echo "<p id='sottotitolo'>Decimale -> Binario/Esadecimale </p> ";

				//decimale -> binario
				$var=dec_binario($decimale);
				$hex=dec_hex($decimale);
				echo "<p id='descrizione'>Numero inserito: $decimale </p>";
				echo "<p id='descrizione'>Binario: $var </p>";
				echo "<p id='descrizione'>Esadecimale: $hex </p>";
							
					
			} else if( isset($_POST['binario']) && $_POST['binario'] != NULL){
				$binario=$_POST['binario'];
				//escludo i caratteri non ammessi usando le regex
				$pattern = '/[a-zA-Z2-9!\-#$%&\'\"()*+,.\/:;<=>?@[\]\^_`{|}~\\£]/';
				$replacement = '';
				$subject = $binario;
				$binario= preg_replace($pattern, $replacement, $subject );
				
				echo "<p id='titolo'>Binario -> Decimale/Esadecimale </p> ";
				$hex=0;
				//bar();
				//binario -> decimale
				$val=bin_decimale($binario);
				$hex=dec_hex($val);
				echo "<p id='descrizione'>Numero inserito: $binario </p>";
				echo "<p id='descrizione'>Decimale: $val </p>";
				echo "<p id='descrizione'>Esadecimale: $hex </p>";
				
			}else if(isset($_POST['esadecimale']) && $_POST['esadecimale'] != NULL){
				echo "<p id='titolo'> Esadecimale -> Decimale/Binario </p>";
				$esadecimale=$_POST['esadecimale'];
				
				//escludo i caratteri non ammessi usando le regex
				$pattern = '/[g-zG-Z!\-#$%&\'\"()*+,.\/:;<=>?@[\]\^_`{|}~\\£]/';
				$replacement = '';
				$subject = $esadecimale;
				$esadecimale= preg_replace($pattern, $replacement, $subject );
				
				$esadecimale=strtoupper($esadecimale);
				//foo();
				//esadecimale -> decimale;
				$val=hex_decimale($esadecimale);
				
				$bin=dec_binario($val);
				echo "<p id='descrizione'>Numero inserito: $esadecimale </p>";
				echo "<p id='descrizione'>Decimale: $val </p>";
				echo "<p id='descrizione'>Binario: $bin </p>";
				
			} else {
				echo "<p id='finale'>Riempire almeno uno dei tre campi </p>";
			}
		
		
		
			function dec_hex($decimale){
				
				$tot=dechex($decimale);
				$tot=strtoupper($tot);
				
				return $tot;
				
				
			}
			
			/**
			 * La funzione cal_binario si aspetta di prendere in input un numero intero e lo trasforma in un binario
			 * */
			function dec_binario( $decimale){
				
				
				$count=1;
				$i;
				
				while ($decimale >= 1){
							
							if(($count=($decimale%2)) == 0){
								//se il resto della divisione e' zero allora aggiungo 0 poiche' e pari
								$i=$i."0";
								
								
							} else {
								//altrimenti il resto non e' zero e aggiungo uno poiche' dispari
								$i=$i."1";
								
							}
							$decimale=$decimale/2;
						
						//con strrev reverso la stringa e restituisco il risultato
						$b=strrev($i);
					}
					//echo "$b <br /> ";
					return $b;
				
			}
			
			function bar(){
				$b=0*1;
				echo " $b";
			}
			
			function bin_decimale($binario){
				
				
				
				$leng=(strlen($binario));
				$i=0;
				$tot=0;
				//echo "$leng <br />";
				$binario = strrev($binario);
				while($i<$leng){
					//echo $binario[$i];
					$tot+=$binario[$i]*pow(2,$i);
					
					//echo "$tot  : $i <br />";
					$i++;
					
					
				}
				//echo "$tot <br />";
				return $tot;
				
			}
			
			function foo(){
				echo"esadecimale";
			}
			
			/**
			 * prende un esadecimale e lo trasforma in decimale
			 * stato:corretto, da controllare solo l'input
			 * */
			function hex_decimale($esadecimale){
				
				
				$leng=strlen($esadecimale);
				//echo "$leng <br />";
				//echo "<br /> $esadecimale <br />";
				$hex=strrev($esadecimale);
				//echo "<br /> $hex <br />";
				$i=0;
				$tot=0;
				$var=0;
				while($i <= $leng){
					 
					
					switch($hex[$i]){
						
						case a:
						case A:
							//echo "10";
							$var=10;
							break;
						case b :
						case B:
							//echo "11";
							$var=11;
							break;
						case c:
						case C:
							//echo "12";
							$var=12;
							break;
						case d:
						case D:
							//echo "13";
							$var=13;
							break;
						case e:
						case E:
							//echo "14";
							$var=14;
							break;
						case f:
						case F:
							//echo "15";
							$var=15;
							break;
						default:
							//echo $esadecimale[$i];
							$var=$hex[$i];
						
						
						
					}
					//echo "<br /> $var <br />";
					
					
					
					$tot+=$var*pow(16,$i);
					$i++;
					
					
				}
				
				
				
				return $tot;
				
				
			}
			
		
		?>
		
	
		
		<a class="button" href="convertitore.html" >Indietro</a>
		
		<footer> Copyright &copy; All rights reserved Orgest Shehaj </footer>
		
	</body>
</html>	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
