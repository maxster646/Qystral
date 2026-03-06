<?php

declare(strict_types=1);

namespace Qystral\Contract;

interface Task
{
    public function run(mixed $payload): mixed;
}