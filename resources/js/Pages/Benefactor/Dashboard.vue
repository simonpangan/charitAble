<template>
  <Head title="Dashboard" />
  <div class="container mt-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <div class="d-block">
        <button 
            class="d-block btn btn-sm btn-primary shadow-sm mx-auto"
            @click="download(this)"
            :disabled="! canDownload"
          >
          <i class="fas fa-download fa-sm text-white-50"></i> Generate Report 
        </button>  
        <small class="form-text text-muted">You can only download every 5 minutes.</small>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card x x-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="
                    text-xs
                    font-weight-bold
                    text-primary text-uppercase
                    mb-1
                  "> Total Donation </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ benefactor.total_donation }}
                </div>
              </div>
              <div class="col-auto">
                <span class="fa-2x text-gray-300">₱</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="
                    text-xs
                    font-weight-bold
                    text-success text-uppercase
                    mb-1
                  "> # Charities donated </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  {{ benefactor.total_charities_donated }}
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> Following Charity </div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                      {{ benefactor.total_charities_followed }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-hand-holding-heart fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="
                    text-xs
                    font-weight-bold
                    text-warning text-uppercase
                    mb-1
                  "> # times donated </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  {{ benefactor.total_number_donations }}
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-hand-heart fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br />
    <br />
    <br />
    <br />
    <div class="container mt-n10">
      <div class="row">
        <div class="col">
          <div class="card mb-4">
          <div class="card-header h4">Your Donations History</div>
          <div class="card-body">
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
              <div class="dataTable-top">
              </div>
              <div class="dataTable-container">
                <card id="datatablesSimple" class="dataTable-table">
                  <thead>
                    <tr style="width: 100%">
                      <th style="width: 10%;" class="text-center">
                        #
                      </th>
                      <th style="width: 20%;" class="text-center">
                        Program Name
                      </th>
                      <th style="width: 20%;" class="text-center">
                        Amount
                      </th>
                      <th style="width: 30%;" class="text-center">
                        Donated At 
                      </th>
                    </tr>
                  </thead>
                  <tbody>
     
                    <tr v-for="(donation, index) in programDonations.data" :key="index">
                      <td class="text-center">{{ programDonations.from + index }}</td>
                      <td>{{ donation.name }}</td>
                      <td>{{ donation.amount }}</td>
                      <td>{{ donation.pivot.donated_at_formatted }}</td>
                    </tr>
                    <tr v-if="programDonations.data.length == 0">
                      <td class="dataTables-empty" colspan="4" width="1300">
                        No results
                      </td>
                    </tr>
                  </tbody>
                </card>
              </div>
              <div class="dataTable-bottom mt-3">
                <div class="dataTable-info">
                  Showing {{ programDonations.from }} to {{ programDonations.to }} 
                  of {{ programDonations.total }} entries
                </div>
                <nav class="dataTable-pagination">
                  <ul class="dataTable-pagination-list">
                    <li v-for="(link, index) in programDonations.links" :key=index 
                      :class="[
                        link.active ? 'active' : '',
                        link.url ? 'pager' : '',
                    ]"> 
                      <Component 
                        :is="link.url ? 'Link' : 'span'"
                        v-if="link.url" 
                        :href="link.url" 
                        v-html="link.label"
                        :only="['programDonations']"
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
        <div class="col">
          <div class="card mb-4">
          <div class="card-header h4">Charities You have donated</div>
          <div class="card-body">
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
              <div class="dataTable-top">
              </div>
              <div class="dataTable-container">
                <card id="datatablesSimple" class="dataTable-table">
                  <thead>
                    <tr style="width: 100%">
                      <th style="width: 10%;" class="text-center">
                        #
                      </th>
                      <th style="width: 20%;" class="text-center">
                        Charity Name
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(charity, index) in charities.data" :key="index">
                      <td class="text-center">{{ charities.from + index }}</td>
                      <td>{{ charity.name }}</td>
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
                        :only="['charities']"
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
      </div>
    </div>
  </div>
</template>

<script setup>
import axios from 'axios'
import NProgress from 'nprogress'
import { Inertia } from '@inertiajs/inertia';
import { ref } from 'vue';

  let props = defineProps({
    benefactor: Object,
    programDonations: Object,
    charities: Array,
    canDownload: Boolean,
  });

  let isDownloading = ref(false);

  let download = () => {

    if (isDownloading.value) 
    {
      return;
    }
    
    isDownloading.value = true;

    NProgress.start();
    
    axios({
      url: route('benefactor.report.redirect'),
      method: 'GET',
      responseType: 'blob',
    }).then((response) => {
      const url = window.URL.createObjectURL(new Blob([response.data]));
      const link = document.createElement('a');
      link.href = url;
      link.setAttribute('download', 'report.pdf');
      document.body.appendChild(link);
      link.click();
      
      NProgress.done();

      Inertia.visit(route('benefactor.dashboard.index'), {}, { only: ['canDownload'] });

    });

  }
</script>

<script> 
import  '../../../../public/css/datatable.css'; 
</script>