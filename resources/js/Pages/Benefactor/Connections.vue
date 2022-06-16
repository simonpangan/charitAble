<template>
	<div class="py-4">
        <div class="container">
            <div class="row">
                <main class="col col-xl-9 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                    <div class="box shadow-sm border rounded bg-white mb-3 osahan-share-post">
                        <ul class="nav border-bottom osahan-line-tab" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" 
									href="#home" role="tab" aria-controls="home" aria-selected="true">Peopse</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Groups</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Pages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="type-tab" data-bs-toggle="tab" href="#type" role="tab" aria-controls="type" aria-selected="false">Hashtags</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="p-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="profile.html">
                                                <div class="border network-item rounded mb-3">
                                                    <div class="p-3 d-flex align-items-center network-item-header">
                                                        <div class="dropdown-list-image me-3">
                                                            <img class="rounded-circle" src="img/p1.png" alt="">
                                                        </div>
                                                        <div class="fw-bold">
                                                            <h6 class="fw-bold text-dark mb-0">Sophia Lee</h6>
                                                            <div class="small text-black-50">Photographer at Photography</div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center p-3 border-top border-bottom network-item-body">
                                                        <div class="overlap-rounded-circle">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Sophia Lee" src="img/p1.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="John Doe" src="img/p2.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Julia Cox" src="img/p3.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Robert Cook" src="img/p4.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Sophia Lee" src="img/p5.png" alt="">
                                                        </div>
                                                        <span class="fw-bold small text-primary">4 mutual connections</span>
                                                    </div>
                                                    <div class="network-item-footer py-3 d-flex text-center">
                                                        <div class="col-6 ps-3 pe-1">
                                                            <button type="button" class="btn btn-primary btn-sm d-block w-100"> Connect </button>
                                                        </div>
                                                        <div class="col-6 pe-3 ps-1">
                                                            <button type="button" class="btn btn-outline-primary btn-sm d-block w-100"> <i class="feather-user-psus"></i> Follow </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="profile.html">
                                                <div class="border network-item rounded mb-3">
                                                    <div class="p-3 d-flex align-items-center network-item-header">
                                                        <div class="dropdown-list-image me-3">
                                                            <img class="rounded-circle" src="img/p2.png" alt="">
                                                        </div>
                                                        <div class="fw-bold">
                                                            <h6 class="fw-bold text-dark mb-0">John Doe</h6>
                                                            <div class="small text-black-50">Traveler</div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center p-3 border-top border-bottom network-item-body">
                                                        <div class="overlap-rounded-circle">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Sophia Lee" src="img/p6.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="John Doe" src="img/p7.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Julia Cox" src="img/p8.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Robert Cook" src="img/p9.png" alt="">
                                                        </div>
                                                        <span class="fw-bold small text-primary">4 mutual connections</span>
                                                    </div>
                                                    <div class="network-item-footer py-3 d-flex text-center">
                                                        <div class="col-6 ps-3 pe-1">
                                                            <button type="button" class="btn btn-primary btn-sm d-block w-100"> Connect </button>
                                                        </div>
                                                        <div class="col-6 pe-3 ps-1">
                                                            <button type="button" class="btn btn-outline-primary btn-sm d-block w-100"> <i class="feather-user-psus"></i> Follow </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="profile.html">
                                                <div class="border network-item rounded mb-3">
                                                    <div class="p-3 d-flex align-items-center network-item-header">
                                                        <div class="dropdown-list-image me-3">
                                                            <img class="rounded-circle" src="img/p3.png" alt="">
                                                        </div>
                                                        <div class="fw-bold">
                                                            <h6 class="fw-bold text-dark mb-0">Julia Cox</h6>
                                                            <div class="small text-black-50">Art Designer</div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center p-3 border-top border-bottom network-item-body">
                                                        <div class="overlap-rounded-circle">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Sophia Lee" src="img/p10.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="John Doe" src="img/p11.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Julia Cox" src="img/p12.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Robert Cook" src="img/p13.png" alt="">
                                                        </div>
                                                        <span class="fw-bold small text-primary">4 mutual connections</span>
                                                    </div>
                                                    <div class="network-item-footer py-3 d-flex text-center">
                                                        <div class="col-6 ps-3 pe-1">
                                                            <button type="button" class="btn btn-primary btn-sm d-block w-100"> Connect </button>
                                                        </div>
                                                        <div class="col-6 pe-3 ps-1">
                                                            <button type="button" class="btn btn-outline-primary btn-sm d-block w-100"> <i class="feather-user-psus"></i> Follow </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="profile.html">
                                                <div class="border network-item rounded mb-3">
                                                    <div class="p-3 d-flex align-items-center network-item-header">
                                                        <div class="dropdown-list-image me-3">
                                                            <img class="rounded-circle" src="img/p4.png" alt="">
                                                        </div>
                                                        <div class="fw-bold">
                                                            <h6 class="fw-bold text-dark mb-0">Robert Cook</h6>
                                                            <div class="small text-black-50">Graphic Designer</div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center p-3 border-top border-bottom network-item-body">
                                                        <div class="overlap-rounded-circle">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Sophia Lee" src="img/p1.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Julia Cox" src="img/p3.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Robert Cook" src="img/p4.png" alt="">
                                                        </div>
                                                        <span class="fw-bold small text-primary">4 mutual connections</span>
                                                    </div>
                                                    <div class="network-item-footer py-3 d-flex text-center">
                                                        <div class="col-6 ps-3 pe-1">
                                                            <button type="button" class="btn btn-primary btn-sm d-block w-100"> Connect </button>
                                                        </div>
                                                        <div class="col-6 pe-3 ps-1">
                                                            <button type="button" class="btn btn-outline-primary btn-sm d-block w-100"> <i class="feather-user-psus"></i> Follow </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="profile.html">
                                                <div class="border network-item rounded mb-3">
                                                    <div class="p-3 d-flex align-items-center network-item-header">
                                                        <div class="dropdown-list-image me-3">
                                                            <img class="rounded-circle" src="img/p5.png" alt="">
                                                        </div>
                                                        <div class="fw-bold">
                                                            <h6 class="fw-bold text-dark mb-0">Stella Bergmann</h6>
                                                            <div class="small text-black-50">Photography</div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center p-3 border-top border-bottom network-item-body">
                                                        <div class="overlap-rounded-circle">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Sophia Lee" src="img/p5.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="John Doe" src="img/p6.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Julia Cox" src="img/p7.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Robert Cook" src="img/p8.png" alt="">
                                                        </div>
                                                        <span class="fw-bold small text-primary">4 mutual connections</span>
                                                    </div>
                                                    <div class="network-item-footer py-3 d-flex text-center">
                                                        <div class="col-6 ps-3 pe-1">
                                                            <button type="button" class="btn btn-primary btn-sm d-block w-100"> Connect </button>
                                                        </div>
                                                        <div class="col-6 pe-3 ps-1">
                                                            <button type="button" class="btn btn-outline-primary btn-sm d-block w-100"> <i class="feather-user-psus"></i> Follow </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="profile.html">
                                                <div class="border network-item rounded mb-3">
                                                    <div class="p-3 d-flex align-items-center network-item-header">
                                                        <div class="dropdown-list-image me-3">
                                                            <img class="rounded-circle" src="img/p6.png" alt="">
                                                        </div>
                                                        <div class="fw-bold">
                                                            <h6 class="fw-bold text-dark mb-0">Dan Walker</h6>
                                                            <div class="small text-black-50">UI/UX Designer</div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center p-3 border-top border-bottom network-item-body">
                                                        <div class="overlap-rounded-circle">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Sophia Lee" src="img/p9.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Julia Cox" src="img/p13.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Robert Cook" src="img/p8.png" alt="">
                                                        </div>
                                                        <span class="fw-bold small text-primary">4 mutual connections</span>
                                                    </div>
                                                    <div class="network-item-footer py-3 d-flex text-center">
                                                        <div class="col-6 ps-3 pe-1">
                                                            <button type="button" class="btn btn-primary btn-sm d-block w-100"> Connect </button>
                                                        </div>
                                                        <div class="col-6 pe-3 ps-1">
                                                            <button type="button" class="btn btn-outline-primary btn-sm d-block w-100"> <i class="feather-user-psus"></i> Follow </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="profile.html">
                                                <div class="border network-item rounded mb-3">
                                                    <div class="p-3 d-flex align-items-center network-item-header">
                                                        <div class="dropdown-list-image me-3">
                                                            <img class="rounded-circle" src="img/p7.png" alt="">
                                                        </div>
                                                        <div class="fw-bold">
                                                            <h6 class="fw-bold text-dark mb-0">Julia Cox</h6>
                                                            <div class="small text-black-50">Art Designer</div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center p-3 border-top border-bottom network-item-body">
                                                        <div class="overlap-rounded-circle">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Sophia Lee" src="img/p10.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="John Doe" src="img/p11.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Julia Cox" src="img/p12.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Robert Cook" src="img/p13.png" alt="">
                                                        </div>
                                                        <span class="fw-bold small text-primary">4 mutual connections</span>
                                                    </div>
                                                    <div class="network-item-footer py-3 d-flex text-center">
                                                        <div class="col-6 ps-3 pe-1">
                                                            <button type="button" class="btn btn-primary btn-sm d-block w-100"> Connect </button>
                                                        </div>
                                                        <div class="col-6 pe-3 ps-1">
                                                            <button type="button" class="btn btn-outline-primary btn-sm d-block w-100"> <i class="feather-user-psus"></i> Follow </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="profile.html">
                                                <div class="border network-item rounded mb-3">
                                                    <div class="p-3 d-flex align-items-center network-item-header">
                                                        <div class="dropdown-list-image me-3">
                                                            <img class="rounded-circle" src="img/p8.png" alt="">
                                                        </div>
                                                        <div class="fw-bold">
                                                            <h6 class="fw-bold text-dark mb-0">Robert Cook</h6>
                                                            <div class="small text-black-50">Graphic Designer</div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center p-3 border-top border-bottom network-item-body">
                                                        <div class="overlap-rounded-circle">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Sophia Lee" src="img/p1.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Julia Cox" src="img/p3.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Robert Cook" src="img/p4.png" alt="">
                                                        </div>
                                                        <span class="fw-bold small text-primary">4 mutual connections</span>
                                                    </div>
                                                    <div class="network-item-footer py-3 d-flex text-center">
                                                        <div class="col-6 ps-3 pe-1">
                                                            <button type="button" class="btn btn-primary btn-sm d-block w-100"> Connect </button>
                                                        </div>
                                                        <div class="col-6 pe-3 ps-1">
                                                            <button type="button" class="btn btn-outline-primary btn-sm d-block w-100"> <i class="feather-user-psus"></i> Follow </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="profile.html">
                                                <div class="border network-item rounded mb-3">
                                                    <div class="p-3 d-flex align-items-center network-item-header">
                                                        <div class="dropdown-list-image me-3">
                                                            <img class="rounded-circle" src="img/p9.png" alt="">
                                                        </div>
                                                        <div class="fw-bold">
                                                            <h6 class="fw-bold text-dark mb-0">Stella Bergmann</h6>
                                                            <div class="small text-black-50">Photography</div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center p-3 border-top border-bottom network-item-body">
                                                        <div class="overlap-rounded-circle">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Sophia Lee" src="img/p5.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="John Doe" src="img/p6.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Julia Cox" src="img/p7.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-psacement="top" title="Robert Cook" src="img/p8.png" alt="">
                                                        </div>
                                                        <span class="fw-bold small text-primary">4 mutual connections</span>
                                                    </div>
                                                    <div class="network-item-footer py-3 d-flex text-center">
                                                        <div class="col-6 ps-3 pe-1">
                                                            <button type="button" class="btn btn-primary btn-sm d-block w-100"> Connect </button>
                                                        </div>
                                                        <div class="col-6 pe-3 ps-1">
                                                            <button type="button" class="btn btn-outline-primary btn-sm d-block w-100"> <i class="feather-user-psus"></i> Follow </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <aside class="col col-xl-3 order-xl-2 col-lg-12 order-lg-2 col-12">
                    <div class="box mb-3 shadow-sm border rounded bg-white list-sidebar">
                        <div class="box-title p-3">
                            <h6 class="m-0">My connections based on category</h6>
							<small class="text-center text-muted">
								Click icons below if you want to sort.
							</small>
                        </div>
                        <ul class="list-group list-group-flush">
							<li v-for="(category, index) in $page.props.charityCategories" :key="index"
								class="list-group-item ps-3 pe-3 d-flex align-items-center text-dark">
								<i class="feather-users me-2 text-dark"></i> 
									{{ category }} 
								<span class="ms-auto fw-bold">68</span>
							</li>
							<li class="list-group-item ps-3 pe-3 d-flex align-items-center text-dark">
								<i class="feather-users me-2 text-dark"></i> 
									Total: 
								<span class="ms-auto fw-bold">68</span>
							</li>
                        </ul>
                    </div>
                    <div class="box shadow-sm mb-3 border rounded bg-white ads-box text-center">
                        <div class="image-overlap-2 pt-4">
                            <img src="img/l4.png" class="img-fluid rounded-circle shadow-sm" alt="Responsive image">
                            <img src="img/user.png" class="img-fluid rounded-circle shadow-sm" alt="Responsive image">
                        </div>
                        <div class="p-3 border-bottom">
                            <h6 class="text-dark">Gurdeep, grow your career by following <span class="fw-bold"> Askbootsrap</span></h6>
                            <p class="mb-0 text-muted">Stay up-to industry trends!</p>
                        </div>
                        <div class="p-3">
                            <button type="button" class="btn btn-outline-primary btn-sm ps-4 pe-4"> FOLLOW </button>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</template>