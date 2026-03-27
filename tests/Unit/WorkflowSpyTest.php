<?php
namespace Tests\Unit;

use JohnnyMast\LogicChain\Workflow;

it('calls spies correctly on failure', function () {
    $spy = \Mockery::spy();

    $workflow = (new Workflow())
        ->add(fn () => null)
        ->failed(fn () => $spy->called());

    $workflow->run(1);

    $spy->shouldHaveReceived('called');

    /** 
     * This would not be executed if mockery throws an
     * exception.
     */
    expect(true)->toBeTrue();
});
