<template>
   <div class="container mt-4">
        <main class="mx-auto w-100" style="max-width: 1200px;">
            <div class="box shadow-sm border rounded bg-white mb-3 osahan-share-post">  
                <SearchNavLinks v-bind:search="props.name" @search="searchPost" />
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="p-3 job-tags">
                            <Link :href="$route('benefactor.charity-search.location')" class="btn btn-outline-secondary btn-sm me-1">
                                All
                            </Link>
                            <Link v-for="location in locations" :key="location.id" 
                                :href="$route('benefactor.charity-search.location', {
                                    location: location.name
                                })"
                                class="btn btn-sm me-1"
                                :class="($route().params['location'] == location.name) ? 'btn-secondary' : 'btn-outline-secondary'"
                            >   
                                {{ location.name }}
                            </Link>
                        </div>
                        <div class="p-3 border-top">
                            <div class="p-3 w-100">
                                <div class="row">
                                    <div v-for="charity in charities.data" :key="charity.id" class="col-md-3">
                                        <div class="border network-item rounded mb-3">
                                            <Link :href="$route('charity.profile.index', {
                                                'id' : charity.id
                                            })">
                                            <div class="p-3 d-flex align-items-center network-item-header">
                                                    <div class="dropdown-list-image me-3 d-inline w-25">
                                                        <img class="rounded-circle" :src="charity.logo" alt="charity logo" />
                                                    </div>
                                                    <div class="ms-2 w-75 align-middle d-inline">
                                                        <span class="h6 font-weight-bold text-dark mb-0 text-truncate w-100">
                                                            {{ charity.name }}
                                                        </span>
                                                        <div class="small text-black-50">
                                                            {{ charity.followers }} Followers
                                                        </div>
                                                    </div>
                                            </div>
                                            </Link>
                                            <div class="d-flex align-items-center p-3 border-top border-bottom network-item-body">
                                                <span class="fw-bold small text-black-50 text-truncate">
                                                    {{ charity.about }}
                                                </span>
                                            </div>
                                            <div class="network-item-footer py-3 d-flex text-center">
                                                <div class="col-6 ps-3 pe-1">
                                                    <Link class="btn btn-primary btn-sm d-block w-100"
                                                        :href="$route('charity.profile.index', {
                                                            id: charity.id
                                                        })" >
                                                        View Profile
                                                    </Link>
                                                </div>
                                                <div class="col-6 pe-3 ps-1">
                                                    <Link v-if="charity.isFollowed" :href="$route('benefactor.connections.charities.destroy', {
                                                            id: charity.id
                                                        })" 
                                                            method="delete" as="button" type="button"
                                                            class="btn btn-outline-secondary btn-sm d-block w-100">
                                                        <i class="feather-user-psus"></i> Unfollow 
                                                    </Link>
                                                    <Link v-else :href="$route('benefactor.connections.charities.store', {
                                                            id: charity.id
                                                        })" 
                                                            method="post" as="button" type="button"
                                                            class="btn btn-outline-primary btn-sm d-block w-100">
                                                        <i class="feather-user-psus"></i> Follow 
                                                    </Link>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li v-for="(link, index) in charities.links" :key="index"  class="page-item"
                                        :class="[
                                            link.active ? 'active' : '',
                                            link.url ? 'pager' : '',
                                        ]"> 
                                        <Component 
                                            :is="link.url ? 'Link' : 'span'"
                                            v-if="link.url" 
                                            :href="link.url" 
                                            v-html="link.label"
                                            class="page-link"
                                        >
                                        </Component>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import SearchNavLinks from './SearchNavLinks.vue';
import {
    Inertia
} from '@inertiajs/inertia';


let props = defineProps({
    name: String,
    charities: Object,
    locations: Object
})

let searchPost = (value) => {
    Inertia.get(
        route('benefactor.charity-search.location'), { 
            name: value, 
            }, {
            preserveState: true,
            replace: true
        }
    );
}
</script>