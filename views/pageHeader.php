<div id="header" class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="login-body login-header">
			
			<a id="logo1" href="./dashboard"><img src="./models/img/logoAdmin.png" alt="Admin Lab" /></a>
			<a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="arrow"></span>
			</a>
			
			<!-- <div id="top_menu" class="nav notify-row">
				<ul class="nav top-menu">
					
					<li class="dropdown">
						<a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Settings">
							<i class="icon-cog"></i>
						</a>
					</li>
					
					<li class="dropdown" id="header_inbox_bar">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-envelope-alt"></i><span class="badge badge-important">5</span>
						</a>
						<ul class="dropdown-menu extended inbox">
							<li><p>You have 5 new messages</p></li>
							
							<li>
								<a href="#">
									<span class="photo"><img src="./models/img/avatar-mini.png" alt="avatar" /></span>
									<span class="subject"><span class="from">Dulal Khan</span><span class="time">Just now</span></span>
									<span class="message"> Hello, this is an example messages please check </span>
								</a>
							</li>
							
							<li>
								<a href="#">
									<span class="photo"><img src="./models/img/avatar-mini.png" alt="avatar" /></span>
									<span class="subject"><span class="from">Rafiqul Islam</span><span class="time">10 mins</span></span>
									<span class="message"> Hi, Mosaddek Bhai how are you ? </span>
								</a>
							</li>
							
							<li>
								<a href="#">
									<span class="photo"><img src="./models/img/avatar-mini.png" alt="avatar" /></span>
									<span class="subject"><span class="from">Sumon Ahmed</span><span class="time">3 hrs</span></span>
									<span class="message"> This is awesome dashboard templates </span>
								</a>
							</li>
							
							<li>
								<a href="#">
									<span class="photo"><img src="./models/img/avatar-mini.png" alt="avatar" /></span>
									<span class="subject"><span class="from">Dulal Khan</span><span class="time">Just now</span></span>
									<span class="message"> Hello, this is an example messages please check </span>
								</a>
							</li>
							
							<li>
								<a href="#">See all messages</a>
							</li>
						</ul>
						
					</li>
					
					<li class="dropdown" id="header_notification_bar">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-bell-alt"></i>
							<span class="badge badge-warning">7</span>
						</a>
						
						<ul class="dropdown-menu extended notification">
							<li><p>You have 7 new notifications</p></li>
							
							<li>
								<a href="#">
									<span class="label label-important"><i class="icon-bolt"></i></span> Server #3 overloaded. 
									<span class="small italic">34 mins</span>
								</a>
							</li>
							
							<li>
								<a href="#">
									<span class="label label-warning"><i class="icon-bell"></i></span> Server #10 not respoding. 
									<span class="small italic">1 Hours</span>
								</a>
							</li>
							
							<li>
								<a href="#">
									<span class="label label-important"><i class="icon-bolt"></i></span> Database overloaded 24%. 
									<span class="small italic">4 hrs</span>
								</a>
							</li>
							
							<li>
								<a href="#">
									<span class="label label-success"><i class="icon-plus"></i></span> New user registered. 
									<span class="small italic">Just now</span>
								</a>
							</li>
							
							<li>
								<a href="#">
									<span class="label label-info"><i class="icon-bullhorn"></i></span> Application error. 
									<span class="small italic">10 mins</span></a></li><li><a href="#">See all notifications
								</a>
							</li>
						</ul>
					</li>
				
				</ul>
			</div> -->
			
			<div class="top-nav ">
				<ul class="nav pull-right top-menu">
					
					<!-- <li class="dropdown mtop5">
						<a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Chat">
							<i class="icon-comments-alt"></i>
						</a>
					</li>
					
					<li class="dropdown mtop5">
						<a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Help">
							<i class="icon-headphones"></i>
						</a>
					</li> -->					
					
					<?php
						// Check if the user is logged in and show the user action contents
						if( $AdminClass -> adminIsLoggedin() )
						{
							$Database = new Database();
							$Database -> where ( "adminID", $_SESSION['adminSession'] );
							$admin = $Database -> getOne ( "tlr_admins" );
							?>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<!-- <img src="./models/img/avatar1_small.jpg" alt="" /> -->
										<span class="username"><?php echo $admin['adminTitle']  . " " . $admin['firstName'] . " " . $admin['lastName']; ?></span>
										<b class="caret"></b>
									</a>
									<ul class="dropdown-menu">
										<li><a href="#"><i class="icon-user"></i> My Profile</a></li>
										<li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>
										<li><a href="#"><i class="icon-calendar"></i> Calendar</a></li>
										<li class="divider"></li>
										<li><a href="./logout-logout=true"><i class="icon-key"></i> Log Out</a></li>
									</ul>
								</li>
							<?php
						}
					?>
					
				</ul>
			</div>
		</div>
	</div>
</div>