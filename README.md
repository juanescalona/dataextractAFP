<h1>README</h1>
<h2>Funcionamiento</h2>
<p>Es posible obtener los datos de tres formas distintas</p>
<ul>
	<li>Como array</li>
	<li>Como objeto</li>
	<li>En formato JSON</li>
</ul>
<p>Ejemplo</p>

	$datos = new AFP;
	
	// utilizar un array
	print_r($datos->AFPtoArray());
	
	/* Retorna:
	
		Array
		(
		    [Capital] => 11,4
		    [Cuprum] => 11,4
		    [Habitat] => 11,2
		    [PlanVital] => 12,3
		    [Provida] => 11,5
		    [Modelo] => 10,7
		)
	
	*/
	
	
	// utilizar un objeto
	
	echo $datos->AFPtoObject()->Cuprum;
	
	
	// Retorna: 11,4 
	
	// Datos en JSON
	
	echo $datos->AFPtoJSON();
	
	// Retorna: {"Capital":"11,4","Cuprum":"11,4","Habitat":"11,2","PlanVital":"12,3","Provida":"11,5","Modelo":"10,7"}