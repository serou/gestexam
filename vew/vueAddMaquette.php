<!DOCTYPE html>

<html>
	<head>
		<title>Excel Maquette Uploading</title>
		<link rel="stylesheet" type="text/css" href="common/css/bootstrap.min.css">
	</head>
	<body>

		<div class="container">
			<h1>Excel Maquette Upload</h1>

			<form method="POST" action="addMaquette.php" enctype="multipart/form-data">
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