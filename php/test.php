<?php
require 'task.php';

$task = new Task(111111, 211111);
assert($task->getStatusMap()['busy'] == 'В работе');
assert($task->getActionMap()['done'] == 'Выполнено');
assert($task->getStatusByAction(Task::ACTION_CANCEL) == Task::STATUS_CANCEL);
assert($task->getAllowedActions(Task::STATUS_NEW,Task::ROLE_CLIENT) == Task::ACTION_CANCEL);
assert($task->getAllowedActions(Task::STATUS_BUSY,Task::ROLE_PERFORMER) == Task::ACTION_REFUSE);
