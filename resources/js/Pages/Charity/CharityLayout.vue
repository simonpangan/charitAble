<template>
    <div class="bg-white shadow-sm border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-center py-3">
                        <div class="profile-left">
                            <h2 class="fw-bold text-dark mb-1 mt-0">
                                {{charity.name}} 
                                <span class="text-info">
                                    <i data-toggle="tooltip" data-placement="top" title="Verified" class="feather-check-circle"></i>
                                </span>
                            </h2>
                        </div>
                        <div v-if="this.$page.props.can.seeFollowOrUnfollow" class="profile-right ms-auto">
                            <button v-if="this.$page.props.can.follow"  @click="unFollowCharity(charity.id)"
                                    class="btn btn-outline-primary btn-sm d-block w-100">
                                Unfollow 
                            </button>
                            <button v-else @click="followCharity(charity.id)" class="btn btn-outline-primary btn-sm d-block w-100">
                                Follow 
                            </button>
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
                                    'id': charity.id
                                })">About</Link>
							</li>
							<li class="nav-item">
                                <Link class="nav-link" 
                                :class="{ 'active': $page.component === 'Charity/Post/Index' }"
                                :href="$route('charity.post.index', {
                                    'id': charity.id
                                })">Posts</Link>
							</li>
							<li class="nav-item">
								<Link class="nav-link" 
                                    :class="{ 'active': $page.component === 'Charity/Volunteer-Posting/Index' }"
                                    :href="$route('charity.volunteer.index', {
                                        'id': charity.id
                                    })">
                                    Volunteer Posting
                                </Link>
							</li>
							<li class="nav-item" v-if="charity.charity_verified_at">
								<Link class="nav-link" 
                                    :class="{ 'active': $page.component === 'Charity/Program/Index' }"
                                    :href="$route('charity.program.index', {
                                        'id': charity.id
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
                    <div class="box mb-3 shadow-sm border rounded bg-white profile-box">
                        <div class="p-5">
                            <img v-bind:src="charity.logo" class="img-fluid" alt="Responsive image">
                        </div>
                        <div class="p-3 border-top border-bottom">
                            <div class="d-flex align-items-top">
                                <p class="mb-0 text-dark fw-bold">Total Followers</p>
                                <p class="mb-0 mt-0 ms-auto">
                                    {{charity.followers}}
                                </p>
                            </div>
                        </div>
                        <div class="p-3 border-bottom">
                            <div class="d-flex align-items-top">
                                <p class="mb-0 text-dark fw-bold">Email Address</p>
                                <p class="mb-0 mt-0 ms-auto">
                                    {{charity.charity_email}}
                                </p>
                            </div>
                        </div>
                        <div class="p-3 d-flex justify-content-around">
                             <a :href="charity.website_link"
                                v-if="charity.website_link" 
                                class="text-dark" target="_blank">
                                <i class="far fa-globe fa-2x"></i>
                            </a>
                            <a :href="charity.facebook_link"
                                v-if="charity.facebook_link"
                                class="text-dark" target="_blank">
                                <i class="fab fa-facebook fa-2x"></i>
                            </a>
                            <a :href="charity.instagram_link"
                                v-if="charity.instagram_link"
                                class="d-flex justify-content-between" target="_blank">
                                <i class="fab fa-instagram fa-2x"></i>
                            </a>
                            <a  class="ms-2" target="_blank"
                                :href="charity.twitter_link"
                                v-if="charity.twitter_link"
                                >
                                 <i class="fab fa-twitter fa-2x"></i>
                            </a>
                        </div>
                    </div>
                    <div v-if="$page.props.can.access" class="box shadow-sm border rounded bg-white mb-3">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Charity Features</h6>
                        </div>
                        <div class="box-body p-3">
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">

                                <div class="fw-bold me-2">
                                    <div class="text-truncate">Create Posts</div>

                                </div>
                                <Link class="btn btn-primary btn-sm ms-auto" 
                                    :href="$route('charity.post.create')"
                                >
                                    <i class="fad fa-plus"></i>
                                </Link>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="fw-bold me-2">
                                <div class="text-truncate">Create Volunteer Posting</div>

                                </div>
                                <span class="ms-auto">
                                    <Link class="btn btn-primary btn-sm" 
                                    :href="$route('charity.volunteer.create')">
                                        <i class="fad fa-plus"></i>
                                    </Link>
                                </span>
                            </div>
                            <div v-if="charity.charity_verified_at" class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="fw-bold me-2">
                                    <div class="text-truncate">Create Program</div>
                                </div>
                                <span class="ms-auto">
                                    <Link :href="$route('charity.program.create')" 
                                    class="btn btn-primary btn-sm">
                                        <i class="fad fa-plus"></i>
                                    </Link>
                               </span>
                            </div>
                        </div>
                    </div>
                </aside>
                <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="box shadow-sm border rounded bg-white mb-3">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Active Programs</h6>
                        </div>
                        <div class="box-body">
                            <ol class="list-group">
                                <template v-if="latestFiveActivePrograms.length != 0 && (charity.charity_verified_at != null)" >
                                    <li v-for="program in latestFiveActivePrograms" :key="program.id" 
                                        class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <Link :href="$route('charity.program.show', {
                                            'id': program.id
                                            })" class="text-dark">
                                                <div class="fw-bold d-inline-block text-truncate" 
                                                    style="max-width: 150px;"
                                                    >
                                                    {{ program.name }}
                                                </div>

                                                <span class="d-block text-truncate" style="max-width: 150px;">
                                                    {{ program.description }}
                                                </span>
                                            </Link>
                                        </div>
                                        <span class="badge bg-primary rounded-pill">{{program.created_at_formatted}}</span>
                                    </li>
                                </template>
                                <li v-else class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <span class="text-center">No current active program</span>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            charity : this.$page.props.charity,
            latestFiveActivePrograms: this.$page.props.latestFiveActivePrograms,
        }
    },
    methods: {
        followCharity($id) {
            this.$inertia.post(route('benefactor.connections.charities.store'), {
                id: $id
            }, {
                onSuccess: () => {
                    this.$inertia.get(route('charity.profile.index', {
                        'id' : $id
                    }));
                }
            });
        },
        unFollowCharity($id) {
            this.$inertia.post(route('benefactor.connections.charities.destroy', {
                id: $id
            }), {}, {
                onSuccess: () => {
                    alert('asd');
                    this.$inertia.get(route('charity.profile.index', {
                        'id' : $id
                    }));
                }
            });
        }
    }
}
</script>
