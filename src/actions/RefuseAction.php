<?php

namespace HtmlAcademy\actions;

use HtmlAcademy\Task;
use HtmlAcademy\User;

class RefuseAction extends AbstractAction
{
    public function getName()
    {
        return 'refuse';
    }
    public function getLabel()
    {
        return 'Отказаться';
    }
    public function checkRights(Task $task, User $user)
    {
        return ($task->performerId === $user->id)
            && ($task->status === Task::STATUS_BUSY);
    }
}
