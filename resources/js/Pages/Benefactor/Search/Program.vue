<template>
   <div class="container mt-4">
        <main class="mx-auto w-100" style="max-width: 1200px;">
            <div class="box shadow-sm border rounded bg-white mb-3 osahan-share-post">  
                <SearchNavLinks v-bind:search="props.name" @search="searchPost" />
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="p-3 job-tags">
                            <Link :href="$route('benefactor.charity-search.program')" class="btn btn-outline-secondary btn-sm me-1">
                                All
                            </Link>
                            <Link v-for="category in charityCategories" :key="category.id" 
                                :href="$route('benefactor.charity-search.program', {
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
                                    <div v-for="program in programs.data" :key="program.id" class="col-md-3">
                                     <Link :href="$route('charity.program.show', {
                                            'id': program.id
                                        })">
                                            <div class="border job-item mb-3">
                                            <div class="d-flex align-items-center p-3 job-item-header">
                                                <div class="overflow-hidden mr-2">
                                                <h6 class="font-weight-bold text-dark mb-0 text-truncate">{{ program.name }}</h6>
                                                <div class="text-truncate text-primary">{{ program.charity_name }}</div>
                                                <div class="small text-gray-500">
                                                    <i class="feather-map-pin"></i> 
                                                    {{ program.location }}
                                                </div>
                                                </div>
                                                <img class="img-fluid ml-auto" src="img/l1.png" alt="">
                                            </div>
                                            <div class="p-3 job-item-footer">
                                                <small class="text-gray-500">
                                                <i class="feather-clock"></i> Posted {{ program.created_at_formatted }} </small>
                                            </div>
                                            </div>
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                            <li  v-for="(link, index) in programs.links" :key="index"
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
    programs: Object,
})

let searchPost = (value) => {
    Inertia.get(
        route('benefactor.charity-search.program'), { 
            name: value, 
            }, {
            preserveState: true,
            replace: true
        }
    );
}
</script>