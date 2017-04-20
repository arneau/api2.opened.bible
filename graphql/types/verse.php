<?php

namespace TOB\Schema;

use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;

class VerseType extends AbstractObjectType {

	public function build($config) {
		$config->addField('title', new StringType())
			->addField('summary', new StringType());
	}

	public function getName() {
		return 'Verse';
	}

}