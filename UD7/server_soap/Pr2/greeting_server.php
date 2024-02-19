<?php

class Greeting {

    public function sayHello($name) {
        return "Hello " . $name;
    }

    public function sayGoodbye($name) {
        return "Goodbye " . $name;
    }
}

$server = new SoapServer('http://localhost/DWES/UD7/server_soap/Pr2/greetings.wsdl');
$server->setClass(Greeting::class);
$server->handle();
?>
