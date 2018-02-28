<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/bootstrap-3.3.7/bootstrap.min.css">
	<link rel="stylesheet" href="assets/style.css">
	<script src="assets//jquery/jquery-compressed-3.2.1.min.js"></script>
	<script src="assets/bootstrap-3.3.7/bootstrap.min.js"></script>
	<script src="assets/main.js"></script>
</head>
<body>
<?php
	require_once "head.php";
	require_once "del_entry.php";
	require_once "new_entry.php";

	/* Display database */
	echo "<table class='db-table'><tr><th>Ändern / Entfernen</th>";
	foreach ($render_column_names as $value) {
		echo "<th><a href='#' title='Sortieren nach $value'><i class='fa fa-sort'></i>$value</a></th>";
	}
	echo "</tr>";
	$sql = "SELECT * FROM $table_name;";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td><a href='#' class='fa fa-close delete-trigger' title='delete'>
		<a href='#' class='fa fa-edit edit-trigger' title='edit'></td>";
		foreach($row as $value) {
			echo "<td>$value</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
?>


<!-- Delete Modal -->
<div class="modal fade container" id="delete-modal" role="dialog">
		<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">Löschen Bestätigen</h3>
			</div>
			<div class="modal-body">
				<p>Sie sind dabei einen Eintrag aus der Datenbank zu löschen.</p>
				<p>Modell: <strong id="modell-name"></strong></p>
				<p>Möchten Sie fortfahren?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
				<button type="button" class="btn btn-danger delete-confirmation">Löschen</button>
			</div>
		</div>
		</div>
	<!-- Hidden form to delete a db entry. The value will be the model name (primary key).  -->
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
		<input type="hidden" name="modell_delete" value="">
	</form>
</div>

<!-- New Entry Button -->
<div id="new-entry-trigger" role="button" title="Neuer Eintrag">
  <i class="fa fa-plus-circle"></i>
</div>
<!-- New Entry Modal -->
<div class="modal fade container" id="new-entry-modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">Neuer Eintrag</h3>
			</div>
			<div class="modal-body">
				<table class="table table-bordered text-nowrap">
					<thead>
						<tr>
						<?php
						foreach ($render_column_names as $key => $value) {
							if ($key == 0) continue;
							echo "<th>$value</th>";
						}
						?>
						</tr>
					</thead>
					<tbody>
						<tr>
						<?php
						foreach ($column_names as $key => $value) {
							if ($key == 0) continue;
							echo "<td><input name='new-$value'></td>";
						}								
						?>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
				<button type="submit" class="btn btn-danger">Senden</button>
			</div>
		</form>
    </div>
  </div>
</div>

</body>
</html>

<?php   mysqli_close($conn);    ?>