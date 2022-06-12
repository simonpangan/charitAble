<template>
    <div class="profile-cover text-center">
        <img class="img-fluid" src="https://blogs.microsoft.com/wp-content/uploads/prod/2020/10/HERO-ART-microsoft_azure_1920x1000_nologo.jpg" style="height:20%;" alt="">
    </div>
    <div class="bg-white shadow-sm border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-center py-3">
                        <div class="profile-left">
                            <h5 class="font-weight-bold text-dark mb-1 mt-0">{{this.$page.props.user.charity.name}} <span class="text-info"><i data-toggle="tooltip" data-placement="top" title="Verified" class="feather-check-circle"></i></span></h5>
                            <p class="mb-0 text-muted"> Category Charity 1 | Category Charity 2 | 10,000 followers</p>
                        </div>
                        <div class="profile-right ms-auto">
                            <button type="button" class="btn btn-light me-2"> <i class="feather-external-link"></i> Visit website </button>
                            <button type="button" class="btn btn-primary"> <i class="feather-plus"></i> Follow </button>
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
                <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                    <div class="box shadow-sm rounded bg-white mb-3 overflow-hidden">
                        <ul class="nav border-bottom osahan-line-tab" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Posts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Programs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="type-tab" data-bs-toggle="tab" href="#type" role="tab" aria-controls="type" aria-selected="false">Volunteer Posting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="type-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="type" aria-selected="false">Reviews</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="box shadow-sm border rounded bg-white mb-3">
                                <div class="box-title border-bottom p-3">
                                    <h6 class="m-0">About</h6>
                                </div>
                                <div class="box-body p-3">
                                    <p>{{this.$page.props.user.charity.about}}</p>
                                </div>
                            </div>
                            <div class="box shadow-sm border rounded bg-white mb-3">
                                <div class="box-title border-bottom p-3">
                                    <h6 class="m-0">Overview</h6>
                                </div>
                                <div class="box-body">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr class="border-bottom">
                                                <th class="p-3">Category</th>
                                                <td class="p-3"><a href="#">Category 1 | Category 2</a></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Permit/s</th>
                                                <td class="p-3">SEC Registered Non-Profit Organization</td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Company size</th>
                                                <td class="p-3">10,001+ employees <i data-toggle="tooltip" data-placement="top" title="Google’s mission is to organize the world‘s information and make it universally accessible and useful.
                                          " class="feather-info text-info"></i> </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Headquarters</th>
                                                <td class="p-3">Mountain View, CA</td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Type</th>
                                                <td class="p-3">Public Company</td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Founded</th>
                                                <td class="p-3">1998</td>
                                            </tr>
                                            <tr>
                                                <th class="p-3">Specialties</th>
                                                <td class="p-3">search, ads, mobile, android, online video, apps, machine learning, virtual reality, cloud, hardware, artificial intelligence, youtube, and software</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="box shadow-sm border rounded bg-white mb-3">
                                <div class="box-title border-bottom p-3">
                                    <h6 class="m-0">Locations</h6>
                                </div>
                                <div class="p-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card overflow-hidden">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501889.172354371!2d73.15671299623955!3d31.003573085499198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391964aa569e7355%3A0x8fbd263103a38861!2sPunjab!5e0!3m2!1sen!2sin!4v1575738201305!5m2!1sen!2sin"
                                                    width="100%" height="150" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                                <div class="card-body">
                                                    <h6 class="card-title">Postal Address</h6>
                                                    <p class="card-text">PO Box 16122 Collins Street West Victoria 8007 Australia</p>
                                                    <a href="#" class="text-link font-weight-bold"><i class="feather-external-link"></i> Get Directions</a>
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
                                                    <a href="#" class="text-link font-weight-bold"><i class="feather-external-link"></i> Get Directions</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p1.png" alt="" data-original-title="Sophia Lee">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p2.png" alt="" data-original-title="John Doe">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p3.png" alt="" data-original-title="Julia Cox">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p4.png" alt="" data-original-title="Robert Cook">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p5.png" alt="" data-original-title="Sophia Lee">
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
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p6.png" alt="" data-original-title="John Doe">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p7.png" alt="" data-original-title="Julia Cox">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p8.png" alt="" data-original-title="Robert Cook">
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
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p9.png" alt="" data-original-title="Sophia Lee">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p10.png" alt="" data-original-title="John Doe">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p11.png" alt="" data-original-title="Julia Cox">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p12.png" alt="" data-original-title="Robert Cook">
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
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p13.png" alt="" data-original-title="Sophia Lee">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p1.png" alt="" data-original-title="John Doe">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p2.png" alt="" data-original-title="Julia Cox">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p3.png" alt="" data-original-title="Robert Cook">
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
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p4.png" alt="" data-original-title="Sophia Lee">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p5.png" alt="" data-original-title="John Doe">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p6.png" alt="" data-original-title="Julia Cox">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p7.png" alt="" data-original-title="Robert Cook">
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
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p8.png" alt="" data-original-title="Sophia Lee">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p9.png" alt="" data-original-title="John Doe">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p10.png" alt="" data-original-title="Julia Cox">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p11.png" alt="" data-original-title="Robert Cook">
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
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p12.png" alt="" data-original-title="Sophia Lee">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p13.png" alt="" data-original-title="John Doe">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p2.png" alt="" data-original-title="Julia Cox">
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
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p5.png" alt="" data-original-title="Sophia Lee">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p6.png" alt="" data-original-title="John Doe">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p7.png" alt="" data-original-title="Julia Cox">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p1.png" alt="" data-original-title="Robert Cook">
                                                        <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p3.png" alt="" data-original-title="Robert Cook">
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
                                                   <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p9.png" alt="" data-original-title="Sophia Lee">
                                                   <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p10.png" alt="" data-original-title="John Doe">
                                                   <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p11.png" alt="" data-original-title="Julia Cox">
                                                   <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p12.png" alt="" data-original-title="Robert Cook">
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
                                                   <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p13.png" alt="" data-original-title="Sophia Lee">
                                                   <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p1.png" alt="" data-original-title="John Doe">
                                                   <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="" src="img/p3.png" alt="" data-original-title="Robert Cook">
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
                <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="box mb-3 shadow-sm border rounded bg-white profile-box text-center">
                        <div class="p-5">
                            <img src="https://agenda2030lac.org/sites/default/files/styles/256x256/public/2020-03/UNICEF-256.png?itok=Z14HqafD" class="img-fluid" alt="Responsive image">
                        </div>
                        <div class="p-3 border-top border-bottom">
                                <div class="d-flex align-items-top">
                                <p class="mb-0 text-dark font-weight-bold">Total Followers</p>
                                <p class="font-weight-bold  mb-0 mt-0 ms-auto">35,148</p>
                            </div>
                        </div>

                        <div class="p-3 border-bottom">
                                <div class="d-flex align-items-top">
                                <p class="mb-0 text-dark font-weight-bold">Email Address</p>
                                <p class="font-weight-bold  mb-0 mt-0 ms-auto">unicef_hr@unicefPH.com</p>
                            </div>
                            <div class="d-flex align-items-top">
                                <p class="mb-0 text-dark font-weight-bold">Number</p>
                                <p class="font-weight-bold mb-0 mt-0 ms-auto">0912-135-1884</p>
                            </div>
                        </div>

                        <div class="p-3">
                            <div class="mt-2 mb-2">
                            <a href="#"><i class="feather-facebook me-3"></i></a>
                            <a href="#"><i class="feather-twitter mx-3"></i></a>
                            <a href="#"><i class="feather-instagram mx-3"></i></a>
                            <a href="#"><i class="feather-globe mx-3"></i></a>
                            </div>
                         
                        </div>
                    </div>
                    <div class="box shadow-sm mb-3 rounded bg-white ads-box text-center">
                        <img src="img/job1.png" class="img-fluid" alt="Responsive image">
                        <div class="p-3 border-bottom">
                            <h6 class="font-weight-bold text-dark">Osahan Solutions</h6>
                            <p class="mb-0 text-muted">Looking for talent?</p>
                        </div>
                        <div class="p-3">
                            <button type="button" class="btn btn-outline-primary pl-4 pr-4"> POST A JOB </button>
                        </div>
                    </div>
                </aside>
                <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="box shadow-sm border rounded bg-white mb-3">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Similar pages</h6>
                        </div>
                        <div class="box-body p-3">
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/l1.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">Amazon</div>
                                    <div class="small text-gray-500">Internet
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-light btn-sm text-nowrap"><i class="feather-plus"></i> Follow</button>
                           </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/l2.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">Apple</div>
                                    <div class="small text-gray-500">Consumer Electronics
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-light btn-sm text-nowrap"><i class="feather-plus"></i> Follow</button>
                           </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/l3.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">Microsoft</div>
                                    <div class="small text-gray-500">Computer Software
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-light btn-sm text-nowrap"><i class="feather-plus"></i> Follow</button>
                           </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/l4.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">Facebook</div>
                                    <div class="small text-gray-500">Internet
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-light btn-sm text-nowrap"><i class="feather-plus"></i> Follow</button>
                           </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/l5.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">Netflix</div>
                                    <div class="small text-gray-500">Entertainment
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-light btn-sm text-nowrap"><i class="feather-plus"></i> Follow</button>
                           </span>
                            </div>
                        </div>
                    </div>
                    <div class="box shadow-sm border rounded bg-white mb-3">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">People also viewed</h6>
                        </div>
                        <div class="box-body p-3">
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p4.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">Sophia Lee</div>
                                    <div class="small text-gray-500">@Harvard
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-outline-primary btn-sm">Connent</button>
                           </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p9.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">John Doe</div>
                                    <div class="small text-gray-500">Traveler
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-outline-primary btn-sm">Connent</button>
                           </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p10.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">Julia Cox</div>
                                    <div class="small text-gray-500">Art Designer
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-outline-primary btn-sm">Connent</button>
                           </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p11.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">Robert Cook</div>
                                    <div class="small text-gray-500">@Photography
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-outline-primary btn-sm">Connent</button>
                           </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p12.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">Richard Bell</div>
                                    <div class="small text-gray-500">@Envato
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-outline-primary btn-sm">Connent</button>
                           </span>
                            </div>
                        </div>
                    </div>
                    <div class="box shadow-sm mb-3 border rounded bg-white ads-box text-center">
                        <img src="img/ads1.png" class="img-fluid" alt="Responsive image">
                        <div class="p-3 border-bottom">
                            <h6 class="font-weight-bold text-gold">Osahanin Premium</h6>
                            <p class="mb-0 text-muted">Grow &amp; nurture your network</p>
                        </div>
                        <div class="p-3">
                            <button type="button" class="btn btn-outline-gold pl-4 pr-4"> ACTIVATE </button>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>
