
<?php
$db = new PDO("mysql:host=192.168.20.20;dbname=Exercise2", 'root', '');
$db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$sql1 = "SELECT `name` FROM `children`;";
$query1= $db->query($sql1);
$children = $query1->fetchAll();
$sql2 = "SELECT `name` FROM `adults`;";
$query2= $db->query($sql2);
$parents = $query2->fetchAll();
?>
    <form  action="index1.php" method="POST">
       Adult name: <input type="text" name="adultname">
            <br>
       Adult DOB: <input type="date" name="adultDOB">
            <br>
       Adult gender: <select name="adultgender">
            <option value="m">m</option>
            <option value="f">f</option>
            </select>
            <br><br>
        Child name: <input type="text" name="childname">
        <br>
        Child DOB: <input type="date" name="childDOB">
        <br><br>
        Pet name: <input type="text" name="petname">
        <br><br><br><br>
        <input type="submit" value="insert">
    </form>

