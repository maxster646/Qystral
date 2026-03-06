<?php

declare(strict_types=1);

namespace Qystral;

use Qystral\Contract\Task;

class Qystral
{
    private array $tasks = [];

    public function pipeline(): self
    {
        $this->tasks = [];
        return $this;
    }

    public function entwine(Task $task): self
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