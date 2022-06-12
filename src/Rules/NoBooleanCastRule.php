<?php

namespace Nagmat84\PhpStan\Rules;

use PhpParser\Node;
use PhpParser\Node\Expr\Cast\Bool_;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Bool_>
 */
class NoBooleanCastRule implements Rule
{
	/**
	 * @inheritDoc
	 */
	public function getNodeType(): string
	{
		return Bool_::class;
	}

	/**
	 * @inheritDoc
	 */
	public function processNode(Node $node, Scope $scope): array
	{
		return [
			RuleErrorBuilder::message('Cast to bool is forbidden.')->build(),
		];
	}
}
