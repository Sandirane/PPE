<!----- Pied de Page ----->
<br/>
<table border="0" width="100%" style="text-align: center; border-radius: 0 0 20px 20px; background: white;">
	<tr>
		<td width="25%"><a href=""><img src="images/facebook.png" height="15px" /> Facebook</a></td>
		<td>|</td>
		<td width="25%"><a href=""><img src="images/twitter.png" height="15px" /> Twitter</a></td>
		<td>|</td>
		<td width="25%"><a href=""><img src="images/google+.png" height="15px" /> Google+</a></td>
		<td>|</td>
		<td width="25%"><a href="rss.xml" target="_blank"><img src="images/rss.png" height="15px" /> RSS</a></td>
	</tr>
</table>
<br/>
<div style="text-align: center; color: white;">PPE - Copyright <?php if (isset($_SESSION['user_id']) && $_SESSION['user_admin']== '1'){ ?><a href="admin.php">&copy;</a><?php }else{ ?>&copy;<?php } ?> - <?php echo date('Y'); ?></div>
