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
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-lg"
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
                  <input
                    type="range"
                    class="form-range"
                    min="0"
                    max="30"
                    step="5"
                    id="customRange3"
                  />
                  <div class="alert alert-light" role="alert">
                    <strong
                      >I will figure out how to vue the para makita ung range
                      percentage </strong
                    ><br />
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

                    <button type="button" class="btn btn-lg btn-primary mt-4">
                      <i class="feather-plus"></i> Dapat button to ng Paypal,
                      gcash paymongo etc...
                    </button>
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
                <p class="text-muted ms-auto">PHP 100.00</p>
              </div>
              <div class="d-flex">
                <p>Charitable Tip</p>
                <p class="text-muted ms-auto">PHP 20.00</p>
              </div>
              <hr />
              <div class="d-flex">
                <p class="text-dark">Total Contribution</p>
                <p class="text-dark ms-auto">PHP 120.00</p>
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
          >
            <img src="img/ads1.png" class="img-fluid" alt="Responsive image" />
            <div class="p-3 border-bottom">
              <h6 class="font-weight-bold text-gold">Osahanin Premium</h6>
              <p class="mb-0 text-muted">Grow &amp; nurture your network</p>
            </div>
            <div class="p-3">
              <button type="button" class="btn btn-outline-gold pl-4 pr-4">
                ACTIVATE
              </button>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    //add mo sa table ung tip_range, para meron sa dtabase ntn
  setup() {},
  props: {},
  data() {
    return {
      step: 0,
    };
  },
  methods: {
    ChoosePaymentSection: function () {
      this.step++;
    },
  },
};
</script>
