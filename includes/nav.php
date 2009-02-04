<?php

print '<div id="leftcol">';
print '<ul id="leftnav">';

for($i = 0; $i < $Nav->getLinkCount(); $i++)
{
	$Link = $Nav->getLinkAt($i);
	if( $Link->getURL() == "" )
	{
		if($Link->getTarget() == "__SEPARATOR")
		{
			print 1;
			print '<li class="separator"><a class="separator">' . $Link->getText() . '<img src="/eclipse.org-common/themes/Nova/images/separator.png" /></a></li>';
		}
		else
		{
			print 2;
			print '<li><a class="nolink" href="#">' . $Link->getText() . '</a></li>';
		}
	}
	elseif (stripos($Link->getURL(), 'project_summary.php') !== FALSE)
	{
		print 3;
		print '<li class="about"><a href="' . $Link->getURL() . '">' . $Link->getText() . '</a></li>';
	}
	else
	{
		if($Link->getTarget() == "__SEPARATOR")
		{
			print 4;
			print '<li class="separator"><a class="separator" href="' . $Link->getURL() . '">' . $Link->getText() . '<img src="/eclipse.org-common/themes/Nova/images/separator.png" /></a></li>';
		}
		else
		{
			print 5;
			print '<li><a href="' . $Link->getURL() . '">' . $Link->getText() . '</a></li>';
		}
	}

}

print '</ul>';

?>
