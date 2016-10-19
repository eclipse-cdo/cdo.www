<?php require_once "_projectCommon/defs.php"; include "_projectCommon/header.php";
########################################################################

$Nav = NULL;
$pageTitle 		= "";
$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

  // Initialize $variables.
  $variables = array();
  $links = array();

  $links[] = array(
    'icon' => 'fa-download', // Required
    'url' => '/cdo/downloads/', // Required
    'title' => 'Download', // Required
    //'target' => '_blank', // Optional
    'text' => 'Looking for the latest build?<br/>Milestones, maintenance builds, and more...' // Optional
  );

  $links[] = array(
    'icon' => 'fa-book', // Required
    'url' => '/cdo/documentation', // Required
    'title' => 'Documentation', // Required
    //'target' => '_blank', // Optional
    'text' => 'Browse through the product documentation, tutorials, presentations and the JavaDocs...' // Optional
  );

  $links[] = array(
    'icon' => 'fa-support', // Required
    'url' => '/cdo/support/', // Required
    'title' => 'Support', // Required
    //'target' => '_blank', // Optional
    'text' => 'You have problems or questions not answered in the documentation? Look here for help...' // Optional
  );


  $links[] = array(
    'icon' => 'fa-globe', // Required
    'url' => '/cdo/community/', // Required
    'title' => 'Community', // Required
    //'target' => '_blank', // Optional
    'text' => 'Visit the community pages for information about various product and development topics...' // Optional
  );

  $links[] = array(
    'icon' => 'fa-code', // Required
    'url' => '/cdo/development/', // Required
    'title' => 'Development', // Required
    //'target' => '_blank', // Optional
    'text' => 'Get the sources and find out more about the CDO project and its development process...' // Optional
  );


  $links[] = array(
    'icon' => 'fa fa-users', // Required
    'url' => '/cdo/team/', // Required
    'title' => 'Team', // Required
    //'target' => '_blank', // Optional
    'text' => 'About us and our activity...' // Optional
  );


  $variables['header_nav'] = array(
    'links' =>  $links, // Required
    'logo' => array( // Required
      'src' => '/cdo/images/Logo-CDO.png', // Required
      'alt' => 'The Eclipse Foundation', // Optional
      'url' => 'http://www.eclipse.org', // Optional
      //'target' => '_blank' // Optional
     ),
  );

  // Set Solstice theme variables (Array)
  $App->setThemeVariables($variables);

?>

	<div id="midcolumn">
	 <table border=0">
	   <tr>
	     <td padding="20px"><img src="/cdo/images/Logo-CDO.png" width="160" height="100"></img></td>
	     <td padding="20px">
          CDO is both a development-time model repository and a run-time persistence framework.
          Being highly optimized it supports object graphs of arbitrary size.
          CDO offers transactions with save points, explicit locking, change notification, 
          queries, temporality, branching, merging, offline and fail-over modes, ...
       </td>
	   </tr>
	 </table>
	</div>

	<div id="rightcolumn">
		<div class="sideitem">
			<h6>Related Links</h6>
			<ul class="relatedLinks fa-ul" style="margin-left:20px;">
				<li><a href="http://www.eclipse.org/projects/project_summary.php?projectid=modeling.emf.cdo">About This Project</a></li>
				<li><a href="http://www.ohloh.net/projects/8908?p=CDO">View Ohloh statistics</a></li>
				<li><a href="http://wiki.eclipse.org/Development_Resources">Becoming a Committer</a></li>
			</ul>
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
