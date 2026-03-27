<?php

namespace Examples\Invokables;

use JohnnyMast\LogicChain\WorkflowContext;

class SendOrderEmail
{
    public function __invoke(WorkflowContext $context): WorkflowContext
    {
        // Placeholder: send confirmation email
        return $context;
    }
}
