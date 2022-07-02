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
                        <div v-if="can.modify" class="profile-right ms-auto">
                            <Link class="btn btn-info btn-lg" 
                                :href="$route('charity.volunteer.edit', {id:volunteerPost.id})">
                                <i class="fad fa-edit fa-1x"></i>
                            </Link>
                            <Link  @click="deletePost(volunteerPost.id)"
                                as="button" 
                                class="btn btn-danger btn-lg ms-2" 
                                :href="$route('charity.volunteer.destroy', 
                                {
                                    id:volunteerPost.id
                                }
                            )">  
                                <i class="fad fa-trash"></i>
                            </Link>
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
                                        <p class="text-strong">
                                            <span class="fw-bold">Location</span> : 
                                            {{volunteerPost.location}} 
                                        </p>
                                        <p class="text-strong">
                                            <span class="fw-bold">Medium</span> : 
                                            {{(volunteerPost.is_virtual) ? 'Virtual' : 'Face to Face'}} 
                                        </p>
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
                            <h6 class="m-0">Text</h6>
                        </div>
                        <div class="box-body p-3">
                            hello
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</template>

<script setup>
let props = defineProps({
    volunteerPost: Object,
    can: Array
});
</script>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
    methods: {
        deletePost (id)  {
            this.$swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Inertia.delete(route('charity.volunteer.destroy', {
                        id: id 
                    }), {
                        onSuccess: () => {
                            this.$swal.fire(
                                'Deleted!',
                                'Your volunteer post has been deleted.',
                                'success'
                            )
                        },
                    });
                }
            })
        }
    }
}
</script>
