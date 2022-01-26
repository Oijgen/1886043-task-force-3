<?php

require "vendor/autoload.php";
$task = new HtmlAcademy\Task(1, null);
$user = new HtmlAcademy\User();

//исполнитель откликается на задание
$user->role = 'performer';
assert($task->getAction($user)->getName() === 'respond');
assert($task->getAction($user)->getLabel() === 'Откликнуться');

//заказчик отменяет задание
$task = new HtmlAcademy\Task(1, 2);
$user->id = 1;
$task->status = 'new';
assert($task->getAction($user)->getName() === 'cancel');
assert($task->getAction($user)->getLabel() === 'Отмена');

//заказчик закрывает выполненное задание
$task->status = 'busy';
assert($task->getAction($user)->getName() === 'done');
assert($task->getAction($user)->getLabel() === 'Выполнено');

//исполнитель отказывается от задания
$user->id = 2;
assert($task->getAction($user)->getName() === 'refuse');
assert($task->getAction($user)->getLabel() === 'Отказаться');

//действия заданы строковыми константами этого класса

//assert($task->getStatusMap()['busy'] == 'В работе');
//assert($task->getActionMap()['done'] == 'Выполнено');
//assert($task->getStatusByAction(HtmlAcademy\Task::ACTION_CANCEL) == HtmlAcademy\Task::STATUS_CANCEL);
//assert($task->getAllowedActions(HtmlAcademy\Task::STATUS_NEW,HtmlAcademy\Task::ROLE_CLIENT) == HtmlAcademy\Task::ACTION_CANCEL);
//assert($task->getAllowedActions(HtmlAcademy\Task::STATUS_BUSY,HtmlAcademy\Task::ROLE_PERFORMER) == HtmlAcademy\Task::ACTION_REFUSE);
