<?php
// По исполнении скрипта возвращаем заголовок с редиректом назад
header('Location: ' . $_SERVER['HTTP_REFERER']);
date_default_timezone_set('Europe/Moscow');

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $r = $_GET["r"];
    $x = $_GET["x"];
    $y = $_GET["y"];

    $start_time = microtime(true);

    if (!valid_input($r, $x, $y))
        return;

    $r = intval($r);
    $x = floatval($x);
    $y = floatval($y);


    session_start();

    $result = check_sections($r, $x, $y);
    $elapsed_time = microtime(true) - $start_time;

    if (!isset($_SESSION['arr']) || strcmp($_GET['clear'], "on") == 0)
        $_SESSION['arr'] = array();

    array_push($_SESSION['arr'], get_col($r, $x, $y, $result, $elapsed_time));
}

function check_sections($r, $x, $y)
{
    if (($x >= 0) && ($y >= 0) && ($x <= $r) && ($y <= $r / 2))
        return true;

    if (($x <= 0) && ($y >= 0) && ($x * $x) + ($y * $y) <= $r * $r)
        return true;

    if (($x >= 0) && ($y <= 0) && $y >= 2 * $x - $r / 2)
        return true;

    return false;
}

function get_col($r, $x, $y, $result, $elapsed_time)
{
    return
        "<tr>" .
        "<td>" . $r . "</td>" .
        "<td>" . $x . "</td>" .
        "<td>" . $y . "</td>" .
        "<td>" . ($result ? "In" : "Out of") . "</td>" .
        "<td>" . number_format($elapsed_time, 4) . "</td>" .
        "<td>" . date("h:i:s") . "</td>" .
        "</tr>";
}

function valid_input($r, $x, $y)
{
    return
        !(!is_numeric($r) ||
            !is_numeric($x) ||
            !is_numeric($y) ||
            strlen($x) > 8 ||
            strlen($y) > 8 ||
            strlen($r) > 8 ||
            !in_array($r, array("1", "2", "3", "4", "5")) ||
            !in_array($x, array("-2", "-1.5", "-1", "-0.5", "0", "0.5", "1", "1.5", "2")) ||
            floatval($y) <= -5.0 || floatval($y) >= 3.0);
}

?>
