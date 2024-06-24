<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = htmlspecialchars($_POST['ime']);
    $prezime = htmlspecialchars($_POST['prezime']);
    $email = htmlspecialchars($_POST['email']);
    $fakultet = htmlspecialchars($_POST['fakultet']);
    $zemlja = htmlspecialchars($_POST['zemlja']);
    $grad = htmlspecialchars($_POST['grad']);
    $institucija = htmlspecialchars($_POST['institucija']);
    $trajanje = htmlspecialchars($_POST['trajanje']);
    $ocjena = htmlspecialchars($_POST['ocjena']);
    $komentari = htmlspecialchars($_POST['komentari']);

    echo "<h1>Iskustvo uspješno poslano!</h1>";
    echo "<h2>Detalji:</h2>";
    echo "<p><strong>Ime:</strong> $ime</p>";
    echo "<p><strong>Prezime:</strong> $prezime</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Fakultet:</strong> $fakultet</p>";
    echo "<p><strong>Zemlja Erasmus Programa:</strong> $zemlja</p>";
    echo "<p><strong>Grad:</strong> $grad</p>";
    echo "<p><strong>Institucija:</strong> $institucija</p>";
    echo "<p><strong>Trajanje Boravka:</strong> $trajanje</p>";
    echo "<p><strong>Ocjena Iskustva:</strong> $ocjena</p>";
    echo "<p><strong>Komentari:</strong> $komentari</p>";
} else {
    echo "Podaci nisu poslani ispravno.";
}
?>
