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
        while ($iterator) {
            if ($iterator->data == $key) {
                $newNode->next = $iterator->next;
                $iterator->next = $newNode;
                $this->count++;
                if($iterator->data== $this->last->data){
                    $this->last=$newNode;
                }
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
        $prev = $iterator = $this->first;
        while ($iterator) {
            if ($iterator->data == $key) {
                if ($iterator->data == $this->first->data) {
                    $this->first = $newNode;
                    $newNode->next = $iterator;
                    $this->count++;
                    return true;
                }
                $prev->next = $newNode;
                $newNode->next = $iterator;
                $this->count++;
                return true;
            }
            $prev = $iterator;
            $iterator = $iterator->next;
        }
        return false;
    }

    public function isEmpty() {
        return $this->count == 0;
    }

    public function remove($key) {

        $prev = $current = $this->first;
        while ($current) {
            if ($current->data == $key) {
                if ($this->first->data == $key) {
                    $this->first = $current->next;
                } elseif ($this->last->data == $key) {
                    $this->last = $prev;
                    $prev->next = null;
                } else {
                    $prev->next = $current->next;
                }
                $this->count--;
                return $current->data;
            }
            $prev = $current;
            $current = $current->next;
        }
        return false;
    }

    public function add($data) {
        $new = new Node($data);
        if ($this->isEmpty()) {
            $this->first = $this->last = $new;
            $this->count++;
            return $this->last->data;
        }
        $this->last->next = $new;
        $this->last = $new;
        $this->count++;
        return $this->last->data;
    }

    public function reverse() {
        //print_r($this->last->data);exit;
        $reverse = new SimpleLinkedList();

        while ($this->count > 0) {
            $reverse->add($this->remove($this->last->data));
        }

        return $reverse->render();
    }

    public function find($term) {
        $current = $this->first;
        while ($current) {
            if ($current->data == $term) {
                return $current;
            }
        }
        return false;
    }

    public function render() {
        $result = "";
        $current = $this->first;
        while ($current) {
            $result .= " {$current->data} =>";
            $current = $current->next;
        }
        return $result;
    }

}

$list = new SimpleLinkedList();
$list->add(3);
$list->add(35);
$list->add(7);

$list->insertAfter(3, 62);
$list->insertAfter(7, 100);
$list->insertBefore(3, 620);

print_r($list->render() . "<br>");
print_r($list->reverse());
exit;



