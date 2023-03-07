<?
include('./admin/security.php');

if (isset($_POST["submit"])) {
    echo "bouton activé";
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Content-Type" content="UTF-8">
    <meta name="Content-Language" content="fr">
    <meta name="Description" content="site de gestion pour les administrateurs, franchises et partenaires de l'enseigne de salles de sport GymFit">
    <meta name="Keywords" content="salle de sport, fitness, gym, franchise, parte,aire, page administrateur, gestion, site web  ">
    <meta name="Subject" content="Salle de sport">
    <meta name="Copyright" content="gymfit">
    <meta name="Revisit-After" content="15 days">
    <meta name="Robots" content="all">
    <meta name="Category" content="sports">
    <meta name="description" content="Gestion de salles de sport GymFit">
    <meta name="author" content="studi">
    <!-- Link CSS -->


    <title>GymFit Management Administrateur website</title>

</head>
<div class="container">

    <body class="bg-light">

        <div class="container">

            <!-- Extérieur -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Dans la card-->
                            <div class="row">

                                <div class="col-lg-12 col-md-9">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Nous Contacter</h1>

                                        </div>
                                        <!-- Login Button -->
                                        <form action="contact-code.php" method="POST">
                                            <div class="form-group">
                                                <label for="nom">Nom</label>
                                                <input type="text" class="form-control" name="name" placeholder="Nom" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email"  placeholder="name@example.com" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Téléphone</label>
                                                <input type="text" class="form-control" name="phone"  required>
                                            </div>

                                            <div class="form-group">
                                                <label for="message">Message</label>
                                                <textarea class="form-control" name="message"  rows="3"></textarea>
                                            </div>
                                            <div>
                                                <button type="submit" name="submit " class="btn btn-primary">Envoyer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>

    <?php
    include('./includes/scripts.php');

    ?>

</html>