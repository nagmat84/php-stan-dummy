<?php

namespace Nagmat84\PhpStan\Rules;

use PhpParser\Node;
use PhpParser\Node\Expr\FuncCall;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<FuncCall>
 */
class NoBooleanConversionRule implements Rule
{
	/**
	 * @inheritDoc
	 */
	public function getNodeType(): string
	{
		return FuncCall::class;
	}

	/**
	 * @inheritDoc
	 */
	public function processNode(Node $node, Scope $scope): array
	{
		if (
			count($node->name->parts) === 1 && (
				$node->name->parts[0] === 'boolval' ||
				$node->name->parts[0] === '\boolval'
			)
		) {
			return [
				RuleErrorBuilder::message(
					'Conversion to boolean is forbidden.'
				)->build(),
			];
		} else {
			return [];
		}
	}
}
