<template>
    <Head title="Profile" />
    <div class="profile-cover text-center">
        <img class="img-fluid" src="https://blogs.microsoft.com/wp-content/uploads/prod/2020/10/HERO-ART-microsoft_azure_1920x1000_nologo.jpg" style="height:20%;" alt="">
    </div>
    <div class="bg-white shadow-sm border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-center py-3">
                        <div class="profile-left">
                            <h1 class="font-weight-bold text-dark mb-1 mt-0">{{this.$page.props.user.charity.name}} <span class="text-info"><i data-toggle="tooltip" data-placement="top" title="Verified" class="feather-check-circle"></i></span></h1>
                            <p class="mb-0 text-muted"> Category Charity 1 | Category Charity</p>
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
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Posts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Volunteer Posting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="type-tab" data-bs-toggle="tab" href="#type" role="tab" aria-controls="type" aria-selected="false">Program</a>
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
                                                <th class="p-3">Location</th>
                                                <td class="p-3">14th floor, North Tower, Rockwell Business Center Sheridan Sheridan Street, corner United St, Mandaluyong, 1550 Metro Manila </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="box shadow-sm border rounded bg-white mb-3">
                                <div class="box-title border-bottom p-3">
                                    <div class="d-flex justify-content-between">
                                    <h6 class="m-0 ">NGO Heads / Board Members</h6>
                                        <i class="fal fa-ellipsis-v-alt" data-bs-toggle="dropdown"></i>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" :href="$route('charity.officer.create')">Add Board Member</a>
                                                <a class="dropdown-item" :href="$route('charity.officer.edit', {id: this.$page.props.user.charity.id})">Edit/Delete Board Member</a>
                                            </div>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <table class="table table-borderless mb-0 ">
                                        <tbody>
                                            <div class="border-bottom" v-for="officer in $page.props.officer" :key="officer.id">
                                            
                                            <tr class="nmb-1">
                                                <th class="p-3">Name</th>
                                                <td class="p-3">{{officer.last_name + ' ' + officer.first_name}} </td>
                                            </tr>
                                            <tr class="nmb-1">
                                                <th class="p-3">Position</th>
                                                <td class="p-3">{{officer.position}}</td>
                                            </tr>
                                            <tr class="nmb-1">
                                                <th class="p-3">Date of Position</th>
                                                <td class="p-3">{{officer.officer_since}}</td>
                                            </tr>
                                              <tr class="nmb-1">
                                                <th class="p-3">Actions: </th>
                                                <td class="p-3"><Link class="btn btn-success btn-sm ">Edit</Link> <Link class="btn btn-danger btn-sm ms-2">Delete</Link></td>
                                            </tr>
                                            </div>
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
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d123497.75112352976!2d120.99396112601966!3d14.695351893726098!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c90bd1249c53%3A0x7f97c78e9a17f459!2sUnited%20Nations%20Children&#39;s%20Fund%20(UNICEF)!5e0!3m2!1sen!2sph!4v1655078379001!5m2!1sen!2sph&z=6"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                                    width="100%" height="150" frameborder="0" style="border:0;" ></iframe>
                                                <div class="card-body">
                                                    <h6 class="card-title">UNICEF Philippines Main Branch</h6>
                                                    <p class="card-text">14th floor, North Tower, Rockwell Business Center Sheridan Sheridan Street, corner United St, Mandaluyong, 1550 Metro Manila</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div v-for="post in $page.props.posts" :key="post.id">
                            <div class="box shadow-sm border rounded bg-white mb-3 osahan-post">
                                <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                                    <div class="dropdown-list-image me-3">
                                        <img class="rounded-circle" v-bind:src="this.$page.props.user.charity.logo" alt="">
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">{{this.$page.props.user.charity.name}}<span class="text-info ms-1"><i data-bs-toggle="tooltip" data-bs-placement="top" title="Verified" class="feather-check-circle"></i></span></div>
                                        <div class="small text-gray-500">June 13, 2022</div>
                                    </div>

                                    
                                    <span class="ms-auto small"></span>
                                <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                   <i class="fal fa-ellipsis-v-alt"></i>
                                </a>
  
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                            </ul>
                                </div>
                                <div class="p-3 border-bottom osahan-post-body">
                                    {{post.main_content_body}}
                                    <div class="div">
                                    <img class="img-fluid" v-bind:src="post.main_content_body_image" alt="">
                                    </div>
                                </div>
                                <div class="p-3 border-bottom osahan-post-footer">
                                    <a href="#" class="me-3 text-secondary"><i class="feather-heart text-danger"></i> 16</a>
                                </div>
                            </div>
                            <!-- content -->
                            </div>

                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="box shadow-sm border rounded bg-white p-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div v-for="volunteer_post in $page.props.volunteer_post" :key="volunteer_post.id" class="col-md-6">
                                            <Link :href="'volunteer-posts/' + volunteer_post.id">
                                                <div class="border job-item mb-3">
                                                    <div class="d-flex align-items-center p-3 job-item-header">
                                                        <div class="overflow-hidden me-2">
                                                            <h6 class="font-weight-bold text-dark mb-0 text-truncate">{{volunteer_post.volunteer_work_name}}</h6>
                                                            <div class="text-truncate text-primary">{{this.$page.props.user.charity.name}}</div>
                                                            <div class="small text-gray-500"><i class="feather-map-pin"></i>{{volunteer_post.location}}</div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                                                        <span class="font-weight-bold text-success">Active</span>
                                                    </div>
                                                    <div class="p-3 job-item-footer">
                                                        <small class="text-gray-500"><i class="feather-clock"></i>{{volunteer_post.created_at}}</small>
                                                    </div>
                                                </div>
                                            </Link>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="type" role="tabpanel" aria-labelledby="type-tab">
                            <div class="box shadow-sm border rounded bg-white mb-3">
                                    <div class="row p-4">
                                        <div v-for="program in $page.props.program" :key="program.id" class="col-md-6 mt-3">
                                        <Link :href="'program/' + program.id">
                                                <div class="card overflow-hidden">
                                                    <img src="https://rimage.gnst.jp/livejapan.com/public/article/detail/a/00/04/a0004907/img/basic/a0004907_main.jpg?20210317142845&q=80&rw=750&rh=536" class="img-fluid" alt="Responsive image">
                                                    <div class="card-body">
                                                        <h5 class="card-title nmb-1">{{program.program_name}}</h5>
                                                        <p class="card-text text-muted ">{{program.location}}</p>
                                                        <p class="card-text text-success ">On-Going</p>
                                                        <p class="card-text text-dark">{{program.created_at_formatted}}</p>
                                                    </div>
                                                </div>
                                        </Link>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </main>
                <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="box mb-3 shadow-sm border rounded bg-white profile-box text-center">
                        <div class="p-5">
                            <img v-bind:src="this.$page.props.user.charity.logo" class="img-fluid" alt="Responsive image">
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
                    <div class="box shadow-sm border rounded bg-white mb-3">
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
                                    <Link href="program" class="btn btn-outline-primary btn-warning btn-sm">
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

<script>

  export default {
   
    setup() {

    },
    props: {
      posts:Array,
      user:Object,
      volunteer_post:Array,
      program:Array,
      officer:Array
    },
    data() {

    },
    methods: {
    
    }
  }
</script>

