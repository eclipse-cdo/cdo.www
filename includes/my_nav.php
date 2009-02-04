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
			print '<li class="separator">' . $Link->getText() . '</li>';
		}
		else
		{
			print '<li class="nolink">' . $Link->getText() . '</li>';
		}
	}
	elseif (stripos($Link->getURL(), 'project_summary.php') !== FALSE)
	{
		print '<li class="about"><a href="' . $Link->getURL() . '">' . $Link->getText() . '</a></li>';
	}
	else
	{
		if($Link->getTarget() == "__SEPARATOR")
		{
			print '<li class="separator"><a class="separator" href="' . $Link->getURL() . '">' . $Link->getText() . '<img src="/eclipse.org-common/themes/Nova/images/separator.png" /></a></li>';
		}
		else
		{
			print '<li><a href="' . $Link->getURL() . '">' . $Link->getText() . '</a></li>';
		}
	}

}

print '</ul>';
print '</div>';

?>
