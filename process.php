<?php

$errors         = array();  	// array to hold validation errors
$data 			= array(); 		// array to pass back data

// validate the variables ======================================================
foreach($_POST as $key => $value) {
    if (empty($value))
        $errors[$key] =  $key . ' '.$value.' is invalid';
}

// request if there are NO errors
if (  empty($errors)) {
    $apiData = array(
        'api_username' => 'developing', 'api_password' => 'bGyneKU217',
        'MODULE' => 'Customer',
        'COMMAND' => 'add',
        'FirstName' => $_POST['firstname'],
        'LastName' => $_POST['lastname'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'Phone' => $_POST['phone'],
        'Country' => $_POST['country'],
        'currency' => $_POST['currency'],
        'gender' => $_POST['gender'],
        'campaignId' =>  empty($_POST['campaignId']) ? '':$_POST['campaignId'],
        'subCampaign' =>  empty($_POST['subCampaign']) ? '':$_POST['subCampaign'],
        'a_aid' =>  empty($_POST['a_aid']) ? '':$_POST['a_aid'],
        'a_bid' =>  empty($_POST['a_bid']) ? '':$_POST['a_bid'],
        'a_cid' =>  empty($_POST['a_cid']) ? '':$_POST['a_cid']
    );
    $URL = 'http://api-spotplatform.optionxl.com/Api';
    $ch = curl_init($URL);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($apiData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch); // run the whole process
    curl_close($ch);

    $response = json_decode(json_encode((array)simplexml_load_string($result)),1);
    if ($response['operation_status'] == 'successful' ) { //SUCcESS
        $data['success'] = true;
        $data['message'] = 'Success!';
    }
    else { //Response ERROR

        $data['success'] = false;
        $data['errors'] = isset($response['errors']) ? $response['errors'] : 'internal error';
    }
}
else { //Response ERROR
    $data['success'] = false;
    $data['errors']  = isset($errors['errors']) ? $errors['errors'] : 'internal error';
    // if there are no errors, return a message
}
// RESPONSE all our data
echo json_encode($data);
?>
