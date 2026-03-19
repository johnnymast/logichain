<?php

use Johnny\Workflow\Workflow;

it('accepts a failed arrow function', function () {
    $workflow = (new Workflow())->failed(fn () => null);
    expect($workflow)->toBeInstanceOf(Workflow::class);
});

it('accepts a failed closure', function () {
    $workflow = (new Workflow())->failed(function () {
    });
    expect($workflow)->toBeInstanceOf(Workflow::class);
});

it('accepts an invokable failed handler', function () {
    $workflow = (new Workflow())->failed(new class () {
        public function __invoke()
        {
        }
    });

    expect($workflow)->toBeInstanceOf(Workflow::class);
});
