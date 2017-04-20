<?php

use TOB\Schema\VerseField;
use TOB\Schema\VerseType;
use Youshido\GraphQL\Execution\Processor;
use Youshido\GraphQL\Schema\Schema;
use Youshido\GraphQL\Type\Object\ObjectType;

require_once '../vendor/autoload.php';
require_once 'fields/verse.php';
require_once 'types/verse.php';

$queries = new ObjectType([
	'name' => 'RootQueryType',
	'fields' => [
//		new VerseField(),
		'Verse' => [
			'type' => new VerseType(),
			'resolve' => function () {
				return [
					'title' => 'Something',
					'summary' => 'asdasdasd',
				];
			},
		],
	],
]);

$schema = new Schema([
	'query' => $queries,
]);

$request_json = file_get_contents('php://input');
$request_data = json_decode($request_json, true);

$processor = new Processor($schema);
$processor->processPayload($request_data['query']);
$response_data = $processor->getResponseData();

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: content-type');

echo json_encode($response_data);

?>