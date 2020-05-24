<?php

class NavbarItem {
    public $route;
    public $name;

    public function  __construct($route,$name) {
        $this->route = $route;
        $this->name = $name;
      }
}

?>