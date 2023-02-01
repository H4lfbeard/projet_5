<?php
   require_once('vues/head.php');
   require_once('vues/navbar.php');
?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>Page Admin</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- AFFICHAGE DES COMMENTAIRES PRESENT EN BDD -->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <h2 class="post-title" id="show_comments">Les commentaires à valider</h2>
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
                <p><?= htmlspecialchars($comment->comment) ?></p>
                <span class="meta">
                    Posted by <a href="#"><strong><?= htmlspecialchars($comment->author) ?></strong></a></br>
                    le <?= $comment->CreationDate ?></br>
                </span>
                <strong style="color:#fff;"><a href="index.php?action=submitComment&id=<?= $comment->identifier ?>">Valider</a></strong> | 
                <strong><a href="#" onclick="return confirmDelete(<?= $comment->identifier ?>)">Supprimer</a></strong>
                <hr class="my-4" />
            </div>
        </div>
    </div>
</article>

<?php
    }
?>

<!-- AFFICHAGE DES USERS PRESENT EN BDD -->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <h2 class="post-title" id="show_users">La liste utilisateurs</h2>
            <!-- Divider-->
            <hr class="my-4" />
            <!-- Pager-->
        </div>
    </div>
</div>

<?php
    foreach ($users as $user) {
?>

<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p><?= htmlspecialchars($user->pseudo) ?> | <?= htmlspecialchars($user->user_role) ?></p>
                <strong><a href="index.php?action=passAdmin&id=<?= $user->identifier ?>">Passer ADMIN</a></strong> | 
                <strong><a href="index.php?action=passUser&id=<?= $user->identifier ?>">Passer USER</a></strong>
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

<script>
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this comment?")) {
            window.location.href = "index.php?action=deleteComment&id=" + id;
        }
        return false;
    }
</script>

<?php
require_once('vues/footer.php');
?>