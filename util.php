<?php
function test_it($text)
{
    echo sym_amount($text);
    echo alp_amount($text);
    echo lower_upper_amount($text);
    echo punctuation_amount($text);
    echo num_amount($text);
    echo word_amount($text);
    echo sym_hashmap($text);
    echo word_hashmap($text);
}

function sym_amount($text)
{
    return 'Количество символов: ' . strlen($text) . '<br>';
}
function alp_amount($text)
{
    return 'Количество символов: ' . strlen(str_replace(" ", "", $text)) . '<br>';
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
    return "Количество строчных: $lower <br> Количество заглавных: $upper <br>";
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

    return "Количество знаков препинания: $amount <br>";
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
    return "Количество цифр: $amount <br>";
}

function word_amount($text)
{
    return "Количество слов: " . str_word_count($text, 0) . "<br>";
}

function sym_hashmap($text)
{
    $text = strtolower($text);
    $hashmap = array();

    for ($i = 0; $i < strlen($text); $i++) {
        if (
            !array_key_exists($text[$i], $hashmap)
        ) {
            $hashmap[$text[$i]] = 1;
        } else {
            $hashmap[$text[$i]] += 1;
        }
    }

    $return = "Количество вхождений символов: <br> ";
    foreach ($hashmap as $key => $value) {
        $return .= $key . ": " . $value . "<br> ";
    }

    return $return;
}

function word_hashmap($text)
{
    $words = str_word_count(strtolower($text), 1);
    $wordCount = array_count_values($words);
    $return = "Количество вхождений слов: <br> ";

    uksort($wordCount, function ($a, $b) {
        return strcasecmp($a, $b);
    });

    foreach ($wordCount as $key => $value) {
        $return .= $key . ": " . $value . "<br> ";
    }

    return $return;
}
?>