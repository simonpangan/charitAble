<template>
  <Head title="Program Donate" />
  <div class="pb-4 pt-5">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="box shadow-sm border rounded bg-white mb-3">
                <div class="box-body p-3">
                  <div class="alert alert-info" role="alert"> Every cent of your donation is protected, learn more about our transparency program. </div>
                  <div class="row">
                    <div class="col-sm-12 mb-2">
                      <label class="sr-only mb-2" for="">Enter your donation: </label>
                      <div class="input-group input-group-lg">
                        <span class="input-group-text" id="inputGroup-sizing-lg">PHP : </span>
                        <input type="number"  class="form-control" v-model="price" v-on:blur="ChoosePaymentSection" />
                        <span class="input-group-text">.00</span>
                        <span v-if="errors.price"
                                v-text="errors.price"
                            class="invalid-feedback d-block" role="alert">
                        </span>
                      </div>
                      <span class="text-danger" v-if="v$.price.$error"> {{ v$.price.$errors[0].$message }} </span>
                    </div>
                  </div>
                  <p class="text-dark nmb-1"> You are supporting towards the program : <strong class="text-dark">{{this.$page.props.program.name}}</strong>
                  </p>
                  <p class="text-muted">
                    <small> Your contribution will help {{charity.name}}</small>
                  </p>
                  <label for="customRange3" class="form-label mt-5">Enter tip</label>
                  <input type="range" min="0" max="30" step="5" v-model="tip_level" @input="updateSlider" :style="{backgroundSize: backgroundSize}" />
                  <span v-if="errors.tip_level"
                        v-text="errors.tip_level"
                    class="invalid-feedback d-block" role="alert">
                  </span>
                  <div class="data">Tip Level: {{this.tip_level }} %</div>
                  <div class="alert alert-light" role="alert">
                    <br /> Charitable provides 0% platform fee for benefactors, but providing a percentage tip on your contributions will be a long way on continuing our services.
                  </div>
                  <div v-if="$page.props.errors.paymongo" role="alert"
                    class="alert alert-danger w-80 mx-auto text-center">
                      {{ $page.props.errors.paymongo }}
                  </div>
                  <div v-if="$page.props.flash.message" role="alert"
                    class="alert alert-success w-80 mx-auto text-center">
                      {{ $page.props.flash.message }}
                  </div>
                  <div v-if="this.paypal_errors != ''" role="alert"
                    class="alert alert-danger w-80 mx-auto text-center">
                    {{this.paypal_errors}}
                  </div>
                  <div v-if="$page.props.flash.blockchain_message" role="alert"
                    class="alert alert-success w-80 mx-auto text-center">
                      {{ $page.props.flash.blockchain_message.message }}
                      <a target="_blank" class="text-black text-decoration-underline"
                      :href="'https://rinkeby.etherscan.io/tx/' + $page.props.flash.blockchain_message.transaction">
                      {{ $page.props.flash.blockchain_message.transaction }}
                          DESCRIPTIOnasdasdada
                      </a>
                  </div>

                  <button type="button" class="btn btn-lg btn-primary mb-4" v-on:click="ChoosePaymentSection">
                    <i class="feather-plus"></i> Continue </button>
                  <section v-if="step == 1">
                    <div class="card border-bottom">
                      <div class="card-body border-bottom">
                        <div class="form-check">
                          <input class="form-check-input" name="donation" type="radio" :disabled="this.v$.$error" v-on:change="PaypalSelected" />
                          <label class="form-check-label" for="flexRadioDefault1"> Paypal / Credit Card</label>
                        </div>
                      </div>
                      <div class="card-body border-top">
                        <div class="form-check">
                          <input class="form-check-input" name="donation" type="radio"  :disabled="this.v$.$error" v-on:change="PaymongoSelected('gCash')"/>
                          <label class="form-check-label" for="flexRadioDefault1"> GCash </label>
                        </div>
                      </div>
                      <div class="card-body border-top">
                        <div class="form-check">
                          <input class="form-check-input" name="donation" type="radio" :disabled="this.v$.$error" v-on:change="PaymongoSelected('grabPay')"/>
                          <label class="form-check-label" for="flexRadioDefault1"> Grab Pay </label>
                        </div>
                      </div>
                    </div>
                    <hr />
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" v-model="is_anonymous" id="flexCheckDefault" />
                      <label class="form-check-label" for="flexCheckDefault"> Please don't show my name publicly in the donations. </label>
                    </div>
                    <div id="paypal-button-container" v-on:click.prevent.self="PaypalTransaction" v-if="this.payment_method == 'paypal'"></div>
                    <div  v-if="isPaymongoTransaction" class="d-grid gap-2">
                      <button class="btn btn-warning btn-lg mt-3" v-on:click.prevent.self="paymongoEWalletTransaction">Proceed</button>
                    </div>

                    <div class="form-check" v-if="isPaymongoTransaction || this.payment_method == 'paypal'">
                      <label class="form-check-label fst-italic mt-2" for="flexCheckDefault"><small> By clicking this button, you agree to Charitable
                        <a href="/terms" target="_blank">Terms and Agreement</a>,
                        <a href="/privacy" target="_blank">Privacy Policy</a>
                        & Benefactor-Charity Transparency Agreement</small></label>
                    </div>
                  </section>
                </div>
              </div>
            </div>
          </div>
        </main>
        <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
          <div class="box shadow-sm border rounded bg-white mb-3">
            <div class="box-body p-3">
              <p class="fw-bold text-dark">Breakdown</p>
              <div class="d-flex">
                <p>Your Donation</p>
                <p class="text-muted ms-auto">{{price}}</p>
              </div>
              <div class="d-flex">
                <p>Charitable Tip</p>
                <p class="text-muted ms-auto">{{charitable_tip}}</p>
              </div>
              <div class="d-flex" v-if="payment_method != null">
                <p v-if="payment_method == 'gCash'">GCash Fee</p>
                <p v-else-if="payment_method == 'grabPay'">Grab Pay Fee</p>
                <p v-else-if="payment_method == 'paypal'">Paypal Fees</p>

                <p class="text-muted ms-auto">{{transaction_fee}}</p>
              </div>
              <hr />
              <div class="d-flex">
                <p class="text-dark">Total Contribution</p><i class="fad fa-info-circle mt-1 ms-2 text-primary"
                title="This is the total amount of what the charity will recieve."></i>
                <p class="text-dark ms-auto">{{total_price}}</p>
              </div>
            </div>
          </div>
          <div class="box shadow-sm mb-3 border rounded bg-white ads-box text-center"></div>
          <div class="card mb-4">
            <div class="card-header py-3">
              <h6 class="mb-0">Benefactor Protections</h6>
            </div>
            <div class="card-body">
                <p>In CharitAble, every benefactor deserves best experience. Learn more about our <a href="#" class="text-decoration-underline">transparency and accountability program</a></p>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>
</template>

<script>
  import { Inertia } from "@inertiajs/inertia";
  import axios from 'axios';
  import { loadScript } from "@paypal/paypal-js";
  import charitableContract from "~blockchain/charitable.js";
  import web3 from '~blockchain/web3.js';
  import contractAddress from '~blockchain/contract-address.js';
  import { toRaw } from 'vue';
  import Swal from 'sweetalert2';
  import useVuelidate from "@vuelidate/core";
  import {helpers,required,numeric,minValue,maxValue,integer,sameAs} from "@vuelidate/validators";


  export default {
    beforeMounted() {
      this.PaypalSelected();
    },
    async mounted() {
      console.log(this.charity.eth_address);

      if(this.donated) {
        Swal.fire({
          title: 'Processing your Donation',
          html: 'Please hang tight.',
          allowOutsideClick: false,
          type: "info",
          showLoaderOnConfirm: true,
          didOpen: () => {
            Swal.showLoading()
          },
        });

        var programDonation = toRaw(this.donated);

        this.sendBlockchainTransaction(
          programDonation['amount'],
          programDonation['id']
        );
      }
    },
    props: {
      charity: Object,
      program: Object,
      donated: Object,
      errors: Array,
    },
    data() {
      return {
        payment_method: null,
        price: 0,
        blockchain_hash: '',
        paypal_transaction_db_id:'',
        paypal_errors: '',
        step: 0,
        tip_level: 5,
        tip_price: 0,
        charity_program_id: this.program.id,
        charity_name: this.program.name,
        is_anonymous: false,
        paypal_errors: '',
        v$: useVuelidate(),
      };
    },
    validations() {
      return{
         price:{
                required:helpers.withMessage("Donation Amount cannot be empty", required),
                minValue:helpers.withMessage("Minimum donation value is 100 PHP.", minValue(100)),
                maxValue:helpers.withMessage("Maximum donation value is 50,000 PHP", maxValue(50000)),
                numeric:helpers.withMessage("Please input valid donation amount", numeric),
                integer:helpers.withMessage("Please input valid donation amount", integer),
                termsAccepted: helpers.withMessage("Please indicate that you have read and agreed to the Terms and Conditions and Privacy Policy",sameAs)
            },
      }
    },
    methods: {
      async sendBlockchainTransaction(amount, programDonationID) {

        var  totalAmount = amount * Math.pow(10, 2);
        const tx = {
          from : "0x9a42C53cf833fa5011d46C8C0AEBe684aB493f2b", //payee
          to: contractAddress,
          gas: 1000000,
          data: charitableContract.methods.transfer(
              this.charity.eth_address,   //transfer amount to
              totalAmount.toFixed()
            ).encodeABI()
        }

        const signature = await web3.eth.accounts.signTransaction(
          tx, "9a79ead2b40a2ada662e6a775b5454d89913b9ebb3253a954a16f03abf234b90" //private key ni payee
        );

        web3.eth.sendSignedTransaction(signature.rawTransaction)
          .on('receipt', (response) => {
                Inertia.get(route('blockchain'), {
                  'blockchain_transaction' : response.transactionHash,
                  'program_donation' : programDonationID,
                  'program_id' : this.program.id,
                }, {
                  onSuccess: page => {
                    Swal.close();
                  },
                }
              );
          });
      },

    async PaypalSendBlockchainTransaction(amount, programDonationID) {

        var  totalAmount = amount * Math.pow(10, 2);
        const tx = {
          from : "0x9a42C53cf833fa5011d46C8C0AEBe684aB493f2b", //payee
          to: contractAddress,
          gas: 1000000,
          data: charitableContract.methods.transfer(
              this.charity.eth_address,   //transfer amount to
              totalAmount.toFixed()
            ).encodeABI()
        }

        const signature = await web3.eth.accounts.signTransaction(
          tx, "9a79ead2b40a2ada662e6a775b5454d89913b9ebb3253a954a16f03abf234b90" //private key ni payee
        );

        web3.eth.sendSignedTransaction(signature.rawTransaction)
          .on('receipt', (response) => {
                return axios({
                method: 'POST',
                headers: {},
                url: route('blockchain-paypal'),
                data: {
                  'blockchain_transaction' : response.transactionHash,
                  'program_donation' : programDonationID,
                  'program_id' : this.program.id,
                }
              }).then((response) => {
                this.blockchain_hash = response.transactionHash;
                console.log(this.isEthTransactDone);
                Swal.close();
                    Inertia.visit(route('charity.donate.success', {
                            id: this.charity_program_id,
                            donation_id: this.paypal_transaction_db_id
                    }))
              }).catch((error) => {
                console.log(error);
              })
          });
      },


      updateSlider: function(e) {
        let clickedElement = e.target,
          min = clickedElement.min,
          max = clickedElement.max,
          val = clickedElement.value;
        this.tip_price = (this.tip_level / 100) * this.price;
        this.total_price = parseFloat(this.price) + parseFloat(this.tip_price);
      },
      ChoosePaymentSection: function() {
        this.v$.$validate();
        if (this.step == 0 && !this.v$.$error) {
          this.step++;
        }
      },
      PaypalSelected: function() {
        this.v$.$validate();
        if(!this.v$.$error){
        this.payment_method = 'paypal';
        this.$forceUpdate();
        loadScript({
          "client-id": "AZYDSrvAxpUej4aA4gpkC2BPNN7nPXyeH0Ck2dS_LCL-2ow-XgnH7Gzl2Sxd__WPHxRQ2FhaRl6KIgvH&disable-funding=credit,card",
          currency: "PHP",
        }).then((paypal) => {
          paypal.Buttons(({
            createOrder: (data, actions) => {
              return axios({
                method: 'POST',
                headers: {},
                url: route('paypal.create'),
                data: {
                  'tip_level': this.tip_level,
                  'tip_price': this.charitable_tip,
                  'total_contribution_amount': this.total_price,
                }
              }).then((response) => {
                return response.data.id;
              }).catch((error) => {
                if(this.v$.price.$errors){
                this.paypal_errors = "Invalid donation amount. Please try again."
                }else{
                this.paypal_errors = "Something went wrong with Paypal. Please try again."
                }

              });
            },
            onApprove: (data, action) => {
              return action.order.capture()
              .then((orderData) => {
                return axios({
                  method: 'POST',
                  headers: {},
                  url: route('paypal.capture'),
                  data: {
                    'amount': this.total_price,
                    'transaction_id': orderData.id,
                    'tip_price': this.charitable_tip,
                    'charity_program_id': this.charity_program_id,
                    'is_anonymous' : this.is_anonymous,
                    'description' : "Donation for the program" + this.charity_name
                  }
                }).then((response) => {
                    Swal.fire({
                    title: 'Processing your Donation',
                    html: 'Please hang tight.',
                    allowOutsideClick: false,
                    type: "info",
                    showLoaderOnConfirm: true,
                    didOpen: () => {
                        Swal.showLoading()
                    },
                    });
                   this.paypal_transaction_db_id = response.data;
                   this.PaypalSendBlockchainTransaction(this.total_price,response.data);
                })
              });
            },
            onError:function(err){
                this.paypal_errors = "Something went wrong";
            },
            onCancel:function(data,actions){
                this.paypal_errors = "Transaction is canceled";
                  Swal.fire({
                    title: 'Error!',
                    text: 'Transaction is canceled',
                    icon: 'error',
                    confirmButtonText: 'Close'
                    })
            },
          })).render("#paypal-button-container").catch((error) => {
            console.error("failed to render the PayPal Buttons", error);
          });
        }).catch((error) => {
          console.error("failed to load the PayPal JS SDK script", error);
        });
        }
      },
      PaymongoSelected: function(type) {
        this.payment_method = type;
      },
      paymongoEWalletTransaction() {
          Inertia.get(route('paymongo'), {
            'program_id' : this.program.id,
            'price' : this.price,
            'tip_level': this.tip_level,
            'wallet': (this.payment_method == 'gCash')  ? 'G-CASH' : 'GRAB PAY',
            'is_anonymous' : this.is_anonymous
          });
      },
    },
    openCreditCardForm:function(){
      this.payment_method = 'credit_card';
    },
    computed: {
      charitable_tip() {
        if(!this.v$.$error){
            return this.price * (this.tip_level / 100);
        }
        else return '0';
      },
      transaction_fee() {
        if (this.payment_method == 'gCash') {
          return this.price * 0.025;
        }
        else if (this.payment_method == 'grabPay') {
          return this.price * 0.022;
        }
        else if (this.payment_method == 'paypal'){
            return this.price * 0.044 + 25;
        }
        else return '0';
      },
      total_price() {
        if(!this.v$.$error){
            return this.price - (this.charitable_tip + this.transaction_fee);
        }
        else return 'N/A';
      },
      isPaymongoTransaction() {
        return  this.payment_method == 'gCash' ||  this.payment_method == 'grabPay';
      }
    }
  };
</script>
