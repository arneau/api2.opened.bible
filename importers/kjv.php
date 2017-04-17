<?

require_once '../libs/simple_html_dom.php';

$html = file_get_html('https://www.blueletterbible.org/kjv/jhn/3/1/rl1/s_1000001');

$verses = $html->find('#bibleTable tr');

foreach ($verses as $verse) {

	$passage_identifier = $verse->firstchild()->nextSibling()->plaintext;
	$passage_identifier = trim($passage_identifier);

	$verse_number = substr($passage_identifier, strpos($passage_identifier, ':') + 1);

	$verse_html = $verse->lastchild()->lastchild()->innertext;
	$verse_html = trim($verse_html);
	$verse_html = preg_replace('/<(\/?)em>/', '<$1i>', $verse_html);
	$verse_html = preg_replace('/<(\/?)span[^>]*>/', '<$1q>', $verse_html);

	if (!$verse_number) {
		continue;
	}

	var_dump($verse_number, $verse_html);

}

?>