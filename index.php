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
       <td width="12px"/>
	     <td><img src="/cdo/images/Logo-CDO.png" width="160" height="100"></img></td>
       <td width="32px"/>
	     <td>
          <div class="blurb">CDO is both a development-time model repository and a run-time persistence framework.
          Being highly optimized it supports object graphs of arbitrary size.</div>
          <div class="blurb">CDO offers transactions with save points, explicit locking, change notifications, 
          queries, transparent temporality, time travel, branching, merging, offline clones,
          fail-over clusters, automatic memory management, and more...</div>
       </td>
       <td width="32px"/>
	   </tr>
	   <tr><td colspan="5">
       <br/>
       <table border="0" cellspacing="20" cellpadding="20">
         <tr>
           <td width="44px"/>
           <td><a href="/cdo/downloads/"><img src="https://dev.eclipse.org/huge_icons/actions/go-down.png"></img></a>&nbsp;&nbsp;&nbsp;</td>
           <td valign="top"><h3><a href="/cdo/downloads/">Downloads</a></h3><p><i>Looking for the latest build? Milestones, maintenance builds, and more...</i></p></td>
         </tr>
         <tr><td colspan="3"></td></tr>
         <tr>
           <td width="44px"/>
           <td><a href="/cdo/documentation/"><img src="https://dev.eclipse.org/huge_icons/mimetypes/x-office-book.png"></img></a>&nbsp;&nbsp;&nbsp;</td>
           <td valign="top"><h3><a href="/cdo/documentation/">Documentation</a></h3><p><i>Browse through the product documentation, tutorials, presentations and the JavaDocs...</i></p></td>
         </tr>
         <tr><td colspan="3"></td></tr>
         <tr>
           <td width="44px"/>
           <td><a href="/cdo/community/"><img src="https://dev.eclipse.org/huge_icons/categories/applications-internet.png"></img></a>&nbsp;&nbsp;&nbsp;</td>
           <td valign="top"><h3><a href="/cdo/community/">Community</a></h3><p><i>Visit the community pages for information about various product and development topics...</i></p></td>
         </tr>
         <tr><td colspan="3"></td></tr>
         <tr>
           <td width="44px"/>
           <td><a href="/cdo/support/"><img src="https://dev.eclipse.org/huge_icons/actions/mail-reply-all.png"></img></a>&nbsp;&nbsp;&nbsp;</td>
           <td valign="top"><h3><a href="/cdo/support/">Support</a></h3><p><i>You have problems or questions not answered in the documentation? Look here for help...</i></p></td>
         </tr>
         <tr><td colspan="3"></td></tr>
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
