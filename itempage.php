<?php
    session_start();
    $db = new mysqli("localhost","phpcon", "123qweasdzxc","items");
    $users = new mysqli("localhost","phpcon", "123qweasdzxc","users");

    if (isset($_GET['itemID'])) {$itemID = $_GET['itemID'];} 
    if (empty($itemID)) { exit("Ошибка, запрос сформирован не корректно"); }

    $res = mysqli_query($db, "SELECT * FROM items WHERE id = $itemID;");
    if(empty($res)) { exit("Ошибка 404. Товар удален, перемещен или не существует."); }

    $item = mysqli_fetch_array($res);
?>
<html>
<?php 
    echo "<h2>".$item['name']."</h2>";
    echo "<h4>".$item['type']."</h4>";
    echo "<h5> Производство: ".$item['producer']."</h5>";
    echo "<h3>".$item['price']." РУБ</h3>";
    echo "<img src=\"".$item['photo']."\">";
    echo "<p>".$item['description']."</p>";
?> 
<script>
    var img = document.querySelector('img')
    img.onerror = function() {
        img.setAttribute('src', 'default.jpg')
    }
</script>
<h3>Мнение покупателей</h3>
<?php
    $comms = mysqli_query($db, "SELECT * FROM comments WHERE ItemID = $itemID;");
    $ranksum = 0;
    $count = 0;
    $comm = mysqli_fetch_array($comms);
    while ($comm != null) {
        $ranksum = $ranksum + (int)$comm['rank'];
        $count++;
        $comm = mysqli_fetch_array($comms);
    }   
    $rank = $ranksum/$count;
    echo "<h3>Рейтинг: ".$rank."/5 </h3>";


    $comms = mysqli_query($db, "SELECT * FROM comments WHERE ItemID = $itemID;");
    $comm = mysqli_fetch_array($comms);
    while ($comm != null) {
        $commentorName = $comm['UserID'];
        $commentorRank = $comm['rank'];
        $commentorComm = $comm['comm'];
        $commentorTitle = $comm['titel'];

        echo "<div style=\"border: 4px double black;\"><h3>".$commentorTitle."</h3><h4> Оценка: ".$commentorRank."</h4><h5>Автор: ".$commentorName."</h5><p>".$commentorComm."</p>";
        $comm = mysqli_fetch_array($comms);
    } 
?>
</html>