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
                    <h1><?=htmlentities($post->title)?></h1>
                    <h2 class="subheading"><?=htmlentities($post->hat)?></h2></h2>
                    <span class="meta">
                        Posted by
                        <a href="#">Thomas HUMBERT</a>
                        le <?=$post->CreationDate?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>


<!-- CONTENU DE L'ARTICLE -->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p><?=htmlentities($post->content)?></p>
            </div>
            <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'ADMIN') {?>
            <div class="col-md-10 col-lg-8 col-xl-7">
            <strong><a href="index.php?action=updateArticle&id=<?=$post->identifier?>">Modifier</a></strong> |
            <strong><a href="#" onclick="return confirmDeleteArticle(<?=$post->identifier?>)">Supprimer</a></strong>
            </div>
            <?php }?>
        </div>
    </div>
</article>

<!-- AFFICHAGE DES COMMENTAIRES PRESENT EN BDD -->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <h2 class="post-title" id="show_comments">Les commentaires</h2>
            <!-- Divider-->
            <hr class="my-4" />
            <!-- Pager-->
        </div>
    </div>
</div>

<?php
foreach ($comments as $comment) {
    ?>

<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p><?=htmlentities($comment->comment)?></p>
                <span class="meta">
                    Posted by <a href="#"><strong><?=htmlentities($comment->author)?></strong></a></br>
                    le <?=$comment->CreationDate?></br>
                    <?php if (isset($_SESSION['pseudo']) && ($_SESSION['id']) === ($comment->author_id)) {?>
                    <strong style="color:#fff;"><a href="index.php?action=updateComment&id=<?=$comment->identifier?>">Modifier</a></strong> |
                    <strong><a href="#" onclick="return confirmDelete(<?=$comment->identifier?>)">Supprimer</a></strong>
                    <?php }?>
                </span>
                <hr class="my-4" />
            </div>
        </div>
    </div>
</article>

<?php
}
?>

<!-- Divider-->
<hr class="my-4" />

<!-- FORMULAIRE D'AJOUT DE COMMENTAIRES -->
<?php if (isset($_SESSION['pseudo'])) {?>
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h2 class="post-title">Je laisse un commentaire</h2>
                <div class="my-5">
                    <form id="contactForm" action="index.php?action=addComment&id=<?=$post->identifier?>" method="post" onsubmit="return confirmSubmit()">
                        <div class="form-floating">
                            <input class="form-control" id="author" name="author" type="text" value='<?=$_SESSION['pseudo'];?>' />
                            <label for="author">Nom</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="comment" name="comment" placeholder="Enter your message here..." style="height: 12rem" ></textarea>
                            <label for="comment">Message</label>
                        </div>
                        <br />
                        <div ><input type="submit" value="Soumettre mon commentaire" class="btn btn-primary text-uppercase" id="submitButton" /></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</article>
<?php } else {?>
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p><strong><a href="index.php?action=signin">Pas encore inscrit ? Cliquez ici pour vous créer un compte et pouvoir laisser un commentaire !</strong></p>
            </div>
        </div>
    </div>
</article>
<?php }?>

<script>
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this comment?")) {
            window.location.href = "index.php?action=deleteComment&id=" + id;
        }
        return false;
    }
    function confirmDeleteArticle(id) {
        if (confirm("Are you sure you want to delete this article?")) {
            window.location.href = "index.php?action=deleteArticle&id=" + id;
        }
        return false;
    }

    function confirmSubmit() {
        alert("Votre à bien été pris en compte et il apparaitra en ligne dès qu'il aura été validé par l'administrateur !");
        return true;
    }
</script>

<?php
require_once 'vues/footer.php';
?>