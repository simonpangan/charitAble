<template>

    <div class="bg-white shadow-sm border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-center py-3">
                        <div class="profile-left">
                            <h3 class="font-weight-bold text-dark mb-1 mt-0"> {{this.volunteer_post.name}}</h3>
                            <p>A Volunteer Posting by {{this.charity[0].name}}</p>
                        </div>
                        <div class="profile-right ms-auto">
                            <Link class="btn btn-success btn-lg" :href="$route('charity.volunteer.edit', {id:volunteer_post.id})">Edit</Link>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="pb-4 pt-3">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <main class="col col-xl-8 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="box shadow-sm border rounded bg-white mb-3">
                                <div class="box-title border-bottom p-3">
                                    <h6 class="m-0">Volunteer Description </h6>
                                </div>
                                <div class="box-body p-3">
                                    <p>{{this.volunteer_post.description}}</p>
                                <div class="border-top mt-2">
                                    <p class="text-strong">Location : {{this.volunteer_post.location}} </p>
                                </div>
                                </div>
                            </div>

                            <div class="box shadow-sm border rounded bg-white mb-3">
                                <div class="box-title border-bottom p-3">
                                    <h6 class="m-0">Qualifications and Responsibilities</h6>
                                </div>
                                <div class="box-body p-3">
                                    <p>{{this.volunteer_post.qualifications}}</p>

                                </div>
                            </div>

                            <div class="box shadow-sm border rounded bg-white mb-3">
                                <div class="box-title border-bottom p-3">
                                    <h6 class="m-0">Potential Incentives</h6>
                                </div>
                                <div class="box-body p-3">
                                    <p>{{this.volunteer_post.incentives}}</p>

                                </div>
                            </div>


                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="box shadow-sm border rounded bg-white mb-3 osahan-post">
                                <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                                    <div class="dropdown-list-image me-3">
                                        <img class="rounded-circle" src="img/p5.png" alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Tobia Crivellari</div>
                                        <div class="small text-gray-500">Product Designer at askbootstrap</div>
                                    </div>
                                    <span class="ms-auto small">3 hours</span>
                                </div>
                                <div class="p-3 border-bottom osahan-post-body">
                                    <p class="mb-0">Tmpo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <a href="#">laboris consequat.</a></p>
                                </div>
                                <div class="p-3 border-bottom osahan-post-footer">
                                    <a href="#" class="me-3 text-secondary"><i class="feather-heart text-danger"></i> 16</a>
                                    <a href="#" class="me-3 text-secondary"><i class="feather-message-square"></i> 8</a>
                                    <a href="#" class="me-3 text-secondary"><i class="feather-share-2"></i> 2</a>
                                </div>
                                <div class="p-3">
                                    <button type="button" class="btn btn-outline-primary btn-sm me-1">Awesome!!</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm me-1">😍</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm me-1">Whats it about?</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm me-1">Oooo Great Wow</button>
                                </div>
                            </div>
                            <div class="box mb-3 shadow-sm border rounded bg-white osahan-post">
                                <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                                    <div class="dropdown-list-image me-3">
                                        <img class="rounded-circle" src="img/p6.png" alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Collin Weiland</div>
                                        <div class="small text-gray-500">Web Developer @Google</div>
                                    </div>
                                    <span class="ms-auto small">3 hours</span>
                                </div>
                                <div class="p-3 border-bottom osahan-post-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur 😍😎 adipisicing elit, sed do eiusmod tempo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <a href="#">laboris consequat.</a></p>
                                    <img src="img/post1.png" class="img-fluid" alt="Responsive image">
                                </div>
                                <div class="p-3 border-bottom osahan-post-footer">
                                    <a href="#" class="me-3 text-secondary"><i class="feather-heart text-danger"></i> 16</a>
                                    <a href="#" class="me-3 text-secondary"><i class="feather-message-square"></i> 8</a>
                                    <a href="#" class="me-3 text-secondary"><i class="feather-share-2"></i> 2</a>
                                </div>
                                <div class="p-3 d-flex align-items-top border-bottom osahan-post-comment">
                                    <div class="dropdown-list-image me-3">
                                        <img class="rounded-circle" src="img/p7.png" alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate"> James Spiegel <span class="float-right small">2 min</span></div>
                                        <div class="small text-gray-500">Ratione voluptatem sequi en lod nesciunt. Neque porro quisquam est, quinder dolorem ipsum quia dolor sit amet, consectetur</div>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <textarea placeholder="Add Comment..." class="form-control border-0 p-0 shadow-none" rows="1"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="box shadow-sm border rounded bg-white p-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="job-profile.html">
                                            <div class="border job-item mb-3">
                                                <div class="d-flex align-items-center p-3 job-item-header">
                                                    <div class="overflow-hidden me-2">
                                                        <h6 class="font-weight-bold text-dark mb-0 text-truncate">UI/UX designer</h6>
                                                        <div class="text-truncate text-primary">Envato</div>
                                                        <div class="small text-gray-500"><i class="feather-map-pin"></i> India, Punjab</div>
                                                    </div>
                                                    <img class="img-fluid ms-auto" src="img/l1.png" alt="">
                                                </div>
                                                <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                                                    <div class="overlap-rounded-circle">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p1.png" alt="" data-bs-original-title="Sophia Lee">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p2.png" alt="" data-bs-original-title="John Doe">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p3.png" alt="" data-bs-original-title="Julia Cox">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p4.png" alt="" data-bs-original-title="Robert Cook">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p5.png" alt="" data-bs-original-title="Sophia Lee">
                                                    </div>
                                                    <span class="font-weight-bold text-primary">18 connections</span>
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
                                                        <h6 class="font-weight-bold text-dark mb-0 text-truncate">Junior UX Designer</h6>
                                                        <div class="text-truncate text-primary">Behance</div>
                                                        <div class="small text-gray-500"><i class="feather-map-pin"></i> Vancouver, BC
                                                        </div>
                                                    </div>
                                                    <img class="img-fluid ms-auto" src="img/l2.png" alt="">
                                                </div>
                                                <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                                                    <div class="overlap-rounded-circle">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p6.png" alt="" data-bs-original-title="John Doe">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p7.png" alt="" data-bs-original-title="Julia Cox">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p8.png" alt="" data-bs-original-title="Robert Cook">
                                                    </div>
                                                    <span class="font-weight-bold text-primary">18 connections</span>
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
                                                        <h6 class="font-weight-bold text-dark mb-0 text-truncate">Product Director</h6>
                                                        <div class="text-truncate text-primary">Spotify Inc.</div>
                                                        <div class="small text-gray-500"><i class="feather-map-pin"></i> India, Punjab</div>
                                                    </div>
                                                    <img class="img-fluid ms-auto" src="img/l3.png" alt="">
                                                </div>
                                                <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                                                    <div class="overlap-rounded-circle">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p9.png" alt="" data-bs-original-title="Sophia Lee">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p10.png" alt="" data-bs-original-title="John Doe">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p11.png" alt="" data-bs-original-title="Julia Cox">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p12.png" alt="" data-bs-original-title="Robert Cook">
                                                    </div>
                                                    <span class="font-weight-bold text-primary">18 connections</span>
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
                                                        <h6 class="font-weight-bold text-dark mb-0 text-truncate">.NET Developer</h6>
                                                        <div class="text-truncate text-primary">Invision</div>
                                                        <div class="small text-gray-500"><i class="feather-map-pin"></i> London, UK
                                                        </div>
                                                    </div>
                                                    <img class="img-fluid ms-auto" src="img/l4.png" alt="">
                                                </div>
                                                <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                                                    <div class="overlap-rounded-circle">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p13.png" alt="" data-bs-original-title="Sophia Lee">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p1.png" alt="" data-bs-original-title="John Doe">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p2.png" alt="" data-bs-original-title="Julia Cox">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p3.png" alt="" data-bs-original-title="Robert Cook">
                                                    </div>
                                                    <span class="font-weight-bold text-primary">18 connections</span>
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
                                                        <h6 class="font-weight-bold text-dark mb-0 text-truncate">Project Manager - SAP</h6>
                                                        <div class="text-truncate text-primary">PayPal</div>
                                                        <div class="small text-gray-500"><i class="feather-map-pin"></i> New York, NY
                                                        </div>
                                                    </div>
                                                    <img class="img-fluid ms-auto" src="img/l5.png" alt="">
                                                </div>
                                                <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                                                    <div class="overlap-rounded-circle">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p4.png" alt="" data-bs-original-title="Sophia Lee">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p5.png" alt="" data-bs-original-title="John Doe">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p6.png" alt="" data-bs-original-title="Julia Cox">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p7.png" alt="" data-bs-original-title="Robert Cook">
                                                    </div>
                                                    <span class="font-weight-bold text-primary">18 connections</span>
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
                                                        <h6 class="font-weight-bold text-dark mb-0 text-truncate">Cloud Software Engineer</h6>
                                                        <div class="text-truncate text-primary">Airbnb Inc.</div>
                                                        <div class="small text-gray-500"><i class="feather-map-pin"></i> Manchester, UK
                                                        </div>
                                                    </div>
                                                    <img class="img-fluid ms-auto" src="img/l6.png" alt="">
                                                </div>
                                                <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                                                    <div class="overlap-rounded-circle">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p8.png" alt="" data-bs-original-title="Sophia Lee">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p9.png" alt="" data-bs-original-title="John Doe">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p10.png" alt="" data-bs-original-title="Julia Cox">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p11.png" alt="" data-bs-original-title="Robert Cook">
                                                    </div>
                                                    <span class="font-weight-bold text-primary">18 connections</span>
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
                                                        <h6 class="font-weight-bold text-dark mb-0 text-truncate">Channel Sales Director</h6>
                                                        <div class="text-truncate text-primary">Slack Inc.</div>
                                                        <div class="small text-gray-500"><i class="feather-map-pin"></i> London, UK
                                                        </div>
                                                    </div>
                                                    <img class="img-fluid ms-auto" src="img/l7.png" alt="">
                                                </div>
                                                <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                                                    <div class="overlap-rounded-circle">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p12.png" alt="" data-bs-original-title="Sophia Lee">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p13.png" alt="" data-bs-original-title="John Doe">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p2.png" alt="" data-bs-original-title="Julia Cox">
                                                    </div>
                                                    <span class="font-weight-bold text-primary">18 connections</span>
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
                                                        <h6 class="font-weight-bold text-dark mb-0 text-truncate">C# Developer</h6>
                                                        <div class="text-truncate text-primary">Dropbox Inc.</div>
                                                        <div class="small text-gray-500"><i class="feather-map-pin"></i> San Francisco, CA
                                                        </div>
                                                    </div>
                                                    <img class="img-fluid ms-auto" src="img/l8.png" alt="">
                                                </div>
                                                <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                                                    <div class="overlap-rounded-circle">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p5.png" alt="" data-bs-original-title="Sophia Lee">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p6.png" alt="" data-bs-original-title="John Doe">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p7.png" alt="" data-bs-original-title="Julia Cox">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p1.png" alt="" data-bs-original-title="Robert Cook">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p3.png" alt="" data-bs-original-title="Robert Cook">
                                                    </div>
                                                    <span class="font-weight-bold text-primary">18 connections</span>
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
                        <div class="tab-pane fade" id="type" role="tabpanel" aria-labelledby="type-tab">
                            <div class="box shadow-sm border rounded bg-white mb-3">
                                <div class="box-title border-bottom p-3">
                                    <h6 class="m-0">Careers at Google</h6>
                                </div>
                                <div class="box-body p-3">
                                    <p>Google’s mission is to organize the world‘s information and make it universally accessible and useful.
                                    </p>
                                    <p class="mb-0">Since our founding in 1998, Google has grown by leaps and bounds. From offering search in a single language we now offer dozens of products and services—including various forms of advertising and web applications for
                                        all kinds of tasks—in scores of languages. And starting from two computer science students in a university dorm room, we now have thousands of employees and offices around the world. A lot has changed since the
                                        first Google search engine appeared. But some things haven’t changed: our dedication to our users and our belief in the possibilities of the Internet itself.
                                    </p>
                                </div>
                            </div>
                            <div class="box shadow-sm border rounded bg-white mb-3">
                                <div class="box-title border-bottom p-3">
                                    <h6 class="m-0">Careers at Google</h6>
                                </div>
                                <div class="box-body p-3">
                                    <p>Google’s mission is to organize the world‘s information and make it universally accessible and useful.
                                    </p>
                                    <p class="mb-0">Since our founding in 1998, Google has grown by leaps and bounds. From offering search in a single language we now offer dozens of products and services—including various forms of advertising and web applications for
                                        all kinds of tasks—in scores of languages. And starting from two computer science students in a university dorm room, we now have thousands of employees and offices around the world. A lot has changed since the
                                        first Google search engine appeared. But some things haven’t changed: our dedication to our users and our belief in the possibilities of the Internet itself.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="type-tab">
                            <div class="box shadow-sm border rounded bg-white mb-3">
                                <div class="box-title border-bottom p-3">
                                    <h6 class="m-0">40 Reviews</h6>
                                </div>
                                <div class="box-body p-3">
                                    <div id="retro-comments">
                                        <div class="reviews-members pt-0">
                                            <div class="media">
                                                <a href="#"><img class="me-3" src="img/p4.png" alt="Generic placeholder image"></a>
                                                <div class="media-body">
                                                    <div class="form-members-body">
                                                        <textarea rows="1" placeholder="Add a public comment..." class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-members-footer d-flex align-items-center mt-2">
                                                        <b>12,725 Comments</b>
                                                        <span class="ms-auto"><button class="btn btn-light btn-sm" type="button">CANCEL</button> <button class="btn btn-primary btn-sm" type="button">COMMENT</button>     </span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="reviews-members">
                                            <div class="media">
                                                <a href="#"><img class="me-3" src="img/p3.png" alt="Generic placeholder image"></a>
                                                <div class="media-body">
                                                    <div class="reviews-members-header">
                                                        <h6 class="mb-1"><a class="text-black" href="#">Gurdeep Osahan </a> <small class="text-gray">2 months ago</small></h6>
                                                    </div>
                                                    <div class="reviews-members-body">
                                                        <p> reacthe last order. Even though they had Chefs in their open kitchen they weren’t flexible to dish out few more items. Anyway the food was super specially their stone dessert.</p>
                                                    </div>
                                                    <div class="reviews-members-footer d-flex align-items-center">
                                                        <a class="total-like btn btn-outline-info btn-sm me-1" href="#"><i class="feather-thumbs-up"></i> 123</a> <a class="total-like btn btn-outline-info btn-sm" href="#"><i class="feather-thumbs-down"></i> 02</a>
                                                        <span dir="rtl" class="total-like-user-main ms-2">
                                                <div class="overlap-rounded-circle">
                                                   <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p9.png" alt="" data-bs-original-title="Sophia Lee">
                                                   <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p10.png" alt="" data-bs-original-title="John Doe">
                                                   <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p11.png" alt="" data-bs-original-title="Julia Cox">
                                                   <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p12.png" alt="" data-bs-original-title="Robert Cook">
                                                </div>
                                             </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="reviews-members">
                                            <div class="media">
                                                <a href="#"><img alt="Generic placeholder image" src="img/p2.png" class="me-3"></a>
                                                <div class="media-body">
                                                    <div class="reviews-members-header">
                                                        <h6 class="mb-1"><a href="#" class="text-black">Gurdeep Osahan </a> <small class="text-gray">2 months ago</small></h6>
                                                    </div>
                                                    <div class="reviews-members-body">
                                                        <p>Was here impromptu in their first week, reacthe last order. Even though they had Chefs in their open kitchen they weren’t flexible to dish out few more items.</p>
                                                    </div>
                                                    <div class="reviews-members-footer d-flex align-items-center">
                                                        <a href="#" class="total-like btn btn-outline-info btn-sm me-1"><i class="feather-thumbs-up"></i> 123</a> <a href="#" class="total-like btn btn-outline-info btn-sm"><i class="feather-thumbs-down"></i> 02</a>
                                                        <span class="total-like-user-main ms-2" dir="rtl">
                                                <div class="overlap-rounded-circle">
                                                   <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p13.png" alt="" data-bs-original-title="Sophia Lee">
                                                   <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p1.png" alt="" data-bs-original-title="John Doe">
                                                   <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p3.png" alt="" data-bs-original-title="Robert Cook">
                                                </div>
                                             </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <aside class="col col-xl-4 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">

                        <button type="button" class="btn btn-block btn-lg btn-primary w-100 mb-3"> <i class="feather-plus"></i> Join Now </button>


                    <div class="box shadow-sm border rounded bg-white mb-3">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Recent Donations</h6>
                        </div>
                        <div class="box-body p-3">
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p4.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">Volunter Post 1</div>
                                    <div class="small text-gray-500">@Harvard
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p9.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">Volunter Post 2</div>
                                    <div class="small text-gray-500">Traveler
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p10.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">Volunter Post 3</div>
                                    <div class="small text-gray-500">Art Designer
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p11.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">Volunter Post 4</div>
                                    <div class="small text-gray-500">@Photography
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p12.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">Volunter Post 5</div>
                                    <div class="small text-gray-500">@Envato
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>

</template>

<script setup>
  let props = defineProps({
    charity: Array,
    volunteer_post: Object
  });
</script>
