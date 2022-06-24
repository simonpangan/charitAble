<template>
   <div class="container mt-4">
        <main class="mx-auto w-100" style="max-width: 1200px;">
            <div class="box shadow-sm border rounded bg-white mb-3 osahan-share-post">  
                <SearchNavLinks v-bind:search="props.name" @search="searchPost" />
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="p-3 job-tags">
                            <Link :href="$route('benefactor.charity-search.volunteer')" class="btn btn-outline-secondary btn-sm me-1">
                                All
                            </Link>
                            <Link v-for="category in charityCategories" :key="category.id" 
                                :href="$route('benefactor.charity-search.volunteer', {
                                    category: category.name
                                })"
                                class="btn btn-sm me-1"
                                :class="($route().params['category'] == category.name) ? 'btn-secondary' : 'btn-outline-secondary'"
                            >
                                {{ category.name }}
                            </Link>
                        </div>
                        <div class="p-3 border-top">
                            <div class="p-3 w-100">
                                 <div class="row">
                                    <div v-for="volunteerPost in volunteerPosts.data" :key="volunteerPost.id" class="col-md-3">
                                        <a href="job-profile.html">
                                            <div class="border job-item mb-3">
                                            <div class="d-flex align-items-center p-3 job-item-header">
                                                <div class="overflow-hidden mr-2">
                                                <h6 class="font-weight-bold text-dark mb-0 text-truncate">{{ volunteerPost.name }}</h6>
                                                <div class="text-truncate text-primary">{{ volunteerPost.charity_name }}</div>
                                                <div class="small text-gray-500">
                                                    <i class="feather-map-pin"></i> 
                                                    {{ volunteerPost.location }}
                                                </div>
                                                </div>
                                                <img class="img-fluid ml-auto" src="img/l1.png" alt="">
                                            </div>
                                            <div class="p-3 job-item-footer">
                                                <small class="text-gray-500">
                                                <i class="feather-clock"></i> Posted {{ volunteerPost.created_at_formatted }} </small>
                                            </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li  v-for="(link, index) in volunteerPosts.links" :key="index"
                                    class="page-item"
                                    :class="[
                                        link.active ? 'active' : '',
                                        link.url ? 'pager' : '',
                                    ]"
                                >
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
    charityCategories: Array,
    volunteerPosts: Object,
})

let searchPost = (value) => {
    Inertia.get(
        route('benefactor.charity-search.volunteer'), { 
            name: value, 
            }, {
            preserveState: true,
            replace: true
        }
    );
}
</script>