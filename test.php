<?php

require "vendor/autoload.php";
$task = new HtmlAcademy\Task(1, null);
$user = new HtmlAcademy\User();

$user->role = 'performer';
assert($task->getAction($user)->getName() === 'respond');
assert($task->getAction($user)->getLabel() === 'Откликнуться');

$task = new HtmlAcademy\Task(1, 2);
$user->id = 1;
$task->status = 'new';
assert($task->getAction($user)->getName() === 'cancel');
assert($task->getAction($user)->getLabel() === 'Отмена');

$task->status = 'busy';
assert($task->getAction($user)->getName() === 'done');
assert($task->getAction($user)->getLabel() === 'Выполнено');

$user->id = 2;
assert($task->getAction($user)->getName() === 'refuse');
assert($task->getAction($user)->getLabel() === 'Отказаться');
