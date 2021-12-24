<?php
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
    public const ROLE_CLIENT = 'client';
    public const ROLE_PERFORMER = 'performer';

    public const NEXT_STATUS = [
        self::ACTION_CANCEL => self::STATUS_CANCEL,
        self::ACTION_RESPOND => self::STATUS_BUSY,
        self::ACTION_DONE => self::STATUS_COMPLETE,
        self::ACTION_REFUSE => self::STATUS_FAILED,
    ];

    public const ALLOWED_ACTIONS = [
        self::STATUS_NEW => [
            self::ROLE_CLIENT => self::ACTION_CANCEL,
            self::ROLE_PERFORMER => self::ACTION_RESPOND,
        ],
        self::STATUS_BUSY => [
            self::ROLE_CLIENT => self::ACTION_DONE,
            self::ROLE_PERFORMER => self::ACTION_REFUSE,
        ],
    ];

    public $clientID;
    public $performerID;

    public function __construct($clientID, $performerID) {
        $this->clientID = $clientID;
        $this->performerID = $performerID;
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

    public function getActionMap()
    {
        return [
            self::ACTION_CANCEL => 'Отменить',
            self::ACTION_DONE => 'Выполнено',
            self::ACTION_RESPOND => 'Откликнуться',
            self::ACTION_REFUSE => 'Отказаться',
        ];
    }

    public function getStatusByAction($action)
    {
        return self::NEXT_STATUS[$action] ?? '';
    }

    public function getAllowedActions($status, $role)
    {
        return self::ALLOWED_ACTIONS[$status][$role] ?? '';
    }

}
