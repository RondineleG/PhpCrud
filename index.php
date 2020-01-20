<?php 
include('server.php');

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$record = mysqli_query($db, "SELECT * FROM phpcrud.developer WHERE id=$id");

	if (count($record) == 1 ) {
		$n = mysqli_fetch_array($record);
		$name = $n['name'];
		$description = $n['description'];
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD: PHP and MySQL </title>
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM phpcrud.developer"); ?>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['description']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server.php" >
// newly added field
<input type="hidden" name="id" value="<?php echo $id; ?>">

// modified form fields
	<div class="input-group">
		<label>Name</label>
		<input type="text" name="name" value="<?php echo $name; ?>">
	</div>
	<div class="input-group">
		<label>Description</label>
		<input type="text" name="description" value="<?php echo $description; ?>">
	</div>
	<div class="input-group">
			<button class="btn" type="submit" name="save" >Save</button>
		</div>
</form>
</body>
</html>