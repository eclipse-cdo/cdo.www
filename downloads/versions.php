<?php $areaRelative = "."; 
require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

header( 'Cache-control: no cache' );

$debug = true;

$local = false;
if ($local)
{
  $drops = "C:/develop/git/cdo.www/downloads/drops";
  $archive = null;
}
else
{
  $drops = "/home/data/httpd/download.eclipse.org/modeling/emf/cdo/drops";
  $archive = "/home/data/httpd/archive.eclipse.org/modeling/emf/cdo/drops";
  
  $App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $pageFolderPath . '/styles.css" media="screen"/>' . "\n\t");
}

$pageAuthor   = "Eike Stepper";

print '<div id="midcolumn">' . "\n";
print '<h1>Version Comparison</h1>';

$releases = [];
$bundles = [];

if ($debug) print "A<br>";
if ($handle = opendir($drops))
{
  if ($debug) print "B<br>";
  while (false !== ($drop = readdir($handle)))
  {
    if ($debug) print "C<br>";
    if (startsWith($drop, "R"))
    {
      if ($debug) print "$drop<br>";
      $folder = $drops;
      
      $webPropertiesFile = "$folder/$drop/web.properties";
      if (!file_exists($webPropertiesFile))
      {
        if ($archive == null)
        {
          continue;
        }
        
        $folder = $archive;
        
        $webPropertiesFile = "$folder/$drop/web.properties";
        if (!file_exists($webPropertiesFile))
        {
          continue;
        }
      }
      
      if ($debug) print "$drop<br>";
      
      $webProperties = parse_ini_file($webPropertiesFile);
      $release = $webProperties['web.label'];
            
      $buildInfoXml = simplexml_load_file("$folder/$drop/build-info.xml");
      $train = (string) $buildInfoXml['train'];
      $eclipse = (string) $buildInfoXml['eclipse'];
      $emf = (string) $buildInfoXml['emf'];
      $commit = (string) $buildInfoXml['revision'];
      $versions = [];
      
      $indexXml = simplexml_load_file("$folder/$drop/index.xml");
      foreach ($indexXml->element as $element)
      {
        if ($element['type'] == "osgi.bundle")
        {
          $bundle = $element['name'];
          if (startsWith($bundle, "org.eclipse.") &&
              !endsWith($bundle, ".source") &&
              !contains($bundle, ".examples") &&
              !contains($bundle, ".buddies") &&
              !contains($bundle, ".jms") &&
              !contains($bundle, ".tests"))
          {
            $version = (string) $element['version'];
            $versions += ["$bundle" => $version];
          }
        }
      }
      
      $releases += ["$release" => array(
        "drop" => $drop,
        "commit" => $commit,
        "train" => $train,
        "eclipse" => $eclipse,
        "emf" => $emf,
        "versions" => $versions)];
        
      $bundles = array_merge($bundles, $versions);
    }
  }

  closedir($handle);
}

$releases = array_reverse($releases);

$bundles = array_keys($bundles);
natsort($bundles);
$bundles = array_values($bundles);


print "<table border='1'>\n";
print "  <tr>\n";
print "    <th>&nbsp;</th>\n";

foreach ($releases as $release => $info)
{
  $drop = $info["drop"];
  print "    <th><h3><a href=\"http://download.eclipse.org/modeling/emf/cdo/drops/$drop\">CDO $release</a></h3></th>\n";
}

print "  </tr>\n";

headLine($releases, "Drop", "drop");
headLine($releases, "Commit", "commit");
headLine($releases, "Simrel", "train");
headLine($releases, "Eclipse", "eclipse");
headLine($releases, "EMF", "emf");

foreach ($bundles as $bundle)
{
  print "  <tr>\n";
  print "    <td>$bundle</td>\n";

  foreach ($releases as $release => $info)
  {
    $versions = $info["versions"];
    if (isset($versions[$bundle]))
    {
      $version = $versions[$bundle];
      $file = $bundle . "_" . $version . ".jar";
      print "    <td align='center'><a href=\"http://download.eclipse.org/modeling/emf/cdo/drops/$drop/plugins/$file\" title=\"CDO $release &rarr; $file\">" . simpleVersion($version) . "</a></td>\n";
    }
    else
    {
      print "    <td>&nbsp;</td>\n";
    }
  }
  
  print "  </tr>\n";
}

print "</table>\n";
print '</div>';


function headLine($releases, $label, $field)
{
  print "  <tr>\n";
  print "    <th>$label</th>\n";
  
  foreach ($releases as $release => $info)
  {
    $value = $info[$field];
    
    if ($field === "commit")
    {
     $value = substr($value, 0, 7);
    }
    
    print "    <th>$value</th>\n";
  }
  
  print "  </tr>\n";
}

function simpleVersion($version)
{
  $segments = explode(".", $version);
  return "$segments[0].$segments[1].$segments[2]";
}

function contains($haystack, $needle)
{
  return strpos($haystack, $needle) !== false;
}

function startsWith($haystack, $needle)
{
  $length = strlen($needle);
  return substr($haystack, 0, $length) === $needle;
}

function endsWith($haystack, $needle)
{
  $length = strlen($needle);
  if (!$length)
  {
    return true;
  }
  
  return substr($haystack, -$length) === $needle;
}


########################################################################
include "$areaRoot/_footer.php"; ?>
