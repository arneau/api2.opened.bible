<?php

use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class BookType extends AbstractObjectType {

	public function build($config) {

		$name = 'Book';
		$fields = [
			'id' => new IntType(),
			'chapters' => new ListType(new IntType()),
			'name' => new StringType(),
		];

		$config->set('name', $name)
			->addFields($fields);

	}

}