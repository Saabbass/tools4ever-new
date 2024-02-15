<?php
session_start();
 
if (!isset($_SESSION['user_id'])) {
    echo "You are not logged in, please login. ";
    echo "<a href='login.php'>Login here</a>";
    exit;
}
 
if ($_SESSION['role'] != 'admin') {
    echo "You are not allowed to view this page, please login as admin";
    exit;
}
 
//ZORG ERVOOR DAT JE DE INVULVELDEN VULT
//MET DATA VAN DE GESELECTEERDE GEBRUIKER
 
require 'database.php';
require 'header.php';
 
?>
 
 <main>
    <div class="container">
        <form action="tool_add_process.php" method="post">
            <div>
                <label for="tool_name">Naam:</label>
                <input type="text" id="tool_name" name="tool_name">
            </div>
            <div>
                <label for="tool_brand">Merk:</label>
                <input type="text" id="tool_brand" name="tool_brand">
            </div>
            <div>
                <label for="tool_category">Categorie:</label>
                <input type="text" id="tool_category" name="tool_category">
            </div>
            <div>
                <label for="tool_price">Prijs:</label>
                <input type="text" id="tool_price" name="tool_price">
            </div>
 
            <input type="submit" value="Edit tool">
        </form>
    </div>
</main>
<?php require 'footer.php' ?>