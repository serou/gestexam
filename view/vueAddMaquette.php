<?php include("view/template/vueHeader.php");  ?>
	<body>

		<div class="container">
			<h1>Excel Maquette Upload</h1>

			<form class="form-inline" method="POST" action="addMaquette.php" enctype="multipart/form-data">
				<div class="form-group">
					<label>Upload Excel File</label>
					<input type="file" name="file" class="form-control">
				</div>
				<div class="form-group">
					<button type="submit" name="Submit" class="btn btn-success">Upload</button>
				</div>
			</form>
		</div>

	</body>
</html>
