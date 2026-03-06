<?php

declare(strict_types=1);

namespace Qystral;

use Qystral\Contract\Task;

class Pipeline
{
    private array $tasks = [];

    public function pipe(Task $task): self
    {
        $this->tasks[] = $task;
        return $this;
    }

    public function process(mixed $payload): mixed
    {
        foreach ($this->tasks as $task) {
            $payload = $task->run($payload);
        }

        return $payload;
    }
}