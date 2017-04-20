<?php

namespace TOB\Schema;

use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;

//require_once getcwd() . '/types/verse.php';

class VerseField extends AbstractField {

	public function getType() {
		return new VerseType();
	}

	public function resolve($value, array $args, ResolveInfo $info) {
		return 'Something';
	}

}