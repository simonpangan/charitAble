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
                                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Programs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="type-tab" data-bs-toggle="tab" href="#type" role="tab" aria-controls="type" aria-selected="false">Volunteer Posting</a>
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
                                    <span class="ms-auto small">3 hours</span>
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
                                    <div v-for="volunteer_post in $page.props.volunteer_post" :key="volunteer_post.id">
                                        <div class="col-md-6">
                                            <a href="job-profile.html">
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
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="type" role="tabpanel" aria-labelledby="type-tab">
                            <div class="box shadow-sm border rounded bg-white mb-3">
                                    <div class="row p-4">
                                        <div class="col-md-6 ">
                                            <div class="card overflow-hidden">
                                                <img src="https://images.unsplash.com/photo-1593113616828-6f22bca04804?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="img-fluid" alt="Responsive image">
                                                <div class="card-body">
                                                    <h5 class="card-title nmb-1">Tree Planting</h5>
                                                    <p class="card-text text-muted ">Binangonan, Rizal</p>
                                                    <p class="card-text text-success ">On-Going</p>
                                                    <p class="card-text text-dark">40 Proud Supporters</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card overflow-hidden">
                                                <img src="https://images.unsplash.com/photo-1593113616828-6f22bca04804?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="img-fluid" alt="Responsive image">
                                                <div class="card-body">
                                                    <h5 class="card-title  nmb-1">Tree Planting</h5>
                                                    <p class="card-text text-muted">Binangonan, Rizal</p>
                                                    <p class="card-text text-success ">On-Going</p>
                                                    <p class="card-text text-dark">38 Proud Supporters</p>
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
                                <span class="ms-auto"><button type="button" class="btn btn-outline-primary btn-sm"><Link href="post">Create</Link></button>
                           </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="font-weight-bold me-2">
                                <div class="text-truncate">Create Volunteer Posting</div>

                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-outline-primary btn-sm"><Link href="volunteer-posts/create">Create</Link></button>
                           </span>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">Create Program</div>
                                </div>
                                <span class="ms-auto"><button type="button" class="btn btn-outline-primary btn-warning btn-sm">Create</button>
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
  import vueFilePond from "vue-filepond";
  // Import FilePond styles
  import "filepond/dist/filepond.min.css";
  // Import image preview and file type validation plugins
  import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
  import FilePondPluginImagePreview from "filepond-plugin-image-preview";

  // Create component
  const FilePond = vueFilePond(FilePondPluginFileValidateType,FilePondPluginImagePreview);
  export default {
    components: {
      FilePond,
    },
    setup() {

    },
    props: {
      csrfToken: String
    },
    data() {

    },
    methods: {
      handleFilePondInit: function() {
        console.log("FilePond has initialized");
        // FilePond instance methods are available on `this.$refs.pond`
      },
    },
  }
</script>
<style>
  @import "filepond/dist/filepond.css";

.filepond--wrapper {
  max-height: 120px;
}

  .filepond--drop-label{
    background-color:white;
    border-radius: 25px;
    border: .5px solid #e1d9d1;
    padding: 20px;
  }
  @import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";

</style>
