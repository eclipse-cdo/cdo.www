<?php $areaRelative = "."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

//$pageTitle 		= "Downloads";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';

$newsgroup = imap_open("{news.eclipse.org:119/nntp}eclipse.tools.emf", "exquisitus", "flinder19");
//echo "<h1>Postfächer</h1>\n";
//$folders = imap_listmailbox($newsgroup, "{imap.example.org:143}", "*");
//
//if ($folders == false) {
//    echo "Abruf fehlgeschlagen<br />\n";
//} else {
//    foreach ($folders as $val) {
//        echo $val . "<br />\n";
//    }
//}
echo "Messages: " . imap_num_msg($newsgroup);
//echo "<h1>Nachrichten in INBOX</h1>\n";
//$headers = imap_headers($newsgroup);
//
//if ($headers == false) {
//    echo "Abruf fehlgeschlagen<br />\n";
//} else {
//    foreach ($headers as $val) {
//        echo $val . "<br />\n";
//    }
//}

imap_close($newsgroup);

print '</div>';

########################################################################
include "$areaRoot/_footer.php"; ?>
