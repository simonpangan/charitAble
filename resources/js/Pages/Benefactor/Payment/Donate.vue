<template>
  <div class="pb-4 pt-5">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <!-- Main Content -->
        <main
          class="
            col col-xl-6
            order-xl-2
            col-lg-12
            order-lg-1
            col-md-12 col-sm-12 col-12
          "
        >
          <div class="tab-content" id="myTabContent">
            <div
              class="tab-pane fade show active"
              id="home"
              role="tabpanel"
              aria-labelledby="home-tab"
            >
              <div class="box shadow-sm border rounded bg-white mb-3">
                <div class="box-body p-3">
                  <div class="alert alert-info" role="alert">
                    Every cent of your donation is protected, learn more about
                    our transparency program.
                  </div>
                  <div class="row">
                    <div class="col-sm-12 mb-2">
                      <label class="sr-only mb-2" for=""
                        >Enter your donation:
                      </label>
                      <div class="input-group input-group-lg">
                        <span class="input-group-text" id="inputGroup-sizing-lg"
                          >PHP :
                        </span>
                        <input
                          type="text"
                          class="form-control"
                          v-model="this.price"
                          @input="updateDonation"
                        />
                        <span class="input-group-text">.00</span>
                      </div>
                    </div>
                  </div>

                  <h6 class="text-dark nmb-1">
                    You are supporting
                    <strong class="text-dark">{{
                      "Insert Program Name"
                    }}</strong>
                  </h6>
                  <p class="text-muted">
                    Your contribution will help
                    <strong>{{ "Insert Charity Name" }}</strong>
                  </p>

                  <label for="customRange3" class="form-label mt-5"
                    >Enter tip</label
                  >
                   <input type="range" min="0" max="30" step="5" v-model="tip_level" @input="updateSlider" :style="{backgroundSize: backgroundSize}">
                    <div class="data">Tip Level:   {{this.tip_level }}% </div>
                  <div class="alert alert-light" role="alert">
                    <br />
                    Charitable provides 0% platform fee for benefactors, but
                    providing a percentage tip on your contributions will be a
                    long way on continuing our services.
                  </div>

                  <button
                    type="button"
                    class="btn btn-lg btn-primary mb-4"
                    v-on:click="ChoosePaymentSection"
                  >
                    <i class="feather-plus"></i> Continue
                  </button>

                  <section v-if="step == 1">
                    <div class="card border-bottom">
                      <div class="card-body border-bottom">
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="flexRadioDefault"
                            id="flexRadioDefault1"
                            v-on:change="PaypalSelected"
                          />
                          <label
                            class="form-check-label"
                            for="flexRadioDefault1"
                          >
                            Paypal
                          </label>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="flexRadioDefault"
                            id="flexRadioDefault1"
                          />
                          <label
                            class="form-check-label"
                            for="flexRadioDefault1"
                          >
                            Credit Card
                          </label>
                        </div>
                      </div>
                      <div class="card-body border-top">
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="flexRadioDefault"
                            id="flexRadioDefault1"
                          />
                          <label
                            class="form-check-label"
                            for="flexRadioDefault1"
                          >
                            GCash
                          </label>
                        </div>
                      </div>
                      <div class="card-body border-top">
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="flexRadioDefault"
                            id="flexRadioDefault1"
                          />
                          <label
                            class="form-check-label"
                            for="flexRadioDefault1"
                          >
                            Anything else (7/11?)
                          </label>
                        </div>
                      </div>
                    </div>

                    <hr />
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        value=""
                        id="flexCheckDefault"
                      />
                      <label class="form-check-label" for="flexCheckDefault">
                        Please don't show my name publicly in the donations.
                      </label>
                    </div>

                    <div
                      id="paypal-button-container"
                      v-on:click.prevent.self ="PaypalTransaction"
                    ></div>
                  </section>
                </div>
              </div>
            </div>
          </div>
        </main>
        <aside
          class="
            col col-xl-3
            order-xl-3
            col-lg-6
            order-lg-3
            col-md-6 col-sm-6 col-12
          "
        >
          <div class="box shadow-sm border rounded bg-white mb-3">
            <div class="box-body p-3">
              <p>Your Donation</p>

              <div class="d-flex">
                <p>Your Donation</p>
                <p class="text-muted ms-auto">{{this.price}}</p>
              </div>
              <div class="d-flex">
                <p>Charitable Tip</p>
                <p class="text-muted ms-auto">{{this.tip_level}}%</p>
              </div>
              <hr />
              <div class="d-flex">
                <p class="text-dark">Total Contribution</p>
                <p class="text-dark ms-auto">{{this.total_price}}</p>
              </div>
            </div>
          </div>

          <div
            class="
              box
              shadow-sm
              mb-3
              border
              rounded
              bg-white
              ads-box
              text-center
            "
          ></div>
        </aside>
      </div>
    </div>
  </div>
</template>

<script>
import { reactive, computed } from "vue";
import { Inertia } from "@inertiajs/inertia";
import axios from 'axios';
import { loadScript } from "@paypal/paypal-js";
let paypal;

export default {
  //add mo sa table ung tip_range, para meron sa dtabase ntn
  beforeMounted() {
    this.PaypalSelected();
  },
  setup() {

  },
  props: {},
  data() {
    return {
    total_price : 0,
    price: 0,
    step: 0,
    tip_level: 5,
    tip_price: 0
    };
  },
  methods: {
    updateDonation: function(e){
    this.tip_price = (this.tip_level / 100) * this.price;
      this.total_price = parseFloat(this.price) + parseFloat(this.tip_price);
    },
    updateSlider: function(e) {
        let clickedElement = e.target,
         min = clickedElement.min,
         max = clickedElement.max,
         val = clickedElement.value;

      this.tip_price = (this.tip_level / 100) * this.price;
      this.total_price = parseFloat(this.price) + parseFloat(this.tip_price);
     },
    ChoosePaymentSection: function () {
        if(this.step == 0){
            this.step++;
        }
    },
    PaypalSelected: function () {
    this.$forceUpdate();
      loadScript({
        "client-id":
          "AZYDSrvAxpUej4aA4gpkC2BPNN7nPXyeH0Ck2dS_LCL-2ow-XgnH7Gzl2Sxd__WPHxRQ2FhaRl6KIgvH", currency: "PHP"
      })
        .then((paypal) => {
          paypal
            .Buttons(({
            createOrder:(data,actions) => {
                    return axios({
                    method: 'POST',
                    headers: {},
                    url: 'paypal/order/create',
                    data: {
                            'tip_level' : this.tip_level,
                            'tip_price' : this.tip_price,
                            'total_contribution_amount': this.total_price,
                        }
                })
                .then((response) => {
                    console.log(response.data.id);
                    return response.data.id;
                })
                .catch((error) => {
                    console.log(error);
                });
            },

            OnApprove:(data,action) =>{
                return Inertia.post('paypal/order/capture',{
                    method:'POST',
                    data: JSON.stringify({
                        orderID : data.orderID,
                    })
                })
            }
        }))
            .render("#paypal-button-container")
            .catch((error) => {
              console.error("failed to render the PayPal Buttons", error);
            });
        })
        .catch((error) => {
          console.error("failed to load the PayPal JS SDK script", error);
        });
    },
   

  },
  computed:{
    total_price(){
        return this.price * this.tip_price()
    },

    tip_price(){
        return this.price = (this.tip_level / 100) * this.price
    }

  }
};
</script>
