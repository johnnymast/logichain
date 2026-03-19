
<?php

use Johnny\Workflow\Workflow;

it('runs all steps and returns a successful WorkflowResult', function () {
    $workflow = (new Workflow())
        ->add(fn ($c) => $c + 1)
        ->add(fn ($c) => $c * 3);

    $result = $workflow->run(2);

    expect($result->didSucceed())->toBeTrue()
        ->and($result->context->context)->toBe(9);
});

it('calls the success callback with the WorkflowResult', function () {
    $called = false;

    $workflow = (new Workflow())
        ->add(fn ($c) => $c + 1)
        ->success(function ($result) use (&$called) {
            $called = $result->context->context === 3;
        });

    $workflow->run(2);

    expect($called)->toBeTrue();
});
