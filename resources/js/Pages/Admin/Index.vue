<template>
    <Head title="Home" />
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
                <div class="mt-2">
                  <input type="text" class="form-control" v-model="search" placeholder="Search" />                
                  <div v-if="props.errors.download" class="mt-4">
                    <span  role="alert" class="alert alert-danger">
                      {{ props.errors.download }}
                    </span>
                  </div>
                </div>
              </div>
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
                      <th width="20%" class="text-center">
                          Permits
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
                      <td class="text-center">{{ charity.created_at }}</td>
                       <td class="text-center">
                         <div v-if="charity.charity_verified_at" 
                          class="badge bg-success text-white rounded-pill">Approve</div>
                          <div v-else class="badge bg-warning rounded-pill">Pending</div>
                      </td>
                      <td>
                          <input type="email" class="form-control" 
                          :value="charity.permits"  v-on:keyup.enter="savePermit($event, charity.id)">
                          <small class="form-text text-muted d-block">Press enter key to save.</small>
                      </td>
                       <td class="d-flex justify-content-evenly">
                        <template  v-if="charity.charity_verified_at">
                          <button class="btn btn-danger"
                            data-bs-toggle="modal" data-bs-target="#disapproveModal"
                            title="Reject Charity Verification Application"
                            v-on:click.prevent="form.charityID = charity.id"
                          >
                            <i class="fas fa-times-circle"></i>
                          </button>
                        </template>
                        <template v-else>
                          <button class="btn btn-primary" 
                            v-on:click.prevent="approve(charity.id)">
                            <i class="fas fa-badge-check"></i>
                          </button>
                           <button class="btn btn-danger"
                            data-bs-toggle="modal" data-bs-target="#disapproveModal"
                            title="Reject Charity Verification Application"
                            v-on:click.prevent="form.charityID = charity.id"
                          >
                            <i class="fas fa-times-circle"></i>
                          </button>
                        </template>

              
                        <a class="btn btn-info d-inline"  title="Download Charity Documents" :href="$route('admin.home.download', {
                          'id': charity.id
                        })">

                          <i class="fad fa-download"></i>
                        </a>
                        <Link class="btn btn-light"
                          :href="$route('charity.profile.index', {
                              id: charity.id
                          })" title="Look Up Charity">
                            <i class="far fa-search"></i>
                        </Link>
                      </td>
                    </tr>
                    <tr v-if="charities.data.length == 0">
                      <td class="dataTables-empty" colspan="5" width="1300">
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
      <!-- Modal -->
      <div class="modal fade"
          id="disapproveModal" tabindex="-1" 
          aria-labelledby="disapproveModal" aria-hidden="true"
          data-bs-backdrop="static" data-bs-keyboard="false">
          <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Reason</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">
                          Message  <span class="text-danger">*</span>
                      </label>
                      <textarea class="form-control" v-model="form.message" rows="3">
                      </textarea>
                      <div v-if="form.errors.message" class="text-danger d-block">
                          {{ form.errors.message }}
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                  @click="form.reset()">Close</button>
                  <button type="button" class="btn btn-primary" 
                  :disabled="form.processing"
                  @click="disapprove">
                      <span v-if="! form.processing">
                          Send
                      </span>
                      <span v-else>
                          <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                          Sending...
                      </span>
                  </button>
                  </div>
              </div>
          </div>
      </div>
</template>

<script setup>
import debounce from 'lodash/debounce';
import Swal from 'sweetalert2'
import { Modal } from 'bootstrap';
import {
    ref,
    watch,
    onMounted
  } from 'vue';

import {Inertia} from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3'
import web3 from "~blockchain/web3.js";
import axios from 'axios';

let props = defineProps({
  charities: Object,
  filters: Array,
  errors: Array
})

let search = ref(props.filters.search);
let sort = ref(props.filters.sort);
let status = ref(props.filters.status);
let permit = ref()
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

let savePermit = (e, charityID) => {
  Swal.fire({
    title: 'Are you sure?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, update it!'
  }).then((result) => {
      if (result.isConfirmed) {
         Inertia.post(
           route('admin.approval.permits'), { 
             permits: e.target.value, 
              charityID: charityID, 
              }, {
              preserveState: true,
              replace: true,
              onSuccess: () => {
                    Swal.fire(
                      'Updated!',
                      'Charity Permit updated.',
                      'success'
                  )
              },
            }
          );  
      } else {
        e.target.reset();
      }
  });
}

let form  = useForm({
  message: '',
  charityID : null
});

const modal = ref()

onMounted(() => {
  modal.value = new Modal(document.getElementById('disapproveModal'), {
      keyboard: false
  });
})

let disapprove = () => {
  form.post(route('admin.approval.disapprove'), {
    onSuccess: () => {
       Swal.fire(
          'Success!',
          'Succesfully disapprove charity.',
          'success'
      )
      modal.value.hide();
      form.reset();
      Inertia.reload();
    },
  });
}

let approve = (charityID) => {

Swal.fire({
  title: 'Are you sure?',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, approve it!'
}).then((result) => {
  if (result.isConfirmed) {
     Swal.fire({
      title: 'Approving !',
      html: 'This may take a while.',
      allowOutsideClick: false,
      type: "info",
      showLoaderOnConfirm: true,
      didOpen: () => {
        Swal.showLoading()
      },
    });
    Inertia.post(route('admin.approval.approve'), {
      id: charityID
    }, {
        onSuccess: (page) => {
          createETHAddress(charityID);
        },
    });
  }
});
}

let createETHAddress = (charityID) => {
   return axios({
      method: 'POST',
      url: route('admin.eth.check'),
      data: {
        'charityId': charityID,
      }
    }).then((response) => {
        if(response.data == 'empty'){
            let createdAccount = web3.eth.accounts.create();
            axios({
                method: 'POST',
                url: route('admin.eth.create'),
                data:{
                    'charityId': charityID,
                    'ethAddress' : createdAccount.address
                }
            }).then((response) => {
                Swal.fire(
                    'Success!',
                    'Ethereum Address created.',
                    'success'
                )

                Inertia.reload();
            });
        } else {
          Swal.fire(
            'Success!',
            'Charity has been approved.',
            'success'
          )
        }
    
      return response;
    });
}
</script>

<script> 
  import  '../../../../public/css/datatable.css'; 
</script>