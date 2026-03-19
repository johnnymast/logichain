<?php

namespace Johnny\Workflow;

class WorkflowContext
{
    public function __construct(
        public mixed $context,
        public ?string $error = null,
        public array $userData = [],
        public ?int $failedStep = null,
    ) {
    }

    public function withContext(mixed $context): self
    {
        return new self(
            context: $context,
            error: $this->error,
            userData: $this->userData,
            failedStep: $this->failedStep
        );
    }

    public function withError(string $error, ?int $step = null): self
    {
        return new self(
            context: $this->context,
            error: $error,
            userData: $this->userData,
            failedStep: $step
        );
    }

    public function withUserData(array $data): self
    {
        return new self(
            context: $this->context,
            error: $this->error,
            userData: array_merge($this->userData, $data),
            failedStep: $this->failedStep
        );
    }
}
