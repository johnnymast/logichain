<?php

namespace Examples;

include __DIR__ . "/../vendor/autoload.php";

use JohnnyMast\LogicChain\Workflow;
use JohnnyMast\LogicChain\WorkflowContext;

$workflow = (new Workflow())
    ->add(function (WorkflowContext $context) {
        $context->value++;
        return $context;
    })
    ->add(function (WorkflowContext $context) {
        $context->value *= 2;
        return $context;
    })
    ->add(function (WorkflowContext $context) {
        $context->value -= 3;
        return $context;
    });

$result = $workflow->run(5);

// Will output 9 (5+1)*2 -3 = 9
print $result->context->value;
