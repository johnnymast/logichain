<?php

namespace Johnny\Workflow;

class WorkflowResult
{
    public function __construct(
        public bool $success,
        public WorkflowContext $context
    ) {
    }

    public function didFail(): bool
    {
        return !$this->success;
    }

    public function didSucceed(): bool
    {
        return $this->success;
    }
}
