<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); $App = new App();
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $Menu = new Menu();
// require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); $Nav = new Nav();
include($App->getProjectCommon());

$pageTitle 		= "CDO Model Repository";
$pageKeywords	= "eclipse cdo";
$pageAuthor		= "Eike Stepper";

ob_start();
?>

<div id="fullcolumn">
	<div class="linkBlock">
		<div class="link">
			<a href="/projects/whatsnew.php"><img src="http://dev.eclipse.org/huge_icons/apps/internet-news-reader.png" alt="What's New"/></a>
			<a class="heading" href="/projects/whatsnew.php">What's New</a>
			<p class="subText">Stay informed about upcoming events, published builds, notes from the team, etc...</p>
		</div>
		<div class="link">
			<a href="docs"><img src="http://dev.eclipse.org/huge_icons/mimetypes/x-office-book.png" alt="Documentation"/></a>
			<a class="heading" href="docs">Documentation</a>
			<p class="subText">Browse through the product documentation, JavaDocs and tutorials...</p>
		</div>
		<div class="link">
			<a href="http://wiki.eclipse.org/Development_Builds"><img src="http://dev.eclipse.org/huge_icons/status/software-update-available.png" alt="Downloads"/></a>
			<a class="heading" href="http://wiki.eclipse.org/Development_Builds">Downloads</a>
			<p class="subText">Looking for the latest build? Milestones, Maintenance Builds, and more...</p>
		</div>
	</div>
	<div class="linkBlock">
		<div class="link">
			<a href="http://wiki.eclipse.org"><img src="http://dev.eclipse.org/huge_icons/apps/accessories-text-editor.png" alt="CDO Wiki"/></a>
			<a class="heading" href="http://wiki.eclipse.org">CDO Wiki</a>
			<p class="subText">Visit the community pages for information on various product and development topics...</p>
		</div>
		<div class="link">
			<a href="/legal"><img src="http://dev.eclipse.org/huge_icons/actions/edit-clear.png" alt="Development"/></a>
			<a class="heading" href="/legal">Development</a>
			<p class="subText">Find out more about the CDO project and its development process...</p>
		</div>
		<div class="link">
			<a href="team/team.php"><img src="http://dev.eclipse.org/huge_icons/apps/system-users.png" alt="About Us"/></a>
			<a class="heading" href="http://dev.eclipse.org/huge_icons/apps/system-users.png">About Us</a>
			<p class="subText">Meet the team...</p>
		</div>
	</div>
	
	<div id="midcolumn">
		<div class="homeitem">
			<h3><b>Upcoming Reviews</b></h3>
			<?=$reviewsTable;?>		
		</div>
	</div>

	<div id="rightcolumn">
		<div class="sideitem">
			<h6>Related Links</h6>
			<ul class="relatedLinks">
				<li>
					<a href="http://portal.eclipse.org/"><img src="http://dev.eclipse.org/large_icons/apps/preferences-system-network-proxy.png"/></a>
					<a href="http://portal.eclipse.org/">MyFoundation Portal</a>
				</li>
				<li>
					<a href="/mail/"><img src="http://dev.eclipse.org/large_icons/actions/mail-reply-all.png"/></a>
					<a href="/mail/">Mailing Lists</a>
				</li>
				<li>
					<a href="/newsgroups/"><img src="http://dev.eclipse.org/large_icons/apps/internet-news-reader.png"/></a>
					<a href="/newsgroups/">Newsgroups</a>
				</li>
				<li>
					<a href="http://dev.eclipse.org/viewcvs/index.cgi?view=roots"><img src="http://dev.eclipse.org/large_icons/apps/utilities-terminal.png"></a>
					<a href="http://dev.eclipse.org/viewcvs/index.cgi?view=roots">CVS/SVN Repositories</a>
				</li>
				<li>
					<a href="http://wiki.eclipse.org/Development_Resources"><img src="http://dev.eclipse.org/large_icons/apps/preferences-desktop-theme.png"/></a>
					<a href="http://wiki.eclipse.org/Development_Resources">Becoming a Committer</a>
				</li>
				<li>
					<a href="http://www.eclipse.org/projects/committers-emeritus.php"><img src="http://dev.eclipse.org/large_icons/apps/system-users.png"/></a>
					<a href="http://www.eclipse.org/projects/committers-emeritus.php">Committers Emeritus</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<?php

$html = ob_get_clean(); 
$html = mb_convert_encoding($html, "HTML-ENTITIES", "auto");

# Generate the web page
$App->Promotion = TRUE;
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="styles.css" media="screen" />');	
$App->generatePage("Nova", $Menu, NULL, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>
