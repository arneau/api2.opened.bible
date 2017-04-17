<?php

require_once '../vendor/autoload.php';
require_once '../generated-conf/config.php';

$translation_object = TranslationQuery::create()
	->filterByCode('kjv')
	->filterByName('King James (Authorized Version)')
	->findOneOrCreate();

if ($translation_object->isNew()) {
	$translation_object->save();
}