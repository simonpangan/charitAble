<template>
    <Head title="logs" />
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
                  Your Logs
                </h1>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- Main page content-->
      <div class="container-xl px-4 mt-n10">
        <div class="card mb-4 mx-auto" style="max-width: 900px">
          <div class="card-body">
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
              <div class="dataTable-top">
                <div class="dataTable-dropdown">
                  <label>
                    <select v-model="entries" class="dataTable-selector">
                      <option value="10" selected>10</option>
                      <option value="20">20</option>
                      <option value="50">50</option>
                      <option value="70">70</option>
                      <option value="100">100</option>
                    </select> entries per page 
                  </label>
                </div>
                <div class="dataTable-search row mt-2">
                    <div class="col-auto">
                      <div class="input-group">
                        <span class="input-group-text" id="inputGroup-sizing-default">From</span>
                        <input type="datetime-local" v-model="from" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                      </div>
                      <span v-if="errors.from" v-text="errors.from"
                          class="invalid-feedback text-center d-block" role="alert">
                      </span>
                    </div>
                    <div class="col-auto">
                      <div class="input-group">
                        <span class="input-group-text" id="inputGroup-sizing-default">To</span>
                        <input type="datetime-local" v-model="to" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                      </div>
                      <span v-if="errors.to" v-text="errors.to"
                          class="invalid-feedback text-center d-block" role="alert">
                      </span>
                    </div>
                     <div class="col-auto">
                      <Link :href="$route('charity.logs.index')" 
                        method="get" 
                        :data="{from: from, to: to}"
                        class="btn btn-primary"
                      >
                        <i class="fad fa-search"></i>
                      </Link>
                      <Link :href="$route('charity.logs.index')" 
                        method="get" 
                        class="ms-2 btn btn-light"
                        v-if="! defaultURL"
                      >
                        Show all
                      </Link>
                    </div>
                </div>
              </div>
              <div class="dataTable-container">
                <card id="datatablesSimple" class="dataTable-table">
                  <thead>
                    <tr style="width: 100%">
                      <th style="width: 10%;" class="text-center">
                        #
                      </th>
                      <th style="width: 60%;" class="text-center">
                        Activity
                      </th>
                      <th style="width: 20%;" class="text-center"
                        :class="(sort == 'asc') ? 'asc' : 'desc'"
                      >
                        <Link :href="$route('charity.logs.index', {
                          'order' : 'timestamp',
                          'sort' : (sort == 'asc') ? 'desc' : 'asc',
                           from: from,
                           to: to
                          })" class="dataTable-sorter">
                          Timestamp
                        </Link>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(log, index) in logs.data" :key="index">
                      <td class="text-center">{{ logs.from + index }}</td>
                      <td>{{ log.activity }}</td>
                      <td>{{ log.created_at }}</td>
                    </tr>
                    <tr v-if="logs.data.length == 0">
                      <td class="dataTables-empty" colspan="3" width="1300">
                        No results match your search query
                      </td>
                    </tr>
                  </tbody>
                </card>
              </div>
              <div class="dataTable-bottom mt-3">
                <div class="dataTable-info">
                  Showing {{ logs.from }} to {{ logs.to }} 
                  of {{ logs.total }} entries
                </div>
                <nav class="dataTable-pagination">
                  <ul class="dataTable-pagination-list">
                    <li v-for="(link, index) in logs.links" :key=index 
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
import { ref, watch, computed } from 'vue';
import { Inertia } from '@inertiajs/inertia';

let props = defineProps({
  logs: Object,
  filters: Object,
  errors: Object
})

let from = ref(props.filters.from);
let to = ref(props.filters.to);
let entries = ref(props.filters.entries);
let sort =  ref(props.filters.sort);


const defaultURL = computed(() => {
  return Object.keys(route().params).length === 0
})


watch(entries, (value) => {
  const routeIsEmpty = Object.keys(route().params).length === 0;
  const routeHaveAtleastOneAndIsEntries = 
    route().params['entries'] && Object.keys(route().params).length === 1;
  
  if (routeIsEmpty || routeHaveAtleastOneAndIsEntries) {
     Inertia.get(
      route('charity.logs.index'), { 
        entries: value, 
      }, {
        preserveState: true,
        replace: true
      }
    ); 

    return;
  }

   if ((route().params['entries'] && route().params['page']) || route().params['page']) {
     Inertia.get(
      route('charity.logs.index'), { 
        entries: value, 
      }, {
        preserveState: true,
        replace: true
      }
    ); 

    return;
  }


  if (route().params['order'] && route().params['sort']) {
    Inertia.get(
      route('charity.logs.index'), { 
        sort: sort.value, order: 'timestamp', entries: value, 
      }, 
      {
        preserveState: true,
        replace: true
      }
    );

    return;
  }

  if(route().params['from'] && route().params['to'] || (route().params['from'])) {
    Inertia.get(
      route('charity.logs.index'), { 
          from: from.value, to: to.value, entries: value 
        }, {
        preserveState: true,  
        replace: true
      }
    );

    return;
  }
 
});
</script>

<script> 
  import  '../../../../public/css/datatable.css'; 
</script>