<template>
	<div class="py-4">
        <div class="container">
            <div class="row">
                <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                    <div class="box shadow-sm border rounded bg-white mb-3 osahan-share-post">
                        <form class="job-search p-3 border-bottom">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search jobs" aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">
                              <i class="feather-search"></i>
                              </button>
                                </div>
                            </div>
                        </form>
                        <ul class="nav border-bottom osahan-line-tab" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Category</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Title</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Location</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="type-tab" data-toggle="tab" href="#type" role="tab" aria-controls="type" aria-selected="false">Type</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="p-3 job-tags">
                                    <button type="button" class="btn btn-outline-secondary btn-sm me-1">All</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm me-1">Sales</button>
                                    <button type="button" class="btn btn-outline-primary btn-sm me-1">Design</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm me-1">Products</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm me-1">Developer</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm me-1">Business Analyst</button>
                                </div>
                                <div class="p-3 border-top">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="job-profile.html">
                                                <div class="border job-item mb-3">
                                                    <div class="d-flex align-items-center p-3 job-item-header">
                                                        <div class="overflow-hidden me-2">
                                                            <h6 class="fw-bold text-dark mb-0 text-truncate">UI/UX designer</h6>
                                                            <div class="text-truncate text-primary">Envato</div>
                                                            <div class="small text-gray-500"><i class="feather-map-pin"></i> India, Punjab</div>
                                                        </div>
                                                        <img class="img-fluid ms-auto" src="img/l1.png" alt="">
                                                    </div>
                                                    <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                                                        <div class="overlap-rounded-circle">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Sophia Lee" src="img/p1.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="John Doe" src="img/p2.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Julia Cox" src="img/p3.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Robert Cook" src="img/p4.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Sophia Lee" src="img/p5.png" alt="">
                                                        </div>
                                                        <span class="fw-bold text-primary">18 connections</span>
                                                    </div>
                                                    <div class="p-3 job-item-footer">
                                                        <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days ago</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="job-profile.html">
                                                <div class="border job-item mb-3">
                                                    <div class="d-flex align-items-center p-3 job-item-header">
                                                        <div class="overflow-hidden me-2">
                                                            <h6 class="fw-bold text-dark mb-0 text-truncate">Junior UX Designer</h6>
                                                            <div class="text-truncate text-primary">Behance</div>
                                                            <div class="small text-gray-500"><i class="feather-map-pin"></i> Vancouver, BC
                                                            </div>
                                                        </div>
                                                        <img class="img-fluid ms-auto" src="img/l2.png" alt="">
                                                    </div>
                                                    <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                                                        <div class="overlap-rounded-circle">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="John Doe" src="img/p6.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Julia Cox" src="img/p7.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Robert Cook" src="img/p8.png" alt="">
                                                        </div>
                                                        <span class="fw-bold text-primary">18 connections</span>
                                                    </div>
                                                    <div class="p-3 job-item-footer">
                                                        <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days ago</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="job-profile.html">
                                                <div class="border job-item mb-3">
                                                    <div class="d-flex align-items-center p-3 job-item-header">
                                                        <div class="overflow-hidden me-2">
                                                            <h6 class="fw-bold text-dark mb-0 text-truncate">Product Director</h6>
                                                            <div class="text-truncate text-primary">Spotify Inc.</div>
                                                            <div class="small text-gray-500"><i class="feather-map-pin"></i> India, Punjab</div>
                                                        </div>
                                                        <img class="img-fluid ms-auto" src="img/l3.png" alt="">
                                                    </div>
                                                    <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                                                        <div class="overlap-rounded-circle">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Sophia Lee" src="img/p9.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="John Doe" src="img/p10.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Julia Cox" src="img/p11.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Robert Cook" src="img/p12.png" alt="">
                                                        </div>
                                                        <span class="fw-bold text-primary">18 connections</span>
                                                    </div>
                                                    <div class="p-3 job-item-footer">
                                                        <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days ago</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="job-profile.html">
                                                <div class="border job-item mb-3">
                                                    <div class="d-flex align-items-center p-3 job-item-header">
                                                        <div class="overflow-hidden me-2">
                                                            <h6 class="fw-bold text-dark mb-0 text-truncate">.NET Developer</h6>
                                                            <div class="text-truncate text-primary">Invision</div>
                                                            <div class="small text-gray-500"><i class="feather-map-pin"></i> London, UK
                                                            </div>
                                                        </div>
                                                        <img class="img-fluid ms-auto" src="img/l4.png" alt="">
                                                    </div>
                                                    <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                                                        <div class="overlap-rounded-circle">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Sophia Lee" src="img/p13.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="John Doe" src="img/p1.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Julia Cox" src="img/p2.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Robert Cook" src="img/p3.png" alt="">
                                                        </div>
                                                        <span class="fw-bold text-primary">18 connections</span>
                                                    </div>
                                                    <div class="p-3 job-item-footer">
                                                        <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days ago</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="job-profile.html">
                                                <div class="border job-item mb-3">
                                                    <div class="d-flex align-items-center p-3 job-item-header">
                                                        <div class="overflow-hidden me-2">
                                                            <h6 class="fw-bold text-dark mb-0 text-truncate">Project Manager - SAP</h6>
                                                            <div class="text-truncate text-primary">PayPal</div>
                                                            <div class="small text-gray-500"><i class="feather-map-pin"></i> New York, NY
                                                            </div>
                                                        </div>
                                                        <img class="img-fluid ms-auto" src="img/l5.png" alt="">
                                                    </div>
                                                    <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                                                        <div class="overlap-rounded-circle">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Sophia Lee" src="img/p4.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="John Doe" src="img/p5.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Julia Cox" src="img/p6.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Robert Cook" src="img/p7.png" alt="">
                                                        </div>
                                                        <span class="fw-bold text-primary">18 connections</span>
                                                    </div>
                                                    <div class="p-3 job-item-footer">
                                                        <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days ago</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="job-profile.html">
                                                <div class="border job-item mb-3">
                                                    <div class="d-flex align-items-center p-3 job-item-header">
                                                        <div class="overflow-hidden me-2">
                                                            <h6 class="fw-bold text-dark mb-0 text-truncate">Cloud Software Engineer</h6>
                                                            <div class="text-truncate text-primary">Airbnb Inc.</div>
                                                            <div class="small text-gray-500"><i class="feather-map-pin"></i> Manchester, UK
                                                            </div>
                                                        </div>
                                                        <img class="img-fluid ms-auto" src="img/l6.png" alt="">
                                                    </div>
                                                    <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                                                        <div class="overlap-rounded-circle">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Sophia Lee" src="img/p8.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="John Doe" src="img/p9.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Julia Cox" src="img/p10.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Robert Cook" src="img/p11.png" alt="">
                                                        </div>
                                                        <span class="fw-bold text-primary">18 connections</span>
                                                    </div>
                                                    <div class="p-3 job-item-footer">
                                                        <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days ago</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="job-profile.html">
                                                <div class="border job-item mb-3">
                                                    <div class="d-flex align-items-center p-3 job-item-header">
                                                        <div class="overflow-hidden me-2">
                                                            <h6 class="fw-bold text-dark mb-0 text-truncate">Channel Sales Director</h6>
                                                            <div class="text-truncate text-primary">Slack Inc.</div>
                                                            <div class="small text-gray-500"><i class="feather-map-pin"></i> London, UK
                                                            </div>
                                                        </div>
                                                        <img class="img-fluid ms-auto" src="img/l7.png" alt="">
                                                    </div>
                                                    <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                                                        <div class="overlap-rounded-circle">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Sophia Lee" src="img/p12.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="John Doe" src="img/p13.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Julia Cox" src="img/p2.png" alt="">
                                                        </div>
                                                        <span class="fw-bold text-primary">18 connections</span>
                                                    </div>
                                                    <div class="p-3 job-item-footer">
                                                        <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days ago</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="job-profile.html">
                                                <div class="border job-item mb-3">
                                                    <div class="d-flex align-items-center p-3 job-item-header">
                                                        <div class="overflow-hidden me-2">
                                                            <h6 class="fw-bold text-dark mb-0 text-truncate">C# Developer</h6>
                                                            <div class="text-truncate text-primary">Dropbox Inc.</div>
                                                            <div class="small text-gray-500"><i class="feather-map-pin"></i> San Francisco, CA
                                                            </div>
                                                        </div>
                                                        <img class="img-fluid ms-auto" src="img/l8.png" alt="">
                                                    </div>
                                                    <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                                                        <div class="overlap-rounded-circle">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Sophia Lee" src="img/p5.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="John Doe" src="img/p6.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Julia Cox" src="img/p7.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Robert Cook" src="img/p1.png" alt="">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Robert Cook" src="img/p3.png" alt="">
                                                        </div>
                                                        <span class="fw-bold text-primary">18 connections</span>
                                                    </div>
                                                    <div class="p-3 job-item-footer">
                                                        <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days ago</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="p-3 w-100">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="border shadow-sm border rounded bg-white job-item-2 p-3 mb-3">
                                                <div class="media">
                                                    <div class="u-avatar me-3">
                                                        <img class="img-fluid" src="img/l3.png" alt="Image Description">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="mb-3">
                                                            <h6 class="fw-bold mb-0"><a class="text-dark" href="job-profile.html">C# Developer</a></h6>
                                                            <a class="d-inline-block small pt-1" href="job-profile.html">
                                                                <span class="text-warning">
                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                <span class="feather-star text-gray-500"></span>
                                                                <span class="feather-star text-gray-500"></span>
                                                                </span>
                                                                <span class="text-dark fw-bold ms-2">3.74</span>
                                                                <span class="text-muted">(567 reviews)</span>
                                                            </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="border-end pe-3 me-3">
                                                                <a class="text-secondary small" href="job-profile.html">Salaries</a>
                                                            </div>
                                                            <a class="small" href="job-profile.html">Open jobs</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="border shadow-sm border rounded bg-white job-item-2 p-3 mb-3">
                                                <div class="media">
                                                    <div class="u-avatar me-3">
                                                        <img class="img-fluid" src="img/l2.png" alt="Image Description">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="mb-3">
                                                            <h6 class="fw-bold mb-0"><a class="text-dark" href="job-profile.html">Junior UX Designer</a></h6>
                                                            <a class="d-inline-block small pt-1" href="job-profile.html">
                                                                <span class="text-warning">
                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                </span>
                                                                <span class="text-dark fw-bold ms-2">3.74</span>
                                                                <span class="text-muted">(567 reviews)</span>
                                                            </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="border-end pe-3 me-3">
                                                                <a class="text-secondary small" href="job-profile.html">Salaries</a>
                                                            </div>
                                                            <a class="small" href="job-profile.html">Open jobs</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="border shadow-sm border rounded bg-white job-item-2 p-3 mb-3">
                                                <div class="media">
                                                    <div class="u-avatar me-3">
                                                        <img class="img-fluid" src="img/l3.png" alt="Image Description">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="mb-3">
                                                            <h6 class="fw-bold mb-0"><a class="text-dark" href="job-profile.html">Junior UX Designer</a></h6>
                                                            <a class="d-inline-block small pt-1" href="job-profile.html">
                                                                <span class="text-warning">
                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                </span>
                                                                <span class="text-dark fw-bold ms-2">3.74</span>
                                                                <span class="text-muted">(567 reviews)</span>
                                                            </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="border-end pe-3 me-3">
                                                                <a class="text-secondary small" href="job-profile.html">Salaries</a>
                                                            </div>
                                                            <a class="small" href="job-profile.html">Open jobs</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="border shadow-sm border rounded bg-white job-item-2 p-3 mb-3">
                                                <div class="media">
                                                    <div class="u-avatar me-3">
                                                        <img class="img-fluid" src="img/l4.png" alt="Image Description">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="mb-3">
                                                            <h6 class="fw-bold mb-0"><a class="text-dark" href="job-profile.html">Junior UX Designer</a></h6>
                                                            <a class="d-inline-block small pt-1" href="job-profile.html">
                                                                <span class="text-warning">
                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                </span>
                                                                <span class="text-dark fw-bold ms-2">3.74</span>
                                                                <span class="text-muted">(567 reviews)</span>
                                                            </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="border-end pe-3 me-3">
                                                                <a class="text-secondary small" href="job-profile.html">Salaries</a>
                                                            </div>
                                                            <a class="small" href="job-profile.html">Open jobs</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="border shadow-sm border rounded bg-white job-item-2 p-3 mb-3">
                                                <div class="media">
                                                    <div class="u-avatar me-3">
                                                        <img class="img-fluid" src="img/l5.png" alt="Image Description">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="mb-3">
                                                            <h6 class="fw-bold mb-0"><a class="text-dark" href="job-profile.html">Junior UX Designer</a></h6>
                                                            <a class="d-inline-block small pt-1" href="job-profile.html">
                                                                <span class="text-warning">
                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                </span>
                                                                <span class="text-dark fw-bold ms-2">3.74</span>
                                                                <span class="text-muted">(567 reviews)</span>
                                                            </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="border-end pe-3 me-3">
                                                                <a class="text-secondary small" href="job-profile.html">Salaries</a>
                                                            </div>
                                                            <a class="small" href="job-profile.html">Open jobs</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="border shadow-sm border rounded bg-white job-item-2 p-3 mb-3">
                                                <div class="media">
                                                    <div class="u-avatar me-3">
                                                        <img class="img-fluid" src="img/l6.png" alt="Image Description">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="mb-3">
                                                            <h6 class="fw-bold mb-0"><a class="text-dark" href="job-profile.html">Junior UX Designer</a></h6>
                                                            <a class="d-inline-block small pt-1" href="job-profile.html">
                                                                <span class="text-warning">
                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                <span class="feather-star"></span>
                                                                </span>
                                                                <span class="text-dark fw-bold ms-2">3.74</span>
                                                                <span class="text-muted">(567 reviews)</span>
                                                            </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="border-end pe-3 me-3">
                                                                <a class="text-secondary small" href="job-profile.html">Salaries</a>
                                                            </div>
                                                            <a class="small" href="job-profile.html">Open jobs</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="p-3 w-100">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card overflow-hidden">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501889.172354371!2d73.15671299623955!3d31.003573085499198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391964aa569e7355%3A0x8fbd263103a38861!2sPunjab!5e0!3m2!1sen!2sin!4v1575738201305!5m2!1sen!2sin"
                                                    width="100%" height="150" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                                <div class="card-body">
                                                    <h6 class="card-title">Postal Address</h6>
                                                    <p class="card-text">PO Box 16122 Collins Street West Victoria 8007 Australia</p>
                                                    <a href="#" class="text-link fw-bold"><i class="feather-external-link"></i> Get Directions</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card overflow-hidden">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109552.19658166621!2d75.78663235513761!3d30.900473637624447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a837462345a7d%3A0x681102348ec60610!2sLudhiana%2C%20Punjab!5e0!3m2!1sen!2sin!4v1575738867148!5m2!1sen!2sin"
                                                    width="100%" height="150" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                                <div class="card-body">
                                                    <h6 class="card-title">Envato HQ</h6>
                                                    <p class="card-text">121 King Street, Melbourne Victoria 3000 Australia</p>
                                                    <a href="#" class="text-link fw-bold"><i class="feather-external-link"></i> Get Directions</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="type" role="tabpanel" aria-labelledby="type-tab">
                                <div class="p-3 w-100">
                                    <div class="row">
                                        <div class="col-md-6">
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
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p6.png" alt="" data-original-title="Sophia Lee">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p7.png" alt="" data-original-title="John Doe">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p8.png" alt="" data-original-title="Julia Cox">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p9.png" alt="" data-original-title="Robert Cook">
                                                        </div>
                                                        <span class="fw-bold small text-primary">4 mutual connections</span>
                                                    </div>
                                                    <div class="network-item-footer py-3 d-flex text-center">
                                                        <div class="col-6 ps-3 pe-1">
                                                            <button type="button" class="btn btn-primary btn-sm btn-block"> Connect </button>
                                                        </div>
                                                        <div class="col-6 pe-3 ps-1">
                                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block"> <i class="feather-user-plus"></i> Follow </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
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
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p10.png" alt="" data-original-title="Sophia Lee">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p11.png" alt="" data-original-title="John Doe">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p12.png" alt="" data-original-title="Julia Cox">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p13.png" alt="" data-original-title="Robert Cook">
                                                        </div>
                                                        <span class="fw-bold small text-primary">4 mutual connections</span>
                                                    </div>
                                                    <div class="network-item-footer py-3 d-flex text-center">
                                                        <div class="col-6 ps-3 pe-1">
                                                            <button type="button" class="btn btn-primary btn-sm btn-block"> Connect </button>
                                                        </div>
                                                        <div class="col-6 pe-3 ps-1">
                                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block"> <i class="feather-user-plus"></i> Follow </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
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
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p1.png" alt="" data-original-title="Sophia Lee">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p3.png" alt="" data-original-title="Julia Cox">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p4.png" alt="" data-original-title="Robert Cook">
                                                        </div>
                                                        <span class="fw-bold small text-primary">4 mutual connections</span>
                                                    </div>
                                                    <div class="network-item-footer py-3 d-flex text-center">
                                                        <div class="col-6 ps-3 pe-1">
                                                            <button type="button" class="btn btn-primary btn-sm btn-block"> Connect </button>
                                                        </div>
                                                        <div class="col-6 pe-3 ps-1">
                                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block"> <i class="feather-user-plus"></i> Follow </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
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
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p5.png" alt="" data-original-title="Sophia Lee">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p6.png" alt="" data-original-title="John Doe">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p7.png" alt="" data-original-title="Julia Cox">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p8.png" alt="" data-original-title="Robert Cook">
                                                        </div>
                                                        <span class="fw-bold small text-primary">4 mutual connections</span>
                                                    </div>
                                                    <div class="network-item-footer py-3 d-flex text-center">
                                                        <div class="col-6 ps-3 pe-1">
                                                            <button type="button" class="btn btn-primary btn-sm btn-block"> Connect </button>
                                                        </div>
                                                        <div class="col-6 pe-3 ps-1">
                                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block"> <i class="feather-user-plus"></i> Follow </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
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
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p9.png" alt="" data-original-title="Sophia Lee">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p13.png" alt="" data-original-title="Julia Cox">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p8.png" alt="" data-original-title="Robert Cook">
                                                        </div>
                                                        <span class="fw-bold small text-primary">4 mutual connections</span>
                                                    </div>
                                                    <div class="network-item-footer py-3 d-flex text-center">
                                                        <div class="col-6 ps-3 pe-1">
                                                            <button type="button" class="btn btn-primary btn-sm btn-block"> Connect </button>
                                                        </div>
                                                        <div class="col-6 pe-3 ps-1">
                                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block"> <i class="feather-user-plus"></i> Follow </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
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
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p10.png" alt="" data-original-title="Sophia Lee">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p11.png" alt="" data-original-title="John Doe">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p12.png" alt="" data-original-title="Julia Cox">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p13.png" alt="" data-original-title="Robert Cook">
                                                        </div>
                                                        <span class="fw-bold small text-primary">4 mutual connections</span>
                                                    </div>
                                                    <div class="network-item-footer py-3 d-flex text-center">
                                                        <div class="col-6 ps-3 pe-1">
                                                            <button type="button" class="btn btn-primary btn-sm btn-block"> Connect </button>
                                                        </div>
                                                        <div class="col-6 pe-3 ps-1">
                                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block"> <i class="feather-user-plus"></i> Follow </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
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
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p1.png" alt="" data-original-title="Sophia Lee">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p3.png" alt="" data-original-title="Julia Cox">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p4.png" alt="" data-original-title="Robert Cook">
                                                        </div>
                                                        <span class="fw-bold small text-primary">4 mutual connections</span>
                                                    </div>
                                                    <div class="network-item-footer py-3 d-flex text-center">
                                                        <div class="col-6 ps-3 pe-1">
                                                            <button type="button" class="btn btn-primary btn-sm btn-block"> Connect </button>
                                                        </div>
                                                        <div class="col-6 pe-3 ps-1">
                                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block"> <i class="feather-user-plus"></i> Follow </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
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
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p5.png" alt="" data-original-title="Sophia Lee">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p6.png" alt="" data-original-title="John Doe">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p7.png" alt="" data-original-title="Julia Cox">
                                                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="img/p8.png" alt="" data-original-title="Robert Cook">
                                                        </div>
                                                        <span class="fw-bold small text-primary">4 mutual connections</span>
                                                    </div>
                                                    <div class="network-item-footer py-3 d-flex text-center">
                                                        <div class="col-6 ps-3 pe-1">
                                                            <button type="button" class="btn btn-primary btn-sm btn-block"> Connect </button>
                                                        </div>
                                                        <div class="col-6 pe-3 ps-1">
                                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block"> <i class="feather-user-plus"></i> Follow </button>
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
                <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="box shadow-sm mb-3 rounded bg-white ads-box text-center overflow-hidden">
                        <img src="img/job1.png" class="img-fluid" alt="Responsive image">
                        <div class="p-3 border-bottom">
                            <h6 class="fw-bold text-dark">Osahan Solutions</h6>
                            <p class="mb-0 text-muted">Looking for talent?</p>
                        </div>
                        <div class="p-3">
                            <button type="button" class="btn btn-primary ps-4 pe-4"> POST A JOB </button>
                        </div>
                    </div>
                    <div class="shadow-sm rounded bg-white job-item-2 p-3 mb-3">
                        <div class="media">
                            <div class="u-avatar me-3">
                                <img class="img-fluid" src="img/l3.png" alt="Image Description">
                            </div>
                            <div class="media-body">
                                <div class="mb-3">
                                    <h6 class="fw-bold mb-0"><a class="text-dark" href="job-profile.html">C# Developer</a></h6>
                                    <a class="d-inline-block small pt-1" href="job-profile.html">
                                        <span class="text-warning">
                              <span class="feather-star"></span>
                                        <span class="feather-star"></span>
                                        <span class="feather-star"></span>
                                        <span class="feather-star text-gray-500"></span>
                                        <span class="feather-star text-gray-500"></span>
                                        </span>
                                        <span class="text-dark fw-bold ms-2">3.74</span>
                                        <span class="text-muted">(567 reviews)</span>
                                    </a>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="border-end pe-3 me-3">
                                        <a class="text-secondary small" href="job-profile.html">Salaries</a>
                                    </div>
                                    <a class="small" href="job-profile.html">Open jobs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shadow-sm  rounded bg-white job-item-2 p-3 mb-3">
                        <div class="media">
                            <div class="u-avatar me-3">
                                <img class="img-fluid" src="img/l2.png" alt="Image Description">
                            </div>
                            <div class="media-body">
                                <div class="mb-3">
                                    <h6 class="fw-bold mb-0"><a class="text-dark" href="job-profile.html">Junior UX Designer</a></h6>
                                    <a class="d-inline-block small pt-1" href="job-profile.html">
                                        <span class="text-warning">
                              <span class="feather-star"></span>
                                        <span class="feather-star"></span>
                                        <span class="feather-star"></span>
                                        <span class="feather-star"></span>
                                        <span class="feather-star"></span>
                                        </span>
                                        <span class="text-dark fw-bold ms-2">3.74</span>
                                        <span class="text-muted">(567 reviews)</span>
                                    </a>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="border-end pe-3 me-3">
                                        <a class="text-secondary small" href="job-profile.html">Salaries</a>
                                    </div>
                                    <a class="small" href="job-profile.html">Open jobs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="pb-3">
                        <h6 class="fw-bold text-dark mb-1">Because you viewed</h6>
                        <p class="mb-0 text-muted">Designer at Google?</p>
                    </div>
                    <a href="job-profile.html">
                        <div class="shadow-sm rounded bg-white job-item mb-3">
                            <div class="d-flex align-items-center p-3 job-item-header">
                                <div class="overflow-hidden me-2">
                                    <h6 class="fw-bold text-dark mb-0 text-truncate">Product Director</h6>
                                    <div class="text-truncate text-primary">Spotify Inc.</div>
                                    <div class="small text-gray-500"><i class="feather-map-pin"></i> India, Punjab</div>
                                </div>
                                <img class="img-fluid ms-auto" src="img/l3.png" alt="">
                            </div>
                            <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                                <div class="overlap-rounded-circle">
                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Sophia Lee" src="img/p9.png" alt="">
                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="John Doe" src="img/p10.png" alt="">
                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Julia Cox" src="img/p11.png" alt="">
                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="John Doe" src="img/p10.png" alt="">
                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Julia Cox" src="img/p11.png" alt="">
                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Robert Cook" src="img/p12.png" alt="">
                                </div>
                                <span class="fw-bold text-muted">18 connections</span>
                            </div>
                            <div class="p-3 job-item-footer">
                                <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days ago</small>
                            </div>
                        </div>
                    </a>
                    <a href="job-profile.html">
                        <div class="shadow-sm rounded bg-white job-item mb-3">
                            <div class="d-flex align-items-center p-3 job-item-header">
                                <div class="overflow-hidden me-2">
                                    <h6 class="fw-bold text-dark mb-0 text-truncate">.NET Developer</h6>
                                    <div class="text-truncate text-primary">Invision</div>
                                    <div class="small text-gray-500"><i class="feather-map-pin"></i> London, UK
                                    </div>
                                </div>
                                <img class="img-fluid ms-auto" src="img/l4.png" alt="">
                            </div>
                            <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                                <div class="overlap-rounded-circle">
                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Sophia Lee" src="img/p13.png" alt="">
                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="John Doe" src="img/p1.png" alt="">
                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Julia Cox" src="img/p2.png" alt="">
                                    <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="Robert Cook" src="img/p3.png" alt="">
                                </div>
                                <span class="fw-bold text-muted">18 connections</span>
                            </div>
                            <div class="p-3 job-item-footer">
                                <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days ago</small>
                            </div>
                        </div>
                    </a>
                    <div class="box shadow-sm border rounded bg-white mb-3">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">People you might know</h6>
                        </div>
                        <div class="box-body p-3">
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p8.png" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="fw-bold me-2">
                                    <div class="text-truncate">Sophia Lee</div>
                                    <div class="small text-gray-500">Student at Harvard
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-outline-primary btn-sm"><i class="feather-user-plus"></i></button>
                           </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p9.png" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="fw-bold me-2">
                                    <div class="text-truncate">John Doe</div>
                                    <div class="small text-gray-500">Traveler
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-outline-primary btn-sm"><i class="feather-user-plus"></i></button>
                           </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p10.png" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="fw-bold me-2">
                                    <div class="text-truncate">Julia Cox</div>
                                    <div class="small text-gray-500">Art Designer
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-outline-primary btn-sm"><i class="feather-user-plus"></i></button>
                           </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p11.png" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="fw-bold me-2">
                                    <div class="text-truncate">Robert Cook</div>
                                    <div class="small text-gray-500">Photographer at Photography
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-outline-primary btn-sm"><i class="feather-user-plus"></i></button>
                           </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p12.png" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="fw-bold me-2">
                                    <div class="text-truncate">Richard Bell</div>
                                    <div class="small text-gray-500">Graphic Designer at Envato
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-outline-primary btn-sm"><i class="feather-user-plus"></i></button>
                           </span>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</template>