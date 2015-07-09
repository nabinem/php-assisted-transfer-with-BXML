<?php
/**
 * Created by PhpStorm.
 * User: smitchell
 * Date: 7/6/15
 * Time: 5:16 PM
 *
 * This response speaks a sentence to the inbound caller, then calls out to the transfer number.
 */
error_log("Request:" . implode($_REQUEST));

$callId = $_REQUEST['callId']; // get the callId from the querystring
$to = "3032288849"; // hard-coded outbound number here. Can and should be obtained from a DB look up.
$conferenceNumber = $_REQUEST['to']; // the from number in the Conference. Passed to the outbound call
error_log("conferenceNumber: " . $conferenceNumber );

header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Call tag="<?php echo $conferenceNumber ?>" to="<?php echo $to ?>" from="<?php echo urlencode($conferenceNumber) ?>" requestUrl="/outbound_call_handler.php?inboundCallId=<?php echo $callId ?>" />
    <SpeakSentence locale="en_US" gender="female" voice="julie">Please wait while we transfer you to your party</SpeakSentence>
    <Conference from="<?php echo $conferenceNumber ?>" />
</Response>
