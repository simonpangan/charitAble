<template>
  <Head title="Create Volunteer Posting "></Head>
  <form @submit.prevent="submit">
    <div class="py-4">
      <div class="container">
        <Link class="fw-bold text-muted" v-on:click="goBack">
          <i class="far fa-arrow-left me-2"></i>
          Go Back
        </Link>
        <div class="row mt-2">
          <aside class="col-md-4">
            <div class="mb-3 border rounded bg-white profile-box text-center w-10">
              <div class="p-4 d-flex align-items-center">
                <h6 class="m-0">Create Volunteer Posting</h6>
              </div>
            </div>
            <div class="border rounded bg-white mb-3">
              <div class="box-title border-bottom p-3">
                <h6 class="m-0">Volunteer Posting Details</h6>
                <p class="mb-0 mt-0 small">
                  Tell about yourself in two sentences.
                </p>
              </div>
              <div class="box-body">
                <div class="p-3 border-bottom">
                  <div class="form-group mb-4"></div>
                  <div class="form-group mb-0"></div>
                </div>
                <div class="overflow-hidden text-center p-3">
                  <a
                    class="font-weight-bold btn btn-light rounded p-3 d-block"
                    href="#"
                  >
                    SAVE
                  </a>
                </div>
              </div>
            </div>
          </aside>

          <main class="col-md-8">
            <div class="border rounded bg-white mb-3">
              <div class="box-title border-bottom p-3">
                <h6 class="m-0">Edit Basic Info</h6>
                <p class="mb-0 mt-0 small">
                  Please enter key details.
                </p>
              </div>

              <div class="box-body p-3">
                  <div class="row">
                    <!-- Input -->
                    <div class="col-sm-6 mb-2">
                      <div class="js-form-message">
                        <label id="nameLabel" class="form-label">
                          Volunteer Work Name
                          <span class="text-danger">*</span>
                        </label>
                        <div class="form-group">
                          <input
                            type="text"
                            class="form-control"
                            v-model="form.volunteer_work_name"
                          />
                          <small class="form-text text-muted"
                            >Displayed on your public profile, notifications and
                            other places.</small
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 mb-2">
                      <label class="mb-1">Program Description</label>
                      <span class="text-danger">*</span>
                      <div class="position-relative">
                        <textarea
                          class="form-control"
                          rows="4"
                          name="text"
                          v-model="form.volunteer_description"
                          placeholder=""
                        ></textarea
                        >
                        <small class="form-text text-muted"
                            >What will the volunteer do? What should they expect for this volunteer work?</small
                      >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 mb-2">
                      <div class="js-form-message">
                        <label id="locationLabel" class="form-label">
                          Location
                          <span class="text-danger">*</span>
                        </label>
                        <div class="form-group">
                          <input
                            type="text"
                            class="form-control"
                            v-model="form.location"

                          />
                          <input
                          class="form-check-input" type="checkbox"
                          v-on:change="changeToOnline"
                          />
                          <label class="form-check-label" for="exampleCheck1"
                            >Volunteer work is virtual.</label
                          >
                        </div>
                      </div>
                    </div>

                    <!-- End Input -->
                  </div>
              </div>
            </div>
            <div class="border rounded bg-white mb-3">
              <div class="box-title border-bottom p-3">
                <h6 class="m-0">Volunteer Details</h6>
                <p class="mb-0 mt-0 small">
                  Tell us more about what kind of volunteer you're looking for.
                </p>
              </div>
              <div class="box-body px-3 pt-3 pb-0">
                <div class="row">
                  <div class="col-sm-12 mb-2">
                    <label class="mb-1"
                      >Volunteer Qualifications</label
                    >
                    <span class="text-danger">*</span>
                    <div class="position-relative">
                      <textarea
                        class="form-control"
                        rows="4"
                        name="text"
                        placeholder=""
                        v-model="form.volunteer_qualifications"
                      ></textarea
                      >
                      <small class="form-text text-muted"
                            >Information could include volunteer skills, traits and experience needed for the volunteer work.</small
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="border rounded bg-white mb-3">
              <div class="box-title border-bottom p-3">
                <h6 class="m-0">Incentives</h6>
                <p class="mb-0 mt-0 small">
                  Every hardwork should be rewarded.
                </p>
              </div>
              <div class="box-body p-3">
                <div class="row">
                  <div class="col-sm-12 mb-2">
                    <label class="mb-1"
                      >Potential Incentives or Reward</label
                    >
                    <span class="text-danger">*</span>
                    <div class="position-relative">
                      <textarea
                        class="form-control"
                        rows="4"
                        name="text"
                        v-model="form.volunteer_incentives"
                        placeholder="Enter Bio"
                      >
                      </textarea
                      >
                      <small class="form-text text-muted"
                            >From allowance incentives upto recognition or medal awards, the potential incentives are endless.</small
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-3 text-right">
              <Link  class="font-weight-bold btn btn-link rounded p-3" href="/charity/profile">
              Cancel
              </Link>
              <button class="font-weight-bold btn btn-primary rounded p-3" type="submit">
                Save Changes
              </button>
            </div>
          </main>

        </div>
      </div>
    </div>
  </form>
</template>

<script>

import { useForm } from "@inertiajs/inertia-vue3"

export default {

  setup() {
    let form = useForm({
    volunteer_work_name: null,
    volunteer_description: null,
    location:null,
    volunteer_qualifications:null,
    volunteer_incentives:null,
})

    let submit = () => {
        form.post(route('charity.volunteer.store'));
    }

    return { form,submit}
  },
  props: {
    csrfToken: String,
  },
  data() {

  },
  methods: {
    goBack() {
      return window.history.back();
    },
  },
};
</script>
