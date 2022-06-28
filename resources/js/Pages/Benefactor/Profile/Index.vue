<template>
  <Head title="Profile" />
  <div class="container">
    <br />
    <div class="row">
      <main class="col-md-8 mx-auto">
        <div class="border rounded bg-white mb-3 bg-black">
          <div class="box-title border-bottom p-3 position-relative"> 
            <h6 class="m-0">Your Basic Info</h6>
            <div class="position-absolute top-0 end-0 me-3 mt-2" v-if="type == 'edit'">
              <button @click="type = 'view'" type="button" v-on:click="formSubmit" 
                class="btn btn-danger me-2">
                <i class="fad fa-align-slash"></i>
              </button>
              <button type="button" v-on:click="submit" class="btn btn-primary">
                <i class="fad fa-check"></i>
              </button>
            </div>
            <div class="position-absolute top-0 end-0 me-3 mt-2" v-else>
               <button type="button"  @click="type = 'edit'" class="btn btn-primary">
                Edit
               <i class="fas fa-edit ms-1"></i>
              </button>
            </div>
          </div>
          <div class="box-body p-3">
            <form @submit.prevent="submit">
              <div v-if="$page.props.flash.message" role="alert"
              class="alert alert-success w-80 mx-auto text-center">
                {{ $page.props.flash.message }}
              </div>
              <div class="row">
                <div class="col-sm-6 mb-2">
                  <div class="js-form-message">
                    <label id="nameLabel" class="form-label"> First Name <span class="text-danger">*</span>
                    </label>
                    <div class="form-group">
                      <input type="text" class="form-control" 
                        v-model="form.first_name" 
                        :disabled="type != 'edit'"
                        placeholder="Enter your name" />
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
                      <input  :disabled="type != 'edit'" type="text" class="form-control" v-model="form.last_name" placeholder="Enter your last_name" />
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
                    <li v-for="(category, index) in charityCategories" :key="category.id">
                      <input
                        v-model="form.preferences"
                        type="checkbox" 
                        :id="'checkbox' + index"
                        class="bg-primary"
                        :disabled="type != 'edit'"
                        :value="category.id"
                      />
                       <label :for="'checkbox' + index">{{ category.name }}</label>
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
                      <input type="email"  :disabled="type != 'edit'" class="form-control" 
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
                      <input  :disabled="type != 'edit'" type="text" class="form-control" v-model="form.city" placeholder="Enter your location" />
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
                      <select  :disabled="type != 'edit'" v-model="form.gender" class="form-control custom-select">
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
                      <input  :disabled="type != 'edit'" class="form-control" type="number" v-model="form.age" placeholder="Enter your age" />
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
                      <select  :disabled="type != 'edit'" class="form-control custom-select" v-model="form.account_type">
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
            </form>
          </div>
        </div>
      </main>
    </div>
  </div>
</template>


<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { ref } from 'vue';

let type = ref('view');

let props = defineProps({
  auth: Object,
  benefactor: Object,
  charityCategories: Array
})

let form = useForm({
    email: props.auth.user.email,
    first_name: props.benefactor.first_name,
    last_name: props.benefactor.last_name,
    age: props.benefactor.age,
    city: props.benefactor.city,
    gender: props.benefactor.gender,
    account_type: props.benefactor.account_type,
    preferences: props.benefactor.preferences, 
 })

let submit = () => {
  form.put(route('benefactor.profile.update'), 
    {
      onSuccess: () => type.value = 'view'
    }
  );
}
</script>