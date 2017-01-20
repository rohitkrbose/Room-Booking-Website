<?php

// $Id$

require "defaultincludes.inc";
require_once "version.inc";

// Check the user is authorised for this page
checkAuthorised();

print_header($day, $month, $year, $area, isset($room) ? $room : "");



echo "\n</p>\n";

echo "<h3>" . get_vocab("help") . "</h3>\n";
echo "<p>\n";
echo get_vocab("please_contact") . '<a href="mailto:' . htmlspecialchars($mrbs_admin_email)
  . '">' . htmlspecialchars($mrbs_admin)
  . "</a> " . get_vocab("for_any_questions") . "\n";
echo "</p>\n";
 
require_once "site_faq/site_faq" . $faqfilelang . ".html";

output_trailer();

