<?php

use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;

class ChapterType extends AbstractObjectType {

	public function build($config) {

		$name = 'Chapter';
		$fields = [
			'id' => new IntType(),
			'Book' => new BookType(),
			'number' => new IntType(),
		];

		$config->set('name', $name)
			->addFields($fields);

	}

}