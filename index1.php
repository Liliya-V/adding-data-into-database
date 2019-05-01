
<?php

$db = new PDO("mysql:host=192.168.20.20;dbname=Exercise2", 'root', '');
$db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


$adultname = $_POST['adultname'];
$adultDOB = $_POST['adultDOB'];
$adultgender = $_POST['adultgender'];
$sqlAdult = "INSERT INTO `adults` (`name`, `DOB`, `gender`) VALUES (:adultname, :adultDOB, :adultgender);";
$queryAdult= $db->prepare($sqlAdult);
$resultAdult = $queryAdult->execute([':adultname'=>$adultname, ':adultDOB'=>$adultDOB, ':adultgender'=>$adultgender]);

$adultid = $db->lastInsertId();

$childname = $_POST['childname'];
$childDOB = $_POST['childDOB'];
$sqlChild = "INSERT INTO `children` (`name`, `DOB`) VALUES (:childname, :childDOB);";
$queryChild= $db->prepare($sqlChild);
$resultChild = $queryChild->execute([':childname'=>$childname, ':childDOB'=>$childDOB]);

$childid = $db->lastInsertId();

$petName = $_POST['petname'];
$sqlPet = "INSERT INTO `pets` (`type`, `belongs_to`) VALUES (:petname, :adultid);";
$queryPet= $db->prepare($sqlPet);
$resultPet = $queryPet->execute([':petname'=>$petName, ':adultid'=>$adultid]);

$petid = $db->lastInsertId();

$sqlParentOf = "INSERT INTO `parent_of` (`adults_id`, `children_id`) VALUES (:adultId, :childrenId);";
$queryParentOf = $db->prepare($sqlParentOf);
$resultParentOf = $queryParentOf-> execute ([':adultId'=>$adultid, ':childrenId'=>$childid]);


$sqlPetId = "INSERT INTO `owner_of` (`adults_id`, `pet_id`) VALUES (:adultId, :petId);";
$queryPetId = $db->prepare($sqlPetId);
$resultPetId = $queryPetId-> execute ([':adultId'=>$adultid, ':petId'=>$petid]);

if ($childDOB<=$adultDOB) {
    echo 'Sorry, but a child can`t be older then a parent or be a same age';
} else {
    echo 'Thank you for submitting your information';
}






