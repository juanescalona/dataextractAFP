<h1>README</h1>
<h2>Funcionamiento</h2>
<p>Es posible obtener los datos de tres formas distintas</p>
<ul>
	<li>Como array</li>
	<li>Como objeto</li>
	<li>En formato JSON</li>
</ul>
<p>Ejemplo</p>

<?php

	// utilizar un array
	$afp = AFP::AFPtoArray();
	
	print_r($afp);
	
	// utilizar un objeto
	
	$afp = AFP::AFPtoObject();
	
	echo $afp->Cuprum;
	
	// Datos en JSON
	
	$afp = AFP::AFPtoJSON();
	
	echo $afp;

?>