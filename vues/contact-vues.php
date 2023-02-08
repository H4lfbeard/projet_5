<?php
require_once 'vues/head.php';
require_once 'vues/navbar.php';
?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/contact.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Contactez Moi</h1>
                    <span class="subheading">Vous avez des questions ? J'ai des réponses.</span>
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
                <p>Vous souhaitez rentrer en contact ? Remplissez le formulaire et je ferais en sorte de vous répondre le plus rapidement possible !</p>
                <div class="my-5">
                    <form id="contactForm" name="emailContact" action="index.php?action=submitContactForm" method="post" onsubmit="return confirmSubmit()">
                        <div class="form-floating">
                            <input class="form-control" id="name" name="name" type="text" required/>
                            <label for="name">Nom</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="email" name="email" type="email" required/>
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="phone" name="phone" type="tel" required/>
                            <label for="phone">Phone Number</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="message" name="message" style="height: 12rem" required></textarea>
                            <label for="message">Message</label>
                        </div>
                        <br />
                        <div ><input type="submit" value="Envoyer" class="btn btn-primary text-uppercase" id="submitButton" required/></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
function confirmSubmit() {
    alert("Votre formulaire de contact a bien été envoyé !");
    return true;
}
</script>

<?php
require_once 'vues/footer.php';
?>