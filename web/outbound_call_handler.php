<?php
/**
 * Created by PhpStorm.
 * User: smitchell
 * Date: 7/7/15
 * Time: 8:44 AM
 *
 * This response handles the outbound call leg. It presents the option to accept or reject the incoming call to the outbound callee
 */
include 'utils.php';

varDumpToString($_REQUEST);

$from = $_REQUEST['from'];
$conferenceNumber = urldecode($_REQUEST['tag']);
$inboundCallId = urldecode($_REQUEST['inboundCallId']);


header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Gather maxDigits="1" requestUrl="/outbound_gather_handler.php?conferenceNumber=<?php echo urlencode($conferenceNumber) ?>&amp;inboundCallId=<?php echo $inboundCallId ?>"  >
      <SpeakSentence gender="female" locale="en_US" voice="julie">You have a call from <?php echo $from ?>. Press one to answer the call or two to send to voice mail.</SpeakSentence>
   </Gather>
</Response>