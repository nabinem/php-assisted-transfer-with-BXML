<?php
/**
 * Created by PhpStorm.
 * User: smitchell
 * Date: 1/7/15
 * Time: 4:56 PM
 */

$url = $_REQUEST['recordingUri'];

error_log("url: " . $url);

$headers = array(
    'Content-Type:application/json',
    'Authorization: Basic '. base64_encode("t-bfvjgfgm5ykqgtrjszet2ei:jrxmqybm5j32gkgc7msnlelq66d3h3tmtm4nr7y") // <---token and password go here
);

error_log("initializing curl");
//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//set the headers
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute

error_log("executing curl");

$result=curl_exec($ch);

//var_dump($result);

// Closing
curl_close($ch);

// Will dump a beauty json
$data = json_decode($result, true);

$mediaFile = $data["media"];

error_log("mediaFile: " . $mediaFile);

header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <PlayAudio><?php echo $mediaFile ?></PlayAudio>
</Response>
