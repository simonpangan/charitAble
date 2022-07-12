<template>
  <Head title="Benefactor Register" />
  <div class="container mt-4">
      <form @submit.prevent="submit" style="max-width: 500px" class="mx-auto">
        <Link class="fw-bold" :href="$route('auth.login')">
          <i class="far fa-angle-double-left fa-lg"></i>
          Return to Login
        </Link>
        <div class="osahan-login py-4">
          <div class="text-center mb-4">
            <h5 class="fw-bold mt-3">Register</h5>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="mb-1">First name <span class="text-danger">*</span></label>
                  <input v-model.trim="form.first_name" type="text" class="form-control" />
                  <div v-if="form.errors.first_name" class="text-danger">
                    {{ form.errors.first_name }}
                  </div>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label class="mb-1">Last name <span class="text-danger">*</span></label>
                  <input v-model.trim="form.last_name" type="text" class="form-control" />
                  <div v-if="form.errors.last_name" class="text-danger">
                    {{ form.errors.last_name }}
                  </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col">
              <label class="mb-1">Email <span class="text-danger">*</span></label>
                <input v-model.trim="form.email" type="email" class="form-control" />
                <div class="text-danger" v-if="form.errors.email">
                  {{ form.errors.email }}
                </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col">
              <label class="mb-1">Password <span class="text-danger">*</span></label>
                <input v-model.trim="form.password" type="password" id="password" name="password" class="form-control" />
                <div class="text-danger" v-if="form.errors.password">
                  {{ form.errors.password }}
                </div>
                <div class="alert alert-info mt-2" role="alert">
                  <small>
                    <p style="color: green" class="nmb-1" v-if="!v$.password.containsSpecial.$invalid"> &check; Passwords requires an special character. </p>
                  </small>
                  <small>
                    <p style="color: orange" class="nmb-1" v-if="v$.password.containsSpecial.$invalid"> &#10006; Passwords requires an special character. </p>
                  </small>
                  <small>
                    <p style="color: green" class="nmb-1" v-if="!v$.password.containsNumber.$invalid"> &check; Passwords requires an numerical character. </p>
                  </small>
                  <small>
                    <p style="color: orange" class="nmb-1" v-if="v$.password.containsNumber.$invalid"> &#10006; Passwords requires an numerical character. </p>
                  </small>
                  <small>
                    <p style="color: green" class="nmb-1" v-if="!v$.password.containsLowercase.$invalid"> &check; Passwords requires an lower case character. </p>
                  </small>
                  <small>
                    <p style="color: orange" class="nmb-1" v-if="v$.password.containsLowercase.$invalid"> &#10006; Passwords requires an lower case character. </p>
                  </small>
                  <small>
                    <p style="color: green" class="nmb-1" v-if="!v$.password.containsUppercase.$invalid"> &check; Passwords requires an upper case character. </p>
                  </small>
                  <small>
                    <p style="color: orange" class="nmb-1" v-if="v$.password.containsUppercase.$invalid"> &#10006; Passwords requires an upper case character. </p>
                  </small>
                  <small>
                    <p style="color: orange" class="nmb-1" v-if="
                        v$.password.minLength.$invalid ||
                        form.password == ''
                      "> &#10006; Passwords needs to have a minimum of 8 characters </p>
                    <p style="color: green" class="nmb-1" v-else> &check; 
                      Passwords needs to have a minimum of 8 characters 
                    </p>
                  </small>
                  <small></small>
              </div>  
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label class="mb-1">Confirm Password <span class="text-danger">*</span></label>
                <input v-model.trim="form.password_confirmation" type="password" class="form-control" />
            </div>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col">
            <div class="form-group">
              <label class="mb-1">Birth Date <span class="text-danger">*</span></label>
                <input v-model="form.birth_date" type="date" class="form-control" />
                <div v-if="form.errors.birth_date" class="text-danger">
                  {{ form.errors.birth_date }}
                </div>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label class="mb-1">Gender <span class="text-danger">*</span></label>
                <select v-model="form.gender" class="form-select" aria-label="Default select example">
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
        <div>
          <label>Preferences <span class="text-danger">*</span><small><span class="text-muted"> (Please select at least one)</span></small></label>
          <ul class="ks-cboxtags">
            <li v-for="(category, index) in charityCategories" :key="category.id">
              <input
                v-model="form.preferences"
                type="checkbox"
                :id="'checkbox' + index"
                :value="category.id"
              />
              <label :for="'checkbox' + index">{{ category.name }}</label>
            </li>
            <div v-if="form.errors['preferences.0']" class="text-danger">
              {{ form.errors['preferences.0'] }}
            </div>
            <div v-if="form.errors.preferences" class="text-danger">
              {{ form.errors['preferences'] }}
            </div>
          </ul>
        </div>
        <label class="mb-1 mt-2">By registering to our platform , you are now agreeing to the CharitAble
            <a :href="$route('terms')" target="_blank">Terms and User Agreement</a>,
            <a :href="$route('privacy')" target="_blank">Privacy Policy</a>.
        </label>
        <div class="text-center">
          <button :disabled="form.processing" class="btn btn-primary text-uppercase mt-3 px-5" 
          @click.prevent="submit"> 
            <span v-if="form.processing">
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Processing...
            </span>
            <span v-else>
              Agree & Join
              <i class="fas fa-check-circle ms-1"></i>
            </span> 
          </button>
        </div>
      </form>
  </div>
</template>

<script>
  import { computed } from "vue";
  import { useForm } from "@inertiajs/inertia-vue3";
  import useVuelidate from "@vuelidate/core";
  import {
    helpers,
    required,
    minLength,
    maxLength,
  } from "@vuelidate/validators"; 

  export default {
    setup() {
      const form = useForm({
        first_name: null,
        last_name: null,
        email: null,
        password: null,
        password_confirmation: null,
        birth_date: null,
        gender: null,
        preferences: [],
      });

      const rules = computed(() => ({
        password: {
          minLength: minLength(8),
          required: helpers.withMessage("Password cannot be empty", required),
          containsSpecial: helpers.withMessage(
            () => `The password requires an special character`,
            (value) => /[#?!@$%^&*-]/.test(value)),
          containsNumber: helpers.withMessage(
            () => `The password requires an numerical character`,
            (value) => /[0-9]/.test(value)),
          containsLowercase: helpers.withMessage(
            () => `The password requires an lowercase character`,
            (value) => /[a-z]/.test(value)),
          containsUppercase: helpers.withMessage(
            () => `The password requires an uppercase character`,
            (value) => /[A-Z]/.test(value)),
        },
      }));
      
      const v$ = useVuelidate(rules, form);

      function submit() {
        form.post(route("register.benefactor.store", {
          step: 'last',
        }));
      }
    
      return { form, v$, submit };
    },
    props: {
      charityCategories: Array
    },
    data() {
      return {
        preferences: [],
        totalSteps: 3,
      };
    },
  };
</script>