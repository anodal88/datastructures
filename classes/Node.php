<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Node
 *
 * @author antonio
 */
class Node {

    public $next;
    public $data;

    public function __construct($data = null) {
        $this->next = null;
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function hasNext() {
        return $this->next !== null;
    }
    

}
