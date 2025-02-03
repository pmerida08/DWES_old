<?php
include("./configpaises.php");
$selectedCountry = '';
$capital = '';
$bandera = '';

// Comprobar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedCountry = $_POST['pais'];
    $capital = $paises[$selectedCountry]['capital'];
    $bandera = $paises[$selectedCountry]['bandera'];
}

if ($selectedCountry): ?>
    <div class="country-info">
        <h2>Información del país seleccionado:</h2>
        <p><strong>País:</strong> <?php echo $selectedCountry; ?></p>
        <p><strong>Capital:</strong> <?php echo $capital; ?></p>
        <p><strong>Bandera:</strong></p>

        <img src="<?php echo $bandera; ?>" alt="Bandera de <?php echo $selectedCountry; ?>" class="flag">
    </div>
<?php endif;
?>
<form action="" method="post">
    <label for="atras">
        <input type="submit" name="atras" value="Atras">
    </label>
</form>

<?php
if (isset($_POST['atras'])){
    header('Location: ./ejercicio4.php');
}
?>