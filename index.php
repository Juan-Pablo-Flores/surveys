<?php include('session.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

	<main class="container">
		<header class="row">
            <div class="col text-center mb-4 p-0">
                <img src="img/encuesta.png" alt="Survey Icon" class="img-fluid my-5">
				<?php  if (isset($_SESSION['username'])) : ?>
					<h1 class="mb-2 m-auto">Bienvenid@, <?php echo $_SESSION['username'] ?></h1>
				<?php  endif ?>
                <h2 class="mb-3 m-auto">Selecciona una Encuesta</h2>
            </div>
        </header>

		<?php 
			include('config.php');

			//utf-8
			header('Content-Type: text/html; charset=utf-8');

			mysqli_query($db, "SET CHARACTER_SET_CLIENT='utf8'");
			mysqli_query($db, "SET CHARACTER_SET_RESULTS='utf8'");
			mysqli_query($db, "SET CHARACTER_SET_CONNECTION='utf8'");

			ini_set('default_charset', 'utf-8');

			$sql = "SELECT * FROM `encuestas`";
			$result = mysqli_query($db, $sql);
			$i = 0;
		?>
			<?php while(($row =  mysqli_fetch_assoc($result))) : ?>
				<?php if ($i % 5 == 0) :?>
					<div class="row mb-4">
				<?php  endif ?>
					<?php $i++ ?>
					<div class="col-4">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title"><?php echo $row['nombre']?></h5>
								<p class="card-text"><?php echo $row['descripcion']?></p>
								<p> Tags: 
									<?php if ($row['aleatoria'] == 1) :?>
										<span class="badge badge-primary mr-2">Aleatoria</span>
									<?php  endif ?>
									<?php if ($row['anonima'] == 1) :?>
										<span class="badge badge-secondary">Anónima</span>
									<?php  endif ?>
								</p>
								<?php $link_address = "encuesta.php?survey=" . $row['id']; ?>
								<a href="<?php echo $link_address; ?>" class="btn btn-primary">Contestar</a>
							</div>
						</div>
					</div>
					<?php if (($i + 1) % 5 == 0) :?>
						</div>
					<?php  endif ?>
			<?php endwhile ?>
			<?php if (($i + 1) % 5 != 0) :?>
				</div>
			<?php  endif ?>
		</div>
	</main>

	<footer>
		<?php  if (isset($_SESSION['username'])) : ?>
			<div class="row">
				<div class="col my-4 text-center">
					<form action="index.php" method="get">
						<input type="text" name="logout" value="1" style="visibility: hidden;">
						<input type="submit" value="Cerrar Sesión" class="btn btn-danger btn-large"/>
					</form>
				</div>
			</div>
		<?php endif ?>
	</footer>
		
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>