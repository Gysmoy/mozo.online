<?php

$response = file_get_contents('https://teams.microsoft.com/_#/pre-join-calling/19:meeting_NDIyMDAzOGEtYmRmMS00OTE5LTlkMmMtZmUwN2E3OTczOTcy@thread.v2');

//header('Content-type: text/javascript');
echo $response;
?>