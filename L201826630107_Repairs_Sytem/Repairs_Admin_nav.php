<style type="text/css">@import url('https:/fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');
*
{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Poppins', sans-serif;

}
body
{
	min-height: 100vh
	background: black;
}
.navigation
{
	position: fixed;
	width: 60px;
	height: 100%;
	background: #3e0748;
	transition: 0.5s;

}
.navigation:hover
{
	width: 250px;

}
.navigation ul
{
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
}
.navigation ul li
{
	position: relative;
	width: 100%;
	list-style: none;
}
.navigation ul li:hover
{
	background: #ea1d63;
}
.navigation ul li a
{
	position: relative;
	display: block;
	width: 100%;
	display: flex;
	text-decoration: none;
	color: #fff;
}
.navigation ul li a .icon
{
	position: relative;
	display: block;
	min-width: 60px;
	height: 60px;
	line-height: 60px;
	text-align: center;
	
}
.navigation ul li a .icon .fa
{
	font-size: 25px
}
.navigation ul li a .title
{
	position: relative;
	display: block;
	padding:0 10px;
	height: 60px;
	line-height: 60px;
	text-align: start;
	white-space: nowrap;
	
}
.toggle
{
	position: absolute;
	top: 0;
	right:  0;
	width:60px;
	height: 60px;
	background: #330748;
	cursor: pointer;

}
.toggle:hover
{
	background: #ea1d63;
}
.toggle:before
{
	content: '\f0c9';
	font-family: fontAwesome;
	position: absolute;
	width: 100%;
	height: 100%;
	line-height: 100%;
	text-align: center;
	font-size: 24px;
	color: #fff;


}</style>
<div class="navigation">
		<ul>
			<li>
				<a href="#">
					<span class="icon"></span>
					<span class="title">Home</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="icon"><i class="fa fa-user" aria-hidden="true"> </i></span>
					<span class="title">Profile</span>
				</a>
			</li>
			<li>
				<a href="Repairs_Admin.php?p=1">
					<span class="icon"><i class="fa fa-comment" aria-hidden="true"> </i></span>
					<span class="title">Messsages</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="icon"><i class="fa fa-cog" aria-hidden="true" ></i></span>
					<span class="title">Settings</span>
				</a>
			</li>
			<li>
				<a href="Admin_log.html">
					<span class="icon"><i class="fa fa-lock" aria-hidden="true"> </i></span>
					<span class="title">Logout</span>
				</a>
			</li>
		</ul>
	</div>
	<div class="toggle"></div>