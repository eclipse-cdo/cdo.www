function toggle(id)
{
	var ul = document.getElementById(id);
	setVisible(ul, !isVisible(ul));
}

function isVisible(ul)
{
	return ul.style.display != "none";
}

function setVisible(ul, on)
{
	if (ul.id)
	{
		var img = document.getElementById(ul.id + "_IMG");
		if (on)
		{
			ul.style.display = "";
			img.src = img.src.replace("expand.gif", "collapse.gif");
		}
		else
		{
			ul.style.display = "none";
			img.src = img.src.replace("collapse.gif", "expand.gif");
		}
	}
}

function setVisibleAll(on)
{
	var midcolumn = document.getElementById("midcolumn");
	var uls = midcolumn.getElementsByTagName("ul");
	for ( var i = 0; i < uls.length; ++i)
	{
		setVisible(uls[i], on);
	}
}
