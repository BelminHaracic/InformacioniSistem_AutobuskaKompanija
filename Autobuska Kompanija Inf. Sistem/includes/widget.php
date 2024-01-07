<!-- Contact Us Well -->
<div class="well">
    <h4>Kontaktirajte nas</h4>
    <p>Imate pitanja?</p>
    <form action="contact.php" method="post" id="contactForm">
        <div class="form-group">
            <label for="name">Ime:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Vaše ime">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Vaša email adresa">
        </div>
        <div class="form-group">
            <label for="message">Poruka:</label>
            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Vaša poruka"></textarea>
        </div>
        <button type="button" class="btn btn-primary" onclick="sendMessage()">Pošalji poruku</button>
    </form>
</div>

<script>
    function sendMessage() {
        alert("Poruka poslana!");
    }
</script>
