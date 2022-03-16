<?php

class MyClass
{
    public $name = "mike";
    public $work = "devOps";
    public $location = "California";
}

$Test = new MyClass();
echo '<prv>';

print_r((array) $Test);

foreach ((array) $Test as $key => $value) {
    $len = strlen($key);

    echo "{$key}({$len}) => {$value}";

    for ($i = 0; $i < $len; ++$i) {
        echo "{$key[$i]}";
    }
}

class A
{
    public static $name = "mike";
    public $Lname = 1;

    public function first()
    {
        self::$name;
    }
}

class B extends A
{

    public function __construct($name, $Lname)
    {
        $this->Lname = $Lname;
        parent::$name;
    }
    public function second()
    {
        $this->Lname;
        parent::$name;
    }
}

class c extends A
{
    public function third()
    {
        $this->name++;
    }
}

A::$name;

try {
    $reflection = new reflection(A::first);
    if ($reflection->isStatic) {

    }
} catch (Exception $e) {
    echo $e->getMessage();
}

class MyClass
{
    const const_value = "mike";

}

class AnotherClass extends MyClass
{
    public static $static = "double colon";

    public function double_colon()
    {
        parent::const_value;
        self::static;
    }
}

$obj = new AnotherClass();
$obj::static;

class Ancestor
{
    public $Prefix = '';
    private $strings = 'Baz';
    public function Foo()
    {
        return $this->Prefix . $this->_strings;
    }
}

class MyParent extends Ancestor
{

    public function Foo()
    {
        echo $this->Prefix = null;
        return parent::Foo();
    }
}

class Child extends MyParent
{
    public function Foo()
    {
        echo $this->Prefix = 'foo';
        return Ancestor::Foo();
    }
}

abstract class Parents
{
    abstract protected function getValues();
    abstract protected function setValue($Prefix);

    public function getItem()
    {
        return $this->getValues();
    }
}

class Child extends Parents
{
    protected function getValues()
    {
        return "abstracted values";
    }

    protected function setValue($Prefix)
    {
        return "abstracted values {$Prefix}";
    }

}

interface ProductInterface
{
    public function do_Sell();
    public function do_buy();
}

abstract class defaultClass implements ProductInterface
{

    private $doSell = false;
    private $doBuy = false;
    abstract public function do_more();

    public function do_sell()
    {
        return $this->do_sell = true;
    }
    public function do_buy()
    {
        return $this->doBuy = true;
    }
}

class MyParents extends defaultClass
{
    public function do_more()
    {

        return $this->doBuy = true;
    }
}

class Child extends defaultClass
{

    public function do_buy()
    {
        echo "we are overriding";
        parent::do_buy();
    }

    public function do_more()
    {
        echo "we are overriding";
    }
}

class outer
{
    private $pop1 = 1;
    protected $pop2 = 2;

    public function func1()
    {
        return 3;
    }

    public function func2($pop)
    {
        return new class($this->pop1) extends outer
        {
            private $pop3;
            public function __construct($pop)
            {
                $this->pop3 = $pop;
            }

            public function func3()
            {
                return $this->pop2 + $this->pop3 + $this->func1();
            }
        };
    }
}
