<?php
namespace Prokrastinat\Entity;

class BaseEntity 
{
    public function __get($name) {
        return $this->$name;
    }
    public function __set($name, $val) {
        $this->$name = $val;
    }
}
