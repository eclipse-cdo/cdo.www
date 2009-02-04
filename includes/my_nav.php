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
			if ($debug) print 1;
			print '<li class="separator">' . $Link->getText() . '</li>';
		}
		else
		{
			if ($debug) print 2;
			print '<li class="nolink">' . $Link->getText() . '</li>';
		}
	}
	elseif (stripos($Link->getURL(), 'project_summary.php') !== FALSE)
	{
		if ($debug) print 3;
		print '<li class="about"><a href="' . $Link->getURL() . '">' . $Link->getText() . '</a></li>';
	}
	else
	{
		if($Link->getTarget() == "__SEPARATOR")
		{
			if ($debug) print 4;
			print '<li class="separator"><a class="separator" href="' . $Link->getURL() . '">' . $Link->getText() . '<img src="/eclipse.org-common/themes/Nova/images/separator.png" /></a></li>';
		}
		else
		{
			if ($debug) print 5;
			print '<li><a href="' . $Link->getURL() . '">' . $Link->getText() . '</a></li>';
		}
	}

}

print '</ul>';
print '</div>';

?>
