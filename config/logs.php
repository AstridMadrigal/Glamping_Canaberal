<?php

$_log_date = (YII_DEBUG) ? '' : date('Ymd_');
$_max_file_size = 9999999;

$user_prefix = function ($message) {
    $user = Yii::$app->has('user', true) ? Yii::$app->get('user') : null;
    $userID = $user ? $user->getId(false) : '-';
    return "[$userID]";
};

$except = ['yii\db\*'];

return [
    [
        'class' => 'yii\log\FileTarget',
        'levels' => ['error'],
        'logFile' => '@app/runtime/logs/' . $_log_date . 'error.log',
        'maxFileSize' => $_max_file_size,
        'prefix' => $user_prefix,
    ],
    [
        'class' => 'yii\log\FileTarget',
        'levels' => ['info'],
        'logFile' => '@app/runtime/logs/' . $_log_date . 'info.log',
        'maxFileSize' => $_max_file_size,
        'prefix' => $user_prefix,
        'except' => $except,
    ],
];

?>