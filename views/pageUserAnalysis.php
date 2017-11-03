<div class="row-fluid metro-overview-cont">
	
	<div data-desktop="span2" data-tablet="span4" class="span2 responsive">
		<div class="metro-overview turquoise-color clearfix">
			<div class="display"><i class="icon-group"></i><div class="percent">+55%</div></div>
			<div class="details"><div class="numbers">530</div><div class="title">New Users</div></div>
		</div>
	</div>
		
	<div data-desktop="span2" data-tablet="span4" class="span2 responsive">
		<div class="metro-overview red-color clearfix">
			<div class="display"><i class="icon-tags"></i><div class="percent">+36%</div></div>
			<div class="details"><div class="numbers">5440 $</div><div class="title">Monthly Sales</div></div>
		</div>
	</div>
		
	<div data-desktop="span2" data-tablet="span4" class="span2 responsive">
		<div class="metro-overview green-color clearfix">
			<div class="display"><i class="icon-shopping-cart"></i><div class="percent">+46%</div></div>
			<div class="details"><div class="numbers">1000</div><div class="title">New Orders</div></div>
		</div>
	</div>
	
	<div data-desktop="span2" data-tablet="span4 fix-margin" class="span2 responsive">
		<div class="metro-overview gray-color clearfix">
			<div class="display"><i class="icon-comments-alt"></i><div class="percent">+26%</div></div>
			<div class="details"><div class="numbers">170</div><div class="title">Comments</div></div>
		</div>
	</div>
	
	<div data-desktop="span2" data-tablet="span4" class="span2 responsive">
		<div class="metro-overview purple-color clearfix">
			<div class="display"><i class="icon-eye-open"></i><div class="percent">+72%</div></div>
			<div class="details"><div class="numbers">1130</div><div class="title">Unique Visitor</div></div>
		</div>
	</div>
	
	<?php
		if ( $AdminClass -> isSupperAdmin() )
		{
			?>
				<a class="icon-btn2 span2" href="./adduser" style="padding: 10px 0; height: 63px;">
					<i class="icon-user"></i><div>Add New User</div>
				</a>
			<?php
		}
	?>

</div>