<?php

use Johnny\Workflow\Workflow;
use Johnny\Workflow\WorkflowContext;

it('passes userData through on failure', function () {

    $workflow = (new Workflow())
        ->add(function (WorkflowContext $context) {
            return $context
                ->withError("Oops")
                ->withUserData(['foo' => 'bar']);
        });

    $result = $workflow->run("x");

    expect($result->context->userData)->toMatchArray(['foo' => 'bar']);
});
