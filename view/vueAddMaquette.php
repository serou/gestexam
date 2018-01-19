<!DOCTYPE html>

<html>
	<head>
		<title>Excel Maquette Uploading</title>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="common/css/bootstrap.min.css">
		<script src="common/js/jquery-3.2.1.min.js"></script>
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
