<?php

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class ChapterField extends AbstractField {

	public function build(FieldConfig $config) {
		$config->addArguments([
			'id' => new IntType(),
			'reference' => new StringType(),
		]);
	}

	public function getName() {
		return 'Chapter';
	}

	public function getType() {
		return new ChapterType();
	}

	public function resolve($value, array $args, ResolveInfo $info) {
		return ChapterObject::resolve($value, $args, $info);
	}

}