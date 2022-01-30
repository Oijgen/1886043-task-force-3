<?php
namespace HtmlAcademy;

use HtmlAcademy\actions\AbstractAction;
use HtmlAcademy\actions\CancelAction;
use HtmlAcademy\actions\DoneAction;
use HtmlAcademy\actions\RefuseAction;
use HtmlAcademy\actions\RespondAction;
class Task
{
    public const STATUS_NEW = 'new';
    public const STATUS_CANCEL = 'canceled';
    public const STATUS_BUSY = 'busy';
    public const STATUS_COMPLETE = 'completed';
    public const STATUS_FAILED = 'failed';

    public const ACTION_CANCEL = 'cancel';
    public const ACTION_RESPOND = 'respond';
    public const ACTION_DONE = 'done';
    public const ACTION_REFUSE = 'refuse';

        public const NEXT_STATUS = [
        self::ACTION_CANCEL => self::STATUS_CANCEL,
        self::ACTION_RESPOND => self::STATUS_BUSY,
        self::ACTION_DONE => self::STATUS_COMPLETE,
        self::ACTION_REFUSE => self::STATUS_FAILED,
    ];

    public $clientId;
    public $performerId;
    public $status;

    public function __construct($clientId, $performerId) {
        $this->clientId = $clientId;
        $this->performerId = $performerId;
    }

    public function getStatusMap() {
        return [
            self::STATUS_NEW => 'Новое',
            self::STATUS_CANCEL => 'Отменено',
            self::STATUS_BUSY => 'В работе',
            self::STATUS_COMPLETE => 'Выполнено',
            self::STATUS_FAILED => 'Провалено',
        ];
    }

    public function getStatusByAction($action)
    {
        return self::NEXT_STATUS[$action] ?? '';
    }

    public function getAction(User $user): ?AbstractAction
    {
        $actions = [
            new CancelAction(),
            new RespondAction(),
            new DoneAction(),
            new RefuseAction(),
        ];
        foreach ($actions as $action) {
            if ($action->checkRights($this, $user)) {
                return $action;
            }
        }
        return null;
    }
}
