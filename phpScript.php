<?php

require 'apiClient.php';
require 'ReportManager.php';
require 'ResponseEditor.php';
require 'ArgumentValidator.php';

array_shift($argv);

$validatedArguments = ArgumentValidator::validate($argv);

$client = new apiClient();
$data = $client->makeApiCall($validatedArguments);
$editor = new ResponseEditor($data);
$validatedData = $editor->validateResponse();
$editedData = $editor->getValues();
$reportManager = new ReportManager();
$reportManager->generateReport($editedData);