<?php require_once "_projectCommon/defs.php"; include "_projectCommon/header.php";
########################################################################

$Nav = NULL;
$pageTitle 		= "";
$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

?>

	<div id="midcolumn">
   <br/>
	 <table border="0" cellspacing="20" cellpadding="20">
	   <tr>
	     <td><img src="/cdo/images/Logo-CDO.png" width="160" height="100"></img></td>
       <td width="32px"/>
	     <td>
          CDO is both a development-time model repository and a run-time persistence framework.
          Being highly optimized it supports object graphs of arbitrary size.<br>
          CDO offers transactions with save points, explicit locking, change notifications, 
          queries, transparent temporality, branching, merging, offline and fail-over modes, ...
       </td>
       <td width="32px"/>
	   </tr>
	   <tr><td colspan="4">
       <br/>
       <table border="0" cellspacing="20" cellpadding="20">
         <tr>
           <td width="32px"/>
           <td><img src="https://dev.eclipse.org/huge_icons/actions/go-bottom.png"></img></td>
           <td><h3><a href="/cdo/downloads/">Download</a></h3><p><i>Looking for the latest build? Milestones, maintenance builds, and more...</i></p></td>
         </tr>
         <tr>
           <td width="32px"/>
           <td><img src="https://dev.eclipse.org/huge_icons/mimetypes/x-office-book.png"></img></td>
           <td><h3><a href="/cdo/documentation/">Documentation</a></h3><p><i>Browse through the product documentation, tutorials, presentations and the JavaDocs...</i></p></td>
         </tr>
         <tr>
           <td width="32px"/>
           <td><img src="https://dev.eclipse.org/huge_icons/actions/mail-reply-all.png"></img></td>
           <td><h3><a href="/cdo/support/">Support</a></h3><p><i>You have problems or questions not answered in the documentation? Look here for help...</i></p></td>
         </tr>
         <tr>
           <td width="32px"/>
           <td><img src="https://dev.eclipse.org/huge_icons/categories/applications-internet.png"></img></td>
           <td><h3><a href="/cdo/community/">Community</a></h3><p><i>Visit the community pages for information about various product and development topics...</i></p></td>
         </tr>
         <tr>
           <td width="32px"/>
           <td><img src="https://dev.eclipse.org/huge_icons/categories/applications-development.png"></img></td>
           <td><h3><a href="/cdo/development/">Development</a></h3><p><i>Get the sources and find out more about the CDO project and its development process...</i></p></td>
         </tr>
         <tr>
           <td width="32px"/>
           <td><img src="https://dev.eclipse.org/huge_icons/apps/system-users.png"></img></td>
           <td><h3><a href="/cdo/team/">Team</a></h3><p><i>About us and our activity...</i></p></td>
         </tr>
       </table>
	   </td></tr>
	 </table>
	</div>

	<div id="rightcolumn">
	  <br/>
	  
		<div class="sideitem">
			<h6>Related Links</h6>
			<p><a href="http://www.eclipse.org/projects/project_summary.php?projectid=modeling.emf.cdo">About This Project</a></p>
			<p><a href="http://www.ohloh.net/projects/8908?p=CDO">View Ohloh statistics</a></p>
			<p><a href="http://wiki.eclipse.org/Development_Resources">Becoming a Committer</a></p>
		</div>
		
		<div class="sideitem">
			<h6><a href="<?=$PR?>/news-whatsnew.php"><img alt="RSS Feed" src="http://www.eclipse.org/images/rss2.gif"/></a>&nbsp;&nbsp;
					<a href="/<?=$PR?>/news-whatsnew.php">What's New</a></h6>
			<?php
				$xml = file_get_contents("$projectRoot/feeds/news.xml");
				getNews(3, "whatsnew", $xml);
			?>
		</div>
		
		<div class="sideitem">
			<h6><a href="<?=$PR?>/news-whatsnew.php"><img alt="RSS Feed" src="http://www.eclipse.org/images/rss2.gif"/></a>&nbsp;&nbsp;
					<a href="/<?=$PR?>/news-whatsnew.php">Upcoming Events</a></h6>
			<?php
				getNews(3, "bleedingedge", $xml);
			?>
		</div>
		
		<div class="sideitem">
			<h6><a href="<?=$PR?>/news-whatsnew.php"><img alt="RSS Feed" src="http://www.eclipse.org/images/rss2.gif"/></a>&nbsp;&nbsp;
					<a href="/<?=$PR?>/news-whatsnew.php">Docs</a></h6>
			<?php
				getNews(3, "docs", $xml);
			?>
		</div>
	</div>

<?php
########################################################################
include "_projectCommon/footer.php"; ?>
