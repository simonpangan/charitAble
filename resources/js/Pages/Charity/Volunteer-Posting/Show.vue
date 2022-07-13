<template>
    <Head title="Volunteer Posting" />
    <div class="bg-white shadow-sm border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-center py-3">
                        <div class="profile-left">
                            <h3 class="font-weight-bold text-dark mb-1 mt-0"> {{volunteerPost.name}}</h3>
                            <p>A Volunteer Posting by 
                                <Link class="text-dark" 
                                    :href="$route('charity.profile.index', {
                                        'id' : volunteerPost.charity.id 
                                    })">
                                    <u>{{volunteerPost.charity.name}}</u>
                                </Link>
                            </p>
                             <p class="mb-0 text-muted"> 
								Created at : {{volunteerPost.created_at}}
							</p>
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
                                                <a :href="'https://maps.google.com/?q=' + volunteerPost.location"
                                                target="_blank">
                                                {{ volunteerPost.location }}
                                            </a>
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
                <aside v-if="can.modify" class="col col-xl-4 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
                     <div v-if="$page.props.flash.message" role="alert"
                        class="alert alert-success w-80 mx-auto text-center">
                            {{ $page.props.flash.message }}
                    </div>
                    <a :href="$route('charity.volunteer.report', {
                        'id': volunteerPost.id
                    })"  
                        class="btn btn-block btn-lg btn-primary w-100 mb-3">
                        Download Report<i class="fad fa-download ms-2"></i> 
                    </a>
                    <div class="box shadow-sm border rounded bg-white mb-3">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Recent Emails</h6>
                        </div>
                        <div class="box-body">
                            <ol class="list-group">
                                <li v-if="volunteerPost.last_five_interest.length != 0" 
                                    v-for="interest in volunteerPost.last_five_interest" :key="interest.id" 
                                    class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <div class="fw-bold">{{ interest.first_name + ' ' + interest.last_name}}</div>
                                    {{ interest.pivot.message }}
                                    </div>
                                    <span class="badge bg-primary rounded-pill">{{interest.pivot.created_at_formatted}}</span>
                                </li>
                                <li v-else class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <span class="text-center">No recent email</span>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                </aside>
                <aside v-else class="col col-xl-4 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
                     <div v-if="$page.props.flash.message" role="alert"
                        class="alert alert-success w-80 mx-auto text-center">
                            {{ $page.props.flash.message }}
                    </div>
                    <button type="button" class="btn btn-block btn-lg btn-primary w-100 mb-3" 
                        data-bs-toggle="modal" data-bs-target="#joinNowModal">
                        Join Now 
                    </button>
                    <div class="box shadow-sm border rounded bg-white mb-3">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">How to join?</h6>
                        </div>
                        <div class="box-body">
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item">Click on the Join Now Button</li>
                                <li class="list-group-item">Send a message to the charity that you are interested</li>
                                <li class="list-group-item">Wait for the response of the charity</li>
                            </ol>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade"
                        id="joinNowModal" tabindex="-1" 
                        aria-labelledby="joinNowModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Send Message</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">
                                        Message  <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control" v-model="form.message" rows="3">
                                    </textarea>
                                    <div v-if="errors.message" class="text-danger d-block">
                                        {{ errors.message }}
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" 
                                :disabled="processing"
                                @click="submit">
                                    <span v-if="! processing">
                                        Send
                                    </span>
                                    <span v-else>
                                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                        Sending...
                                    </span>
                                </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import { Modal } from 'bootstrap';

export default {
    props: {
        volunteerPost: Object,
        can: Array,
        errors: Object,
    },
    data() {
        return {
            form : {
                message: null,
                id: this.volunteerPost.id
            },
            modal: null,
            processing: false,
        }
    }, 
    mounted() {
        if(! this.can.modify) {
            this.modal = new Modal(document.getElementById('joinNowModal'), {
                keyboard: false
            });
        }
    },
    methods: {
        submit() {
            this.processing = true;
            Inertia.post(route('benefactor.sendEmail'), this.form, {
                onSuccess: () => {
                    this.modal.hide();
                    this.processing = false;
                    this.form = {
                        email: null,
                        message: null,
                        id: this.volunteerPost.id
                    }
                },
                onError: errors => {
                    this.processing = false;
                },
            });
        },
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
