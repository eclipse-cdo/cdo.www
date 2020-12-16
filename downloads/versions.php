<?php $areaRelative = "."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

header( 'Cache-control: no cache' );

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $pageFolderPath . '/styles.css" media="screen"/>' . "\n\t");

$pageAuthor   = "Eike Stepper";

print '<div id="midcolumn">' . "\n";
print '<h1>Versions</h1>';

if ($handle = opendir("/home/data/httpd/download.eclipse.org/modeling/emf/cdo/drops"))
{
  while (false !== ($entry = readdir($handle)))
  {
    if (str_starts_with($entry, "R"))
    {
      echo "$entry\n";
    }
  }

  closedir($handle);
}

print '</div>';


########################################################################
include "$areaRoot/_footer.php"; ?>
