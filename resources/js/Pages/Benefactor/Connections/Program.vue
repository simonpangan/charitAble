<template>
  <div class="py-4">
    <div class="container">
      <div class="row">
        <main class="col col-xl-9 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
          <div class="box shadow-sm border rounded bg-white mb-3 osahan-share-post ">
            <ConnectionsNavLinks v-bind:search="props.name" @search="searchPost" />
            <select style="width: 250px"
                  v-model="status" class="form-select my-2 ms-auto" aria-label="Default select example">
                  <option value="All">Status</option>
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
              </select>
             <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="p-3">
                  <div class="row">
                    <div v-for="program in programs.data" :key="program.id" class="col-md-6">
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
        </main>
        <aside class="col col-xl-3 order-xl-2 col-lg-12 order-lg-2 col-12">
            <div class="box mb-3 shadow-sm border rounded bg-white list-sidebar">
                <div class="box-title p-3">
                  <h6 class="m-0">My connections based on category</h6>
                  <small class="text-center text-muted">
                    Click text below if you want to sort.
                  </small>
                  </div>
                  <ul class="list-group list-group-flush">
                      <template v-for="(total, name, index) in charityFollowingProgramCategoryStats" :key="index">
                          <li style="cursor: pointer"
                              @click="category = name.replaceAll('_', ' ')" class="list-group-item ps-3 pe-3 d-flex align-items-center text-dark">
                              {{ name.replaceAll('_', ' ') }}
                              <span class="ms-auto fw-bold">{{ total }}</span>
                          </li>
                      </template>
                  </ul>
              </div>
        </aside>
      </div>
    </div>
  </div>
</template>

<script setup>
  import ConnectionsNavLinks from './ConnectionsNavLinks.vue';
  import { ref, watch } from 'vue';

  import {
    Inertia
  } from '@inertiajs/inertia';


  let props = defineProps({
    name: String,
    programs: Array,
    filters : Array,
    charityFollowingProgramCategoryStats: Object,
  });

  let status = ref(props.filters.status);
  let category = ref(props.filters.category);

  watch(status, (value) => {
    Inertia.get(
      route('benefactor.connections.program.index'), {
        'status' : value,
        'category' : category.value
      }
    ); 
  });

  watch(category, (value) => {
  Inertia.get(
    route('benefactor.connections.program.index'), {
        'status' : status.value,
        'category' : value
      }, {
        preserveState: true,
        replace: true,
        only: ['programs'],
      }
    ); 
  });

  let searchPost = (value) => {
    Inertia.get(
      route('benefactor.connections.program.index'), { 
        name: value, 
      }, {
        preserveState: true,
        replace: true,
        only: ['programs'],
      }
    );
  }
</script>