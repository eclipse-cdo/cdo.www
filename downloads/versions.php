<?php
header( 'Cache-control: no cache' );

$drops = "http://download.eclipse.org/modeling/emf/cdo/drops";
$oldDrops = "R20060925-1359 R20061002-1452 R20061027-1316 R20080624-1000 R20081013-1635 R20081016-1605 R20081103-0639 R20081121-1613 R20090223-0320 R20090223-0436 R20090223-1216 R20090228-0039 R20090622-1520";

print '<h1>Version Comparison</h1>';

$releases = [];
$bundles = [];

$lines = explode("\n", file_get_contents("$drops/drops.txt"));
sort($lines);
foreach ($lines as $drop)
{
  if (startsWith($drop, "R") && !contains($oldDrops, $drop))
  {
    $indexString = file_get_contents("$drops/$drop/index.xml");
    if ($indexString === false)
    {
      continue;
    }
    
    $webProperties = parse_ini_string(file_get_contents("$drops/$drop/web.properties"));
    $release = $webProperties['web.label'];
          
    $buildInfoXml = simplexml_load_string(file_get_contents("$drops/$drop/build-info.xml"));
    $train = (string) $buildInfoXml['train'];
    $eclipse = (string) $buildInfoXml['eclipse'];
    $emf = (string) $buildInfoXml['emf'];
    $commit = (string) $buildInfoXml['revision'];
    $versions = [];
    
    $indexXml = simplexml_load_string($indexString);
    foreach ($indexXml->element as $element)
    {
      if ($element['type'] == "osgi.bundle")
      {
        $bundle = $element['name'];
        if ((startsWith($bundle, "org.eclipse.emf.cdo") || startsWith($bundle, "org.eclipse.net4j")) &&
            !endsWith($bundle, ".source") &&
            !endsWith($bundle, ".defs") &&
            !endsWith($bundle, ".doc") &&
            !contains($bundle, ".releng") &&
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

?>
