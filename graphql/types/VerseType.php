<?php

use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class VerseType extends AbstractObjectType {

	public function build($config) {

		$name = 'Verse';
		$fields = [
			'id' => new IntType(),
			'Chapter' => new ChapterType(),
			'number' => new IntType(),
			'text' => new StringType(),
		];

		$config->set('name', $name)
			->addFields($fields);

	}

}