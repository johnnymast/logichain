<?php

use Johnny\Workflow\Workflow;

it('does not call success when workflow fails', function () {
    $success = false;

    $workflow = (new Workflow())
        ->add(fn () => null)
        ->success(function () use (&$success) {
            $success = true;
        });

    $result = $workflow->run(1);

    expect($result->didFail())->toBeTrue()
        ->and($success)->toBeFalse();
});

it('does not call failed when workflow succeeds', function () {
    $failed = false;

    $workflow = (new Workflow())
        ->add(fn ($c) => $c + 1)
        ->failed(function () use (&$failed) {
            $failed = true;
        });

    $result = $workflow->run(1);

    expect($result->didSucceed())->toBeTrue()
        ->and($failed)->toBeFalse();
});
