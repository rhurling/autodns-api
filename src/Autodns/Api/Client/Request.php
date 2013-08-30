<?php

namespace Autodns\Api\Client;

use Autodns\Api\Client\Request\Auth;
use Autodns\Api\Client\Request\Task;

class Request
{
    /**
     * @var Task
     */
    private $task;

    private $replyTo;

    private $ctid;

    private $auth;

    public function __construct(Task $task, $replyTo, $ctid)
    {
        $this->task = $task;
        $this->replyTo = $replyTo;
        $this->ctid = $ctid;
        $this->auth = array();
    }

    public function getTask()
    {
        return $this->task;
    }

    public function setAuth(array $auth)
    {
        $this->auth = $auth;
    }

    public function getAuth()
    {
        return $this->auth;
    }

    public function asArray()
    {
        $request = array(
            'auth' => $this->auth,
            'task' => $this->task->asArray()
        );

        if($this->replyTo) {
            $request['replyTo'] = $this->replyTo;
        }

        if ($this->ctid) {
            $request['ctid'] = $this->ctid;
        }

        return $request;
    }
}
