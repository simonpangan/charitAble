<template>
	<div class="py-4">
        <div class="container">
            <div class="row">
                <main class="col col-xl-9 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                    <div class="box shadow-sm border rounded bg-white mb-3 osahan-share-post ">
                        <ConnectionsNavLinks v-bind:search="props.search" @search="searchPost" />
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="p-3">
                                    <div class="row">
                                        <div class="col-md-4" v-for="(following, index) in followingList" :key="index">
                                            <div class="border network-item rounded mb-3">
                                               <Link :href="$route('charity.profile.index', {
                                                'id' : following.id
                                                })">
                                                <div class="p-3 d-flex align-items-center network-item-header">
                                                    <div class="dropdown-list-image me-3 d-inline w-25">
                                                        <img class="rounded-circle" :src="following.logo" alt="charity logo" />
                                                    </div>
                                                    <div class="ms-2 w-75 align-middle d-inline">
                                                        <span class="h6 font-weight-bold 
                                                            d-inline-block text-truncate 
                                                            text-dark mb-0 w-100">
                                                            {{ following.name }}
                                                        </span>
                                                        <div class="small text-black-50">
                                                            {{ following.followers }} Followers
                                                        </div>
                                                    </div>
                                                </div>
                                                </Link>
                                                <div class="d-flex align-items-center p-3 border-top border-bottom network-item-body">
                                                    <span class="fw-bold small text-primary text-truncate">{{ following.about }}</span>
                                                </div>
                                                <div class="network-item-footer py-3 d-flex text-center">
                                                    <div class="col-6 ps-3 pe-1">
                                                            <Link class="btn btn-primary btn-sm d-block w-100"
                                                            :href="$route('charity.profile.index', {
                                                                id: following.id
                                                            })" >
                                                                View Profile
                                                        </Link>
                                                    </div>
                                                    <div class="col-6 pe-3 ps-1">
                                                        <Link :href="$route('benefactor.connections.charities.destroy', {
                                                            id: following.id
                                                        })" method="delete" as="button" type="button"
                                                            class="btn btn-outline-primary btn-sm d-block w-100">
                                                        <i class="feather-user-psus"></i>  
                                                            Unfollow
                                                        </Link>
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
                <aside class="col col-xl-3 order-xl-2 col-lg-12 order-lg-2 col-12">
                    <div class="box mb-3 shadow-sm border rounded bg-white list-sidebar">
                        <div class="box-title p-3">
                            <h6 class="m-0">My connections based on category</h6>
							<small class="text-center text-muted">
								Click text below if you want to sort.
							</small>
                        </div>
                        <ul class="list-group list-group-flush">
                            <Link v-for="(total, name, index) in charityFollowingCategoryNumber" :key="index"
                                :href="$route('benefactor.connections.charities.index', {
                                    category: name.replaceAll('_', ' ')
                                })"
                                :only="['followingList']"
                            >
                                <li class="list-group-item ps-3 pe-3 d-flex align-items-center text-dark">
                                        {{ name.replaceAll('_', ' ') }} 
                                    <span class="ms-auto fw-bold">{{ total }}</span>
                                </li>
                            </Link>
                        </ul>
                    </div>
                    <div class="box shadow-sm mb-3 border rounded bg-white ads-box text-center">
                        <div class="image-overlap-2 pt-4">
                            <img src="img/l4.png" class="img-fluid rounded-circle shadow-sm" alt="Responsive image">
                            <img src="img/user.png" class="img-fluid rounded-circle shadow-sm" alt="Responsive image">
                        </div>
                        <div class="p-3 border-bottom">
                            <h6 class="text-dark">Gurdeep, grow your career by following <span class="fw-bold"> Askbootsrap</span></h6>
                            <p class="mb-0 text-muted">Stay up-to industry trends!</p>
                        </div>
                        <div class="p-3">
                            <button type="button" class="btn btn-outline-primary btn-sm ps-4 pe-4"> FOLLOW </button>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</template>

<script setup>
import ConnectionsNavLinks from './ConnectionsNavLinks.vue';
import { Inertia } from '@inertiajs/inertia';


let props = defineProps({
    search: String,    
    followingList: Array,    
    charityFollowingCategoryNumber: Object,
});

let searchPost = (value) => {
       Inertia.get(
      route('benefactor.connections.charities.index'), { 
        name: value, 
      }, {
        preserveState: true,
        replace: true
      }
    ); 
  }

</script>