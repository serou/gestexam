<?php include("view/template/vueHeader.php");  ?>
	<body>

		<div class="container">
			<h1>Excel Etudiant Upload</h1>

			<form method="POST" action="addEtudInscr.php" enctype="multipart/form-data">
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
