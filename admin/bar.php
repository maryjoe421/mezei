<?php
	if(isset($_SESSION["username"])) {
		echo '

<!-- Static navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">mezei.co.uk</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">';

		if($_SESSION["privilege"] == "user") {
			echo '

			<ul class="nav navbar-nav">';

			foreach ($menuitems as $key => $value) {
				echo '

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$value.' <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="'.$adminpath.'?b=list&amp;p='.$key.'">'.$lang["LIST_POSTS"][$_COOKIE['language']].'</a></li>
						<li><a href="'.$adminpath.'?b=new&amp;p='.$key.'">'.$lang["ADD_NEW_POST"][$_COOKIE['language']].'</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="../#'.$key.'" target="_blank">'.$lang["PREVIEW_POST"][$_COOKIE['language']].'</a></li>
					</ul>
				</li>';
			}
			echo '

			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$_SESSION["username"].' <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="'.$adminpath.'?b=profil&amp;userid='.$_SESSION["userid"].'">'.$lang["USER_PROFILE"][$_COOKIE['language']].'</a></li>
						<li><a href="'.$adminpath.'?b=pwd&amp;userid='.$_SESSION["userid"].'">'.$lang["MODIFY_PASSWORD"][$_COOKIE['language']].'</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="'.$adminpath.'?b=logout">'.$lang["LOGOUT"][$_COOKIE['language']].'</a></li>
					</ul>
				</li>
			</ul>';
		}
		if($_SESSION["privilege"] == "admin") {
			echo '

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="'.$adminpath.'?b=profil&amp;userid='.$_SESSION["userid"].'" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$_SESSION["username"].' <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="'.$adminpath.'?b=set">'.$lang["MODIFY_USER_DATA"][$_COOKIE['language']].'</a></li>
						<li><a href="'.$adminpath.'?b=user">'.$lang["ADD_NEW_USER"][$_COOKIE['language']].'</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="'.$adminpath.'?b=profil&amp;userid='.$_SESSION["userid"].'">'.$lang["USER_PROFILE"][$_COOKIE['language']].'</a></li>
						<li><a href="'.$adminpath.'?b=pwd&amp;userid='.$_SESSION["userid"].'">'.$lang["MODIFY_PASSWORD"][$_COOKIE['language']].'</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="'.$adminpath.'?b=logout">'.$lang["LOGOUT"][$_COOKIE['language']].'</a></li>
					</ul>
				</li>
			</ul>';

		}
		echo '

		</div>
	</div>
</nav>';

	}
?>
