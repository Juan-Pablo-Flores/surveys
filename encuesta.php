<?php include('session.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Encuesta</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
        .box-shadow {
            -moz-box-shadow: 10px 10px 49px -19px rgba(15,15,15,1);
            box-shadow: 10px 10px 49px -19px rgba(15,15,15,1);
        } 

        .bg-blue {
            background-color: #afc6e0; 
        }

        .bg-white {
            background-color: #fff;
        }
    </style>
</head>
<body class="bg-blue">

    <?php 
        include('config.php');

        //utf-8
        header('Content-Type: text/html; charset=utf-8');

        mysqli_query($db, "SET CHARACTER_SET_CLIENT='utf8'");
        mysqli_query($db, "SET CHARACTER_SET_RESULTS='utf8'");
        mysqli_query($db, "SET CHARACTER_SET_CONNECTION='utf8'");

        ini_set('default_charset', 'utf-8');

        $rows = array();

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            
            if (isset($_GET['survey'])){
                // Survey info
                $survey_id = (int)$_GET['survey'];
                $sql = "SELECT * FROM `encuestas` WHERE id='$survey_id' LIMIT 1";
                $survey_result = mysqli_query($db, $sql);
                $survey = mysqli_fetch_assoc($survey_result);
                $survey_name = $survey['nombre'];
                $survey_desc = $survey['descripcion'];
                $survey_anon = (int)$survey['anonima'];
                $survey_shuffle = (int)$survey['aleatoria'];

                $sql = "SELECT `id`,`pregunta` FROM `preguntas` WHERE id_encuesta=$survey_id";
                $result = mysqli_query($db, $sql);

                $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                if ($survey_shuffle === 1) {
                    shuffle($rows);
                }

                $i = 0;
            }
        }
    ?>

    <main class="container">
        <?php if (count($rows) > 0) :?>
            <header class="row">
                <div class="col text-center mb-5">
                    <img src="img/encuesta.png" alt="Survey Icon" class="img-fluid my-5">
                    <div class="box-shadow p-4 bg-white w-75 m-auto mb-4">
                        <h2 class="p-3"><?php echo $survey_name ?></h2>
                        <p class="p-1"><?php echo $survey_desc ?></p>
                    </div>
                </div>
            </header>

            <section class="box-shadow bg-white w-75 m-auto">
                <div class="container p-4">
                    <form action="submit.php" method="post">
                        <?php foreach($rows as $row): ?>
                            <p class="mt-4 mb-2 font-weight-bold"><?php echo $row['pregunta']?></p>
                            
                            <?php 
                                $question_id = $row['id'];
                                $sql = "SELECT `id`,`opcion` FROM `opciones` WHERE id_pregunta = '$question_id'";
                                $result = mysqli_query($db, $sql);
                                $answers = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                if ($survey_shuffle === 1) {
                                    shuffle($answers);
                                }
                            ?>
                            <?php foreach($answers as $ans) : ?>
                                <?php
                                    $option_id = $ans['id'];
                                ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="<?php echo $question_id; ?>" id="<?php echo $option_id; ?>" value="<?php echo $option_id; ?>" required>
                                    <label class="form-check-label" for="<?php echo $option_id; ?>">
                                        <?php echo $ans['opcion']; ?>
                                    </label>
                                </div>
                            <?php endforeach ?>
                        <?php endforeach ?>
                        <?php if ($survey_anon === 1) :?>
                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" name="anon" value="1" id="anon">
                                <label class="form-check-label font-weight-bold" for="anon">
                                    Enviar de forma anónima
                                </label>
                            </div>
                        <?php endif ?>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-large">Enviar</button>
                        </div>
                    </form>
                </div>
            </section>
        <?php else : ?>
            <header class="row">
                <div class="col text-center mb-4 p-0">
                    <img src="img/encuesta.png" alt="Survey Icon" class="img-fluid my-5">
                    <h2 class="mb-3 m-auto">No pudimos cargar la encuesta: <?php echo $survey_name ?></h2>
                    <p>Lo sentimos, inténtelo más tarde :(</p>
                </div>
            </header>
        <?php endif ?>
    </main>	

	<footer>
		<?php  if (isset($_SESSION['username'])) : ?>
			<div class="row my-4 text-center">
                <div class="col">
                    <a href="index.php" class="btn btn-secondary btn-large">Volver</a>
                </div>
                <div class="col">
					<form action="index.php" method="get">
						<input type="text" name="logout" value="1" class="d-none">
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