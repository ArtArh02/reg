
<?php 
    session_start();
    if ($_SESSION['pl'] == 0) {
        header('location:index.php');
        exit();
    }

    if (isset($_POST['name'])) {$name = $_POST['name'];} 
    if (isset($_POST['type'])) {$type = $_POST['type'];} 
    if (isset($_POST['description'])) {$description = $_POST['description'];} 
    if (isset($_POST['producer'])) {$producer = $_POST['producer'];} 
    if (isset($_POST['price'])) {$price = $_POST['price'];}
    if (isset($_POST['photo'])) {$photo = $_POST['photo'];} 

    if (empty($name) or empty($type) or empty($description) or empty($producer) or empty($price) or empty($photo)) {
		exit("При выполнении операции произошла ошибка, вернитесь назад, перепроверьте данные и попробуйте ещё раз");
    }

    $db = new mysqli("localhost","phpcon", "123qweasdzxc","items");

    $result = mysqli_query($db, "INSERT INTO items (name,type,description,producer,price,photo) VALUES('$name','$type','$description','$producer','$price','$photo');");
	
    if ($result=='TRUE') {echo "Товар добавлен в базу данных";}
	else {echo "При выполнении операции произошла ошибка, вернитесь назад, перепроверьте данные и попробуйте ещё раз";
    echo $result;}
?>