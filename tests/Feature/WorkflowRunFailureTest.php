<?php
namespace Tests\Feature;

use JohnnyMast\LogicChain\Workflow;
use JohnnyMast\LogicChain\WorkflowContext;
use JohnnyMast\LogicChain\WorkflowResult;

it('fails the workflow when a step returns an error', function () {

    $workflow = (new Workflow())
        ->add(function (WorkflowContext $context) {
            $context->value = 10;
            return $context;
        })
        ->add(function (WorkflowContext $context) {
            return $context->withError("Something went wrong");
        })
        ->add(function (WorkflowContext $context) {
            $context->value = 999;
            return $context;
        });

    $result = $workflow->run(5);

    expect($result)->toBeInstanceOf(WorkflowResult::class);

    expect($result->didFail())->toBeTrue();

    expect($result->context->error)->toBe("Something went wrong");

    expect($result->context->value)->toBe(10);

    expect($result->context->failedStep)->toBe(1);
});
