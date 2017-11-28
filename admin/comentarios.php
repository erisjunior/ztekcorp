<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-responsive table-hover">
				<thead>
					<th>Email</th>
					<th colspan="3">Comentario</th>
				</thead>
				<?php
					$query = mysqli_query($con,"SELECT * FROM comentariossite");

					while ($dados = mysqli_fetch_assoc($query)) {
						echo "<tr>
								<td>".$dados['email']."</td>
								<td>".$dados['comentario']."</td>
							</tr>
						";
					}
				?>
			</table>
		</div>
	</div>
</div>