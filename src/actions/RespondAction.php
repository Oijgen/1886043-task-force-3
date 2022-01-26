<?php

namespace HtmlAcademy\actions;

use HtmlAcademy\Task;
use HtmlAcademy\User;

class RespondAction extends AbstractAction
{
    public function getName()
    {
        return 'respond';
    }
    public function getLabel()
    {
        return 'Откликнуться';
    }
    public function checkRights(Task $task, User $user)
    {
        return ($task->performerId === null)
            && ($user->role === User::ROLE_PERFORMER);
    }
}
