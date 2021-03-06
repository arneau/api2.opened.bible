<?php

require_once '../vendor/autoload.php';
require_once '../generated-conf/config.php';

$books_array = [
	[
		'chapter_count' => 50,
		'name' => 'Genesis',
	],
	[
		'chapter_count' => 40,
		'name' => 'Exodus',
	],
	[
		'chapter_count' => 27,
		'name' => 'Leviticus',
	],
	[
		'chapter_count' => 36,
		'name' => 'Numbers',
	],
	[
		'chapter_count' => 34,
		'name' => 'Deuteronomy',
	],
	[
		'chapter_count' => 24,
		'name' => 'Joshua',
	],
	[
		'chapter_count' => 21,
		'name' => 'Judges',
	],
	[
		'chapter_count' => 4,
		'name' => 'Ruth',
	],
	[
		'chapter_count' => 31,
		'name' => '1 Samuel',
	],
	[
		'chapter_count' => 24,
		'name' => '2 Samuel',
	],
	[
		'chapter_count' => 22,
		'name' => '1 Kings',
	],
	[
		'chapter_count' => 25,
		'name' => '2 Kings',
	],
	[
		'chapter_count' => 29,
		'name' => '1 Chronicles',
	],
	[
		'chapter_count' => 36,
		'name' => '2 Chronicles',
	],
	[
		'chapter_count' => 10,
		'name' => 'Ezra',
	],
	[
		'chapter_count' => 13,
		'name' => 'Nehemiah',
	],
	[
		'chapter_count' => 10,
		'name' => 'Esther',
	],
	[
		'chapter_count' => 42,
		'name' => 'Job',
	],
	[
		'chapter_count' => 150,
		'name' => 'Psalms',
	],
	[
		'chapter_count' => 31,
		'name' => 'Proverbs',
	],
	[
		'chapter_count' => 12,
		'name' => 'Ecclesiastes',
	],
	[
		'chapter_count' => 8,
		'name' => 'Song of Songs',
	],
	[
		'chapter_count' => 66,
		'name' => 'Isaiah',
	],
	[
		'chapter_count' => 52,
		'name' => 'Jeremiah',
	],
	[
		'chapter_count' => 5,
		'name' => 'Lamentations',
	],
	[
		'chapter_count' => 48,
		'name' => 'Ezekiel',
	],
	[
		'chapter_count' => 12,
		'name' => 'Daniel',
	],
	[
		'chapter_count' => 14,
		'name' => 'Hosea',
	],
	[
		'chapter_count' => 3,
		'name' => 'Joel',
	],
	[
		'chapter_count' => 9,
		'name' => 'Amos',
	],
	[
		'chapter_count' => 1,
		'name' => 'Obadiah',
	],
	[
		'chapter_count' => 4,
		'name' => 'Jonah',
	],
	[
		'chapter_count' => 7,
		'name' => 'Micah',
	],
	[
		'chapter_count' => 3,
		'name' => 'Nahum',
	],
	[
		'chapter_count' => 3,
		'name' => 'Habakkuk',
	],
	[
		'chapter_count' => 3,
		'name' => 'Zephaniah',
	],
	[
		'chapter_count' => 2,
		'name' => 'Haggai',
	],
	[
		'chapter_count' => 14,
		'name' => 'Zechariah',
	],
	[
		'chapter_count' => 4,
		'name' => 'Malachi',
	],
	[
		'chapter_count' => 28,
		'name' => 'Matthew',
	],
	[
		'chapter_count' => 16,
		'name' => 'Mark',
	],
	[
		'chapter_count' => 24,
		'name' => 'Luke',
	],
	[
		'chapter_count' => 21,
		'name' => 'John',
	],
	[
		'chapter_count' => 28,
		'name' => 'Acts',
	],
	[
		'chapter_count' => 16,
		'name' => 'Romans',
	],
	[
		'chapter_count' => 16,
		'name' => '1 Corinthians',
	],
	[
		'chapter_count' => 13,
		'name' => '2 Corinthians',
	],
	[
		'chapter_count' => 6,
		'name' => 'Galatians',
	],
	[
		'chapter_count' => 6,
		'name' => 'Ephesians',
	],
	[
		'chapter_count' => 4,
		'name' => 'Philippians',
	],
	[
		'chapter_count' => 4,
		'name' => 'Colossians',
	],
	[
		'chapter_count' => 5,
		'name' => '1 Thessalonians',
	],
	[
		'chapter_count' => 3,
		'name' => '2 Thessalonians',
	],
	[
		'chapter_count' => 6,
		'name' => '1 Timothy',
	],
	[
		'chapter_count' => 4,
		'name' => '2 Timothy',
	],
	[
		'chapter_count' => 3,
		'name' => 'Titus',
	],
	[
		'chapter_count' => 1,
		'name' => 'Philemon',
	],
	[
		'chapter_count' => 13,
		'name' => 'Hebrews',
	],
	[
		'chapter_count' => 5,
		'name' => 'James',
	],
	[
		'chapter_count' => 5,
		'name' => '1 Peter',
	],
	[
		'chapter_count' => 3,
		'name' => '2 Peter',
	],
	[
		'chapter_count' => 5,
		'name' => '1 John',
	],
	[
		'chapter_count' => 1,
		'name' => '2 John',
	],
	[
		'chapter_count' => 1,
		'name' => '3 John',
	],
	[
		'chapter_count' => 1,
		'name' => 'Jude',
	],
	[
		'chapter_count' => 22,
		'name' => 'Revelation',
	],
];

foreach ($books_array as $book_data) {

	$book_object = new Book();
	$book_object->setName($book_data['name'])
		->save();

	for ($chapter_number = 1; $chapter_number <= $book_data['chapter_count']; $chapter_number ++) {

		$chapter_object = new Chapter();
		$chapter_object->setBook($book_object)
			->setNumber($chapter_number)
			->save();

	}

}