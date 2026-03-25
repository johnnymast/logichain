<?php

namespace Examples\Invokables;

use Johnny\Workflow\WorkflowContext;

class SendOrderEmail
{
    public function __invoke(WorkflowContext $context): WorkflowContext
    {
        // Placeholder: send confirmation email
        return $context;
    }
}
