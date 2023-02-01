<body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">Thomas HUMBERT</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php#articles_blog">Articles</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?action=curriculum">Curriculum Vitae</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?action=contact">Contact</a></li>
                        <?php if (isset($_SESSION['pseudo'])) {  ?>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?action=logout">Se déconnecter de <?= $_SESSION['pseudo']; ?></a></li>                        
                        <?php } else {  ?>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?action=login">Se connecter / s'inscrire</a></li>
                        <?php } ?>
                     </ul>
                </div>
            </div>
        </nav>


<!-- Ancienne navbar -->
<!--<body>
<header class="container">
   <ul class="row">
      <li class="col">
         <a href="#">Accueil</a>
      </li>
      <li class="col">
         <a href="#">Articles</a>
      </li>
      <li class="col">
         <a href="#">Curriculum Vitae</a>
      </li>
      <li class="col">
         <a href="#">Contact</a>
      </li>
      <li class="col">
         <a href="#">Se connecter / s'incrire</a>
      </li>
   </ul>
</header>-->
