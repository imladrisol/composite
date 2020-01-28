<?php

abstract class Element
{
    protected $_children = array();
    abstract public function GetChildren();
    abstract public function increment();
}
class Node extends Element
{
    public $i;

    public function __construct($i, array $children)
    {
        $this->i = $i;
        $this->_children = $children;
    }
    public function increment()
    {
        print "I am node with i: {$this->i}. I have " . count($this -> GetChildren()) . " children\n";
        $this->i++;
        foreach($this -> GetChildren() as $Child)
        {
            $Child -> increment();
        }
    }
    public function GetChildren()
    {
        return $this -> _children;
    }
}
class Leaf extends Element
{
    public $i;

    public function __construct($i)
    {
        $this->i = $i;
    }
    public function increment()
    {
        print "I am leaf with i: {$this->i}\n";
        $this->i++;
    }
    public function GetChildren()
    {
        return array();
    }
}

$leafs = [new Leaf(2), new Leaf(3)];
$node = new Node(4, $leafs);

$leafs1 = [$node, new Leaf(6)];
$node1 = new Node(5, $leafs1);

$node1->increment();
var_dump($node1);