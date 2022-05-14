<template>
	   <nav class="navbar navbar-expand navbar-dark bg-dark osahan-nav-top p-0">
         <div class="container">
            <a class="navbar-brand me-2" href="index.html"><img src="img/logo.svg" alt="">
            </a>
            <form class="d-none d-sm-inline-block form-inline me-auto my-2 my-md-0 mw-100 navbar-search">
               <div class="input-group">
                  <input type="text" class="form-control shadow-none border-0" placeholder="Search people, jobs & more..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                     <button class="btn" type="button">
                     <i class="feather-search"></i>
                     </button>
                  </div>
               </div>
            </form>
            <ul class="navbar-nav ms-auto d-flex align-items-center">
               <!-- Nav Item - Search Dropdown (Visible Only XS) -->
               <li class="nav-item dropdown no-arrow d-sm-none">
                  <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="feather-search me-2"></i>
                  </a>
                  <!-- Dropdown - Messages -->
                  <div class="dropdown-menu dropdown-menu-right p-3 shadow-sm animated--grow-in" aria-labelledby="searchDropdown">
                     <form class="form-inline me-auto w-100 navbar-search">
                        <div class="input-group">
                           <input type="text" class="form-control border-0 shadow-none" placeholder="Search people, jobs and more..." aria-label="Search" aria-describedby="basic-addon2">
                           <div class="input-group-append">
                              <button class="btn" type="button">
                              <i class="feather-search"></i>
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="jobs.html"><i class="feather-briefcase me-2"></i><span class="d-none d-lg-inline">Jobs</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="connection.html"><i class="feather-users me-2"></i><span class="d-none d-lg-inline">Connection</span></a>
               </li>
               <li class="nav-item dropdown me-2">
                  <a class="nav-link dropdown-toggle pe-0" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="feather-file-text me-2"></i><span class="d-none d-lg-inline">Pages</span>
                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow-sm">
                     <a class="dropdown-item" href="jobs.html"><i class="feather-briefcase me-1"></i> Jobs</a>
                     <a class="dropdown-item" href="profile.html"><i class="feather-user me-1"></i> Profile</a>
                     <a class="dropdown-item" href="connection.html"><i class="feather-users me-1"></i> Connection</a>
                     <a class="dropdown-item" href="company-profile.html"><i class="feather-user-plus me-1"></i> Company Profile</a>
                     <a class="dropdown-item" href="job-profile.html"><i class="feather-globe me-1"></i> Job Profile</a>
                     <a class="dropdown-item" href="messages.html"><i class="feather-message-circle me-1"></i> Messages</a>
                     <a class="dropdown-item" href="notifications.html"><i class="feather-bell me-1"></i> Notifications</a>
                     <a class="dropdown-item" href="not-found.html"><i class="feather-alert-triangle me-1"></i> 404 Not Found</a>
                     <a class="dropdown-item" href="faq.html"><i class="feather-help-circle me-1"></i> FAQ</a>
                     <a class="dropdown-item" href="terms.html"><i class="feather-book me-1"></i> Terms</a>
                     <a class="dropdown-item" href="privacy.html"><i class="feather-list me-1"></i> Privacy</a><a class="dropdown-item" href="blog.html"><i class="feather-book me-1"></i> Blog</a>
                     <a class="dropdown-item" href="blog-single.html"><i class="feather-book-open me-1"></i> Blog Single</a>
                     <a class="dropdown-item" href="contact.html"><i class="feather-mail me-1"></i> Contact</a>
                     <a class="dropdown-item" href="pricing.html"><i class="feather-credit-card me-1"></i> Pricing</a>
                     <a class="dropdown-item" href="maintence.html"><i class="feather-clock me-1"></i> Maintence</a>
                     <a class="dropdown-item" href="coming-soon.html"><i class="feather-cloud me-1"></i> Coming Soon</a>
                     <a class="dropdown-item" href="components.html"><i class="feather-list me-1"></i> Components</a>
                     <a class="dropdown-item" href="sign-in.html"><i class="feather-log-in me-1"></i> Sign In</a>
                     <a class="dropdown-item" href="sign-up.html"><i class="feather-lock me-1"></i> Sign Up</a>
                  </div>
               </li>
               <li class="nav-item dropdown no-arrow mx-1 osahan-list-dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="feather-message-square"></i>
                     <!-- Counter - Alerts -->
                     <span class="badge badge-danger badge-counter">8</span>
                  </a>
                  <!-- Dropdown - Alerts -->
                  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow-sm">
                     <h6 class="dropdown-header">
                        Message Center
                     </h6>
                     <a class="dropdown-item d-flex align-items-center" href="messages.html">
                        <div class="dropdown-list-image me-3">
                           <img class="rounded-circle" src="img/p1.png" alt="">
                           <div class="status-indicator bg-success"></div>
                        </div>
                        <div class="fw-bold overflow-hidden">
                           <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                           <div class="small text-gray-500">Emily Fowler · 58m</div>
                        </div>
                     </a>
                     <a class="dropdown-item d-flex align-items-center" href="messages.html">
                        <div class="dropdown-list-image me-3">
                           <img class="rounded-circle" src="img/p2.png" alt="">
                           <div class="status-indicator"></div>
                        </div>
                        <div class="overflow-hidden">
                           <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                           <div class="small text-gray-500">Jae Chun · 1d</div>
                        </div>
                     </a>
                     <a class="dropdown-item d-flex align-items-center" href="messages.html">
                        <div class="dropdown-list-image me-3">
                           <img class="rounded-circle" src="img/p3.png" alt="">
                           <div class="status-indicator bg-warning"></div>
                        </div>
                        <div class="overflow-hidden">
                           <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                           <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                        </div>
                     </a>
                     <a class="dropdown-item d-flex align-items-center" href="messages.html">
                        <div class="dropdown-list-image me-3">
                           <img class="rounded-circle" src="img/p4.png" alt="">
                           <div class="status-indicator bg-success"></div>
                        </div>
                        <div class="overflow-hidden">
                           <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                           <div class="small text-gray-500">Chicken the Dog · 2w</div>
                        </div>
                     </a>
                     <a class="dropdown-item text-center small text-gray-500" href="messages.html">Read More Messages</a>
                  </div>
               </li>
               <li class="nav-item dropdown no-arrow mx-1 osahan-list-dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="feather-bell"></i>
                     <!-- Counter - Alerts -->
                     <span class="badge badge-info badge-counter">6</span>
                  </a>
                  <!-- Dropdown - Alerts -->
                  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow-sm">
                     <h6 class="dropdown-header">
                        Alerts Center
                     </h6>
                     <a class="dropdown-item d-flex align-items-center" href="notifications.html">
                        <div class="me-3">
                           <div class="icon-circle bg-primary">
                              <i class="feather-download-cloud text-white"></i>
                           </div>
                        </div>
                        <div>
                           <div class="small text-gray-500">December 12, 2019</div>
                           <span class="fw-bold">A new monthly report is ready to download!</span>
                        </div>
                     </a>
                     <a class="dropdown-item d-flex align-items-center" href="notifications.html">
                        <div class="me-3">
                           <div class="icon-circle bg-success">
                              <i class="feather-edit text-white"></i>
                           </div>
                        </div>
                        <div>
                           <div class="small text-gray-500">December 7, 2019</div>
                           $290.29 has been deposited into your account!
                        </div>
                     </a>
                     <a class="dropdown-item d-flex align-items-center" href="notifications.html">
                        <div class="me-3">
                           <div class="icon-circle bg-warning">
                              <i class="feather-folder text-white"></i>
                           </div>
                        </div>
                        <div>
                           <div class="small text-gray-500">December 2, 2019</div>
                           Spending Alert: We've noticed unusually high spending for your account.
                        </div>
                     </a>
                     <a class="dropdown-item text-center small text-gray-500" href="notifications.html">Show All Alerts</a>
                  </div>
               </li>
               <!-- Nav Item - User Information -->
               <li class="nav-item dropdown no-arrow ms-1 osahan-profile-dropdown">
                  <a class="nav-link dropdown-toggle pe-0" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img class="img-profile rounded-circle" src="img/p13.png">
                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow-sm">
                     <div class="p-3 d-flex align-items-center">
                        <div class="dropdown-list-image me-3">
                           <img class="rounded-circle" src="img/user.png" alt="">
                           <div class="status-indicator bg-success"></div>
                        </div>
                        <div class="fw-bold">
                           <div class="text-truncate">Gurdeep Osahan</div>
                           <div class="small text-gray-500">UI/UX Designer</div>
                        </div>
                     </div>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="profile.html"><i class="feather-edit me-1"></i> My Account</a>
                     <a class="dropdown-item" href="edit-profile.html"><i class="feather-user me-1"></i> Edit Profile</a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="sign-in.html"><i class="feather-log-out me-1"></i> Logout</a>
                  </div>
               </li>
            </ul>
         </div>
      </nav>
      <div class="py-4">
         <div class="container">
            <div class="row">
               <!-- Main Content -->
               <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                  <div class="box shadow-sm border rounded bg-white mb-3 osahan-share-post">
                     <ul class="nav nav-justified border-bottom osahan-line-tab" id="myTab" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="feather-edit"></i> Share an update</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="feather-image"></i> Upload a photo</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="feather-clipboard"></i> Write an article</a>
                        </li>
                     </ul>
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                           <div class="p-3 d-flex align-items-center w-100" href="#">
                              <div class="dropdown-list-image me-3">
                                 <img class="rounded-circle" src="img/user.png" alt="">
                                 <div class="status-indicator bg-success"></div>
                              </div>
                              <div class="w-100">
                                 <textarea placeholder="Write your thoughts..." class="form-control border-0 p-0 shadow-none" rows="1"></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="p-3 w-100">
                              <textarea placeholder="Write your thoughts..." class="form-control border-0 p-0 shadow-none" rows="3"></textarea>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                           <div class="p-3 w-100">
                              <textarea placeholder="Write an article..." class="form-control border-0 p-0 shadow-none" rows="3"></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="border-top p-3 d-flex align-items-center">
                        <div class="me-auto"><a href="#" class="text-link small"><i class="feather-map-pin"></i> Add Location</a></div>
                        <div class="flex-shrink-1">
                           <button type="button" class="btn btn-light btn-sm">Preview</button>
                           <button type="button" class="btn btn-primary btn-sm">Post Status</button>
                        </div>
                     </div>
                  </div>
                  <div class="box shadow-sm border rounded bg-white mb-3 osahan-post">
                     <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                        <div class="dropdown-list-image me-3">
                           <img class="rounded-circle" src="img/p5.png" alt="">
                           <div class="status-indicator bg-success"></div>
                        </div>
                        <div class="fw-bold">
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
                        <button type="button" class="btn btn-light btn-sm me-1">😍</button>
                        <button type="button" class="btn btn-outline-secondary btn-sm me-1">Whats it about?</button>
                        <button type="button" class="btn btn-outline-secondary btn-sm me-1">Oooo Great Wow</button>
                     </div>
                  </div>
                  <div class="mb-3 shadow-sm rounded box bg-white osahan-slider-main">
                     <div class="osahan-slider">
                        <div class="osahan-slider-item">
                           <a href="job-profile.html">
                              <div class="shadow-sm border rounded bg-white job-item job-item me-2 mt-3 mb-3">
                                 <div class="d-flex align-items-center p-3 job-item-header">
                                    <div class="overflow-hidden me-2">
                                       <h6 class="fw-bold text-dark mb-0 text-truncate">UI/UX designer</h6>
                                       <div class="text-truncate text-primary">Envato</div>
                                       <div class="small text-gray-500"><i class="feather-map-pin"></i> India, Punjab</div>
                                    </div>
                                    <img class="img-fluid ms-auto" src="img/l1.png" alt="">
                                 </div>
                                 <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                                    <div class="overlap-rounded-circle d-flex">
                                       <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p1.png" alt="" data-bs-original-title="Sophia Lee">
                                       <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p2.png" alt="" data-bs-original-title="John Doe">
                                       <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p3.png" alt="" data-bs-original-title="Julia Cox">
                                       <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p4.png" alt="" data-bs-original-title="Robert Cook">
                                       <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p5.png" alt="" data-bs-original-title="Sophia Lee">
                                    </div>
                                    <span class="fw-bold text-primary">18 connections</span>
                                 </div>
                                 <div class="p-3 job-item-footer">
                                    <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days ago</small>
                                 </div>
                              </div>
                           </a>
                        </div>
                        <div class="osahan-slider-item">
                           <a href="job-profile.html">
                              <div class="shadow-sm border rounded bg-white job-item job-item me-2 mt-3 mb-3">
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
                                    <div class="overlap-rounded-circle d-flex">
                                       <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p13.png" alt="" data-bs-original-title="Sophia Lee">
                                       <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p1.png" alt="" data-bs-original-title="John Doe">
                                       <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p2.png" alt="" data-bs-original-title="Julia Cox">
                                       <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p3.png" alt="" data-bs-original-title="Robert Cook">
                                    </div>
                                    <span class="fw-bold text-primary">18 connections</span>
                                 </div>
                                 <div class="p-3 job-item-footer">
                                    <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days ago</small>
                                 </div>
                              </div>
                           </a>
                        </div>
                        <div class="osahan-slider-item">
                           <a href="job-profile.html">
                              <div class="shadow-sm border rounded bg-white job-item job-item me-2 mt-3 mb-3">
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
                                    <div class="overlap-rounded-circle d-flex">
                                       <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p12.png" alt="" data-bs-original-title="Sophia Lee">
                                       <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p13.png" alt="" data-bs-original-title="John Doe">
                                       <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p2.png" alt="" data-bs-original-title="Julia Cox">
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
                  <div class="box mb-3 shadow-sm border rounded bg-white osahan-post">
                     <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                        <div class="dropdown-list-image me-3">
                           <img class="rounded-circle" src="img/p6.png" alt="">
                           <div class="status-indicator bg-success"></div>
                        </div>
                        <div class="fw-bold">
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
                        <div class="fw-bold">
                           <div class="text-truncate"> James Spiegel <span class="float-right small">2 min</span></div>
                           <div class="small text-gray-500">Ratione voluptatem sequi en lod nesciunt. Neque porro quisquam est, quinder dolorem ipsum quia dolor sit amet, consectetur</div>
                        </div>
                     </div>
                     <div class="p-3">
                        <textarea placeholder="Add Comment..." class="form-control border-0 p-0 shadow-none" rows="1"></textarea>
                     </div>
                  </div>
               </main>
               <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
                  <div class="box mb-3 shadow-sm border rounded bg-white profile-box text-center">
                     <div class="py-4 px-3 border-bottom">
                        <img src="img/p13.png" class="img-fluid mt-2 rounded-circle" alt="Responsive image">
                        <h5 class="fw-bold text-dark mb-1 mt-4">Gurdeep Osahan</h5>
                        <p class="mb-0 text-muted">UI / UX Designer</p>
                     </div>
                     <div class="d-flex">
                        <div class="col-6 border-right p-3">
                           <h6 class="fw-bold text-dark mb-1">358</h6>
                           <p class="mb-0 text-black-50 small">Connections</p>
                        </div>
                        <div class="col-6 p-3">
                           <h6 class="fw-bold text-dark mb-1">85</h6>
                           <p class="mb-0 text-black-50 small">Views</p>
                        </div>
                     </div>
                     <div class="overflow-hidden border-top">
                        <a class="fw-bold p-3 d-block" href="profile.html"> View my profile </a>
                     </div>
                  </div>
                  <div class="box mb-3 shadow-sm rounded bg-white view-box overflow-hidden">
                     <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Profile Views</h6>
                     </div>
                     <div class="d-flex text-center">
                        <div class="col-6 border-right py-4 px-2">
                           <h5 class="fw-bold text-info mb-1">08 <i class="feather-bar-chart-2"></i></h5>
                           <p class="mb-0 text-black-50 small">last 5 days</p>
                        </div>
                        <div class="col-6 py-4 px-2">
                           <h5 class="fw-bold text-success mb-1">+ 43% <i class="feather-bar-chart"></i></h5>
                           <p class="mb-0 text-black-50 small">Since last week</p>
                        </div>
                     </div>
                     <div class="overflow-hidden border-top text-center">
                        <img src="img/chart.png" class="img-fluid" alt="Responsive image">
                     </div>
                  </div>
                  <div class="box shadow-sm mb-3 rounded bg-white ads-box text-center">
                     <img src="img/job1.png" class="img-fluid" alt="Responsive image">
                     <div class="p-3 border-bottom">
                        <h6 class="fw-bold text-dark">Osahan Solutions</h6>
                        <p class="mb-0 text-muted">Looking for talent?</p>
                     </div>
                     <div class="p-3">
                        <button type="button" class="btn btn-outline-primary ps-4 pe-4"> POST A JOB </button>
                     </div>
                  </div>
               </aside>
               <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
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
                           <span class="ms-auto"><button type="button" class="btn btn-light btn-sm"><i class="feather-user-plus"></i></button>
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
                           <span class="ms-auto"><button type="button" class="btn btn-light btn-sm"><i class="feather-user-plus"></i></button>
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
                           <span class="ms-auto"><button type="button" class="btn btn-light btn-sm"><i class="feather-user-plus"></i></button>
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
                           <span class="ms-auto"><button type="button" class="btn btn-light btn-sm"><i class="feather-user-plus"></i></button>
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
                           <span class="ms-auto"><button type="button" class="btn btn-light btn-sm"><i class="feather-user-plus"></i></button>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="box shadow-sm border rounded bg-white mb-3">
                     <div class="box-title border-bottom p-3 d-flex align-items-center">
                        <h6 class="m-0">Photos</h6>
                        <a class="ms-auto" href="#">See All <i class="feather-chevron-right"></i></a>
                     </div>
                     <div class="box-body p-3">
                        <div class="gallery-box-main">
                        <div class="gallery-box">
                           <img class="img-fluid" src="img/p4.png" alt="">
                           <img class="img-fluid" src="img/p5.png" alt="">
                           <img class="img-fluid" src="img/p6.png" alt="">
                        </div>
                           <div class="gallery-box">
                           <img class="img-fluid" src="img/p7.png" alt="">
                           <img class="img-fluid" src="img/p8.png" alt="">
                           <img class="img-fluid" src="img/p9.png" alt="">
                           </div>
                           <div class="gallery-box">
                           <img class="img-fluid" src="img/p10.png" alt="">
                           <img class="img-fluid" src="img/p11.png" alt="">
                           <img class="img-fluid" src="img/p12.png" alt="">
                        </div>
                     </div>
                     </div>
                  </div>
                  <div class="box shadow-sm mb-3 rounded bg-white ads-box text-center overflow-hidden">
                     <img src="img/ads1.png" class="img-fluid" alt="Responsive image">
                     <div class="p-3 border-bottom">
                        <h6 class="fw-bold text-gold">Osahanin Premium</h6>
                        <p class="mb-0 text-muted">Grow & nurture your network</p>
                     </div>
                     <div class="p-3">
                        <button type="button" class="btn btn-outline-gold ps-4 pe-4"> ACTIVATE </button>
                     </div>
                  </div>
                  <div class="box shadow-sm border rounded bg-white mb-3">
                     <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Jobs
                        </h6>
                     </div>
                     <div class="box-body p-3">
                        <a href="job-profile.html">
                           <div class="shadow-sm border rounded bg-white job-item mb-3">
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
                                    <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p9.png" alt="" data-bs-original-title="Sophia Lee">
                                    <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p10.png" alt="" data-bs-original-title="John Doe">
                                    <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p11.png" alt="" data-bs-original-title="Julia Cox">
                                    <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p12.png" alt="" data-bs-original-title="Robert Cook">
                                 </div>
                                 <span class="fw-bold text-muted">18 connections</span>
                              </div>
                              <div class="p-3 job-item-footer">
                                 <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days ago</small>
                              </div>
                           </div>
                        </a>
                        <a href="job-profile.html">
                           <div class="shadow-sm border rounded bg-white job-item">
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
                                    <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p13.png" alt="" data-bs-original-title="Sophia Lee">
                                    <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p1.png" alt="" data-bs-original-title="John Doe">
                                    <img class="rounded-circle shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" src="img/p3.png" alt="" data-bs-original-title="Robert Cook">
                                 </div>
                                 <span class="fw-bold text-muted">18 connections</span>
                              </div>
                              <div class="p-3 job-item-footer">
                                 <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days ago</small>
                              </div>
                           </div>
                        </a>
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