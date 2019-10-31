<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('Invalid Request');
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$med_id = filter_input(INPUT_POST, 'med_id', FILTER_VALIDATE_INT);
$amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_INT,
    array(
        'options' => array(
            'min_range' => 0,
            'max_range' => 10
        )
    ));
$comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
$comment = trim($comment);

$isValid = $id !== false
    && $med_id !== false
    && $amount !== false
    && strlen($comment) <= 5000;