<template>
    <Head title="Volunteer Posting" />
    <charity-layout>
        <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="box shadow-sm border rounded bg-white p-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <template v-if="volunteerPost.data.length > 0">
                             <div v-for="volunteer_post in volunteerPost.data" :key="volunteer_post.id" class="col-md-6">
                                <Link :href="$route('charity.volunteer.show', {
                                    'id': volunteer_post.id
                                })">
                                    <div class="border job-item mb-3">
                                        <div class="d-flex align-items-center p-3 job-item-header">
                                            <div class="overflow-hidden me-2">
                                                <h6 class="font-weight-bold text-dark mb-0 text-truncate">{{volunteer_post.name}}</h6>
                                                <div class="text-truncate text-primary">
                                                    {{volunteer_post.description}}
                                                </div>
                                                <div class="small text-gray-500">
                                                    <i class="fal fa-map-pin"></i>
                                                    {{volunteer_post.location}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-3 job-item-footer">
                                            <small class="text-gray-500">
                                                <i class="fas fa-clock"></i>
                                                {{volunteer_post.created_at_formatted}}
                                            </small>
                                        </div>
                                    </div>
                                </Link>
                            </div>
                            </template>
                             <div v-else>
                                <figure class="mb-0 text-center">
                                    <blockquote class="blockquote">
                                        <p>The charity has no current volunteer posting.</p>
                                    </blockquote>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                 <nav v-if="volunteerPost.data.length > 0">
                    <ul class="pagination justify-content-center">
                        <li  v-for="(link, index) in volunteerPost.links" :key="index"
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
    </charity-layout>
</template>

<script setup>
import CharityLayout from '../CharityLayout.vue';

let props = defineProps({
    volunteerPost: Object,
});

</script>
