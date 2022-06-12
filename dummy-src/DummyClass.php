<?php

namespace Nagmat84\PhpStanDummy;

function foo(int $a): bool {
	return boolval($a);
}

function bar(int $a): bool {
	return (bool)$a;
}

function fooBar(int $a, int $b): bool {
	return $a == $b;
}

function barFoo(int $a, int $b): bool {
	return $a != $b;
}
