<template>
    <Head title="Volunteer Posting" />
    <charity-layout>
        <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="box shadow-sm border rounded bg-white p-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div v-for="volunteer_post in volunteerPost" :key="volunteer_post.id" class="col-md-6">
                            <Link :href="$route('charity.volunteer.show', {
                                'id': volunteer_post.id
                            })">
                                <div class="border job-item mb-3">
                                    <div class="d-flex align-items-center p-3 job-item-header">
                                        <div class="overflow-hidden me-2">
                                            <h6 class="font-weight-bold text-dark mb-0 text-truncate">{{volunteer_post.name}}</h6>
                                            <div class="text-truncate text-primary">{{this.$page.props.charity.name}}</div>
                                            <div class="small text-gray-500">
                                                <i class="fal fa-map-pin"></i>
                                                {{volunteer_post.location}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                                        <span class="font-weight-bold text-success">
                                            {{ (volunteer_post.is_active == 1) ? 'Active' : 'Inactive' }}
                                        </span>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </charity-layout>
</template>

<script setup>
import CharityLayout from '../CharityLayout.vue';

let props = defineProps({
    volunteerPost: String,
});

</script>
