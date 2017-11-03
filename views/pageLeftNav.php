<div id="sidebar" class="nav-collapse collapse">
	<div class="sidebar-toggler hidden-phone"></div>
	
	<div class="navbar-inverse">
		<form class="navbar-search visible-phone">
			<input type="text" class="search-query" placeholder="Search" />
		</form>
	</div>
	
	<!-- Begin page navigation -->
	<ul class="sidebar-menu">
		
		<!-- Begin home menu -->
		<li <?php if( $pageName == 'Dashboard' ) { echo "class='active'"; } ?>>
			<a href="./dashboard" class="">
				<span class="icon-box"><i class="icon-dashboard"></i></span> Dashboard 
			</a>
		</li>
		<!-- End home menu -->
		<?php
			// Display this menu in drop list only if the user level is BranchAdmin or Teacher
			if ( $AdminClass -> isSupperAdmin() || $AdminClass -> isAdmin() || $AdminClass -> isMarketingAdmin() ) 
			{
				?>
					<!-- Begin users menu -->
					<li class="has-sub <?php if( $pageName == 'Users' ) { echo "active"; } ?>">
						<a href="javascript:;" class="">
							<span class="icon-box"><i class="icon-user"></i></span> Users 
							<span class="arrow"></span>
						</a>
						<ul class="sub">
							<?php
								if ( $AdminClass -> isSupperAdmin() || $AdminClass -> isAdmin() )
								{
									?>
										<li><a class="" href="./users?t=admin">Admin Users</a></li>
										<li><a class="" href="./users?t=corporate">Corporate Users</a></li>
										<li><a class="" href="./users?t=site">Site Users</a></li>
									<?php
								}
								
								elseif ( $AdminClass -> isMarketingAdmin() ) 
								{
									?>
										<li><a class="" href="./users?t=site">Site Users</a></li>
									<?php	
								}
							?>
						</ul>
					</li>
					<!-- End users menu -->
				<?php
			}
		?>
		
		
		<?php
			// Display this menu in drop list only if the user level is admin or suppueradmin
			if ( $AdminClass -> isSupperAdmin() || $AdminClass -> isAdmin() || $AdminClass -> isAccountAdmin() ) 
			{
				?>
					<!-- Begin services providers menu -->
					<li class="has-sub <?php if( $pageName == 'Service Providers' || $pageName == 'Add New Service Provider' || $pageName == 'Provider Details' ) { echo "active"; } ?>">
						<a href="javascript:;" class="">
							<span class="icon-box"><i class="icon-file-alt"></i></span> Service Providers 
							<span class="arrow"></span>
						</a>
						<ul class="sub">
							<li><a class="" href="./providers">All Service Providers</a></li>
							<?php
								$columns		= Array ( "categoryKey, categoryName" );
								$categories 	= $Database -> get ( "tlr_categories", null, $columns );
								if ( $Database -> count > 0 )
								
								foreach ( $categories as $category ) 
								{ 
									?>
										<li><a class="" href="./providers?t=<?php echo $category['categoryKey']; ?>"><?php echo $category['categoryName']; ?></a></li>
									<?php
								}
							?>
						</ul>
					</li>
					<!-- End services providers menu -->
				<?php
			}
		?>
		
		<?php
			// Display this menu in drop list only if the user level is admin or suppueradmin
			if ( $AdminClass -> isSupperAdmin() || $AdminClass -> isAdmin() ) 
			{
				?>
					<!-- Begin log out menu -->
					<li <?php if( $pageName == 'Source Of Fund' ) { echo "class='active'"; } ?>>
						<a class="" href="./source-of-fund">
							<span class="icon-box"><i class="icon-suitcase"></i></span> Source Of Fund
						</a>
					</li>
					<!-- End log out menu -->
				<?php
			}
		?>
		
		<!-- Begin transactions menu -->
		<?php
			// Display this menu in drop list only if the user level is admin, suppueradmin or isAccountAdmin
			if ( $AdminClass -> isSupperAdmin() || $AdminClass -> isAdmin() || $AdminClass -> isAccountAdmin() ) 
			{
				?>
					<li class="has-sub <?php if( $pageName == 'Todays Transactions' || $pageName == 'Previous Transactions' ) { echo "active"; } ?>">
						<a href="javascript:;" class="">
							<span class="icon-box"><i class="icon-external-link"></i></span> Transactions 
							<span class="arrow"></span>
						</a>
						<ul class="sub">
							<li><a class="" href="./transactions">Today's Transactions</a></li>
							<li><a class="" href="./previous-transactions">Previous Transactions</a></li>
						</ul>
					</li>
				<?php
			}
		?>
		<!-- End transactions menu -->
		
		<!-- Begin accounts menu -->
		<?php
			// Display this menu in drop list only if the user level is admin, suppueradmin or isAccountAdmin
			if ( $AdminClass -> isSupperAdmin() || $AdminClass -> isAdmin() || $AdminClass -> isAccountAdmin() ) 
			{
				?>
					<li class="has-sub <?php if( $pageName == 'Todays Accounts' || $pageName == 'Previous Accounts' ) { echo "active"; } ?>">
						<a href="javascript:;" class="">
							<span class="icon-box"><i class="icon-money"></i></span> Accounts 
							<span class="arrow"></span>
						</a>
						<ul class="sub">
							<li><a class="" href="./accounts">Today's Accounts</a></li>
							<li><a class="" href="./previous-accounts">Previous Accounts</a></li>
						</ul>
					</li>
				<?php
			}
		?>
		<!-- End accounts menu -->
		
		<!-- Begin analysis menu -->
		<?php
			// Display this menu in drop list only if the user level is admin, suppueradmin or isAccountAdmin
			if ( $AdminClass -> isSupperAdmin() || $AdminClass -> isAdmin() || $AdminClass -> isAccountAdmin() ) 
			{
				?>
					<li class="has-sub <?php if( $pageName == 'Analytics' || $pageName == 'Demography' ) { echo "active"; } ?>">
						<a href="javascript:;" class="">
							<span class="icon-box"><i class="icon-tasks"></i></span> Analysis 
							<span class="arrow"></span>
						</a>
						<ul class="sub">
							<li><a class="" href="./analytics">Analytics</a></li>
<!--							<li><a class="" href="./demography">Demography</a></li>-->
						</ul>
					</li>
				<?php
			}
		?>
		<!-- End users menu -->
				
		<!-- Begin others menu -->
		<?php
			// Display this menu in drop list only if the user level is admin or suppueradmin
			if ( $AdminClass -> isSupperAdmin() || $AdminClass -> isAdmin() || $AdminClass -> isMarketingAdmin() ) 
			{
				?>
					<li class="has-sub <?php if( $pageName == 'Sliders and AD Banners' || $pageName == "Background Images" ) { echo "active"; } ?>">
						<a href="javascript:;" class="">
							<span class="icon-box"><i class="icon-picture"></i></span> Marketing
							<span class="arrow"></span>
						</a>
						<ul class="sub">
							<li><a class="" href="./sliders-adbanners">Sliders And AD Banners</a></li>
							<li><a class="" href="./background-images">Background Images</a></li>
						</ul>
					</li>
			
				<?php
			}
		?>
		<!-- End others menu -->
				
		<!-- Begin others menu -->

		<!-- End others menu -->
		
		<!-- Begin log out menu -->
		<li>
			<a class="" href="./logout-logout=true">
				<span class="icon-box"><i class="icon-user"></i></span> Log Out
			</a>
		</li>
		<!-- End log out menu -->
	
	</ul>
	<!-- End page navigation -->
	
</div>