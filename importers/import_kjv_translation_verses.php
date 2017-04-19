<?

require_once '../vendor/autoload.php';
require_once '../generated-conf/config.php';
require_once '../libs/simple_html_dom.php';

$books_objects = BookQuery::create()
	->filterById([
		'min' => 58
	])
	->limit(9)
	->find();

var_dump($books_objects->toArray());
die;

foreach ($books_objects as $book_object) {

	$chapters_objects = $book_object->getChapters();

	foreach ($chapters_objects as $chapter_object) {

		$html = file_get_html('https://www.blueletterbible.org/kjv/' . str_replace(' ', '', $book_object->getName()) . '/' . $chapter_object->getNumber() . '/');
		$verses = $html->find('#bibleTable tr');

		foreach ($verses as $verse) {

			$passage_identifier = $verse->firstchild()
				->nextSibling()->plaintext;
			$passage_identifier = trim($passage_identifier);

			$verse_number = substr($passage_identifier, strpos($passage_identifier, ':') + 1);

			$verse_html = $verse->lastchild()
				->lastchild()->innertext;
			$verse_html = trim($verse_html);
			$verse_html = preg_replace('/<(\/?)em>/', '<$1i>', $verse_html);
			$verse_html = preg_replace('/<(\/?)span[^>]*>/', '<$1q>', $verse_html);

			if (!$verse_number) {
				continue;
			}

			$verse_object = new Verse();
			$verse_object->setChapter($chapter_object)
				->setNumber($verse_number);

			$translation_verse_object = new TranslationVerse();
			$translation_verse_object->setText($verse_html)
				->setTranslationId(1)
				->setVerse($verse_object)
				->save();

		}

	}

}

?>