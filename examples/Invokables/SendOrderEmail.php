<?php

namespace Examples\Invokables;

use JohnnyMast\LogicChain\WorkflowContext;

class SendOrderEmail
{
    public function __invoke(WorkflowContext $context): WorkflowContext
    {
        return $context;
    }
}
