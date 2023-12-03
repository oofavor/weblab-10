<?php
function test_it($text)
{
    echo sym_amount($text);
    echo alp_amount($text);
    echo punctuation_amount($text);
    echo num_amount($text);
    echo word_amount($text);

}

function sym_amount($text)
{
    return 'Количество символов: ' . strlen($text) . '<br>';
}
function alp_amount($text)
{
    return 'Количество символов: ' . strlen(str_replace($text, " ", "")) . '<br>';
}

function lower_upper_amount($text)
{
    $lower = 0;
    $upper = 0;
    for ($i = 0; $i < strlen($text); $i++) {
        if (strtolower($text[$i]) == $text[$i]) {
            $lower += 1;
        }
        if (strtoupper($text[$i]) == $text[$i]) {
            $upper += 1;
        }
    }
    return [$lower, $upper];
}

function punctuation_amount($text)
{
    $punc = '.,;:!?-()"' . "'";
    $amount = 0;

    for ($i = 0; $i < strlen($text); $i++) {
        if ($text[$i] != " " & str_contains($punc, $text[$i])) {
            $amount += 1;
        }
    }

    return $amount;
}

function num_amount($text)
{
    $nums = "0123456789";
    $amount = 0;
    for ($i = 0; $i < strlen($text); $i++) {
        if ($text[$i] != " " & str_contains($nums, $text[$i])) {
            $amount += 1;
        }
    }
}

function word_amount($text)
{
    return str_word_count($text, 0);
}

function sym_hashmap($text)
{
    $text = strtolower($text);
    $hashmap = array();

    for ($i = 0; $i < strlen($text); $i++) {
        if (
            array_key_exists($text[$i], $hashmap)
        ) {
            $hashmap[$text[$i]] = 1;
        } else {
            $hashmap[$text[$i]] += 1;
        }
    }
    return $hashmap;
}

function word_hashmap($text)
{
    $words = str_word_count($text, 1);
    $hashmap = array();
    foreach ($words as $word) {
        $hashmap[$word] = substr_count($text, $word);
    }
    return $hashmap;
}
?>