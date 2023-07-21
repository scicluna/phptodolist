<?php

$name = $_POST["todo"] ?? '';




if (trim($name)) {
    echo "Todo Saved";
    if (!file_exists('todo.json')) {
        $jsonArray = [];
    } else {
        $json = file_get_contents('todo.json');
        $jsonArray = json_decode($json, true);
    }
    $jsonArray[$name] = ['completed' => false];
    file_put_contents('todo.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
}

header('Location: index.php');
