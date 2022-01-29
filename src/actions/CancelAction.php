<?php

namespace HtmlAcademy\actions;

use HtmlAcademy\Task;
use HtmlAcademy\User;

class CancelAction extends AbstractAction
{
    public function getName()
    {
        return 'cancel';
    }
    public function getLabel()
    {
        return 'Отмена';
    }
    public function checkRights(Task $task, User $user)
    {
        return ($task->clientId === $user->id)
            && ($task->status === Task::STATUS_NEW);
    }
}
