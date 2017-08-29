<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Node.php';

/**
 * Description of SimpleLinkedList
 *
 * @author antonio
 */
class SimpleLinkedList {

    private $first;
    private $last;
    private $count;

    public function __construct() {
        $this->first = null;
        $this->last = null;
        $this->count = 0;
    }

    public function long() {
        return $this->count;
    }

    public function insertFirst($data) {
        $node = new Node($data);
        if (!$this->first) {
            $this->first = $node;
            $this->last = $node;
        } else {
            $node->next = $this->first;
            $this->first = $node;
        }

        $this->count++;
    }

    /**
     * Return true in case of insertion false if the given node couldn't be found
     * @param type $key
     * @param type $data
     * @return boolean
     */
    public function insertAfter($key, $data) {
        if (!$this->first) {
            return false;
        }
        $newNode = new Node($data);
        $iterator = $this->first;
        while ($iterator->next) {
            if ($iterator->data == $key) {
                $newNode->next = $iterator->next;
                $iterator->next = $newNode;
                $this->count++;
                return true;
            }
            $iterator = $iterator->next;
        }
        return false;
    }

    public function insertBefore($key, $data) {
        if (!$this->first) {
            return false;
        }
        $newNode = new Node($data);
        if ($this->count == 1) {
            if ($this->first->data == $key) {
                $newNode->next = $this->first;
                $this->first = $newNode;
                $this->count++;
                return true;
            } else {
                return false;
            }
        }
        $iterator = $this->first;
        while ($iterator->next) {
            if ($iterator->next->data == $key) {
                $newNode->next = $iterator->next;
                $iterator->next = $newNode;
                $this->count++;
                return true;
            }
            $iterator = $iterator->next;
        }
        return false;
    }

    public function isEmpty() {
        return $this->count == 0;
    }
    
    public function remove($key){}
    
    public function add($data){}
    public function reverse(){}
    public function find($term){}

}
