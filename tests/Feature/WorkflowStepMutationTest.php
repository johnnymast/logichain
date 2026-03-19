<?php

use Johnny\Workflow\Workflow;

it('passes context between steps using WorkflowContext', function () {
    $workflow = new Workflow();

    $workflow->add(fn ($c) => $c + 1);
    $workflow->add(fn ($c) => $c * 2);

    $result = $workflow->run(1);

    expect($result->didSucceed())->toBeTrue()
        ->and($result->context->context)->toBe(4);
});

it('allows steps to mutate arrays inside WorkflowContext', function () {
    $workflow = new Workflow();

    $workflow->add(fn ($c) => array_merge($c, ['x' => 1]));
    $workflow->add(fn ($c) => array_merge($c, ['y' => 2]));

    $result = $workflow->run([]);

    expect($result->didSucceed())->toBeTrue()
        ->and($result->context->context)->toMatchArray(['x' => 1, 'y' => 2]);
});
