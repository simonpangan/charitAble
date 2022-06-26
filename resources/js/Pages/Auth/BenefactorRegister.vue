<template>
  <div class="container mt-4">
    <div class="row justify-content-center align-items-center d-flex">
      <form @submit.prevent="submit">
        <section v-if="currentStep == 1">
          <div class="col-md-4 mx-auto">
            <i class="feather-arrow-left me-2"></i>
            <a class="fw-bold" href="sign-in.html">Return to Login</a>
            <div class="osahan-login py-4">
              <div class="text-center mb-4">
                <a href="index.html">
                  <img src="img/logo.svg" alt="" />
                </a>
                <h5 class="fw-bold mt-3">Creating A Better Tomorrow.</h5>
                <p class="text-muted">Step 1</p>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="mb-1">First name</label>
                      <input v-model.trim="form.first_name" type="text" class="form-control" />
                      <div v-if="form.errors.first_name" class="text-danger">
                        {{ form.errors.first_name }}
                      </div>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label class="mb-1">Last name</label>
                      <input v-model.trim="form.last_name" type="text" class="form-control" />
                      <div v-if="form.errors.last_name" class="text-danger">
                        {{ form.errors.last_name }}
                      </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label class="mb-1">Email</label>
                    <input v-model.trim="form.email" type="email" class="form-control" />
                    <div class="text-danger" v-if="form.errors.email">
                      {{ form.errors.email }}
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label class="mb-1">Password</label>
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
                            v$.password.maxLength.$invalid ||
                            form.password == ''
                          "> &#10006; Passwords needs to be a minimum of 9 characters </p>
                        <p style="color: green" class="nmb-1" v-else> &check; Passwords needs to be in between 8 to 19 characters. </p>
                      </small>
                      <small></small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label class="mb-1">Confirm Password</label>
                    <input v-model.trim="form.password_confirmation" type="password" class="form-control" />
                    <div class="text-danger" v-if="v$.password_confirmation.$error">
                      <p class="text-danger">
                        <small>{{ v$.password_confirmation.$errors[0].$message
                        }}</small>
                      </p>
                    </div>
                </div>
              </div>
              <div class="row"></div>
              <div class="row">
                <label class="mb-1 mt-2">You agree to the Osahanin <a href="#">User Agreement</a>, <a href="#">Privacy Policy</a>, and <a href="#">Cookie Policy</a>. </label>
              </div>
              <div class="text-center">
                <button :disabled="form.processing" class="btn btn-primary text-uppercase mt-3 px-5" @click.prevent="nextStep"> 
                  <span v-if="form.processing">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      Processing...
                  </span>
                  <span v-else>
                    Agree & Join
                  </span> 
                </button>
              </div>
            </div>
          </div>
        </section>
        <section v-if="currentStep == 2">
          <div class="col-md-4 mx-auto">
            <div class="osahan-login py-4">
              <div class="text-center mb-4">
                <a href="index.html">
                  <img src="img/logo.svg" alt="" />
                </a>
                <h5 class="fw-bold mt-3">Creating A Better Tomorrow.</h5>
                <p class="text-muted">Step 2</p>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="mb-1">Age</label>
                      <input v-model="form.age" type="number" class="form-control" />
                      <div v-if="form.errors.age" class="text-danger">
                        {{ form.errors.age }}
                      </div>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label class="mb-1">Gender</label>
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
              <div class="row">
                <div class="col">
                  <label class="mb-1">City</label>
                    <input
                      v-model="form.city"
                      type="text"
                      class="form-control"
                    />
                    <div v-if="form.errors.city" class="text-danger">
                      {{ form.errors.city }}
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label class="mb-1">Account Type</label>
                    <select class="form-select" v-model="form.account_type">
                      <option value="Personal">Personal Account</option>
                      <option value="Business">Business Account</option>
                    </select>
                    <div v-if="form.errors.account_type" class="text-danger">
                      {{ form.errors.account_type }}
                    </div>
                </div>
              </div>
              <div class="row mt-2">
                <small class="text-muted">For users that are under corporate organization and business, please select Business Account Type</small>
              </div>
              <div class="d-flex justify-content-end">
                <button class="btn btn-primary text-uppercase mt-3 mx-auto" @click.prevent="prevStep"> Previous currentStep </button>
                <button :disabled="form.processing" class="btn btn-primary text-uppercase mt-3 mx-auto" @click.prevent="secondNextStep"> 
                   <span v-if="form.processing">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      Processing...
                  </span>
                  <span v-else>
                    Next currentStep 
                  </span> 
                </button>
              </div>
            </div>
          </div>
        </section>
        <section v-if="currentStep == 3">
          <div class="col-md-6 mx-auto">
            <div class="text-center mb-4">
              <a href="index.html">
                <img src="img/logo.svg" alt="" />
              </a>
              <h5 class="fw-bold mt-3">Creating A Better Tomorrow.</h5>
              <p class="text-muted"> currentStep 3 - What do you feel most passionate about? </p>
            </div>
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
            <div class="d-flex justify-content-end">
              <button class="btn btn-primary text-uppercase mt-3 mx-auto" @click.prevent="prevStep"> Previous currentStep </button>
              <button :disabled="form.processing" class="btn btn-primary text-uppercase mt-3 mx-auto" @click.prevent="submit"> 
                 <span v-if="form.processing">
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      Processing...
                  </span>
                  <span v-else>
                    Submit 
                  </span>  
              </button>
            </div>
          </div>
        </section>
      </form>
    </div>
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
        age: null,
        gender: null,
        account_type: null,
        city: null,
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
        currentStep: 1,
        preferences: [],
        totalSteps: 3,
      };
    },
    methods: {
      prevStep: function() {
        this.currentStep--;
      },
      nextStep: function(e) {
        this.form.post(route("register.benefactor.store", {
          step: 1,
        }), {
          onSuccess: () => this.currentStep++,
        })
      },
      secondNextStep: function(e) {
        this.form.post(route("register.benefactor.store", {
          step: 2,
        }), {
          onSuccess: () => this.currentStep++,
        })
      },
    },
  };
</script>