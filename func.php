<?php
include 'config.php';

$name = $_POST['name'];
$last_name = $_POST['last_name'];
$pos = $_POST['pos'];
$mac = $_POST['mac'];
$device = $_POST['device'];

// Create

if (isset($_POST['submit'])) {
	$sql = ("INSERT INTO `users`(`name`, `last_name`, `pos`,`mac`,`device`) VALUES(?,?,?,?,?)");
	$query = $pdo->prepare($sql);
	$query->execute([$name, $last_name, $pos, $mac, $device]);
	$success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Данные успешно отправлены!</strong> Вы можете закрыть это сообщение.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	
}

// Read

$sql = $pdo->prepare("SELECT * FROM `users`");
$sql->execute();
$result = $sql->fetchAll();

// Update
$edit_name = $_POST['edit_name'];
$edit_last_name = $_POST['edit_last_name'];
$edit_pos = $_POST['edit_pos'];
$edit_mac = $_POST['edit_mac'];
$edit_device = $_POST['edit_device'];
$get_id = $_GET['id'];
if (isset($_POST['edit-submit'])) {
	$sqll = "UPDATE users SET name=?, last_name=?, pos=?, mac=?, device=? WHERE id=?";
	$querys = $pdo->prepare($sqll);
	$querys->execute([$edit_name, $edit_last_name, $edit_pos, $edit_mac, $edit_device, $get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}

// DELETE
if (isset($_POST['delete_submit'])) {
	$sql = "DELETE FROM users WHERE id=?";
	$query = $pdo->prepare($sql);
	$query->execute([$get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}
