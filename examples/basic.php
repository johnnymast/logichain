<?php
include __DIR__ . "/../vendor/autoload.php";

$workflow = new Johnny\Workflow\Workflow();

$workflow->add(fn($context) => str_replace("World", "Johnny", $context));
$result = $workflow->run("Hello World");

echo $result;
