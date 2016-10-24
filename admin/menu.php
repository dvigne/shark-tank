<?php
	//Return to login screen if not in session
	include("../headers/session.php");
	Session::checkAdminSession();
?>
	<div class="menu">
		<ul>
			<li class="headerlink">Keepa &nbsp; &nbsp;
			<ul>
			<li><a href="?op=mankeys">Manage Answerkeys</a></li>
			</ul>
			</li>
		</ul>
		<ul>
			<li class="headerlink">Help &nbsp; &nbsp;
			<ul>
			<li><a href="?op=help&page=0">Help</a></li>
			<li><a href="https://github.com/Property404/keepa">GitHub</a></li>
			</ul>
			</li>
		</ul>
		<ul>
			<li class="headerlink">Account &nbsp; &nbsp;
			<ul>
			<li><a href="?op=passwd">Change Password</a></li>
			<li><a href="?op=logout">Logout</a></li>
			</ul>
			</li>
		</ul>
		<div style="text-align: right;left-margin: 50px;line-height:1.5em;" class="headerlink">Control Panel &nbsp;&nbsp;</div>
	</div>
<?php
			if($_SESSION['default_password']=='true'){
				echo('<div style="background-color: red;text-align: center;color:white;">You are using the default password. Please change it immediately.</div>');
			}
?>
