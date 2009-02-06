<?php require_once "_projectDefs.php"; include "_projectHeader.php";
########################################################################

$Nav = NULL;
$pageTitle 		= "";
$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

?>

	<div class="linkBlock">
		<div class="link">
			<a href="downloads"><img src="http://dev.eclipse.org/huge_icons/actions/go-down.png" alt="Downloads"/></a>
			<a class="heading" href="downloads">Downloads</a>
			<p class="subText">Looking for the latest build?<br/>Milestones, maintenance builds, and more...</p>
		</div>
		<div class="link">
			<a href="documentation"><img src="http://dev.eclipse.org/huge_icons/mimetypes/x-office-book.png" alt="Documentation"/></a>
			<a class="heading" href="documentation">Documentation</a>
			<p class="subText">Browse through the product documentation, tutorials, presentations and the JavaDocs...</p>
		</div>
		<div class="link">
			<a href="support"><img src="http://dev.eclipse.org/huge_icons/apps/help-browser.png" alt="Support"/></a>
			<a class="heading" href="support">Support</a>
			<p class="subText">You have problems or questions not answered in the documentation? Look here for help...</p>
		</div>
	</div>

	<div class="linkBlock">
		<div class="link">
			<a href="community"><img src="http://dev.eclipse.org/huge_icons/categories/applications-internet.png" alt="Community"/></a>
			<a class="heading" href="community">Community</a>
			<p class="subText">Visit the community pages for information about various product and development topics...</p>
		</div>
		<div class="link">
			<a href="development"><img src="http://dev.eclipse.org/huge_icons/actions/edit-clear.png" alt="Development"/></a>
			<a class="heading" href="development">Development</a>
			<p class="subText">Get the sources and find out more about the CDO project and its development process...</p>
		</div>
		<div class="link">
			<a href="team"><img src="http://dev.eclipse.org/huge_icons/apps/system-users.png" alt="Team"/></a>
			<a class="heading" href="team">Team</a>
			<p class="subText">About us and our activity...</p>
		</div>
	</div>


	<div id="midcolumn">
		<div class="sideitem">
			<h6><a href="/<?=$PR?>/news-whatsnew.php"><img alt="RSS Feed" src="http://www.eclipse.org/images/rss2.gif"/></a>&nbsp;&nbsp;<a href="/<?=$PR?>/news-whatsnew.php">What's New</a></h6>
			<?php getNews(4, "whatsnew"); ?>
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
					<a href="http://www.ohloh.net/projects/8908?p=CDO"><img src="http://dev.eclipse.org/large_icons/apps/utilities-terminal.png"></a>
					<a href="http://www.ohloh.net/projects/8908?p=CDO">View Ohloh statistics</a>
				</li>
				<li>
					<a href="http://wiki.eclipse.org/Development_Resources"><img src="http://dev.eclipse.org/large_icons/apps/preferences-desktop-theme.png"/></a>
					<a href="http://wiki.eclipse.org/Development_Resources">Becoming a Committer</a>
				</li>
				<?if ($serverName=="localhost") {?>
				<li>
					<a href="http://wiki.eclipse.org/Development_Resources"><img src="http://dev.eclipse.org/large_icons/apps/preferences-desktop-theme.png"/></a>
					<a href="tools">Committer Tools</a>
				</li>
				<?}?>
			</ul>
		</div>
	</div>


<?php
########################################################################
include "_projectFooter.php"; ?>
