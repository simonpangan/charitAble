<template>
  <div class="container">
    <br />
    <div class="row">
      <main class="col-md-8 mx-auto">
        <div class="border rounded bg-white mb-3 bg-black">
          <div class="box-title border-bottom p-3 position-relative">
            <h6 class="m-0">Your Basic Info</h6>
            <div class="position-absolute top-0 end-0 me-3 mt-2">
              <!-- <a class="font-weight-bold btn btn-link rounded p-3" href="#">
                    Cancel 
              </a> -->
              <button type="button" v-on:click="formSubmit" class="btn btn-primary">Edit</button>
            </div>
          </div>
          <div class="box-body p-3">
            <form @submit.prevent="submit">
              <div class="row">
                <div class="col-sm-6 mb-2">
                  <div class="js-form-message">
                    <label id="nameLabel" class="form-label"> First Name <span class="text-danger">*</span>
                    </label>
                    <div class="form-group">
                      <input type="text" class="form-control" v-model="form.first_name" placeholder="Enter your name" />
                      <div v-if="form.errors.first_name" class="text-danger">
                        {{ form.errors.first_name }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-2">
                  <div class="js-form-message">
                    <label id="usernameLabel" class="form-label"> Last Name <span class="text-danger">*</span>
                    </label>
                    <div class="form-group">
                      <input type="text" class="form-control" v-model="form.last_name" placeholder="Enter your last_name" />
                      <div v-if="form.errors.last_name" class="text-danger">
                        {{ form.errors.last_name }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <label class="form-label"> Preferences <span class="text-danger">*</span>
              </label>
              <div class="row">
                <div>
                  <ul class="ks-cboxtags">
                    <li v-for="(category, index) in $page.props.charityCategories" :key="index">
                    <!-- <li v-for="(preference, index) in form.preferences" :key="index"> -->
                      <input
                        v0
                        type="checkbox" 
                        :id="'checkbox' + index"
                        :value="preference"
                        class="bg-primary"
                        :checked="form.preferences.includes(category.name)"
                        />
                       <label :for="'checkbox' + index">{{ category.value }}</label>
                    </li> 
                     <div v-if="form.errors['preferences.0']" class="text-danger">
                      {{ form.errors['preferences.0'] }}
                    </div>
                    <div v-if="form.errors.preferences" class="text-danger">
                        {{ form.errors.preferences }}
                    </div>
                  </ul> 
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 mb-2">
                  <div class="js-form-message">
                    <label id="emailLabel" class="form-label"> Email address <span class="text-danger">*</span>
                    </label>
                    <div class="form-group">
                      <input type="email" class="form-control" 
                        v-model="form.email" placeholder="Enter your email address" 
                      />
                      <div v-if="form.errors.email" class="text-danger">
                        {{ form.errors.email }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-2">
                  <div class="js-form-message">
                    <label id="locationLabel" class="form-label"> City <span class="text-danger">*</span>
                    </label>
                    <div class="form-group">  
                      <input type="text" class="form-control" v-model="form.city" placeholder="Enter your location" />
                      <div v-if="form.errors.city" class="text-danger">
                        {{ form.errors.city }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 mb-2">
                  <div class="js-form-message">
                    <label id="organizationLabel"  class="form-label">
                       Gender <span class="text-danger">*</span>
                    </label>
                    <div class="form-group">
                      <select v-model="form.gender" class="form-control custom-select">
                        <option selected>Open this select menu</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="LGBT">LGBT</option>
                        <option value="Others">Others/Prefer Not to Say</option>
                      </select>
                      <div v-if="form.errors.gender" class="text-danger">
                        {{ form.errors.gender }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-2">
                  <div class="js-form-message">
                    <label id="websiteLabel" class="form-label"> Age <span class="text-danger">*</span>
                    </label>
                    <div class="form-group">
                      <input class="form-control" type="number" v-model="form.age" placeholder="Enter your age" />
                      <div v-if="form.errors.age" class="text-danger">
                        {{ form.errors.age }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row"> 
                <div class="col-sm-6 mb-2">
                  <div class="js-form-message">
                    <label id="phoneNumberLabel" class="form-label"> Account Type <span class="text-danger">*</span>
                    </label>
                    <div class="form-group">
                      <select class="form-control custom-select" v-model="form.account_type">
                        <option value="Personal">Personal Account</option>
                        <option value="Business">Business Account</option>
                      </select>
                      <div v-if="form.errors.account_type" class="text-danger">
                        {{ form.errors.account_type }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" > Submit</button>
            </form>
          </div>
        </div>
        <div class="border rounded bg-white mb-3">
          <div class="box-title border-bottom p-3">
            <h6 class="m-0">Experience</h6>
            <p class="mb-0 mt-0 small"> Tell about your work, job, and other experiences. </p>
          </div>
          <div class="box-body px-3 pt-3 pb-0">
            <div class="row">
              <div class="col-sm-6 mb-4">
                <label id="FROM" class="form-label">FROM</label>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="From" aria-label="FROM" aria-describedby="FROM" />
                </div>
              </div>
              <div class="col-sm-6 mb-4">
                <label id="TO" class="form-label">TO</label>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="TO" aria-label="TO" aria-describedby="TO" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 mb-4">
                <label id="companyLabel" class="form-label">Company</label>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Enter your company title" aria-label="Enter your company title" aria-describedby="companyLabel" />
                </div>
              </div>
              <div class="col-sm-6 mb-4">
                <label id="positionLabel" class="form-label">Position</label>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Enter your position" aria-label="Enter your position" aria-describedby="positionLabel" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</template>


<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

let props = defineProps({
  auth: Object,
})

// const preferences = props.auth.user.benefactor.preferences;

let form = useForm({
    email: props.auth.user.email,
    first_name: props.auth.user.benefactor.first_name,
    last_name: props.auth.user.benefactor.last_name,
    gender: props.auth.user.benefactor.gender,
    age: props.auth.user.benefactor.age,
    city: props.auth.user.benefactor.city,
    account_type: props.auth.user.benefactor.account_type,
    preferences: props.auth.user.benefactor.preferences,
    // preferences: [], 
 })

let submit = () => {
  form.put(route('benefactor.profile.update'));
}
</script>