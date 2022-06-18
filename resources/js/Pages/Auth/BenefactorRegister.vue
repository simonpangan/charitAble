<template>
  <div class="container">
    <div class="row justify-content-center align-items-center d-flex vh-100">
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
                <p class="text-muted">currentStep 1 - Basic Sign Up</p>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="mb-1">First name</label>
                    <div class="position-relative icon-form-control">
                      <i class="feather-user position-absolute"></i>
                      <input v-model.trim="form.first_name" type="text" class="form-control" />
                      <div v-if="form.errors.first_name" class="text-danger">
                        {{ form.errors.first_name }}
                      </div>
                      <div v-if="v$.first_name.$error">
                        <p class="text-danger">
                          <small>{{ v$.first_name.$errors[0].$message }}</small>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label class="mb-1">Last name</label>
                    <div class="position-relative icon-form-control">
                      <i class="feather-user position-absolute"></i>
                      <input v-model.trim="form.last_name" type="text" class="form-control" />
                      <div v-if="form.errors.last_name" class="text-danger">
                        {{ form.errors.last_name }}
                      </div>
                      <div v-if="v$.first_name.$error">
                        <p class="text-danger">
                          <small>{{ v$.last_name.$errors[0].$message }}</small>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label class="mb-1">Email</label>
                  <div class="position-relative icon-form-control">
                    <i class="feather-at-sign position-absolute"></i>
                    <input v-model.trim="form.email" type="email" class="form-control" />
                    <div class="text-danger" v-if="form.errors.email">
                      {{ form.errors.email }}
                    </div>
                    <div class="text-danger" v-if="v$.email.$error">
                      <p class="text-danger">
                        <small>{{ v$.email.$errors[0].$message }}</small>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label class="mb-1">Password (8 or more characters)</label>
                  <div class="position-relative icon-form-control">
                    <i class="feather-unlock position-absolute"></i>
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
                          "> &#10006; Passwords needs to be in between 8 to 19 characters. </p>
                        <p style="color: green" class="nmb-1" v-else> &check; Passwords needs to be in between 8 to 19 characters. </p>
                      </small>
                      <small></small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label class="mb-1">Confirm Password</label>
                  <div class="position-relative icon-form-control">
                    <i class="feather-unlock position-absolute"></i>
                    <input v-model.trim="form.password_confirmation" type="password" class="form-control" />
                    <div class="text-danger" v-if="v$.password_confirmation.$error">
                      <p class="text-danger">
                        <small>{{ v$.password_confirmation.$errors[0].$message
                        }}</small>
                      </p>
                    </div>
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
              <div class="text-center mt-3 border-bottom pb-3">
                <p class="small text-muted">Or login with</p>
                <div class="text-center">
                  <button type="button" class="btn btn-sm btn-outline-instagram btn-block px-5">
                    <i class="feather-instagram"></i> Sign Up Using Google </button>
                </div>
              </div>
              <div class="py-3 d-flex align-item-center">
                <a href="forgot-password.html">Forgot password?</a>
              </div>
              <div class="py-3 d-flex align-item-center">
                <span class="me-5"> Charities or NGO? <a class="fw-bold ms-2" href="sign-in.html">Let's Work Together</a>
                </span>
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
                <p class="text-muted">currentStep 2 - Personal Information</p>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="mb-1">Age</label>
                    <div class="position-relative icon-form-control">
                      <i class="feather-user position-absolute"></i>
                      <input v-model="form.age" type="number" class="form-control" />
                      <div v-if="form.errors.age" class="text-danger">
                        {{ form.errors.age }}
                      </div>
                      <div class="text-danger" v-if="v$.age.$error">
                        <p class="text-danger">
                          <small>{{ v$.age.$errors[0].$message }}</small>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label class="mb-1">Gender</label>
                    <div class="position-relative icon-form-control">
                      <i class="feather-user position-absolute"></i>
                      <select v-model="form.gender" class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="LGBT">LGBT</option>
                        <option value="Others">Others/Prefer Not to Say</option>
                      </select>
                      <div v-if="form.errors.gender" class="text-danger">
                        {{ form.errors.gender }}
                      </div>
                      <div class="text-danger" v-if="v$.gender.$error">
                        <p class="text-danger">
                          <small>{{ v$.gender.$errors[0].$message }}</small>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label class="mb-1">City</label>
                  <div class="position-relative icon-form-control">
                    <i class="feather-at-sign position-absolute"></i>
                    <select class="form-select" v-model="form.city">
                      <option disabled value="">Please Select</option>
                      <option>Caloocan</option>
                      <option>Las Piñas</option>
                      <option>Makati</option>
                      <option>Malabon</option>
                      <option>Mandaluyong</option>
                      <option>Manila</option>
                      <option>Marikina</option>
                      <option>Navotas</option>
                      <option>Parañaque</option>
                      <option>Pasay</option>
                      <option>Pateros</option>
                      <option>Quezon City</option>
                      <option>San Juan</option>
                      <option>Taguig</option>
                      <option>Valenzuela</option>
                    </select>
                    <div v-if="form.errors.city" class="text-danger">
                      {{ form.errors.city }}
                    </div>
                    <div class="text-danger" v-if="v$.city.$error">
                      <p class="text-danger">
                        <small>{{ v$.city.$errors[0].$message }}</small>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label class="mb-1">Account Type</label>
                  <div class="position-relative icon-form-control">
                    <i class="feather-at-sign position-absolute"></i>
                    <select class="form-select" v-model="form.account_type">
                      <option value="Personal">Personal Account</option>
                      <option value="Business">Business Account</option>
                    </select>
                    <div v-if="form.errors.account_type" class="text-danger">
                      {{ form.errors.account_type }}
                    </div>
                    <div class="text-danger" v-if="v$.account_type.$error">
                      <p class="text-danger">
                        <small>{{ v$.account_type.$errors[0].$message }}</small>
                      </p>
                    </div>
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
    email,
    sameAs,
    numeric,
    minValue,
    maxValue,
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
        //2 letter minimum
        first_name: {
          required: helpers.withMessage("First name cannot be empty", required),
        },
        //2 letter minimum
        last_name: {
          required: helpers.withMessage("Last name cannot be empty", required),
        },
        email: {
          required: helpers.withMessage("Email is invalid", required),
          email,
        },
        password: {
          minLength: minLength(9),
          maxLength: maxLength(19),
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
        password_confirmation: {
          required: helpers.withMessage("Confirm Password cannot be empty", required),
          sameAs: helpers.withMessage("Confirm Password is incorrect", sameAs(form.password)),
        },
        age: {
          required: helpers.withMessage("Age cannot be empty", required),
          numeric: helpers.withMessage("Age input needs to be a number", numeric),
          minValue: helpers.withMessage("Sorry! User needs to be 18 above to join our platform", minValue(18)),
          maxValue: helpers.withMessage("Age is invalid", maxValue(120)),
        },
        account_type: {
          required: helpers.withMessage("Account Type cannot be empty", required),
        },
        gender: {
          required: helpers.withMessage("Gender cannot be empty", required),
        },
        city: {
          required: helpers.withMessage("City cannot be empty", required)
        },
        preferences: {
          required: helpers.withMessage("Please select at least 1 categories", required),
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
      validateFirstStepFields: function() {
        this.v$.first_name.$validate();
        this.v$.last_name.$validate();
        this.v$.email.$validate();
        this.v$.password.$validate();
        this.v$.password_confirmation.$validate();
      },
      validateSecondStepFields: function() {
        this.v$.age.$validate();
        this.v$.account_type.$validate();
        this.v$.city.$validate();
        this.v$.gender.$validate();
      },
      prevStep: function() {
        this.currentStep--;
      },
      nextStep: function(e) {
        // this.validateFirstStepFields();

        if (! this.v$.first_name.$error && 
            ! this.v$.last_name.$error && 
            ! this.v$.password.$error && 
            ! this.v$.password_confirmation.$error && 
            ! this.v$.email.$error
        ) { 
          this.form.post(route("register.benefactor.store", {
            step: 1,
          }), {
            onSuccess: () => this.currentStep++,
          })
        } 
      },
      secondNextStep: function(e) {
        // this.validateSecondStepFields();

        if (! this.v$.age.$error && 
            ! this.v$.account_type.$error && 
            ! this.v$.city.$error && 
            ! this.v$.gender.$error
        ) {
          this.form.post(route("register.benefactor.store", {
            step: 2,
          }), {
            onSuccess: () => this.currentStep++,
          })
        }
      },
    },
  };
</script>