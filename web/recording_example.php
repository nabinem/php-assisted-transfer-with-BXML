<?php
/**
 * Created by PhpStorm.
 * User: smitchell
 * Date: 6/30/15
 * Time: 2:53 PM
 */
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <SpeakSentence gender="female" locale="en_US" voice="julie">Record your message, press pound when you are done</SpeakSentence>
    <Record requestUrl="https://hidden-oasis-7486.herokuapp.com/recording_handler.php" terminatingDigits="#" />
</Response>