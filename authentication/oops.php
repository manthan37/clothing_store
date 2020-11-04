<?php
// OOP 

// wrapping data member and member function into single
// unit is known as encapsulation
class Eating
{
    // access modifier
    public $isVegitarian = 'true';

    public function isEatFruit($option)
    {
        if ($option == 'yes') {
            return true;
        }
        return false;
    }
}

$eat = new Eating;

if ($eat->isEatFruit('no')) {
    echo "AA vegi che";
} else {
    echo "AA toh non veg khaay laa";
}
