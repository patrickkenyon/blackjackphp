<?php
$deck_template = [
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

function card_select($deck) {
    $rand_suit = array_rand($deck, 1); // selecting one suit ($rand_suit) from the $deck, returns the key.

    $rand_suit_cards = $deck[$rand_suit]; // suit array ($rand_suit_cards) containing 13 cards of that suit referenced.

    $rand_card = array_rand($rand_suit_cards, 1); // selecting one card ($rand_card1) from the suit ($rand_suit_cards), returns the key.

    $rand_card_value = $rand_suit_cards[$rand_card]; // searches the array for the value of the card using the key.

    return array ($rand_suit, $rand_card, $rand_card_value); //returns suit, card and value as an array.
}

function output_card($card) {
    if (is_array($card)) {
        return " card is a " . $card[1] . " of " . $card[0] . ", it has a value of " . "$card[2]" . "\n";
    } else {
        return FALSE;
    }
}

function calc_total_score($player_card_1_array, $player_card_2_array) {
    return $player_card_1_array[2] + $player_card_2_array[2];
}

$player_1_card_1_array = card_select($deck_template); //feeds $deck_template into card_select function, returns an array containing suit, card and value.
echo "Player one's first" . output_card($player_1_card_1_array);
unset($deck_template[$player_1_card_1_array[0]][$player_1_card_1_array[1]]); //finds the card chosen in $player_1_card_1_array and removes it from $deck_template using 0 = suit and 1 = card.

$player_1_card_2_array = card_select($deck_template);
echo "Player one's second" . output_card($player_1_card_2_array);
unset($deck_template[$player_1_card_2_array[0]][$player_1_card_2_array[1]]);
$total_score_p1 = calc_total_score($player_1_card_1_array, $player_1_card_2_array);
echo "Player one's total score is " . $total_score_p1 . "\n\n";

$player_2_card_1_array = card_select($deck_template);
echo "Player two's first" . output_card($player_2_card_1_array);
unset($deck_template[$player_2_card_1_array[0]][$player_2_card_1_array[1]]);

$player_2_card_2_array = card_select($deck_template); //feeds $deck_template into card_select function, returns an array containing suit, card and value.
echo "Player two" . output_card($player_2_card_2_array);
unset($deck_template[$player_2_card_2_array[0]][$player_2_card_2_array[1]]);
$total_score_p2 = calc_total_score($player_2_card_1_array, $player_2_card_2_array);
echo "Player two's total score is " . $total_score_p2 . "\n\n";

if ($total_score_p1 > 21) {
    echo "Player one is bust :(, Player two wins!!!";
} elseif ($total_score_p2 > 21) {
    echo "Player two is bust :(, Player one wins!!!";
}
elseif ($total_score_p1 === $total_score_p2) {
    echo "It's a draw you jokers.";
}
elseif ($total_score_p1 > $total_score_p2) {
    echo "Player one wins!!!";
}
elseif ($total_score_p2 > $total_score_p1) {
    echo "Player two wins!!!";
}