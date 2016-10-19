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
     <tr>
       <td width="12px"/>
       <td colspan="4">
        <br/>
        <p>
         CDO is a pure Java <i>model repository</i> for your EMF models and meta models. CDO can also serve as a
         <i>persistence and distribution framework</i> for your EMF based application systems. For the sake of this overview a
         model can be regarded as a graph of application or business objects and a meta model as a set of classifiers that
         describe the structure of and the possible relations between these objects.
         <p>
         CDO supports plentyfold deployments such as embedded repositories, offline clones or replicated clusters. The
         following diagram illustrates the most common scenario: 
         <p align="center"><img src="http://download.eclipse.org/modeling/emf/cdo/drops/S20161018-1437/help/org.eclipse.emf.cdo.doc/html/cdo-overview.png" width="80%">
        
        
        <p>
         The main functionality of CDO can be summarized as follows:
         <dl>
         <dt><b>Persistence</b>
         <dd>Persistence of your models in all kinds of database backends like major relational databases or NoSQL
         databases. CDO keeps your application code free of vendor specific data access code and eases transitions between
         the supported backend types.
         <p>
         <dt><b>Multi User Access</b>
         <dd>Multi user access to your models is supported through the notion of repository sessions. The physical transport
         of sessions is pluggable and repositories can be configured to require secure authentication of users. Various
         authorization policies can be established programmatically.
         <p>
         <dt><b>Transactional Access</b>
         <dd>Transactional access to your models with ACID properties is provided by optimistic and/or pessimistic locking
         on a per object granule. Transactions support multiple savepoints that changes can be rolled back to. Pessimistic
         locks can be acquired separately for read access, write access and the option to reserve write access in the
         future. All kinds of locks can optionally be turned into long lasting locks that survive repository restarts.
         Transactional modification of models in multiple repositories is provided through the notion of XA transactions
         with a two phase commit protocol.
         <p>
         <dt><b>Transparent Temporality</b>
         <dd>Transparent temporality is available through audit views, a special kind of read only transactions that provide
         you with a consistent model object graph exactly in the state it has been at a point in the past. Depending on the
         chosen backend type the storage of the audit data can lead to considerable increase of database sizes in time.
         Therefore it can be configured per repository.
         <p>
         <dt><b>Parallel Evolution</b>
         <dd>Parallel evolution of the object graph stored in a repository through the concept of branches similar to source
         code management systems like Subversion or Git. Comparisons or merges between any two branch points are supported
         through sophisticated APIs, as well as the reconstruction of committed change sets or old states of single objects.
         <p>
         <dt><b>Scalability</b>
         <dd>Scalability, the ability to store and access models of arbitrary size, is transparently achieved by loading
         single objects on demand and caching them <i>softly</i> in your application. That implies that objects that are no
         longer referenced by the application are automatically garbage collected when memory runs low. Lazy loading is
         accompanied by various prefetching strategies, including the monitoring of the object graph's <i>usage</i> and the
         calculation of fetch rules that are optimal for the current usage patterns. The scalability of EMF applications can
         be further increased by leveraging CDO constructs such as remote cross referencing or optimized content adapters.
         <p>
         <dt><b>Thread Safety</b>
         <dd>Thread safety ensures that multiple threads of your application can access and modify the object graph without
         worrying about the synchronization details. This is possible and cheap because multiple transactions can be opened
         from within a single session and they all share the same object data until one of them modifies the graph. Possible
         commit conflicts can be handled in the same way as if they were conflicts between different sessions.
         <p>
         <dt><b>Collaboration</b>
         <dd>Collaboration on models with CDO is a snap because an application can opt in to be notified about remote
         changes to the object graph. By default your local object graph transparently changes when it has changed remotely.
         With configurable change subscription policies you can fine tune the characteristics of your <i>distributed shared
         model</i> so that all users enjoy the impression to collaborate on a single instance of an object graph. The level
         of collaboration can be further increased by plugging custom collaboration handlers into the asynchronous CDO
         protocol.
         <p>
         <dt><b>Data Integrity</b>
         <dd>Data integrity can be ensured by enabling optional commit checks in the repository server such as referential
         integrity checks and containment cycle checks, as well as custom checks implemented by write access handlers.
         <p>
         <dt><b>Security</b>
         <dd>The data in a repository can be secured through pluggable <a href="http://download.eclipse.org/modeling/emf/cdo/drops/S20161018-1437/help/org.eclipse.emf.cdo.doc/html/../../org.eclipse.net4j.util.doc/javadoc/org/eclipse/net4j/util/security/IAuthenticator.html" title="Interface in org.eclipse.net4j.util.security"><code>authenticators</code></a> and
         <a href="http://download.eclipse.org/modeling/emf/cdo/drops/S20161018-1437/help/org.eclipse.emf.cdo.doc/html/../javadoc/org/eclipse/emf/cdo/server/IPermissionManager.html" title="Interface in org.eclipse.emf.cdo.server"><code>permission managers</code></a>. A default security model is provided on top of these low-level
         components. The model comprises the concepts of users, groups, roles and extensible permissions.
         <p>
         <dt><b>Fault Tolerance</b>
         <dd>Fault tolerance on multiple levels, namely the setup of fail-over clusters of replicating repositories under
         the control of a fail-over monitor, as well as the usage of a number of special session types such as fail-over or
         reconnecting sessions that allow applications to hold on their copy of the object graph even though the physical
         repository connection has broken down or changed to a different fail-over participant.
         <p>
         <dt><b>Offline Work</b>
         <dd>Offline work with your models is supported by two different mechanisms:
         <ul>
         <li>One way is to create a <b>clone</b> of a complete remote repository, including all history of all branches.
         Such a clone is continuously synchronized with its remote master and can either act as an embedded repository to
         make a single application tolerant against network outage or it can be set up to serve multiple clients, e.g., to
         compensate low latency master connections and speed up read access to the object graph.
         <p>
         <li>An entirely different and somewhat lighter approach to offline work is to check out a single version of the
         object graph from a particular branch point of the repository into a local CDO <b>workspace</b>. Such a workspace
         behaves similar to a local repository without branching or history capture, in particular it supports multiple
         concurrent transactions on the local checkout. In addition it supports most remote functionality that is known from
         source code management systems such as update, merge, compare, revert and check in.
         </ul>
         </dl>
       </td>
     </tr>
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
