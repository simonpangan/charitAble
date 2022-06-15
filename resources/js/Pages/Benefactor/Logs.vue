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
                  User Logs
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
                <div class="dataTable-search">
                  <input v-model="search" class="dataTable-input" placeholder="Search..." type="text">
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
                        <Link :href="$route('benefactor.logs.index', {
                          'order' : 'timestamp',
                          'sort' : (sort == 'asc') ? 'desc' : 'asc' 
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
import { ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import debounce from 'lodash/debounce';

let props = defineProps({
  logs: Object,
  filters: Object
})

let search = ref(props.filters.search);
let entries = ref(props.filters.entries);
let sort =  ref(props.filters.sort);


watch(search, debounce((value) => {
  Inertia.get(
    route('benefactor.logs.index'), { search: value, entries: entries.value }, {
      preserveState: true,
      replace: true
    }
  );
}, 300));


watch(entries, (value) => {
  const routeIsEmpty = Object.keys(route().params).length === 0;
  const routeHaveAtleastOneAndIsEntries = 
    route().params['entries'] && Object.keys(route().params).length === 1;
  
  if (routeIsEmpty || routeHaveAtleastOneAndIsEntries) {
     Inertia.get(
      route('benefactor.logs.index'), { 
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
      route('benefactor.logs.index'), { 
        sort: sort.value, order: 'timestamp', entries: value, 
      }, 
      {
        preserveState: true,
        replace: true
      }
    );

    return;
  }

  if(route().params['search']) {
    Inertia.get(
      route('benefactor.logs.index'), { 
          search: search.value, entries: value 
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