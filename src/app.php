<?php

namespace App;
require dirname(__DIR__).'/vendor/autoload.php';


use Symfony\Component\Workflow\DefinitionBuilder;
use Symfony\Component\Workflow\MarkingStore\MethodMarkingStore;
use Symfony\Component\Workflow\Transition;
use Symfony\Component\Workflow\Workflow;

$definitionBuilder = new DefinitionBuilder();
$definition = $definitionBuilder->addPlaces(['a', 'ready', 'b1', 'b2', 'c'])
    // Transitions are defined with a unique name, an origin place and a destination place
    ->addTransition(new Transition('toReady', 'a', 'ready'))
    ->addTransition(new Transition('tob1', 'ready', 'b1'))
    ->addTransition(new Transition('tob2', 'ready', 'b2'))
    ->addTransition(new Transition('toc', ['b1', 'b2'], 'c'))
    ->build()
;

$marking = new MethodMarkingStore(false, 'places');
$workflow = new Workflow($definition, $marking, new EventDispatcher(), 'acme');

$model = new Model();
$workflow->apply($model, 'toReady');


