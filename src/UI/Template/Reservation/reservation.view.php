<?php include 'src/UI/Template/_Partials/header.view.php' ?>
<main>
    <h1 class="">Reservation</h1>
    <?php
    $reservation ="";
    if(isset($_POST) && !empty($_POST))
    {
        $date = isset($_POST['DateCalendar'])? htmlspecialchars($_POST['DateCalendar']): null ;
        $service = isset($_POST['services'])? htmlspecialchars($_POST['services']): null;
        $reservation = "<p>Votre rendez vous est pris pour le $date avec $service</p>";
    } else {
        $reservation = "<p><a href='/' >prendre un rendez-vous</a></p>";
    }
    echo $reservation;
    ?>
</main>

<?php include 'src/UI/Template/_Partials/footer.view.php' ?>
