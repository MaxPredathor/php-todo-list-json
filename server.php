<?php

$filecontent = file_get_contents("todo-list.json");

$list = json_decode($filecontent, true);

if (isset($_POST['task'])) {
    $newTask = [
        'text' => $_POST['task'],
        'done' => false
    ];
    array_push($list, $newTask);
    file_put_contents('todo-list.json', json_encode($list));
}

if (isset($_POST['deletetask'])) {
    $index = $_POST['deletetask'];
    array_splice($list, $index, 1);
    file_put_contents('todo-list.json', json_encode($list));
}

if (isset($_GET['updatetask'])) {
    
}

header('Content-Type: application/json');

echo json_encode($list);
?>