<?php $areaRelative = ".."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

$pageTitle 		= "Presentations";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";


print '<div id="midcolumn">' . "\n";
print '<h1 id="pagetitle">Presentations</h1>' . "\n";

printPresentation("ECE_2012/ECE_2012",
									"Now that I've Got a Model - Where's My Application?",
									"Long Talk (EclipseCon Europe 2012, Ludwigsburg/Germany)",
									"Eike Stepper",
									"October 2012");

printPresentation("EclipseSummit_2011/CDO_Ignite",
									"CDO - Orthogonal Aspects of Models",
									"Five Minutes (EclipseCon Europe 2011, Ludwigsburg/Germany)",
									"Eike Stepper",
									"November 2011");

printPresentation("Dawn_EclipseConEurope_2011/Dawn_EclipseConEurope_2011",
									"Let the Sunshine in! News from the Dawn Side of Life",
									"Short talk (EclipseCon Europe 2011, Ludwigsburg/Germany)",
									"Martin Flügge",
									"November 2011");

printPresentation("Dawn_EclipseCon_2011/Dawn_EclipseCon_2011",
									"Dawn - Rise of the Collaborative UI",
									"Short talk (EclipseCon 2011, Santa Clara/CA)",
									"Martin Flügge",
									"March 2011");

printPresentation("EclipseSummit_2010/CDO_EclipseSummit_2010",
									"Scale, Share and Store your Models with CDO / Dawn",
									"Long talk (Eclipse Summit Europe 2010, Ludwigsburg/Germany)",
									"Eike Stepper, Martin Flügge",
									"November 2010");

printPresentation("EclipseModelingDayZurich2010/CDO_Enterprise",
									"The CDO Model Repository - Perfect  for the Enterprise",
									"Short talk (Enterprise Modeling Day, UBS AG, Zurich)",
									"Eike Stepper",
									"October 2010");

printPresentation("BankingDayCopenhagen_2010/BankingDayCopenhagen_2010",
									"Scale, Share and Store your Models with CDO 3.0 (Eclipse Banking Day)",
									"Long talk (IBM, Copenhagen)",
									"Eike Stepper",
									"June 2010");

printPresentation("JAX_2010/CDO_JAX2010",
									"Scale, Share and Store your Models with CDO 3.0 (JAX 2010)",
									"Long talk",
									"Eike Stepper",
									"May 2010");

printPresentation("Webinar_2010_04/Webinar_2010_04",
									"<b>Scale, Share and Store your Models with CDO 3.0 (Webinar)</b>",
									"Webinar Recording: Eclipse Live",
									"Eike Stepper",
									"April 2010");

printPresentation("EclipseCon_2010/CDO_EclipseCon_2010",
									"Scale, Share and Store your Models with CDO 3.0 (EclipseCon 2010)",
									"Long talk: <b>New slides</b>",
									"Eike Stepper",
									"March 2010");

printPresentation("SAP_2010/CDOModelRepository",
									"CDO Model Repository - Where Models Live (SAP Modeling Meeting)",
									"Short overview, features list and API usage example",
									"Eike Stepper",
									"January 2010");

printPresentation("DemoCampBerlin_2009/Net4j-Presentation",
									"The Net4j Signalling Platform - Developing Pluggable Client/Server Applications",
									"Short talk, examples and demo",
									"Eike Stepper",
									"June 2009");

printPresentation("EclipseCon_2009/CDO_EclipseCon_2009",
									"Scale, Share and Store your Models with CDO 2.0 (EclipseCon 2009)",
									"Long talk: <b>New slides</b>",
									"Eike Stepper",
									"March 2009");

printPresentation("http://www.eclipsecon.org/2009/sessions?id=446",
									"RCP Demo with CDO and Riena authentication (EclipseCon 2009)",
									"Create Enterprise Ready Database-RCP-Frontends",
									"Tom Schindl",
									"March 2009");

printPresentation("Webinar_2009_01/CDO_Webinar_2009_01",
									"Scale, Share and Store your Models with CDO 2.0",
									"Webinar for Eclipse Live.",
									"Ed Merks and Eike Stepper",
									"January 2009");

printPresentation("DemoCampBerlin_2008/CDO@DemoCamp_08",
									"CDO 2.0 at the Eclipse Demo Camp in Berlin",
									"Very brief slides, just to prepare a live demo.",
									"Eike Stepper",
									"November 2008");

printPresentation("https://www.gpublication.com/eclipse/#requestedContent=contentID://EclipseConferences/ESE2008/48|Slides at gPublication",
									"Datacentric RCP Applications (ESE 2008)",
									"Long talk: Data binding with JFace and EMF, CDO with security...",
									"Tom Schindl",
									"November 2008");

printPresentation("EclipseSummit_2008/CDO@ESE08",
									"CDO 2.0 at the Eclipse Summit Europe 2008",
									"Long talk: An update, code snippets with the new API...",
									"Eike Stepper",
									"November 2008");

printPresentation("https://sap.emea.pgiconnect.com/p27383431|Webinar Recording",
									"CDO 2.0 Webinar for SAP",
									"Slides, live presentation, discussion...",
									"Eike Stepper",
									"November 2008",
									"German");

printPresentation("Bombardier_2008/CDO_Preview_Bombardier_2008",
									"CDO 2.0 Preview for Bombardier",
									"Project plan, project themes, plan items...",
									"Eike Stepper",
									"October 2008");

printPresentation("NASA_2008/CDO@NASA",
									"CDO for the NASA Ames Research Center and JPL",
									"Long talk at the annual Ensemble Conference",
									"Eike Stepper",
									"August 2008");

printPresentation("NASA_2008/Net4j@NASA",
									"Net4j for the NASA Ames Research Center and JPL",
									"Short talk at the annual Ensemble Conference",
									"Eike Stepper",
									"August 2008");

printPresentation("EclipseCon_2008/CDO-Presentation",
									"CDO 1.0 at the EclipseCon 2008",
									"Long talk: Introduction, design, screenshots...",
									"Eike Stepper",
									"March 2008");

printPresentation("EclipseCon_2008/CDO-Presentation",
									"Net4j 1.0 at the EclipseCon 2008",
									"Short talk: Introduction, design, screenshots...",
									"Eike Stepper",
									"March 2008");

print '</div>' . "\n";

function printPresentation($basePath, $title, $subtitle, $presenters, $month, $lang = "English")
{
	print "<div class=\"titlerow\"><h6>$title</h6></div>\n";
	print "<div class=\"detailrow\"><div class=\"iconcol\">\n";

	if (strpos($basePath, "http") === 0)
	{
		$split = explode("|", $basePath);
		$href = $split[0];
		$tooltip = "External Link";
		if (count($split) > 1)
		{
			$tooltip = $split[1];
		}

		print "<a href=\"$href\" title=\"" . $tooltip . "\" target=\"_window\"><img class=\"icon\" src=\"http.gif\"/></a>&nbsp;\n";
	}
	else
	{
		global $pageRoot;
		$types = array(
		array("pdf", "Adobe Acrobat Document (.pdf)"),
		array("pptx", "Microsoft Office PowerPoint-Presentation (.pptx)"),
		array("ppt", "Microsoft Office PowerPoint 97-2003-Presentation (.ppt)"),
		array("zip", "Compressed Archive (.zip)"),
		array("http", "External Link"));

		foreach ($types as $type)
		{
			$href = $basePath . "." . $type[0];
			$tooltip = $type[1];
			$file = "$pageRoot/$href";
			if (file_exists($file))
			{
				if ($type[0] == "http")
				{
					$content = file_get_contents($file);
					$split = explode("|", $content);
					$href = $split[0];
					if (count($split) > 1)
					{
						$tooltip = $split[1];
					}
				}

				print "<a href=\"$href\" title=\"" . $tooltip . "\"><img class=\"icon\" src=\"" . $type[0] . ".gif\"/></a>&nbsp;\n";
			}
		}
	}

	print "</div><div class=\"infocol\">$subtitle<br/>$month<br/>$presenters<br/>$lang</div></div>\n";
}

########################################################################
include "$areaRoot/_footer.php"; ?>
