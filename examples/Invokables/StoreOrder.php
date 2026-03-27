<?php

namespace Examples\Invokables;

use JohnnyMast\LogicChain\WorkflowContext;

class StoreOrder
{
    public function __invoke(WorkflowContext $context): WorkflowContext
    {
        // Placeholder: store order in database or repository
        return $context;
    }
}
