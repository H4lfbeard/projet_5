<?php
require_once 'vues/head.php';
require_once 'vues/navbar.php';
?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/add-article.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Ajouter un article</h1>
                    <span class="subheading">Ici je rédige un nouvel article !</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>Pense à bien te relire pour ne pas faire de fautes !</p>
                <div class="my-5">
                    <form id="contactForm" action="index.php?action=submitArticle" method="post">
                        <div class="form-floating">
                            <input class="form-control" id="title" name="title" type="text"/>
                            <label for="name">Titre</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="hat" name="hat" type="text"/>
                            <label for="hat">Chapô</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="content" name="content" style="height: 12rem" ></textarea>
                            <label for="content">Contenu de l'article</label>
                        </div>
                        <br />
                        <div ><input type="submit" value="Enregistrer l'article" class="btn btn-primary text-uppercase" id="submitButton" /></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require_once 'vues/footer.php';
?>