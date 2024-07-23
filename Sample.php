<style><?php include "styles/form.css";?></style>
<?php
require_once("config.php");

$form = new Form();

$form->addInput(new TextInput("firstname", "First Name", "Bruce"));
$form->addInput(new TextInput("lastname", "Last Name", "Wayne"));

if ($_SERVER['REQUEST_METHOD']=="POST") {
    if ($form->validate()) {
        $form->setValue("firstname", $_POST['firstname']);
        $form->setValue("lastname", $_POST['lastname']);
        $firstName = $form->getValue("firstname");
        $lastName = $form->getValue("lastname");
        echo $firstName." ".$lastName;
    } else {
        $form->display(true);
    }
} else {
    $form->display();
}
