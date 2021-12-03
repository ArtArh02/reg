<?php 
    session_start();
    if ($_SESSION['pl'] == 0) {
        header('location:index.php');
        exit();
    }
?>
<html>
    <h2>Страница добавления товара</h2>
    <form method='POST' action='itemadding.php'>
        <input type='text' name='name' required placeholder='Item Name'>
        <input type='text' name='type' required placeholder='Item Type'>
        <textarea name='description' required>Description</textarea>
        <input type='text' name='producer' required placeholder='producer'>
        <input type='text' name='price' required placeholder='price'>
        <input type='text' name='photo' required placeholder='photo'>
        <button>Добавить</button>
    </form>
</html>
