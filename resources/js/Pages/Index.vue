<template>
<div class="aa" style="overflow-x:hidden;">
 <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <!-- Page heading-->
                            <h1 class="mb-5">Plain, easy and simple charitable giving.</h1>

                            <button class="btn btn-primary btn-lg disabled">Let's get started</button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Icons Grid-->
        <section class="features-icons bg-light text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class=" d-flex align-items-center"><i class="far fa-credit-card fa-8x pl-5"></i></div>
                            <h3>Multiple Payment Methods</h3>
                            <p class="lead mb-0">Choose from PayPal, Card , Gcash, and GrabPay payments</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-layers m-auto text-primary"></i></div>
                            <h3>Trackable Donations</h3>
                            <p class="lead mb-0">Get notified when charities have withdrawn their donations.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-terminal m-auto text-primary"></i></div>
                            <h3>Blockchain Technology</h3>
                            <p class="lead mb-0">We utilize blockchain for tamper-proof receipts for donations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Image Showcases-->
        <section class="showcase">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('https://images.unsplash.com/photo-1593113616828-6f22bca04804?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80')"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Search Charities you like</h2>
                        <p class="lead mb-0">Find the charities that is closest your heart, both literally and figuratively.</p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 text-white showcase-img" style="background-image: url('https://images.unsplash.com/photo-1468421870903-4df1664ac249?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1631&q=80')"></div>
                    <div class="col-lg-6 my-auto showcase-text">
                        <h2>Introducing Charity Programs Feature</h2>
                        <p class="lead mb-0">Learn more indepth about the upcoming plans and projects of charities.</p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('https://images.unsplash.com/photo-1582553391226-a52bd96887f7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80')"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Be a Volunteer Today</h2>
                        <p class="lead mb-0">Go and spread some good vibes to make the world whole again.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials-->
        <section class="testimonials text-center bg-light">
            <div class="container">
                <h2 class="mb-5">Testimonies</h2>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-1.jpg" alt="..." />
                            <h5>Charity 1</h5>
                            <p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys!"</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-2.jpg" alt="..." />
                            <h5>Charity 2</h5>
                            <p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of super nice landing pages."</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-3.jpg" alt="..." />
                            <h5>Some Benefactor who we interview</h5>
                            <p class="font-weight-light mb-0">"Thanks so much for making these free resources available to us!"</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call to Action-->

</div>
        <!-- Masthead-->
       
        <!-- Footer-->

</template>

<script>
import charitableContract from "~blockchain/charitable.js";
import web3 from "~blockchain/web3.js";
export default {
	async created() {
		console.log(await charitableContract.methods
			.balanceOf("0x9a42C53cf833fa5011d46C8C0AEBe684aB493f2b").call());

		const tx = {
			from : "0x9a42C53cf833fa5011d46C8C0AEBe684aB493f2b", //payee
			to: "0xFaAe17Ac63D320903C4bC8600e45cB721D70722c",  //contract address
			gas: 50000,
			// data: charitableContract.methods.transfer(
			// 		"0x8C311d6B0851642Af706613AeF8c032adfC87FEf", 100
			// 	).encodeABI()
			data: charitableContract.methods.transferFrom(
					"0x8C311d6B0851642Af706613AeF8c032adfC87FEf",
					"0x9a42C53cf833fa5011d46C8C0AEBe684aB493f2b",
					8600
				).encodeABI()
			}

		const signature = await web3.eth.accounts.signTransaction(
			tx, "9a79ead2b40a2ada662e6a775b5454d89913b9ebb3253a954a16f03abf234b90" //private key
		);

		web3.eth.sendSignedTransaction(signature.rawTransaction)
			.on('receipt', console.log);

		console.log(await charitableContract.methods
			.balanceOf("0x9a42C53cf833fa5011d46C8C0AEBe684aB493f2b").call());

		console.log(await charitableContract.methods
			.balanceOf("0x8C311d6B0851642Af706613AeF8c032adfC87FEf").call());
	},
}
</script>

<style>
.body{
    overflow-x: hidden;
}

.features-icons {
  padding-top: 7rem;
  padding-bottom: 7rem;
}
.features-icons .features-icons-item {
  max-width: 20rem;
}
.features-icons .features-icons-item .features-icons-icon {
  height: 7rem;
}
.features-icons .features-icons-item .features-icons-icon i {
  font-size: 4.5rem;
}

header.masthead {
  position: relative;
  background-color: #343a40;
  background: url("https://images.unsplash.com/photo-1536825919521-ab78da56193b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80") no-repeat center center;
  background-size: cover;
  padding-top: 8rem;
  padding-bottom: 8rem;
}
header.masthead:before {
  content: "";
  position: absolute;
  background-color: #1c375e;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  opacity: 0.5;
}
header.masthead h1, header.masthead .h1 {
  font-size: 2rem;
}
@media (min-width: 768px) {
  header.masthead {
    padding-top: 12rem;
    padding-bottom: 12rem;
  }
  header.masthead h1, header.masthead .h1 {
    font-size: 3rem;
  }
}

.showcase .showcase-text {
  padding: 3rem;
}
.showcase .showcase-img {
  min-height: 30rem;
  background-size: cover;
}
@media (min-width: 768px) {
  .showcase .showcase-text {
    padding: 7rem;
  }
}

.testimonials {
  padding-top: 7rem;
  padding-bottom: 7rem;
}
.testimonials .testimonial-item {
  max-width: 18rem;
}
.testimonials .testimonial-item img {
  max-width: 12rem;
  box-shadow: 0px 5px 5px 0px #adb5bd;
}

.call-to-action {
  position: relative;
  background-color: #343a40;
  background: url("https://images.unsplash.com/photo-1536825919521-ab78da56193b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80") no-repeat center center;
  background-size: cover;
  padding-top: 7rem;
  padding-bottom: 7rem;
}
.call-to-action:before {
  content: "";
  position: absolute;
  background-color: #1c375e;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  opacity: 0.5;
}

</style>
