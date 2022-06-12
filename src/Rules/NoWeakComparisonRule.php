<?php

namespace Nagmat84\PhpStan\Rules;

use PhpParser\Node;
use PhpParser\Node\Expr\BinaryOp;
use PhpParser\Node\Expr\BinaryOp\Equal;
use PhpParser\Node\Expr\BinaryOp\NotEqual;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<BinaryOp>
 */
class NoWeakComparisonRule implements Rule
{
	/**
	 * @inheritDoc
	 */
	public function getNodeType(): string
	{
		return BinaryOp::class;
	}

	/**
	 * @inheritDoc
	 */
	public function processNode(Node $node, Scope $scope): array
	{
		if ($node instanceof Equal || $node instanceof NotEqual) {
			return [
				RuleErrorBuilder::message(
					'Weak comparison via "' . $node->getOperatorSigil() . '" is forbidden.'
				)->build(),
			];
		} else {
			return [];
		}
	}
}
