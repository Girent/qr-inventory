<?php

session_start();
require "auth.php";
include 'func.php';
?>
<!DOCTYPE html>
<html lang="en">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<head>
<title>netexpert projet tr</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="qrcode.js"></script>
</head>
<body>
<input id="text" type="text" value="Введи сюда содержимое QR кода, жмякни enter" style="width:80%" /><br />
<div id="qrcode" style="width:100px; height:100px; margin-top:15px;"></div>

<script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode"), {
	width : 100,
	height : 100
});

function makeCode () {		
	var elText = document.getElementById("text");
	
	if (!elText.value) {
		alert("Input a text");
		elText.focus();
		return;
	}
	
	qrcode.makeCode(elText.value);
}

makeCode();

$("#text").
	on("blur", function () {
		makeCode();
	}).
	on("keydown", function (e) {
		if (e.keyCode == 13) {
			makeCode();
		}
	});
</script>
</body>
<a href="admin.php?do=logout">Выход</a>	
<head>
	<meta charset="UTF-8">
	<title>TransQR</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col mt-1">
				<?=$success ?>
				<button class="btn btn-success mb-1" data-toggle="modal" data-target="#Modal"><i class="fa fa-user-plus"></i></button>
				<table class="table shadow ">
					<thead class="thead-dark">
						<tr>
							<th>№</th>
							<th>Имя</th>
							<th>Фамилия</th>
							<th>Должность</th>
							<th>Серийник</th>
							<th>Устройство</th>
							<th>Действие</th>
						</tr>
						<?php foreach ($result as $value) { ?>
						<tr>
							<td><?=$value['id'] ?></td>
							<td><?=$value['name'] ?></td>
							<td><?=$value['last_name'] ?></td>
							<td><?=$value['pos'] ?></td>
							<td><?=$value['mac'] ?></td>
							<td><?=$value['device'] ?></td>
							<td>
								<a href="?edit=<?=$value['id'] ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?=$value['id'] ?>"><i class="fa fa-edit"></i></a> 
								<a href="?delete=<?=$value['id'] ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?=$value['id'] ?>"><i class="fa fa-trash"></i></a>
								<?php require 'modal.php'; ?>
							</td>
						</tr> <?php } ?>
					</thead>
				</table>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="Modal">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content shadow">
	      <div class="modal-header">
	        <h5 class="modal-title">Добавить пользователя</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="" method="post">
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="name" value="" placeholder="Имя">
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="last_name" value="" placeholder="Фамилия">
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="pos" value="" placeholder="Должность">
	        	</div>
				<div class="form-group">
	        		<input type="text" class="form-control" name="mac" value="" placeholder="Серийник">
	        	</div>
				<div class="form-group">
	        		<input type="text" class="form-control" name="device" value="" placeholder="Устройство">
	        	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
	        <button type="submit" name="submit" class="btn btn-primary">Добавить</button>
	      </div>
	  		</form>
	    </div>
	  </div>
	</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
</body>
</html>

