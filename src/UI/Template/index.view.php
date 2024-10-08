<?php include '_Partials/header.view.php' ?>
<main>
    <div class="rendez-vous">
        <h1 class="">Prise de rendez vous</h1>
        <p>Choisir le service</p>
        <div id="#rendez-vous">
            <form method ="post" action = "reservation/create">
                <div class="form-input">
                    <label for="services">Service</label>
                    <select id="services" name="services">
                        <option value="Eric" selected>Eric</option>
                        <option value="Nadege">Nadege</option>
                    </select>
                </div>
                <div class="form-input">
                    <label for="date-rendez-vous">Calendrier</label>
                    <input type ="datetime-local" name="DateCalendar" id="DateCalendar" />
                </div>
                <div class="form-input">
                    <input type ="reset" value ="annuler" />
                </div>
                <div class="form-input">
                    <input type ="submit" value ="prendre rendez vous" />
                </div>
            </form>
        </div>
    </div>
</main>
<?php include '_Partials/footer.view.php' ?>
