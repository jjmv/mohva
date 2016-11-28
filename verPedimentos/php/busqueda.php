<?php

include "conexion.php";

$user_id=null;
$sql1= "select * from pedimentos where num_pedimento like '%$_GET[s]%' or cliente like '%$_GET[s]%' or fraccion like '%$_GET[s]%' or importe like '%$_GET[s]%' or impuestos like '%$_GET[s]%' ";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>Número de pedimento</th>
	<th>Cliente</th>
	<th>Fracción</th>
	<th>Importe</th>
	<th>Impuestos</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["num_pedimento"]; ?></td>
	<td><?php echo $r["cliente"]; ?></td>
	<td><?php echo $r["fraccion"]; ?></td>
	<td><?php echo $r["importe"]; ?></td>
	<td><?php echo $r["impuestos"]; ?></td>
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
