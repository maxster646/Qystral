<?php

namespace Qystral\Contract;

interface Task
{
    public function run(mixed $payload): mixed;
}