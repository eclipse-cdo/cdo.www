function toggle(id)
{
	ul = document.getElementById(id);
	img = document.getElementById(id + '_IMG');
	if (ul.style.display == "")
	{
		ul.style.display = "none";
		img.src = img.src.replace('minus.gif', 'plus.gif');
	}
	else
	{
		ul.style.display = "";
		img.src = img.src.replace('plus.gif', 'minus.gif');
	}
}
