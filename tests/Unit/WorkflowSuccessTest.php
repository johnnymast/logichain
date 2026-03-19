<?php

use Johnny\Workflow\Workflow;

it('accepts a success arrow function', function () {
    $workflow = (new Workflow())->success(fn () => null);
    expect($workflow)->toBeInstanceOf(Workflow::class);
});

it('accepts a success closure', function () {
    $workflow = (new Workflow())->success(function () {
    });
    expect($workflow)->toBeInstanceOf(Workflow::class);
});

it('accepts an invokable success handler', function () {
    $workflow = (new Workflow())->success(new class () {
        public function __invoke()
        {
        }
    });

    expect($workflow)->toBeInstanceOf(Workflow::class);
});
