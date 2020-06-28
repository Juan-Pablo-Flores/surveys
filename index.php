<? include('session.php') ?>
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
                <h1 class="mb-3 m-auto">Selecciona una Encuesta</h1>
            </div>
        </header>

		<?php 
			include('config.php');

			$sql = "SELECT * FROM `encuestas`";
			$result = mysqli_query($db, $sql);
			$i = 0;
		?>
			<?php while(($row =  mysqli_fetch_assoc($result))) : ?>
				<?php if ($i % 3 == 0) :?>
					<div class="row">
				<?php  endif ?>
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
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div>
					<?php if ($i % 3 == 0) :?>
						</div>
					<?php  endif ?>
					<?php $i++ ?>
			<?php endwhile ?>
		</div>
	</main>
	
	<!-- <div class="header">
		<h2>Indice de encuestas</h2>
	</div>
	<div class="content">

		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>
	</div> -->
		
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