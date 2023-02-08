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
                    <h1>Update comment</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- AFFICHAGE DES COMMENTAIRES PRESENT EN BDD -->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <h2 class="post-title">Le commentaire</h2>
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

                    <form action="index.php?action=updateComment&id=<?=$comment->identifier?>" method="post">
                        <div class="form-floating">
                            <input class="form-control" id="author" name="author" type="text" value='<?=$_SESSION['pseudo'];?>' />
                            <label for="author">Nom</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="comment" name="comment" style="height: 12rem" ><?=($comment->comment)?></textarea>
                            <label for="comment">Commentaire</label>
                        </div>
                        <br />
                        <div ><input type="submit" value="Enregistrer mon commentaire" class="btn btn-primary text-uppercase" id="submitButton" /></div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</article>

<?php
require_once 'vues/footer.php';
?>