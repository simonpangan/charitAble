<template>
  <Head title="Create Volunteer Posting "></Head>
  <form @submit.prevent="submit">
    <div class="py-4">
      <div class="container">
        <main class="mx-auto" style="max-width: 800px">
         <Link class="fw-bold text-muted" v-on:click="goBack">
          <i class="far fa-arrow-left me-2"></i>
          Go Back
          </Link>
          <div class="border rounded bg-white mb-3 mt-2">
            <div class="box-title border-bottom p-3">
              <h6 class="m-0">Volunteer Work Info</h6>
            </div>
            <div class="box-body p-3">
              <div class="mb-3">
                <label id="nameLabel" class="form-label">
                  Volunteer Work Name
                  <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" v-model="form.name" placeholder="Tree Planting Event Marshal"/>
                <span v-if="form.errors.name" v-text="form.errors.name"
                  class="invalid-feedback d-block" role="alert">
                </span>
              </div>
              <div class="mb-3">
                <label class="mb-1">Volunteer Post Description</label>
                <span class="text-danger">*</span>
                <div class="position-relative">
                    <textarea class="form-control" rows="4" name="text" v-model="form.description" placeholder="As event marshal, you will be handling both the event security and orderliness. Manage to handle and control event participants. Keep track of event flow.">
                    </textarea>
                     <span v-if="form.errors.description" v-text="form.errors.description"
                      class="invalid-feedback d-block" role="alert">
                    </span>
                    <small class="form-text text-muted">Tell us more what the volunteer work would be? What would be the responsibilities and activities required for this volunteer work?</small>

                </div>
              </div>
               <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" v-model="form.is_face_to_face">
                    <label class="form-check-label" for="flexCheckDefault">
                      This particular volunteer work requires in-person participation (On-Site volunteering)
                    </label>
                    <span v-if="form.errors.is_face_to_face" v-text="form.errors.is_face_to_face"
                      class="invalid-feedback d-block" role="alert">
                    </span>
                </div>
              </div>
              <div class="mb-3" v-if="form.is_face_to_face == true">
                <div class="js-form-message">
                  <label id="locationLabel" class="form-label">
                    Location
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control" v-model="form.location" />
                  <span v-if="form.errors.location" v-text="form.errors.location"
                    class="invalid-feedback d-block" role="alert">
                  </span>
                </div>
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
                  <label class="mb-1">Volunteer Qualifications</label>
                  <span class="text-danger">*</span>
                  <div class="position-relative">
                    <textarea class="form-control" rows="4" name="text" v-model="form.qualifications" placeholder="We are looking for responsible people, who can easily talk and connect with other fellow marshals. Attentive to small details. Displine and punctual."></textarea>
                    <small class="form-text text-muted">
                      Information could include volunteer skills, traits and experience needed for the volunteer work.
                    </small>
                    <span v-if="form.errors.qualifications" v-text="form.errors.qualifications"
                      class="invalid-feedback d-block" role="alert">
                    </span>
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
                  <label class="mb-1">Potential Incentives or Reward ( Optional )</label>
                  <div class="position-relative">
                    <textarea class="form-control" rows="4" name="text" v-model="form.incentives" placeholder="We offer meal incentives for all marshals."></textarea>
                    <small class="form-text text-muted">
                      From allowance incentives upto recognition or medal awards, the potential incentives are endless.
                    </small>
                    <span v-if="form.errors.incentives" v-text="form.errors.incentives"
                      class="invalid-feedback d-block" role="alert">
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3 text-right float-end">
            <Link class="btn btn-danger rounded p-3 me-3" v-on:click="goBack">
              <i class="far fa-arrow-left me-2"></i>
              Cancel
            </Link>
            <button type="submit" class="font-weight-bold btn btn-primary rounded p-3">
              Save Changes
                <i class="far fa-arrow-right me-2"></i>
            </button>
          </div>
        </main>
      </div>
    </div>
  </form>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";


let form = useForm({
  name: null,
  description: null,
  is_face_to_face: false,
  location: null,
  qualifications: null,
  incentives: null,
});

let submit = () => {
  form.post(route('charity.volunteer.store'));
}

let goBack = () => {
  return window.history.back();
};
</script>
