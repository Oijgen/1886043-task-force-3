<?php

namespace HtmlAcademy\actions;

use HtmlAcademy\Task;
use HtmlAcademy\User;

class DoneAction extends AbstractAction
{
    public function getName()
    {
        return 'done';
    }
    public function getLabel()
    {
        return 'Выполнено';
    }
    public function checkRights(Task $task, User $user)
    {
        return ($task->clientId === $user->id)
            && ($task->status === Task::STATUS_BUSY);
    }
}
