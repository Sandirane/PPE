var tab_image = new Array(4);
for(var i=0; i< tab_image.length;i++)
{
        tab_image[i]= new Image();
}


tab_image[0].src='./images/gopro1.jpg';
tab_image[1].src='./images/gopro2.jpg';
tab_image[2].src='./images/gopro3.jpg';
tab_image[3].src='./images/gopro4.jpg';

var n=0;

function changeimg()
{
	n = ++n;
	if(n == tab_image.length)
	{
		n=0;
	}
	window.document.image.src=tab_image[n].src;
}