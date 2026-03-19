<?php

namespace Johnny\Workflow;

class Workflow
{
    protected array $records = [];

    /** @var callable|null */
    protected mixed $onFailure = null;

    /** @var callable|null */
    protected mixed $onSuccess = null;

    public function add(mixed $callable): self
    {
        $this->records[] = [
            'func' => $callable
        ];

        return $this;
    }

    public function success(callable $callable): self
    {
        $this->onSuccess = $callable;
        return $this;
    }

    public function failed(callable $callable): self
    {
        $this->onFailure = $callable;
        return $this;
    }


    public function run(mixed $initialContext): WorkflowResult
    {
        // Start met een neutrale context
        $context = new WorkflowContext($initialContext);

        foreach ($this->records as $index => $record) {

            // Voer de stap uit met de huidige context
            $newContext = ($record['func'])($context->context);

            // Falsy betekent failure
            if (!$newContext) {

                // Maak een failure-result
                $result = WorkflowResultFactory::failure(
                    context: $context,
                    error: "Step {$index} returned falsy",
                    step: $index,
                    userData: [
                        'timestamp' => time(),
                        'step'      => $index,
                    ]
                );

                // Trigger failed-callback
                if ($this->onFailure) {
                    ($this->onFailure)($result);
                }

                return $result;
            }

            // Update context voor de volgende stap
            $context = $context->withContext($newContext);
        }

        // Succesvol einde
        $result = WorkflowResultFactory::success($context);

        // Trigger success-callback
        if ($this->onSuccess) {
            ($this->onSuccess)($result);
        }

        return $result;
    }
}
