<template>
	<Head title="About Us" />
	<div class="container">
		<div class="row">
			<div class="col-md-12 pt-5 pb-2 ourTeam-hedding text-center">
			<h1>Our Team</h1>
			<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,<strong> sed do eiusmod
			tempor incididunt </strong>ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
			</p> -->
			</div>
		</div>
			<div class="row">
				<div class="col-md-3 col-sm-4 col-xs-12">
					<div class="row section-success ourTeam-box text-center">
						<div class="col-md-12 section1">
						<img src="/team/joshua-angeles.jpg">
						</div>
						<div class="col-md-12 section2 pb-3">
						<p>Joshua Angeles</p>
						<span>Designer</span>
						</div>
						<div class="col-md-12 section-3">
							<a class="btn btn-outline-link p-0 ms-2" href="https://www.facebook.com/joshua.angeles.1023" target="_blank">
								<i class="fab fa-facebook fa-2x ms-1" aria-hidden="true"></i>
							</a>
							<a class="btn btn-outline-link p-0 ms-2" href="https://www.linkedin.com/in/joshua-angeles-2b76401a0/" target="_blank">
								<i class="fab fa-linkedin fa-2x p-0"  style="color: #0072b1;" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-12">
				<div class="row section-info ourTeam-box text-center">
					<div class="col-md-12 section1">
					<img src="/team/simonpangan.png">
					</div>
					<div class="col-md-12 section2 pb-3">
					<p>Simon Pangan</p>
					<span>Lead Developer</span>
					</div>
					<div class="col-md-12 section-3">
						<a class="btn btn-outline-link p-0 ms-2" href="https://www.facebook.com/imsimonpangan/" target="_blank">
							<i class="fab fa-facebook fa-2x ms-1" aria-hidden="true"></i>
						</a>
						<a class="btn btn-outline-link p-0 ms-2" href="https://www.linkedin.com/in/simon-joseph-pangan-60a342197/" target="_blank">
							<i class="fab fa-linkedin fa-2x p-0"  style="color: #0072b1;" aria-hidden="true"></i>
						</a>
					</div>
				</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-12">
					<div class="row section-danger ourTeam-box text-center">
						<div class="col-md-12 section1">
						<img src="/team/kevin-xu.jpg">
						</div>
						<div class="col-md-12 section2 pb-3">
						<p>Kevin Xu</p>
						<span>Leader</span>
						</div>
						<div class="col-md-12 section-3">
							<a class="btn btn-outline-link p-0 ms-2" href="https://www.facebook.com/xunamanoh" target="_blank">
								<i class="fab fa-facebook fa-2x ms-1" aria-hidden="true"></i>
							</a>
							<a class="btn btn-outline-link p-0 ms-2" href="https://www.linkedin.com/in/kevin-xu-2965a7199/" target="_blank">
								<i class="fab fa-linkedin fa-2x p-0"  style="color: #0072b1;" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-12">
					<div class="row section-primary ourTeam-box text-center">
						<div class="col-md-12 section1">
						<img src="/team/joaquin-lee.jpg">
						</div>
						<div class="col-md-12 section2 pb-3">
						<p>Joaquin Lee</p>
						<span>Documentation</span>
						</div>
						<div class="col-md-12 section-3">
							<a class="btn btn-outline-link p-0 ms-2" href="https://www.facebook.com/JLee.208" target="_blank">
								<i class="fab fa-facebook fa-2x ms-1" aria-hidden="true"></i>
							</a>
							<a class="btn btn-outline-link p-0 ms-2" href="https://www.linkedin.com/in/joseph-joaquin-lee-3276401a0/" target="_blank">
								<i class="fab fa-linkedin fa-2x p-0"  style="color: #0072b1;" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
</template>

<style>
.ourTeam-hedding p{
    color: #979797;
}
.ourTeam-hedding strong{
    color: black;
}
.ourTeam-hedding{
    margin-bottom: 50px;
}
.ourTeam-hedding h1{
    font-size: 25px;
    font-weight: bold;
    color: #145889;
}
.ourTeam-box{
    border-radius: 2px;
    border-top: 6px solid #5DDDD3;
    margin: 0px;
    background-color: #FFFFFF;
    margin-bottom: 30px;
}

.section1{
    padding: 30px 0px 30px 0px;
}
.section1 img{
    border-radius: 50%;
    height: 200px;
    width: 200px;
}
.section2 p{
    font-weight: bold;
    color: #5DDDD3;
    letter-spacing: 1px;
}
.section2 span{
    color: #979597;
}

.section-info{
    border-top: 6px solid #90DFAA;
}
.section-info p{
    color: #90DFAA;
}

.section-primary {
	  border-top: 6px solid #1266F1;
}

.section-primary p{
	color: #1266F1;
}

.section-danger{
    border-top: 6px solid #FD8469;
}

.section-danger p{
    color: #FD8469;
}

.section-3 {
	padding-top: 10px;
	padding-bottom: 10px;
}
</style>