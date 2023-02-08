<?php
require_once 'vues/head.php';
require_once 'vues/navbar.php';
?>

   <!-- Page Header-->
   <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
      <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
               <div class="col-md-10 col-lg-8 col-xl-7">
                  <div class="site-heading">
                        <h1>Thomas HUMBERT</h1>
                        <span class="subheading">Votre future développeur PHP / SYMFONY</span></br>
                        <a target="_blank" href="assets/img/humbert2023.pdf"><img class="id-photo" src="assets/img/tom.png" alt="Thomas Humbert"></a>
                  </div>
               </div>
            </div>
      </div>
   </header>

<?php
foreach ($posts as $post) {
    ?>

   <!-- Main Content-->
   <div class="container px-4 px-lg-5" id="articles_blog">
      <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
               <!-- Post preview-->
               <div class="post-preview">
                  <a href="index.php?action=post&id=<?=urlencode($post->identifier)?>">
                        <h2 class="post-title"><?=htmlspecialchars($post->title)?></h2>
                        <h3 class="post-subtitle"><?=htmlspecialchars($post->hat)?></h3>
                  </a>
                  <p class="post-meta">
                        Posted by
                        <a href="#">Thomas HUMBERT</a>
                        le <?=$post->CreationDate?>
                  </p>
               </div>
               <!-- Divider-->
               <hr class="my-4" />
               <!-- Pager-->
            </div>
      </div>
   </div>

<?php
} // Fin de la boucle des articles
require_once 'vues/footer.php';
?>