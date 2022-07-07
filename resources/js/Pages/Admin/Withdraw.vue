<template>
    <Head title="Withdraw Request" />
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
                  Program Withdraw Request
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
              <div class="dataTable-container">
                <card id="datatablesSimple" class="dataTable-table">
                  <thead>
                  <tr>
                      <th width="10%" class="text-center">
                        #
                      </th>
                      <th width="20%" class="text-center">
                        Name
                      </th>
                      <th width="10%" class="text-center">
                       Amount
                      </th>
                      <th width="20%" class="text-center">
                        Request Date
                      </th>
                      <th width="10%" class="text-center">
                          Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(program, index) in programs.data" :key="index">
                      <td class="text-center">{{ programs.from + index }}</td>
                      <td>{{ program.name }}</td>
                      <td>{{ program.withdraw_request_amount }}</td>
                      <td>{{ program.withdraw_requested_at }}</td>
                       <td class="d-flex justify-content-evenly">
                        <Button class="btn btn-primary"
                          :data="{ id: program.id }" 
                          type="button"
                          title="Approve Withdraw Request"
                          v-on:click.prevent="approveWithdraw(program.id)">
                          <i class="fas fa-badge-check"></i>
                        </Button>
                        <a class="btn btn-info d-inline"  title="Download Charity Documents" :href="$route('admin.home.download', {
                          'id': program.charity_id
                        })">
                          <i class="fad fa-download"></i>
                        </a>
                        <Link class="btn btn-light"
                          :href="$route('charity.program.show', {
                              id: program.id
                          })" title="Look Up Program">
                            <i class="far fa-search"></i>
                        </Link>
                      </td>
                    </tr>
                    <tr v-if="programs.data.length == 0">
                      <td class="dataTables-empty" colspan="5" width="1300">
                        No results match your search query
                      </td>
                    </tr>
                  </tbody>
                </card>
              </div>
              <div class="dataTable-bottom mt-3">
                <div class="dataTable-info">
                  Showing {{ programs.from }} to {{ programs.to }} 
                  of {{ programs.total }} entries
                </div>
                <nav class="dataTable-pagination">
                  <ul class="dataTable-pagination-list">
                    <li v-for="(link, index) in programs.links" :key=index 
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
import { Inertia } from '@inertiajs/inertia';


let props = defineProps({
  programs: Object,
})

let approveWithdraw = (id) => {
  Inertia.get(
    route('admin.withdraw.approve'), { 
      id: id 
    },
  );
}

</script>

<script> 
  import  '../../../../public/css/datatable.css'; 
</script>