<?php

namespace Examples\Invokables;

use JohnnyMast\LogicChain\WorkflowContext;

class StoreOrder
{
    public function __invoke(WorkflowContext $context): WorkflowContext
    {
        return $context;
    }
}
