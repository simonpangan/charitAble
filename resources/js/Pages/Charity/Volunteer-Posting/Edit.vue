<template>
  <Head title="Edit Volunteer Posting "></Head>
  <form @submit.prevent="submit">
    <div class="py-4">
      <div class="container">
        <main class="mx-auto" style="max-width: 800px">
          <Link class="fw-bold text-muted" :href="$route('charity.volunteer.show', 
            {id:volunteerPost.id})">
            <i class="far fa-arrow-left me-2"></i>
            Go Back
          </Link>
          <div class="border rounded bg-white mb-3 mt-2">
             <div v-if="$page.props.flash.message" role="alert"
              class="alert alert-success w-80 mx-auto text-center">
                {{ $page.props.flash.message }}
            </div>
            <div class="box-title border-bottom p-3">
              <h6 class="m-0">Volunteer Work Info</h6>
            </div>
            <div class="box-body p-3">
              <div class="mb-3">
                <label id="nameLabel" class="form-label">
                  Volunteer Work Name
                  <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" v-model="form.name" />
                <small class="form-text text-muted">Displayed on your public profile, notifications andother places.</small>
                <span v-if="form.errors.name" v-text="form.errors.name"
                  class="invalid-feedback d-block" role="alert">
                </span>
              </div>
              <div class="mb-3">
                <label class="mb-1">Volunteer Post Description</label>
                <span class="text-danger">*</span>
                <div class="position-relative">
                    <textarea class="form-control" rows="4" name="text" v-model="form.description">
                    </textarea>
                </div>
              </div>
              <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" v-model="form.is_face_to_face">
                    <label class="form-check-label" for="flexCheckDefault">
                      Is it face to face?
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
                    <textarea class="form-control" rows="4" name="text" placeholder="" v-model="form.qualifications"></textarea>
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
                  <label class="mb-1">Potential Incentives or Reward</label>
                  <span class="text-danger">*</span>
                  <div class="position-relative">
                    <textarea class="form-control" rows="4" name="text" v-model="form.incentives" placeholder="Enter Bio"></textarea>
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
import { useForm } from "@inertiajs/inertia-vue3"

let props = defineProps({
    volunteerPost: Object
})

console.log(props.volunteerPost.location);

let form = useForm({
   name: props.volunteerPost.name,
   description: props.volunteerPost.description,
   location: (props.volunteerPost.location == 'Virtual') ? '' : props.volunteerPost.location,
   is_face_to_face: (props.volunteerPost.location == 'Virtual') ? false : true,
   qualifications: props.volunteerPost.qualifications,
   incentives: props.volunteerPost.incentives
 })

let submit = () => {
  form.put(route('charity.volunteer.update', {id:props.volunteerPost.id}));
}

let goBack = () => {
  return window.history.back();
};
</script>
