<?php

use Johnny\Workflow\Workflow;

it('stops execution when a step returns falsy and returns a failure WorkflowResult', function () {
    $workflow = (new Workflow())
        ->add(fn ($c) => null)
        ->add(fn () => 'should_not_run');

    $result = $workflow->run(10);

    expect($result->didFail())->toBeTrue()
        ->and($result->context->failedStep)->toBe(0)
        ->and($result->context->error)->toBe('Step 0 returned falsy');
});

it('calls the failed callback with the WorkflowResult', function () {
    $failed = false;

    $workflow = (new Workflow())
        ->add(fn () => null)
        ->failed(function ($result) use (&$failed) {
            $failed = $result->didFail();
        });

    $result = $workflow->run(5);

    expect($failed)->toBeTrue()
        ->and($result->didFail())->toBeTrue();
});
