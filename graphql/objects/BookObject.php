<?php

class BookObject {

	public static function resolve($value, $args, $info) {

		if (isset($args['id'])) {
			$book_id = $args['id'];
		} elseif (isset($args['reference'])) {
			$book_id = rand(1, 10);
		} else {
			$book_id = rand(1, 10);
		}

		$book_object = BookQuery::create()
			->findOneById($book_id);

		$chapters_array = [];
		foreach ($book_object->getChapters() as $chapter_object) {
			$chapters_array[] = $chapter_object->getId();
		}

		$resolve_data = [
			'id' => $book_object->getId(),
			'Chapters' => $chapters_array,
			'name' => $book_object->getName(),
		];

		//		if ($info->getField()
		//				->getName() == 'Book'
		//		) {
		//			$resolve_data['Chapters'][] = ChapterObject::resolve($value, [
		//				'id' => 1,
		//			], $info);
		//		}

		return $resolve_data;

	}

}