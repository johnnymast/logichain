<?php

namespace Examples\Invokables;

use JohnnyMast\LogicChain\WorkflowContext;

class ValidateOrder
{
    public function __invoke(WorkflowContext $context): WorkflowContext
    {
        // Placeholder: validate order structure, customer, items, etc.
        return $context;
    }
}
