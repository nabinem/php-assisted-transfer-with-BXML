<?php
/**
 * Created by PhpStorm.
 * User: smitchell
 * Date: 1/7/15
 * Time: 4:56 PM
 *
 * This response determines the input from the gather and either connects the call to the conference or sends the original call leg to voice mail
 */

$digit = $_REQUEST['digits'];
$conferenceNumber = $_REQUEST['conferenceNumber'];
$inboundCallId = $_REQUEST['inboundCallId'];

error_log("digit: " . $digit . ", conferenceNumber: " . $conferenceNumber . ", inboundCallId: " . $inboundCallId);

header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
if ($digit == "1") // the call was accepted so just add the caller to the conference
{ ?>
    <Response>
        <SpeakSentence locale="en_US" gender="female" voice="julie">Connecting to your call</SpeakSentence>
        <Conference from="<?php echo $conferenceNumber ?>" />
    </Response>

<?php }  else { ?>
    <Response>
        <Redirect context="<?php echo $inboundCallId ?>" requestUrl="/inbound_voicemail_handler.php" requestUrlTimeout="6000"/>
    </Response>
<?php } ?>