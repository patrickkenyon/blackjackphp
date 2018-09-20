<?php

require('../blackjack.php');

use PHPUnit\Framework\TestCase;
class blackjack extends TestCase
{

public $deck_template = [
    'hearts' => [
    'A' => 11,
    '2' => 2,
    '3' => 3,
    '4' => 4,
    '5' => 5,
    '6' => 6,
    '7' => 7,
    '8' => 8,
    '9' => 9,
    '10' => 10,
    'J' => 10,
    'Q' => 10,
    'K' => 10,
    ],
    'spades' => [
    'A' => 11,
    '2' => 2,
    '3' => 3,
    '4' => 4,
    '5' => 5,
    '6' => 6,
    '7' => 7,
    '8' => 8,
    '9' => 9,
    '10' => 10,
    'J' => 10,
    'Q' => 10,
    'K' => 10,
    ],
    'diamonds' => [
    'A' => 11,
    '2' => 2,
    '3' => 3,
    '4' => 4,
    '5' => 5,
    '6' => 6,
    '7' => 7,
    '8' => 8,
    '9' => 9,
    '10' => 10,
    'J' => 10,
    'Q' => 10,
    'K' => 10,
    ],
    'clubs' => [
    'A' => 11,
    '2' => 2,
    '3' => 3,
    '4' => 4,
    '5' => 5,
    '6' => 6,
    '7' => 7,
    '8' => 8,
    '9' => 9,
    '10' => 10,
    'J' => 10,
    'Q' => 10,
    'K' => 10,
    ]
];

    public function testcard_select()
    {
        $card = card_select($this->deck_template);
        $suit = card_select($this->deck_template)[0];
        $type = card_select($this->deck_template)[1];
        $value = card_select($this->deck_template)[2];
        $this->assertInternalType('string', $suit);
        $this->assertInternalType('string', $type);
        $this->assertInternalType('integer', $value);
        $this->assertInternalType('array', $card);
        $this->assertCount(3, $card);
    }
//Success test
    public function testoutput_card()
    {
        $broken_array = 'foo';
        $expected = FALSE;
        $broken_card = output_card($broken_array);
        $this->assertEquals($broken_card, $expected);
    }
//Error test

//    public function testcalc_total_score()
//    {
//
//    }

}
?>