    <form action="" method="post">
        <button type="submit" name="volver">Volver</button>
    </form>

    <?php
    if (isset($_POST["volver"])) {
        header("Location: home.php");
    }
    ?>

<?php 
    showFooter();
?>