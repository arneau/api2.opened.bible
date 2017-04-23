<?php

class ChapterObject {

	public static function resolve($value, $args, $info) {

		var_dump($value, $args, $info);
		die;

		if (isset($args['id'])) {
			$chapter_id = $args['id'];
		} elseif (isset($args['reference'])) {
			$chapter_id = rand(1, 10);
		} else {
			$chapter_id = rand(1, 10);
		}

		$chapter_object = ChapterQuery::create()
			->findOneById($chapter_id);

		$resolve_data = [
			'id' => $chapter_object->getId(),
			'Book' => [],
			'number' => $chapter_object->getNumber(),
		];

		if ($info->getField()->getName() == 'Chapter') {
			$resolve_data['Book'] = BookObject::resolve($value, [
				'id' => $chapter_object->getBookId(),
			], $info);
		}

		return $resolve_data;

	}

}