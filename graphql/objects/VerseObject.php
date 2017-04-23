<?php

class VerseObject {

	public static function resolve($value, $args, $info) {

		if (isset($args['id'])) {
			$verse_id = $args['id'];
		} elseif (isset($args['reference'])) {
			$verse_id = rand(1, 10);
		} else {
			$verse_id = rand(1, 10);
		}

		$verse_object = VerseQuery::create()
			->findOneById($verse_id);

		$translation_verse_object = TranslationVerseQuery::create()
			->filterByTranslationId(1)
			->filterByVerse($verse_object)
			->findOne();

		return [
			'id' => $verse_object->getId(),
			'Chapter' => ChapterObject::resolve($value, [
				'id' => $verse_object->getChapterId(),
			], $info),
			'number' => $verse_object->getNumber(),
			'text' => $translation_verse_object->getText(),
		];

	}

}