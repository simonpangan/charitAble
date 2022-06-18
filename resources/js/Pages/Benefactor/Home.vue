<template>
	    <div class="py-4">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                    
                    <div v-for="post in $page.props.posts" :key="post.id">
                    
                    <div class="box shadow-sm border rounded bg-white mb-3 osahan-post">
                        <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                            <div class="dropdown-list-image me-3">
                                <img class="rounded-circle" src='http://127.0.0.1:8000/storage/charity/56/logo/unicef.png' alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="fw-bold">
                                <div class="text-truncate">Aspin Academy</div>
                                <div class="small text-gray-500">Animal Conservation</div>
                            </div>
                            <span class="ms-auto small">3 hours</span>
                        </div>
                        <div class="p-3 border-bottom osahan-post-body">
                            <p class="mb-0"> {{post.main_content_body}}</p>
                             <div class="div">
                                    <img class="img-fluid" v-bind:src="post.main_content_body_image" alt="">
                                    </div>
                        </div>
                        <div class="p-3 border-bottom osahan-post-footer">
                            <a href="#" class="me-3 text-secondary"><i class="feather-heart text-danger"></i> 16</a>
                            <a href="#" class="me-3 text-secondary"><i class="feather-message-square"></i> 8</a>
                            <a href="#" class="me-3 text-secondary"><i class="feather-share-2"></i> 2</a>
                        </div>

                    </div>
                </div>

                </main>
                <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="box mb-3 shadow-sm border rounded bg-white profile-box text-center">
                        <div class="py-4 px-3 border-bottom">
                            <img src="img/p13.png" class="img-fluid mt-2 rounded-circle" alt="Responsive image">
                            <h5 class="fw-bold text-dark mb-1 mt-4">{{this.$page.props.user.email}}</h5>
                        </div>
                        <div class="d-flex">
                            <div class="col-6 border-end p-3">
                                <h6 class="fw-bold text-dark mb-1">358</h6>
                                <p class="mb-0 text-black-50 small">?Number of Followed Charities</p>
                            </div>
                            <div class="col-6 p-3">
                                <h6 class="fw-bold text-dark mb-1">85</h6>
                                <p class="mb-0 text-black-50 small">Charities Donated?</p>
                            </div>
                        </div>
                        <div class="overflow-hidden border-top">
                            <a class="fw-bold p-3 d-block" href="profile.html"> View my profile </a>
                        </div>
                    </div>
                    <div class="box mb-3 shadow-sm rounded bg-white view-box overflow-hidden">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Donated Programs</h6>
                        </div>
                        <div class="d-flex text-center">
                            <div class="col-6 border-end py-4 px-2">
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
                            <h6 class="m-0">Charities You Might Like</h6>
                        </div>
                        <div class="box-body p-3">
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p8.png" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="fw-bold me-2">
                                    <div class="text-truncate">Charity 1</div>
                                    <div class="small text-gray-500">Animal Conservation
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-light btn-sm text-nowrap"><i class="feather-plus"></i> Follow</button>
                           </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p9.png" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="fw-bold me-2">
                                    <div class="text-truncate">Charity 2</div>
                                    <div class="small text-gray-500">Children Welfare
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-light btn-sm text-nowrap"><i class="feather-plus"></i> Follow</button>
                           </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p10.png" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="fw-bold me-2">
                                    <div class="text-truncate">Charity 3</div>
                                    <div class="small text-gray-500">Woman Empowerment
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-light btn-sm text-nowrap"><i class="feather-plus"></i> Follow</button>
                           </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p11.png" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="fw-bold me-2">
                                    <div class="text-truncate">Charity 4</div>
                                    <div class="small text-gray-500">Enviromental Conservation
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-light btn-sm text-nowrap"><i class="feather-plus"></i> Follow</button>
                           </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p12.png" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="fw-bold me-2">
                                    <div class="text-truncate">Charity 5</div>
                                    <div class="small text-gray-500">Animal Conservation
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-light btn-sm text-nowrap"><i class="feather-plus"></i> Follow</button>
                           </span>
                            </div>
                        </div>
                    </div>
                    <div class="box shadow-sm border rounded bg-white mb-3">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Volunteer Postings
                            </h6>
                        </div>
                        <div class="box-body p-3">
                            <div  v-for="volunteer_post in $page.props.volunteer_post" :key="volunteer_post.id">
                            <a href="job-profile.html">
                                <div class="shadow-sm border rounded bg-white job-item mb-3">
                                    <div class="d-flex align-items-center p-3 job-item-header">
                                        <div class="overflow-hidden me-2">
                                            <h6 class="fw-bold text-dark mb-0 text-truncate">{{volunteer_post.volunteer_work_name}}</h6>
                                            <div class="text-truncate text-primary">Aspin Academy</div>
                                            <div class="small text-gray-500"><i class="feather-map-pin"></i>{{volunteer_post.location}}</div>
                                        </div>
                                        <img class="img-fluid ms-auto" src="img/l3.png" alt="">
                                    </div>
                                    <div class="p-3 job-item-footer border-top">
                                        <small class="text-gray-500"><i class="feather-clock"></i> {{volunteer_post.created_at}}}</small>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</template>
<script>

  // Create component
  export default {
  
    setup() {

    },
    props: {
        posts: Array,
        user: Array,
        volunteer_post: Array
    },
    data() {

    },
    methods: {
    
    },
  }
</script>
