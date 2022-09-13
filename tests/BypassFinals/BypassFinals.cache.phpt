<?php

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../../vendor/autoload.php';

Tester\Environment::setup();


@mkdir($dir = __DIR__ . '/cache');
DG\BypassFinals::setCacheDirectory($dir);

DG\BypassFinals::enable();

require __DIR__ . '/fixtures/final.class.php';

$rc = new ReflectionClass('FinalClass');
Assert::false($rc->isFinal());
Assert::false($rc->getMethod('finalMethod')->isFinal());
Assert::same(123, FinalClass::FINAL);
Assert::same(456, (new FinalClass)->final());
