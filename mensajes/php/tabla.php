<?php

include "conexion.php";

$user_id=null;
$sql1= "select * from contacto";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>Nombre</th>
	<th>Correo</th>
	<th>Mensaje</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["nombre"]; ?></td>
	<td><?php echo $r["correo"]; ?></td>
	<td><?php echo $r["mensaje"]; ?></td>
	<td style="width:150px;">
		<a href="#" id="del-<?php echo $r["id"];?>" class='btn-floating btn-large waves-effect waves-light red'><i  class='material-icons'>delete</i></a>
		<script>
		$("#del-"+<?php echo $r["id"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				window.location="./php/eliminar.php?id="+<?php echo $r["id"];?>;

			}

		});
		</script>
	</td>
</tr>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
