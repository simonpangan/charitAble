<template>
     <div class="profile-cover text-center">
        <!-- <img class="img-fluid" height="50%" src="https://images.unsplash.com/photo-1593113598332-cd288d649433?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt=""> -->
    </div>	
    <div class="bg-white shadow-sm border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-center py-3">
                        <div class="profile-left">
                            <h3 class="font-weight-bold text-dark mb-1 mt-0"> 
								{{$page.props.program.name}}
							</h3>
                            <p class="mb-0 text-muted"> 
								A Program by {{$page.props.program.charity.name}}
							</p>
                        </div>
                        <div class="profile-right ms-auto">
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
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Program Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Supporters</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="type-tab" data-bs-toggle="tab" href="#type" role="tab" aria-controls="type" aria-selected="false">Program History</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
						<slot />
                    </div>
                </main>
                <aside class="col col-xl-4 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="box shadow-sm border rounded bg-white mb-3">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Donations</h6>
                        </div>
                        <div class="box-body p-3">
                            <div class="progress">
                                <!-- donationPercentage -->
                                <div class="progress-bar" role="progressbar" 
                                    :style="{ width: donationPercentage + '%' }"
                                    :aria-valuenow="donationPercentage" aria-valuemin="0" aria-valuemax="100">
                                        {{ donationPercentage }} %
                                    </div>
                            </div>
                            <div>
                                <h3 class="mx-auto nmb-1">{{$page.props.program.total_donation_amount}}</h3>
                                <p class="">funded out of {{$page.props.program.total_needed_amount}}</p>
                            </div>
                            <div>
                                <h5>43</h5>
                                <p class="text-muted">Total Donors</p>
                            </div>
                            <!-- <Link :href="$route('benefactor.donate.create', { -->
                                <!-- 'id': program.id -->
                            <!-- })"><button type="button" class="btn btn-block btn-lg btn-primary w-100 mt-5"> <i class="feather-plus"></i> Donate Now! </button></Link> -->
                        </div>
                    </div>
                    <div class="box shadow-sm border rounded bg-white mb-3">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Recent Donations</h6>
                        </div>
                        <div class="box-body p-3">
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p4.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">10,000 Pesos</div>
                                    <div class="small text-gray-500">@Harvard
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p9.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">200 Pesos</div>
                                    <div class="small text-gray-500">Traveler
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p10.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">5000 Pesos</div>
                                    <div class="small text-gray-500">Art Designer
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p11.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">20,000 Pesos</div>
                                    <div class="small text-gray-500">@Photography
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center osahan-post-header people-list">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="img/p12.png" alt="">
                                </div>
                                <div class="font-weight-bold me-2">
                                    <div class="text-truncate">350 Pesos</div>
                                    <div class="small text-gray-500">@Envato
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box shadow-sm mb-3 border rounded bg-white ads-box text-center">
                        <img src="img/ads1.png" class="img-fluid" alt="Responsive image">
                        <div class="p-3 border-bottom">
                            <h6 class="font-weight-bold text-gold">Osahanin Premium</h6>
                            <p class="mb-0 text-muted">Grow &amp; nurture your network</p>
                        </div>
                        <div class="p-3">
                            <button type="button" class="btn btn-outline-gold pl-4 pr-4"> ACTIVATE </button>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</template>

<script>
import { computed } from 'vue'

export default {
    props: ['program'],
    computed: {
        donationPercentage() {
            return Math.round((this.$page.props.program.total_donation_amount / this.$page.props.program.total_needed_amount) * 100) ;
        }
    }
}
</script>


