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
                        <div v-if="program.has_withdraw_request">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" placeholder="Amount" 
                                    :value="program.withdraw_request_amount"
                                    disabled>
                                <Button @click="cancelRequest($page.props.program.id)"
                                    method="post" as="button" type="button"
                                    class="btn btn-danger">
                                        Cancel Request
                                </Button>
                                <span v-if="form.errors.amount" v-text="form.errors.amount"
                                    class="invalid-feedback d-block" role="alert">
                                </span>
                            </div>
                            <p><small>You still have an ongoing withdraw request.</small></p>
                        </div>
                        <div class="input-group mb-3" v-else>
                            <input type="number" class="form-control" placeholder="Amount" v-model="form.amount">
                            <Button @click="withdrawRequest($page.props.program.id)"
                                method="post" as="button" type="button"
                                class="btn btn-secondary">
                                    Send Withdraw Request
                            </Button>
                            <span v-if="form.errors.amount" v-text="form.errors.amount"
                                class="invalid-feedback d-block" role="alert">
                            </span>
                        </div>
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
                                   {{stats.total_donation.toLocaleString()}}
                                </h3>
                                <p class="">funded out of 
                                    <span class="fa-1x text-gray-300">₱</span>
                                    {{program.total_needed_amount.toLocaleString()}}
                                </p>
                            </div>
                            <div>
                                <h5>
                                  <span class="fa-1x">₱</span>
                                    {{program.total_withdrawn_amount.toLocaleString()}}
                                </h5>
                                <p class="text-muted">Withdrawn Money</p>
                            </div>
                            <div>
                                <h5>{{stats.total_donors}}</h5>
                                <p class="text-muted">Total Donors</p>
                            </div>
                            <div>
                                <h5>{{$page.props.program.charity.eth_address}}</h5>
                                <p clas s="text-muted">ETH Address</p>
                            </div>
                            <Link class="btn btn-block btn-lg btn-primary w-100 mt-5"
                                v-if="$page.props.auth.user.roleID == 4"
                                :href="$route('charity.donate.create', {
                                    'id': $page.props.program.id
                             })">
                                <i class="feather-plus"></i> 
                                Donate Now! 
                            </Link>
                        </div>
                    </div>
                    <div v-if="$page.props.program.header != null" class="box shadow-sm border rounded bg-white mb-3">
                        <div class="box-body p-3">
                            <!-- <img class="img-fluid" :src="$page.props.program.header" alt="Program Header"> -->
                            <div id="carouselExampleControls" class="carousel slide carousel-dark" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                    <img src="https://sebhastian.com/javascript-format-number-commas/javascript-format-number-commas.webp?ezimgfmt=ng%3Awebp%2Fngcb9%2Frs%3Adevice%2Frscb9-1" 
                                    class="d-block w-100 img-fluid" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                    <img src="https://news.tulane.edu/sites/default/files/021717_nba-allstar-clinic_6825_800_rr.jpg" 
                                    class="d-block w-100 img-fluid" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                    <img src="https://cdn.nba.com/manage/2021/06/Bembry_nbacares-784x523.jpg" 
                                    class="d-block w-100 img-fluid" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from '@inertiajs/inertia';
import Swal from 'sweetalert2';

let form = useForm({
    amount: null,
})

let withdrawRequest = (id) => {
     Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, sent it!'
    }).then((result) => {
        if (result.isConfirmed) {
            form.post(route('charity.program.withdraw-request', {
                'id' : id
            }), {
                onSuccess: () => {
                    Swal.fire(
                        'Sent!',
                        'Your withdraw request has been sent.',
                        'success'
                    )
                },
            }); 
        }
    })
};

let cancelRequest = (id) => {
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
                    )
                },
            }); 
        }
    })
}
</script>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
    data () {
        return {
            program: this.$page.props.program,        
            stats: this.$page.props.stats,        
        }
    },
    computed: {
        donationPercentage() {
            // var percentage = Math.round((this.$page.props.stats.total_donation / program..total_needed_amount) * 100);
            // return (percentage >= 100) ? '100' : percentage ;
            return 1;
        },     
    },
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
                    Inertia.delete(route('charity.program.destroy', {
                        id: id 
                    }), {
                        onSuccess: () => {
                            this.$swal.fire(
                                'Deleted!',
                                'Your program has been deleted.',
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