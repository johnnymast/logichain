<?php

namespace Examples\Invokables;

use Johnny\Workflow\WorkflowContext;

class StoreOrder
{
    public function __invoke(WorkflowContext $context): WorkflowContext
    {
        // Placeholder: store order in database or repository
        return $context;
    }
}
