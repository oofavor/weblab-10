<?php
function test_it($text)
{
    $res = '';
    $res .= sym_amount($text);
    $res .= alp_amount($text);
    $res .= lower_upper_amount($text);
    $res .= punctuation_amount($text);
    $res .= num_amount($text);
    $res .= word_amount($text);
    $res .= sym_hashmap($text);
    $res .= word_hashmap($text);
    echo $res;
}

function sym_amount($text)
{
    return 'Количество символов: ' . mb_strlen($text) . '<br>';
}
function alp_amount($text)
{
    return 'Количество символов: ' . mb_strlen(str_replace(" ", "", $text)) . '<br>';
}

function lower_upper_amount($text)
{
    $lower = 0;
    $upper = 0;
    for ($i = 0; $i < strlen($text); $i++) {
        $sym = mb_substr($text, $i, 1);
        if (mb_strtoupper($sym) != $sym) {
            $lower += 1;
        }
        if (mb_strtolower($sym) != $sym) {
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

    return "Количество слов: " . count(preg_split('/\s+/', trim($text))) . "<br>";
}

function sym_hashmap($text)
{
    $text = mb_strtolower($text);
    $hashmap = array();

    for ($i = 0; $i < mb_strlen($text); $i++) {
        $sym = mb_substr($text, $i, 1);
        if (!array_key_exists($sym, $hashmap)) {
            $hashmap[$sym] = 1;
        } else {
            $hashmap[$sym] += 1;
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

    $words = preg_split('/\s+/', trim(mb_strtolower($text)));
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