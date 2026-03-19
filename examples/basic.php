<?php

include __DIR__ . "/../vendor/autoload.php";

$workflow = new Johnny\Workflow\Workflow();
/**/
/* $workflow->add(fn($context) => str_replace("World", "Johnny", $context)); */
/* $result = $workflow->run("Hello World"); */
/**/
/* echo $result; */

$toBe7 = fn ($value) => ($value === 5);
$called = false;

$result = $workflow
    ->add($toBe7)
    ->failed(fn () => $called = true)
    ->run(5);

var_dump($result);
