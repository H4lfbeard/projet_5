<?php

require_once 'vues/head.php';
require_once 'vues/navbar.php';

?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/connexion.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>S'inscrire</h1>
                    <span class="subheading">pour pouvoir laisser un commentaire !</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-6 justify-content-center">

            <div class="col-md-10 col-lg-8 col-xl-5">
                <h3>Je m'inscris</h3>
                <div class="my-5">


                    <form id="contactForm"  method="post" action="index.php?action=addUser">
                        <div class="form-floating">
                            <input class="form-control" id="pseudo" name="pseudo" type="text" required placeholder="Enter your pseudo..."/>
                            <label for="pseudo">Pseudo</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="email" name="email" type="email" required placeholder="Enter your email adresse..."/>
                            <label for="email">Email Adress</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="password" name="password" type="password" required placeholder="Enter your pseudo..."/>
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="password-confirm" name="password-confirm" type="password" required placeholder="Enter your password..."/>
                            <label for="password-confirm">Password confirmation</label>
                        </div>
                        <br />
                        <div ><input type="submit" value="M'inscrire" class="btn btn-primary text-uppercase" id="submitButton" /></div>
                    </form>

                    <p><strong><a href="index.php?action=login">Déjà inscrit ? Cliquez ici pour vous connecter !</strong></p>

                </div>
            </div>


        </div>
    </div>
</main>

<?php
require_once 'vues/footer.php';
?>