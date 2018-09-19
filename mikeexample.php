<?php

$deck = [
    ['Ace of Hearts' => 11],
    ['Ace of spades' => 11],
    ['Ace of clubs' => 11],
    ['Ace of diamonds' => 11],
    ['2 of Hearts' => 2],
    ['2 of spades' => 2],
    ['2 of clubs' => 2],
    ['2 of diamonds' => 2],
    ['3 of Hearts' => 3],
    ['3 of spades' => 3],
    ['3 of clubs' => 3],
    ['3 of diamonds' => 3],
    ['King of Hearts' => 10],
    ['King of spades' => 10],
    ['King of clubs' => 10],
    ['King of diamonds' => 10],
];

function pickCard($deck) {
    shuffle($deck);

    $card = array_pop($deck);

    $cardName = array_keys($card)[0];
    $cardValue = array_values($card)[0];

    return [$cardValue, $deck, $cardName];
}

function calc_score($card1, $card2) {
    return $card1 + $card2;
}

$data = pickCard($deck);
echo 'Player one picked: ' . $data[2] . '<br>';
$data2 = pickCard($data[1]);
echo 'Player one picked: ' . $data2[2] . '<br>';
$data3 = pickCard($data2[1]);
echo 'Player two picked: ' . $data3[2] . '<br>';
$data4 = pickCard($data3[1]);
echo 'Player two picked: ' . $data4[2] . '<br>';

$player_score1 = calc_score($data[0], $data2[0]);
$player_score2 = calc_score($data3[0], $data4[0]);

echo 'Player 1 total score: ' . $player_score1 . '<br>';
echo 'Player 2 total score: ' . $player_score2 . '<br>';


switch(TRUE) {
    case $player_score1 > 21:
        echo 'Player 1 bust, player 2 wins<br>';
        break;
    case $player_score2 > 21:
        echo 'Player 2 bust, player 1 wins<br>';
        break;
    case $player_score1 > $player_score2:
        echo 'Player 1 wins<br>';
        break;
    case $player_score2 > $player_score1:
        echo 'Player 2 wins<br>';
        break;
    case $player_score2 == $player_score1:
        echo 'Draw<br>';
        break;
}