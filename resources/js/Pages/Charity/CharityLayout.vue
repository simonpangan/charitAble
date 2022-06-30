<template>
    <div class="bg-white shadow-sm border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-center py-3">
                        <div class="profile-left">
                            <h1 class="font-weight-bold text-dark mb-1 mt-0">
                                {{this.$page.props.charity.name}} 
                                <span class="text-info">
                                    <i data-toggle="tooltip" data-placement="top" title="Verified" class="feather-check-circle"></i>
                                </span>
                            </h1>
                        </div>
                        <div class="profile-right ms-auto">
                            <button type="button" class="btn btn-light me-2"> <i class="feather-external-link"></i> Donate </button>
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
								<Link class="nav-link" 
                                :class="{ 'active': $page.component === 'Charity/Profile' }"
                                :href="$route('charity.profile.index', {
                                    'id': this.$page.props.charity.id
                                })">About</Link>
							</li>
							<li class="nav-item">
                                <Link class="nav-link" 
                                :class="{ 'active': $page.component === 'Charity/Post/Index' }"
                                :href="$route('charity.post.index', {
                                    'id': this.$page.props.charity.id
                                })">Posts</Link>
							</li>
							<li class="nav-item">
								<Link class="nav-link" 
                                    :class="{ 'active': $page.component === 'Charity/Volunteer-Posting/Index' }"
                                    :href="$route('charity.volunteer.index', {
                                        'id': this.$page.props.charity.id
                                    })">
                                    Volunteer Posting
                                </Link>
							</li>
							<li class="nav-item">
								<Link class="nav-link" 
                                    :class="{ 'active': $page.component === 'Charity/Program/Index' }"
                                    :href="$route('charity.program.index', {
                                        'id': this.$page.props.charity.id
                                    })">
                                    Program
                                </Link>
                            </li>
						</ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                       <slot />
                    </div>
                </main>
                <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="box mb-3 shadow-sm border rounded bg-white profile-box text-center">
                        <div class="p-5">
                            <img v-bind:src="this.$page.props.charity.logo" class="img-fluid" alt="Responsive image">
                        </div>
                        <div class="p-3 border-top border-bottom">
                                <div class="d-flex align-items-top">
                                <p class="mb-0 text-dark font-weight-bold">Total Followers</p>
                                <p class="font-weight-bold  mb-0 mt-0 ms-auto">{{this.$page.props.charity.followers}}</p>
                            </div>
                        </div>

                        <div class="p-3 border-bottom">
                                <div class="d-flex align-items-top">
                                <p class="mb-0 text-dark font-weight-bold">Email Address</p>
                                <p class="font-weight-bold  mb-0 mt-0 ms-auto">
                                    {{this.$page.props.charity.charity_email}}
                                </p>
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
                    <div v-if="$page.props.can.access" class="box shadow-sm border rounded bg-white mb-3">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Charity Features</h6>
                        </div>
                        <div class="box-body p-3">
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">

                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">Create Posts</div>

                                </div>
                                <Link class="btn btn-outline-primary btn-sm ms-auto" 
                                    :href="$route('charity.post.create')"
                                >
                                    Create
                                </Link>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="font-weight-bold me-2">
                                <div class="text-truncate">Create Volunteer Posting</div>

                                </div>
                                <span class="ms-auto">
                                    <Link class="btn btn-outline-primary btn-sm" 
                                    :href="$route('charity.volunteer.create')">
                                        Create
                                    </Link>
                                </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">Create Program</div>
                                </div>
                                <span class="ms-auto">
                                    <Link href="program" class="btn btn-outline-primary btn-sm">
                                        Create
                                    </Link>
                               </span>
                            </div>
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
                                    <div class="text-truncate">Charity 1</div>
                                    <div class="small text-gray-500">Charity Category
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
                                    <div class="text-truncate">Charity 2</div>
                                    <div class="small text-gray-500">Charity Category
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
                                    <div class="text-truncate">Charity 3</div>
                                    <div class="small text-gray-500">Charity Category
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
                                    <div class="text-truncate">Charity 4</div>
                                    <div class="small text-gray-500">Charity Category
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
                                    <div class="text-truncate">Charity 5</div>
                                    <div class="small text-gray-500">Charity Category
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-light btn-sm text-nowrap"><i class="feather-plus"></i> Follow</button>
                           </span>
                            </div>
                        </div>
                    </div>
                    <div class="box shadow-sm border rounded bg-white mb-3">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Active Programs</h6>
                        </div>
                        <div class="box-body p-3">
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p4.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">Programs 1</div>
                                    <div class="small text-gray-500">Tree Planting Activity
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-outline-primary btn-sm">Donate Now</button>
                           </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p9.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">Programs 2</div>
                                    <div class="small text-gray-500">Feeding Program
                                    </div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-outline-primary btn-sm">Donate Now</button>
                           </span>
                            </div>

                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</template>
