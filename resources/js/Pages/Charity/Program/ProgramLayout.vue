<template>
    <div class="bg-white shadow-sm border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-center py-3">
                        <div class="profile-left">
                            <h3 class="font-weight-bold text-dark mb-1 mt-0">
								{{program.name}}
							</h3>
                            <p class="text-muted">
								A Program by
                                <Link class="text-dark"
                                    :href="$route('charity.profile.index', {
                                        'id' : program.charity.id
                                    })">
                                    <u>{{program.charity.name}}</u>
                                </Link>
							</p>
                            <p class="text-muted">
								Updated at : {{program.updated_at}}
							</p>
                        </div>
                       <div class="profile-right ms-auto" v-if="this.$page.props.can.modify">
                            <select  @change="setStatus"  v-model="status" style="width: 100px" class="form-select my-2 ms-auto" aria-label="Default select example">
                                <option value="true">Active</option>
                                <option value="false">Inactive</option>
                            </select>
                            <Link class="btn btn-success btn-lg"
                                :href="$route('charity.program.edit',
                                {id: program.id})
                            ">
                                <i class="fad fa-edit"></i>
                            </Link>
                            <Link  @click="deletePost(program.id)"
                                as="button"
                                class="btn btn-danger btn-lg ms-2" >
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
                    <div class="box shadow-sm rounded bg-white mb-3 overflow-hidden">
                        <ul class="nav border-bottom osahan-line-tab" id="myTab" role="tablist">
                            <li class="nav-item">
                                <Link class="nav-link"
                                :class="{ 'active': $page.component === 'Charity/Program/Show' }"
                                :href="$route('charity.program.show', {
                                    'id': program.id
                                })">Program Description</Link>
                            </li>
                            <li class="nav-item">
                                <Link class="nav-link"
                                :class="{ 'active': $page.component === 'Charity/Program/Supports' }"
                                :href="$route('charity.program.supporters', {
                                    'id': program.id
                                })">Supporters</Link>
                            </li>
                            <li class="nav-item">
                                <Link class="nav-link"
                                :class="{ 'active': $page.component === 'Charity/Program/Updates' }"
                                :href="$route('charity.program.updates', {
                                    'id': program.id
                                })">Updates</Link>
                            </li>
                            <li class="nav-item">
                                <Link class="nav-link"
                                :class="{ 'active': $page.component === 'Charity/Program/Gallery' }"
                                :href="$route('charity.program.gallery', {
                                    'id': program.id
                                })">Gallery</Link>
                            </li>
                            <li class="nav-item">
                                <Link class="nav-link"
                                :class="{ 'active': $page.component === 'Charity/Program/History' }"
                                :href="$route('charity.program.history', {
                                    'id': program.id
                                })">Program Changes</Link>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
						<slot />
                    </div>
                </main>
                <aside class="col col-xl-4 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
                    <div v-if="this.$page.props.can.modify">
                        <a :href="$route('charity.program.report', {
                            'id': program.id
                        })" class="btn btn-block btn-lg btn-primary w-100 mb-3">
                            Download Report
                            <i class="fad fa-download ms-2"></i>
                        </a>
                         <button type="button" class="btn btn-block btn-lg btn-warning w-100 mb-3" 
                            data-bs-toggle="modal" data-bs-target="#withdrawModal">
                            Withdraw Request 
                        </button>
                    </div>
                    <div class="box shadow-sm border rounded bg-white mb-3">
                        <div class="box-title border-bottom p-3 mt-2">
                            <h6 class="m-0">Donations</h6>
                        </div>
                        <div class="box-body p-3">
                            <div class="progress">
                            <div class="progress-bar" role="progressbar"
                                :style="{ width: donationPercentage + '%' }"
                                :aria-valuenow="donationPercentage" aria-valuemin="0" aria-valuemax="100">
                                    {{ donationPercentage }} %
                            </div>
                            </div>
                            <div>
                                <h3 class="mx-auto nmb-1">
                                    {{ formatNumber(stats.total_donation.toFixed(2))}}
                                </h3>
                                <p class="">funded out of
                                    <span class="fa-1x text-gray-300">₱</span>
                                    {{ formatNumber(program.total_needed_amount)}}
                                </p>
                            </div>
                            <div>
                                <h5>
                                  <span class="fa-1x">₱</span>
                                    {{ formatNumber(program.total_withdrawn_amount)}}
                                </h5>
                                <p class="text-muted">Withdrawn Money</p>
                            </div>
                            <div>
                                <h5>{{stats.total_donors}}</h5>
                                <p class="text-muted">Total Donors</p>
                            </div>
                            <div>
                                <h5 class="text-truncate">{{program.charity.eth_address}}</h5>
                                <div class="d-flex">
                                    <p clas s="text-muted">ETH Address</p>

                                    <i class="fad fa-info-circle mt-1 ms-2 text-primary"
                                    title="This is a special account for charities to conduct blockchain transaction"></i>
                                </div>
                                <p class="fw-light"><small>What is a blockchain, and other questions. Learn more about our <a href="#" class="text-decoration-underline">transparency blockchain program</a></small></p>
                            </div>
                            <Link class="btn btn-block btn-lg btn-primary w-100 mt-5"
                                v-if="$page.props.auth.user.roleID == 4 && program.is_active"
                                :href="$route('charity.donate.create', {
                                    'id': $page.props.program.id
                             })">
                                <i class="feather-plus"></i>
                                Donate Now!
                            </Link>
                        </div>
                    </div>
                </aside>
                <div class="modal fade"
                    id="withdrawModal" tabindex="-1" 
                    aria-labelledby="withdrawModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Withdraw Request</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <div v-if="program.has_withdraw_request">
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">
                                            Amount  <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control" :value="program.withdraw_request_amount" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Message</label>
                                        <textarea class="form-control" :value="program.withdraw_message" rows="4" cols="50" disabled></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">G-CASH</label>
                                        <input class="form-control" :value="program.gcash" disabled />
                                    </div>
                                    <p><small>You still have an ongoing withdraw request.</small></p>
                                </div>
                                <div v-else>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Amount</label>
                                        <input type="number" class="form-control" v-model="form.amount">
                                        <span v-if="form.errors.amount" v-text="form.errors.amount"
                                            class="invalid-feedback d-block" role="alert">
                                        </span>
                                    </div>
                                     <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Message</label>
                                        <textarea class="form-control" v-model="form.message" rows="4" cols="50"> </textarea>
                                        <span v-if="form.errors.message" v-text="form.errors.message"
                                            class="invalid-feedback d-block" role="alert">
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">G-CASH</label>
                                        <input class="form-control" v-model="form.gcash" />
                                        <span v-if="form.errors.gcash" v-text="form.errors.gcash"
                                            class="invalid-feedback d-block" role="alert">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                             <Button v-if="program.has_withdraw_request" @click="cancelRequest($page.props.program.id)" method="post" as="button" type="button" class="btn btn-danger">
                                Cancel Request
                            </Button>
                            <Button v-else @click="withdrawRequest($page.props.program.id)"
                                method="post" as="button" type="button"
                                class="btn btn-primary">
                                    Send Withdraw Request
                            </Button>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from '@inertiajs/inertia';
import Swal from 'sweetalert2';
import { Modal } from 'bootstrap';

export default {
    props: ['program'],
    setup() {
        let form = useForm({
            amount: null,
            message: null,
            gcash: null,
        })

        return { form };
    },
    data () {
        return {
            stats: this.$page.props.stats,
            status: this.program.is_active,
            modal: null,
        }
    },
    computed: {
        donationPercentage() {
            var percentage = Math.round(
                (this.stats.total_donation / this.program.total_needed_amount) * 100
            );

            return (percentage >= 100) ? '100' : percentage ;
        },
    },
    mounted() {
        if(this.$page.props.can.modify) {
            this.modal = new Modal(document.getElementById('withdrawModal'), {
                keyboard: false
            });
        }
    },
    methods: {
        formatNumber(number) {
            return (number == null) ? 0 : number.toLocaleString();
        },
        setStatus(e) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change it!'
            }).then((result) => {
                if (! result.isConfirmed) {
                    this.status = this.program.is_active;
                    return; 
                }  

                Inertia.put(route('charity.program.status', {
                        'id' : this.program.id  
                    }), {
                        'status' : e.target.value
                    } ,{
                        onSuccess: () => {
                            Swal.fire(
                                'Updated!',
                            )
                        },
                    });
            })

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
                    Inertia.delete(route('charity.program.destroy', {
                        id: id
                    }), {
                        onSuccess: () => {
                            this.$swal.fire(
                                'Deleted!',
                                'Your program has been deleted.',
                                'success'
                            );
                        },
                    });
                }
            })
        },
        withdrawRequest (id) {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, sent it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.form.post(route('charity.program.withdraw-request', {
                        'id' : id
                    }), {
                        onSuccess: () => {
                            this.modal.hide();

                            Swal.fire(
                                'Sent!',
                                'Your withdraw request has been sent.',
                                'success'
                            )
                        },
                    });
                }
            })
        }, 
        cancelRequest (id) {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancel it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Inertia.post(route('charity.program.withdraw-request.cancel', {
                        'id' : id
                    }), {} ,{
                        onSuccess: () => {
                            Swal.fire(
                                'Sent!',
                                'Your withdraw request has been cancelled.',
                                'success'
                            );
                        },
                    });
                }
            })
        }
    }
}
</script>
