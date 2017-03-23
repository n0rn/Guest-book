<?php error_reporting(E_ALL); ?>

<?php require_once 'function.php';?>
<?php require_once 'pagination.php';?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">  
		<title>Гостевая книга</title>
		<link rel="stylesheet" href="bootstrap3/css/bootstrap.css">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="css/admin.css">
	</head>
	<body>
		
		<div id="wrapper">
			<h1>Гостевая книга</h1>
			<div>
				<nav>
				  <ul class="pagination">
					<li class="disabled">
				  <?php for($x=1; $x <=$pages; $x++): ?>
					<li <?php if($page == $x){echo 'class="active"';}?>><a href="?page=<?php echo $x; ?>&per-page=<?php echo $perPage;?>"><?php echo $x; ?></a></li>
                   <?php endfor; ?>
					</ul>
				  </ul>
				</nav>
				
			</div>	

			<?php foreach($postsList as $post):?>
			<div class="note">
				<p>
					<span class="name"><?php echo $post['name'];?></span>
					
				</p>
				<p><?php echo $post['text'];?></p>
				
			</div>	
			<?php endforeach;?>
               <div>
				<nav>

				  <ul class="pagination">
			 <?php for($x=1; $x <=$pages; $x++): ?>
					<li <?php if($page == $x){echo 'class="active"';}?>><a href="?page=<?php echo $x; ?>&per-page=<?php echo $perPage;?>"><?php echo $x; ?></a></li>
                   <?php endfor; ?>	
                   </ul>
                   </nav>			

                   <?php if(isset($result)):?>
					<div class="info alert alert-info">
						Запись успешно сохранена!
					</div>
				<?php else: ?>

			</div>


			<div id="form">
				<form action="#" method="POST">
					<p><input class="form-control" name="name" placeholder="Ваше имя"></p>
					<p><textarea class="form-control" name="text" placeholder="Ваш отзыв"></textarea></p>
					<p><input type="submit" name="submit" class="btn btn-info btn-block" value="Сохранить"></p>
				</form>
			</div>
			<?php endif;?>
		</div>

	</body>
</html>


			