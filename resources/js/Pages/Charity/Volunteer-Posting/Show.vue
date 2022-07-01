<template>
    <Head title="Volunteer Posting" />
    <div class="bg-white shadow-sm border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-center py-3">
                        <div class="profile-left">
                            <h3 class="font-weight-bold text-dark mb-1 mt-0"> {{volunteerPost.name}}</h3>
                            <p>A Volunteer Posting by {{volunteerPost.charity.name}}</p>
                        </div>
                        <div class="profile-right ms-auto">
                            <Link class="btn btn-success btn-lg" :href="$route('charity.volunteer.edit', {id:volunteerPost.id})">Edit</Link>
                            <Link class="btn btn-danger btn-lg ms-2" :href="$route('charity.volunteer.edit', {id:volunteerPost.id})">Delete</Link>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="pb-4 pt-3">
        <div class="container">
            <div class="row">
                <main class="col col-xl-8 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="box shadow-sm border rounded bg-white mb-3">
                                <div class="box-title border-bottom p-3">
                                    <h6 class="m-0">Volunteer Description </h6>
                                </div>
                                <div class="box-body p-3">
                                    <p>{{volunteerPost.description}}</p>
                                <div class="border-top mt-2">
                                    <p class="text-strong">Location : {{volunteerPost.location}} </p>
                                </div>
                                </div>
                            </div>
                            <div class="box shadow-sm border rounded bg-white mb-3">
                                <div class="box-title border-bottom p-3">
                                    <h6 class="m-0">Qualifications and Responsibilities</h6>
                                </div>
                                <div class="box-body p-3">
                                    <p>
                                        {{ volunteerPost.qualifications }}
                                    </p>
                                </div>
                            </div>
                            <div class="box shadow-sm border rounded bg-white mb-3">
                                <div class="box-title border-bottom p-3">
                                    <h6 class="m-0">Potential Incentives</h6>
                                </div>
                                <div class="box-body p-3">
                                    <p>{{volunteerPost.incentives}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <aside class="col col-xl-4 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
                    <a type="button" class="btn btn-block btn-lg btn-primary w-100 mb-3" 
                        :href="'mailto:test@example.com?subject=Interested at' + volunteerPost.name +'&body=I am looking forward to join your cause!'">
                        <i class="feather-plus"></i> 
                        Join Now 
                    </a>
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
    volunteerPost: Object
  });
</script>
