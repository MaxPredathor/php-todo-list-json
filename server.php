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

if (isset($_POST['updatetask'])) {
    $update = $_POST['updatetask'];
    if (isset($list[$update])) {
        if ($list[$update]['done'] === false){
            $list[$update]['done'] = true;
            file_put_contents('todo-list.json', json_encode($list));
        }else{
            $list[$update]['done'] = false;
            file_put_contents('todo-list.json', json_encode($list));
        }
        
    }
}

header('Content-Type: application/json');

echo json_encode($list);
?>