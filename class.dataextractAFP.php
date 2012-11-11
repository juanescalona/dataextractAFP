<?php

class AFP{
	protected $afp = array();
	
	function __construct(){
	    
		$url = "https://www.previred.com/indicadores/indicadores.htm";
		// Se usa curl, en todos los servidores no sirve file_get_contents()		
		$ch	= curl_init($url);
		$date = date('d-m-Y');
						
		if(!file_exists('indicadores_'.$date.'.txt')){
		
			$tx = fopen('indicadores_'.$date.'.txt',"w");
			curl_setopt($ch, CURLOPT_FILE, $tx);
			curl_setopt($ch, CURLOPT_HEADER,0);
			curl_exec($ch);
			curl_close($ch);
			fclose($tx);
		}
		
		$tx = file_get_contents('indicadores_'.$date.'.txt');
		
		// Se reduce el número de datos y se centra en las AFP
		$tx = explode('SIS</strong><strong><span class="txtlegalafp">(1)(2)</span></strong></div></td>',$tx);
		$tx = explode('</table>',$tx[1]);
		
		// Se obtiene el nombre de la AFP
		$expr_nom = "|&nbsp;(.*)</[^>]+>|U";
		$c = preg_match_all($expr_nom,$tx[0], $nombreafp);		
		
		// Se obtienen sus porcentajes
		$expr_porc = "|[0-9]{2}\,[0-9]{1,2}|U";
		$p = preg_match_all($expr_porc,$tx[0],$porcentaje);

		// Se asocian los arrays
		for($i=0;$i<$p;$i++){
			$this->afp[trim($nombreafp[1][$i])] = trim($porcentaje[0][$i]);
		}
		
		return;
	}
	
	// Información en JSON
	function AFPtoJSON(){
		return json_encode($this->afp);
	}
	
	// Información en array
	function AFPtoArray(){
		return $this->afp;
	}
	
	// Información a objeto
	function AFPtoObject(){
		return (object)$this->afp;
	}
}
?>