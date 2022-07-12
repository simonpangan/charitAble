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
                      <th width="5%" class="text-center">
                       Amount
                      </th>
                      <th width="15%" class="text-center">
                        Request Date
                      </th>
                      <th width="20%" class="text-center">
                          Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(program, index) in programs.data" :key="index">
                      <td class="text-center">{{ programs.from + index }}</td>
                      <td>{{ program.name }}</td>
                      <td>{{ program.withdraw_request_amount }}</td>
                      <td class="text-center">{{ program.withdraw_requested_at }}</td>
                       <td class="d-flex justify-content-evenly">
                        <div class="input-group">
                          <input type="file" class="form-control" @input="avatar[index] = $event.target.files[0]">
                           <button class="btn btn-primary"
                            :data="{ id: program.id }" 
                            type="button"
                            title="Approve Withdraw Request"
                            :disabled="isProcessing"
                            @click="approveWithdraw(
                                program.id, 
                                program.withdraw_request_amount, 
                                program.charity.eth_address,
                                index
                              )">
                            <div class="spinner-border spinner-border-sm" v-if="isProcessing" role="status">
                              <span class="visually-hidden">Loading...</span>
                            </div>
                            <i class="fas fa-badge-check" v-else></i>
                          </button>
                        </div>
                        <Link class="btn btn-light ms-1"
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
});
</script>

<script> 
  import Swal from 'sweetalert2';
  import web3 from '~blockchain/web3.js';
  import  '../../../../public/css/datatable.css'; 
  import charitableContract from "~blockchain/charitable.js";
  import contractAddress from '~blockchain/contract-address.js';

  export default {
    data() {
      return {
        avatar: [],
      }
    },
    methods: {
      approveWithdraw(programID, amount, ethAddress, index) {
          Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, approve it!'
          }).then((result) => {
              if (result.isConfirmed) {
                   Swal.fire({
                    title: 'Creating and sending etherium transaction please wait!',
                    html: 'This may take a while.',
                    allowOutsideClick: false,
                    type: "info",
                    showLoaderOnConfirm: true,
                    didOpen: () => {
                      Swal.showLoading()
                    },
                  });

                  const transaction = this.sendBlockchainTransaction(amount, ethAddress);

                  transaction.then(response => {
                    Inertia.post(
                      route('admin.withdraw.approve'), { 
                        id: programID,
                        'blockchain_transaction': response.transactionHash,
                        'transaction': this.avatar[index],
                      }, {
                        onSuccess: page => {
                          Swal.fire(
                            'Send!',
                            'Ethereum transaction sent!',
                            'success',
                          )
                        }
                      }
                    );
                  }).catch(error => {
                    Swal.fire({
                      icon: 'error',
                      title: 'Ethereum transaction failed',
                      showConfirmButton: true,
                      didOpen: () => {
                        Swal.hideLoading()
                      },
                    })
                  });
              }

            this.isProcessing = false;
          })
      },
      async sendBlockchainTransaction(amount, ethAddress) {
        const tx = {
          from : "0x9a42C53cf833fa5011d46C8C0AEBe684aB493f2b", //payee
          to: contractAddress,
          gas: 1000000,
          data: charitableContract.methods.transferBack(
              ethAddress, 
              (amount * 100)
            ).encodeABI()
        }

        const signature = await web3.eth.accounts.signTransaction(
          tx, "9a79ead2b40a2ada662e6a775b5454d89913b9ebb3253a954a16f03abf234b90" //private key ni payee
        );

        return await web3.eth.sendSignedTransaction(signature.rawTransaction);
      },
    }
  }
</script>