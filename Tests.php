<?php
class Person{
    private $name = 'Brad';

    public function __construct($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
};

$person = new Person('Aigars');
echo $person->getName();



?>

