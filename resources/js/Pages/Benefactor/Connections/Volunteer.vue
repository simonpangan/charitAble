<template>
  <div class="py-4">
    <div class="container">
      <div class="row">
        <main class="col col-xl-9 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
          <div class="box shadow-sm border rounded bg-white mb-3 osahan-share-post ">
            <ConnectionsNavLinks />
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="p-3">
                  <div class="row">
                    <div v-for="post in followingCharitiesVolunteerPost" :key="post.id" class="col-md-6">
                      <a href="job-profile.html">
                        <div class="border job-item mb-3">
                          <div class="d-flex align-items-center p-3 job-item-header">
                            <div class="overflow-hidden mr-2">
                              <h6 class="font-weight-bold text-dark mb-0 text-truncate">{{ post.name }}</h6>
                              <div class="text-truncate text-primary">Envato</div>
                              <div class="small text-gray-500">
                                <i class="feather-map-pin"></i> India, Punjab
                              </div>
                            </div>
                            <img class="img-fluid ml-auto" src="img/l1.png" alt="">
                          </div>
                          <div class="p-3 job-item-footer">
                            <small class="text-gray-500">
                              <i class="feather-clock"></i> Posted 3 Days ago </small>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
        <aside class="col col-xl-3 order-xl-2 col-lg-12 order-lg-2 col-12">
          <div class="box mb-3 shadow-sm border rounded bg-white list-sidebar">
            <div class="box-title p-3">
              <h6 class="m-0">My connections based on category</h6>
              <small class="text-center text-muted"> Click text below if you want to sort. </small>
            </div>
            <ul class="list-group list-group-flush">
              <Link v-for="(total, name, index) in charityFollowingCategoryNumber" :key="index" 
                :href="$route('benefactor.connections.volunteer.index', {
                    category: name.replaceAll('_', ' ')
                })" :only="['followingCharitiesVolunteerPost']">
                <li class="list-group-item ps-3 pe-3 d-flex align-items-center text-dark">
                    {{ name.replaceAll('_', ' ') }}
                    <span class="ms-auto fw-bold">{{ total }}</span>
                </li>
              </Link>
            </ul>
          </div>
          <div class="box shadow-sm mb-3 border rounded bg-white ads-box text-center">
            <div class="image-overlap-2 pt-4">
              <img src="img/l4.png" class="img-fluid rounded-circle shadow-sm" alt="Responsive image">
              <img src="img/user.png" class="img-fluid rounded-circle shadow-sm" alt="Responsive image">
            </div>
            <div class="p-3 border-bottom">
              <h6 class="text-dark">Gurdeep, grow your career by following <span class="fw-bold"> Askbootsrap</span>
              </h6>
              <p class="mb-0 text-muted">Stay up-to industry trends!</p>
            </div>
            <div class="p-3">
              <button type="button" class="btn btn-outline-primary btn-sm ps-4 pe-4"> FOLLOW </button>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>
</template>

<script setup>
  import ConnectionsNavLinks from './ConnectionsNavLinks.vue';
  import {
    ref,
    watch,
    computed
  } from 'vue';
  import {
    Inertia
  } from '@inertiajs/inertia';

  import debounce from 'lodash/debounce';

  let search = ref(props.search);

  let props = defineProps({
    search: String,
    charityFollowingCategoryNumber: Object,
    followingCharitiesVolunteerPost: Array,
  });

  watch(search, debounce((value) => {
    Inertia.get(route('benefactor.connections.charities.index'), {
      name: value,
    }, {
      preserveState: true,
      replace: true
    });
  }, 300));
</script>