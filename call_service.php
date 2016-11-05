<?php


// call to WebsiteVerzekerd scanning service

// Get cURL resource
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://state.websiteverzekerd.nl/call',
    CURLOPT_USERAGENT => 'WebsiteVerzekerd WordPress Plugin',
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => array(
        'email' => $email,
        'domain' => $_SERVER['HTTP_HOST'],
        'ip'	=> $_SERVER['SERVER_ADDR']
    )
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);

