<?php

namespace HtmlAcademy\actions;

use HtmlAcademy\Task;
use HtmlAcademy\User;

abstract class AbstractAction
{
    abstract public function getName();

    abstract public function getLabel();

    abstract public function checkRights(Task $task, User $user);

}
