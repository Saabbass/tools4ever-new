<?php
session_start();
require 'database.php';

if (isset($_GET['id'])) {
    $tool_id = $_GET['id'];
    $sql = "SELECT * FROM tools WHERE tool_id = $tool_id";
    $result = mysqli_query($conn, $sql);
    $tool = mysqli_fetch_assoc($result);
}
require 'header.php';
?>

<main>
    <div class="container">
        <?php if (isset($tool)) : ?>
            <div class="product-detail">
                <img src="<?php echo isset($tool['image']) ? 'images/' . $tool['image'] : 'https://placehold.co/200' ?>" alt="<?php echo $tool['tool_name'] ?>">
                <h3><?php echo $tool['tool_name'] ?></h3>
                <p><?php echo $tool['tool_category'] ?></p>
                <p>€ <?php echo $tool['tool_price'] ?></p>
                <p>
                    <a href="add_to_cart.php?id=<?php echo $tool['tool_id']; ?>" class="btn">Bestel</a>
                </p>
            </div>
        <?php else : ?>
            <p>Tool not found.</p>
        <?php endif; ?>
    </div>
</main>
<?php require 'footer.php' ?>