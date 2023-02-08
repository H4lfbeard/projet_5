<?php
require_once 'vues/head.php';
require_once 'vues/navbar.php';
?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>Mise à jour de l'article</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- AFFICHAGE DES COMMENTAIRES PRESENT EN BDD -->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <h2 class="post-title">L'article</h2>
            <!-- Divider-->
            <hr class="my-4" />
            <!-- Pager-->
        </div>
    </div>
</div>

<!-- FORMULAIRE MODIFICATION DU COMMENTAIRE -->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="my-5">
                    <form action="index.php?action=updateArticle&id=<?=$post->identifier?>" method="post">
                        <div class="form-floating">
                            <input class="form-control" id="title" name="title" type="text" value='<?=($post->title)?>' />
                            <label for="author">Titre</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="hat" name="hat" style="height: 12rem" ><?=($post->hat)?></textarea>
                            <label for="hat">Chapô</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="content" name="content" style="height: 12rem" ><?=($post->content)?></textarea>
                            <label for="content">Contenu</label>
                        </div>
                        <br />
                        <div ><input type="submit" value="Enregistrer mon article" class="btn btn-primary text-uppercase" id="submitButton" /></div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</article>

<?php
require_once 'vues/footer.php';
?>