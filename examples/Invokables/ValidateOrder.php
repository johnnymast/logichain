<?php

namespace Examples\Invokables;

use JohnnyMast\LogicChain\WorkflowContext;

class ValidateOrder
{
    public function __invoke(WorkflowContext $context): WorkflowContext
    {
        return $context;
    }
}
