<?php

namespace Examples\Invokables;

use Johnny\Workflow\WorkflowContext;

class CreateOrder
{
    public function __invoke(WorkflowContext $context): WorkflowContext
    {
        // Placeholder: create order array
        $order = [
            'id' => uniqid('order_'),
            'customer' => $context->value['customer'] ?? null,
            'items' => $context->value['items'] ?? [],
        ];

        return $context->withValue($order);
    }
}
