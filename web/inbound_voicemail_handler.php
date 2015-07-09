<?php
/**
 * Created by PhpStorm.
 * User: smitchell
 * Date: 7/7/15
 * Time: 9:01 AM
 */

error_log("inbound_voice_mail_handler.php(ENTRY)");

header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <SpeakSentence gender="female" locale="en_US" voice="julie">We're sorry. Your party is not available to take your call. Please leave a message at the beep. Press pound when you are done.</SpeakSentence>
    <Record requestUrl="https://hidden-oasis-7486.herokuapp.com/recording_handler.php" terminatingDigits="8" />
</Response>