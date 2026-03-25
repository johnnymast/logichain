<?php

namespace Examples\Invokables;

use Johnny\Workflow\WorkflowContext;

class ValidateOrder
{
    public function __invoke(WorkflowContext $context): WorkflowContext
    {
        // Placeholder: validate order structure, customer, items, etc.
        return $context;
    }
}
