<?php
namespace Examples;

include __DIR__ . "/../vendor/autoload.php";

use JohnnyMast\LogicChain\Workflow;
use JohnnyMast\LogicChain\WorkflowContext;
use JohnnyMast\LogicChain\WorkflowResult;
use JohnnyMast\LogicChain\WorkflowResultFactory;

$result = (new Workflow())
    ->add(function (WorkflowContext $context) {
        $context->value++;
        return $context;
    })
    ->add(function (WorkflowContext $context) {
        $context->value += 2;
        return $context;
    })
    ->add(function (WorkflowContext $context) {

        if ($context->value != 4) {
            return $context->withError("Oh no there was an error!");
        }

        return $context;
    })
    ->failed(function (WorkflowResult $result) {
        echo "Failed\n\n";
        var_dump($result->context->error);
        var_dump($result->context->value);
    })
    ->success(function (WorkflowResult $result) {
        echo "Success\n\n";
        var_dump($result->context->value);
    })
   ->run(5);

// The last task will fail because (5+1)+2=8 and not 4
// This will trigger the return with an error on line 23.
// 
// In result failed() will be triggered, this is optional 
// because the returned value of function run will also have the 
// same WorkflowResult as was passed to failed().
//
echo "=============================\n";
echo "Status: ".($result->success ? "Success" : "Failed")."\n";
echo "Error: ".$result->context->error."\n";
echo "Value: ".$result->context->value."\n";
