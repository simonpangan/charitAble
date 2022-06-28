<template>
    <main>
      <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
          <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
              <div class="col-auto mt-4">
                <h1 class="page-header-title">
                  <div class="page-header-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter">
                      <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                    </svg>
                  </div> 
                  Charities
                </h1>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- Main page content-->
      <div class="container-xl px-4 mt-n10">
        <div class="card mb-4">
          <div class="card-body">
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
             <div class="dataTable-top">
                <div class="dataTable-search">
                  <input type="text" class="form-control mt-2" v-model="search" placeholder="Search" />                
                </div>
              </div>
              <div class="dataTable-container">
                <card id="datatablesSimple" class="dataTable-table">
                  <thead>
                    <tr>
                      <th width="10%" class="text-center">
                        #
                      </th>
                      <th width="30%" class="text-center">
                        Name
                      </th>
                      <th width="20%" class="text-center"
                        :class="(sort == 'asc') ? 'asc' : 'desc'"
                      >
                        <Link :href="$route('admin.home.index', {
                          'sort' : (sort == 'asc') ? 'desc' : 'asc',
                          })" class="dataTable-sorter">
                          Created At
                        </Link>
                      </th>
                    <th width="10%" class="text-center"
                        :class="(status == 'pending') ? 'asc' : 'desc'">
                        <Link :href="$route('admin.home.index', {
                          'status' : (status == 'pending') ? 'approved' : 'pending',
                          })" class="dataTable-sorter">
                          Status
                        </Link>
                    </th>
                    <th width="10%" class="text-center">
                        Action
                    </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(charity, index) in charities.data" :key="index">
                      <td class="text-center">{{ charities.from + index }}</td>
                      <td>{{ charity.name }}</td>
                      <td>{{ charity.created_at }}</td>
                       <td class="text-center">
                         <div v-if="charity.charity_verified_at" 
                          class="badge bg-success text-white rounded-pill">Approve</div>
                          <div v-else class="badge bg-warning rounded-pill">Pending</div>
                      </td>
                       <td class="d-flex justify-content-evenly">
                        <Link class="btn btn-danger" v-if="charity.charity_verified_at"
                           :href="$route('admin.approval.disapprove')" 
                           method="post" 
                           :data="{ id: charity.id }" 
                           as="button" type="button">
                           <i class="fas fa-times-circle"></i>
                        </Link>
                        <Link class="btn btn-primary" v-else 
                          :href="$route('admin.approval.approve')" 
                           :data="{ id: charity.id }" 
                          method="post" as="button" type="button">
                          <i class="fas fa-badge-check"></i>
                        </Link>
                        <Link class="btn btn-info d-inline" :href="$route('admin.home.show', {
                          'id': charity.id
                        })">
                          <i class="fad fa-download"></i>
                        </Link>
                      </td>
                    </tr>
                    <tr v-if="charities.data.length == 0">
                      <td class="dataTables-empty" colspan="3" width="1300">
                        No results match your search query
                      </td>
                    </tr>
                  </tbody>
                </card>
              </div>
              <div class="dataTable-bottom mt-3">
                <div class="dataTable-info">
                  Showing {{ charities.from }} to {{ charities.to }} 
                  of {{ charities.total }} entries
                </div>
                <nav class="dataTable-pagination">
                  <ul class="dataTable-pagination-list">
                    <li v-for="(link, index) in charities.links" :key=index 
                      :class="[
                        link.active ? 'active' : '',
                        link.url ? 'pager' : '',
                    ]"> 
                      <Component 
                        :is="link.url ? 'Link' : 'span'"
                        v-if="link.url" 
                        :href="link.url" 
                        v-html="link.label"
                      >
                      </Component>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
</template>

<script setup>
import debounce from 'lodash/debounce';
import {
    ref,
    watch,
  } from 'vue';

import {Inertia} from '@inertiajs/inertia';

let props = defineProps({
  charities: Object,
  filters: Array
})

let search = ref(props.filters.search);
let sort = ref(props.filters.sort);
let status = ref(props.filters.status);

watch(search, debounce((value) => {
    Inertia.get(
      route('admin.home.index'), { 
          name: value, 
          }, {
          preserveState: true,
          replace: true
      }
    );
}, 300));

</script>

<script> 
  import  '../../../../public/css/datatable.css'; 
</script>