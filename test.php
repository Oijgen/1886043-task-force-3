<?php

require "vendor/autoload.php";
$task = new HtmlAcademy\Task(111111, 211111);
assert($task->getStatusMap()['busy'] == 'В работе');
assert($task->getActionMap()['done'] == 'Выполнено');
assert($task->getStatusByAction(HtmlAcademy\Task::ACTION_CANCEL) == HtmlAcademy\Task::STATUS_CANCEL);
assert($task->getAllowedActions(HtmlAcademy\Task::STATUS_NEW,HtmlAcademy\Task::ROLE_CLIENT) == HtmlAcademy\Task::ACTION_CANCEL);
assert($task->getAllowedActions(HtmlAcademy\Task::STATUS_BUSY,HtmlAcademy\Task::ROLE_PERFORMER) == HtmlAcademy\Task::ACTION_REFUSE);
