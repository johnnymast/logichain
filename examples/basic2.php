<?php

namespace Examples;

include __DIR__ . "/../vendor/autoload.php";

use JohnnyMast\LogicChain\Workflow;
use Examples\Invokables\ValidateOrder;
use Examples\Invokables\CreateOrder;
use Examples\Invokables\StoreOrder;
use Examples\Invokables\SendOrderEmail;

$workflow = (new Workflow())
    ->add(new ValidateOrder())
    ->add(new CreateOrder())
    ->add(new StoreOrder())
    ->add(new SendOrderEmail())
    ->success(fn($r) => print "Order completed\n")
    ->failed(fn($r) => print "Order failed: {$r->context->error}\n");

$result = $workflow->run([
    'customer' => 'john@example.com',
    'items' => ['sku-123', 'sku-456'],
]);

print_r($result);