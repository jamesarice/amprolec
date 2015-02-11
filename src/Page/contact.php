<?php
namespace App\Page;

class Contact extends \Gt\Page\Logic {

public function go() {
    if(!isset($_POST["submit"])) {
        return;
    }

    $myemail  = "james@studiogutsy.co";

    if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)) {
        $this->document->getElementById("formError")->textContent = "Sorry, your email, {$_POST["email"]}, isn't valid.";
        return;
    }

    $message = "Hello!

    Your contact form has been submitted by:

    Name: {$_POST["name"]}
    E-mail: {$_POST["email"]}

    Comments:
    {$_POST["comments"]}

    ";

    mail($myemail, "Contact form message", $message);

    header('Location: /thank-you.html');
    exit();

}

}#