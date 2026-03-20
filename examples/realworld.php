<?php

namespace Examples;

require __DIR__ . "/../vendor/autoload.php";

use Johnny\Workflow\Workflow;
use Johnny\Workflow\WorkflowContext;
use Johnny\Workflow\WorkflowResult;
use Examples\Misc\OrderValidator;
use Examples\Misc\OrderService;
use Examples\Misc\OrderRepository;
use Examples\Misc\EmailService;

/**
 * -----------------------------------------------------------------------------
 *  realworld.php
 * -----------------------------------------------------------------------------
 *
 *  A realistic example showing how a workflow can orchestrate multiple services.
 *
 *  This workflow simulates:
 *
 *      1. Validating an order
 *      2. Creating the order in storage
 *      3. Sending a confirmation email
 *
 *  All service classes live in examples/misc/ and contain placeholder methods.
 *
 *  Even in a real-world scenario, you still receive a WorkflowResult object and
 *  can inspect:
 *
 *      $result->didSucceed()
 *      $result->didFail()
 *      $result->context->value
 *      $result->context->error
 *      $result->context->failedStep
 *
 * -----------------------------------------------------------------------------
 */

$validator = new OrderValidator();
$orderService = new OrderService();
$repository = new OrderRepository();
$email = new EmailService();

$workflow = (new Workflow())
    ->add(function (WorkflowContext $c) use ($validator) {
        $validator->validate($c->value);
        return $c;
    })
    ->add(function (WorkflowContext $c) use ($orderService, $repository) {
        $order = $orderService->createOrder($c->value);
        $repository->store($order);
        return $c->withValue($order);
    })
    ->add(function (WorkflowContext $c) use ($email) {
        $email->sendOrderConfirmation($c->value);
        return $c;
    })
    ->success(function (WorkflowResult $result) {
        echo "Order workflow completed successfully.\n";
    })
    ->failed(function (WorkflowResult $result) {
        echo "Order workflow failed: {$result->context->error}\n";
    });

$result = $workflow->run([
    'customer' => 'john@example.com',
    'items' => ['sku-123', 'sku-456'],
]);

var_dump([
    'didSucceed()' => $result->didSucceed(),
    'didFail()'    => $result->didFail(),
    'value'        => $result->context->value,
    'error'        => $result->context->error,
    'failedStep'   => $result->context->failedStep,
]);
