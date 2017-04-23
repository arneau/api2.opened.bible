<?php

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class BookField extends AbstractField {

	public function build(FieldConfig $config) {
		$config->addArguments([
			'id' => new IntType(),
			'reference' => new StringType(),
		]);
	}

	public function getName() {
		return 'Book';
	}

	public function getType() {
		return new BookType();
	}

	public function resolve($value, array $args, ResolveInfo $info) {
		return BookObject::resolve($value, $args, $info);
	}

}