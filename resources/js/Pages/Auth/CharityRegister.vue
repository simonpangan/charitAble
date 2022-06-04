<template>
  <div class="container">
    <section v-if="step == 2">
      <div class="row justify-content-center align-items-center d-flex vh-100">
        <div class="col-md-4">
          <i class="feather-arrow-left me-2"></i
          ><a class="fw-bold" href="sign-in.html">Return to Login</a>
          <div class="osahan-login py-4">
            <div class="text-center mb-4">
              <a href="index.html"><img src="img/logo.svg" alt="" /></a>
              <h5 class="fw-bold mt-3">Charity Creation Setup</h5>
              <p class="text-muted">Step 1 - NGO Information</p>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="mb-1">Organization Description</label>
                  <div class="position-relative icon-form-control">
                    <i class="feather-user position-absolute"></i>
                    <input
                      v-model.trim="form.charityName"
                      type="text"
                      class="form-control"
                    />
                    <p class="text-danger" v-if="v$.charityName.$error">
                      <small>{{ v$.charityName.$errors[0].$message }}</small>
                    </p>
                    <div v-if="errors.charityName" class="text-danger">
                      {{ errors.charityName }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label class="mb-1">Organization Email</label>
                <div class="position-relative icon-form-control">
                  <i class="feather-at-sign position-absolute"></i>
                  <input
                    v-model.trim="form.email"
                    type="email"
                    class="form-control"
                  />
                  <p class="text-danger" v-if="v$.charityEmail.$error">
                    <small>{{ v$.charityEmail.$errors[0].$message }}</small>
                  </p>

                  <div v-if="errors.charityEmail">
                    {{ errors.charityEmail }}
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="mb-1">Our Organization deals with</label>
                  <div class="position-relative icon-form-control">
                    <i class="feather-user position-absolute"></i>
                    <select
                      class="form-select"
                      aria-label="Default select example"
                    >
                      <option selected>Please select at least one.</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label class="mb-1">*Optional Org Category</label>
                  <div class="position-relative icon-form-control">
                    <i class="feather-user position-absolute"></i>
                    <select
                      class="form-select"
                      aria-label="Default select example"
                    >
                      <option selected></option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="row">
                <div class="col">
                  <label class="mb-1">Head Admin - Email</label>
                  <div class="position-relative icon-form-control">
                    <i class="feather-at-sign position-absolute"></i>
                    <input
                      v-model.trim="form.headAdminEmail"
                      type="email"
                      class="form-control"
                    />
                    <p class="text-danger" v-if="v$.headAdminEmail.$error">
                      <small>{{ v$.headAdminEmail.$errors[0].$message }}</small>
                    </p>
                    <div v-if="errors.email">{{ errors.email }}</div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <label class="mb-1">Password (8 or more characters)</label>
                  <div class="position-relative icon-form-control">
                    <i class="feather-unlock position-absolute"></i>
                    <input
                      v-model.trim="form.password"
                      type="password"
                      id="password"
                      name="password"
                      class="form-control"
                    />
                    <div class="mt-2">
                      <small
                        ><p
                          style="color: green"
                          v-if="!v$.password.containsSpecial.$invalid"
                        >
                          &check; Passwords requires an special character.
                        </p></small
                      >
                      <small
                        ><p
                          style="color: orange"
                          class="nmb-1"
                          v-if="v$.password.containsSpecial.$invalid"
                        >
                          &#10006; Passwords requires an special character.
                        </p></small
                      >
                      <small
                        ><p
                          style="color: green"
                          class="nmb-1"
                          v-if="!v$.password.containsNumber.$invalid"
                        >
                          &check; Passwords requires an numerical character.
                        </p></small
                      >
                      <small
                        ><p
                          style="color: orange"
                          class="nmb-1"
                          v-if="v$.password.containsNumber.$invalid"
                        >
                          &#10006; Passwords requires an numerical character.
                        </p></small
                      >
                      <small
                        ><p
                          style="color: green"
                          class="nmb-1"
                          v-if="!v$.password.containsLowercase.$invalid"
                        >
                          &check; Passwords requires an lower case character.
                        </p></small
                      >
                      <small
                        ><p
                          style="color: orange"
                          class="nmb-1"
                          v-if="v$.password.containsLowercase.$invalid"
                        >
                          &#10006; Passwords requires an lower case character.
                        </p></small
                      >
                      <small
                        ><p
                          style="color: green"
                          class="nmb-1"
                          v-if="!v$.password.containsUppercase.$invalid"
                        >
                          &check; Passwords requires an upper case character.
                        </p></small
                      >
                      <small
                        ><p
                          style="color: orange"
                          class="nmb-1"
                          v-if="v$.password.containsUppercase.$invalid"
                        >
                          &#10006; Passwords requires an upper case character.
                        </p></small
                      >
                      <small
                        ><p
                          style="color: orange"
                          v-if="
                            v$.password.minLength.$invalid ||
                            v$.password.maxLength.$invalid ||
                            form.password == ''
                          "
                        >
                          &#10006; Passwords needs to be in between 8 to 19
                          characters.
                        </p>
                        <p style="color: green" v-else>
                          &check; Passwords needs to be in between 8 to 19
                          characters.
                        </p></small
                      >
                      <small></small>
                    </div>

                    <div v-if="errors.password">{{ errors.password }}</div>
                  </div>
                </div>
                <div class="col">
                  <label class="mb-1">Confirm Password</label>
                  <div class="position-relative icon-form-control">
                    <i class="feather-unlock position-absolute"></i>
                    <input
                      v-model.trim="form.password_confirmation"
                      type="password"
                      class="form-control"
                    />
                    <div
                      class="text-danger"
                      v-if="v$.password_confirmation.$error"
                    >
                      <p class="text-danger">
                        <small>{{
                          v$.password_confirmation.$errors[0].$message
                        }}</small>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row"></div>
            <div class="row">
              <label class="mb-1 mt-2"
                >You agree to the Osahanin <a href="#">User Agreement</a>,
                <a href="#">Privacy Policy</a>, and
                <a href="#">Cookie Policy</a>.</label
              >
            </div>
            <div class="text-center">
              <button
                class="btn btn-primary text-uppercase mt-3 px-5"
                @click.prevent="nextStep"
              >
                Agree & Join
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-4 h-100">
          <div class="card card-custom bg-white border-white border-0">
            <div
              class="card-custom-img"
              style="
                background-image: url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);
              "
            ></div>

            <div class="card-body" style="overflow-y: auto">
              <div class="wrapper">
                <ul class="StepProgress">
                  <li class="StepProgress-item current">
                    <strong>Step One - Organization Information</strong>
                    Got more entries that you love? Buy more entries anytime!
                    Just hover on your favorite entry and click the Buy button
                  </li>
                  <li class="StepProgress-item">
                    <strong
                      >Step Two - Additional Organization Information</strong
                    >
                    Got more entries that you love? Buy more entries anytime!
                    Just hover on your favorite entry and click the Buy button
                  </li>
                  <li class="StepProgress-item">
                    <strong>Step Three - Documents</strong>
                  </li>
                  <li class="StepProgress-item">
                    <strong>Step Four - Email Verification</strong>
                  </li>
                </ul>
                <p class="card-text">
                  Please input the organization details properly & correctly.
                  Any further corrections, please contact charitable@gmail.com
                </p>
              </div>
            </div>
            <div
              class="card-footer"
              style="background: inherit; border-color: inherit"
            ></div>
          </div>
        </div>
      </div>
    </section>

    <section v-if="step == 1">
      <div class="row justify-content-center align-items-center d-flex vh-100">
        <div class="col-md-4">
          <i class="feather-arrow-left me-2"></i
          ><a class="fw-bold" href="sign-in.html">Return to Login</a>
          <div class="osahan-login py-4">
            <div class="text-center mb-4">
              <a href="index.html"><img src="img/logo.svg" alt="" /></a>
              <h5 class="fw-bold mt-3">Charity Creation Setup</h5>
              <p class="text-muted">Step 1 - NGO Information</p>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="mb-1">Organization Description</label>
                  <div class="position-relative icon-form-control">
                    <i class="feather-user position-absolute"></i>
                    <textarea 
                      v-model.trim="form.charityName"
                      type="text"
                      class="form-control"
                      rows="4">
                    </textarea>
                    <p class="text-danger" v-if="v$.charityName.$error">
                      <small>{{ v$.charityName.$errors[0].$message }}</small>
                    </p>
                    <div v-if="errors.charityName" class="text-danger">
                      {{ errors.charityName }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label class="mb-1">Facebook Link</label>
                <div class="position-relative icon-form-control">
                  <i class="feather-at-sign position-absolute"></i>
                  <input
                    v-model.trim="form.email"
                    type="email"
                    class="form-control"
                  />
                  <p class="text-danger" v-if="v$.charityEmail.$error">
                    <small>{{ v$.charityEmail.$errors[0].$message }}</small>
                  </p>

                  <div v-if="errors.charityEmail">
                    {{ errors.charityEmail }}
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label class="mb-1">Twitter Link</label>
                <div class="position-relative icon-form-control">
                  <i class="feather-at-sign position-absolute"></i>
                  <input
                    v-model.trim="form.email"
                    type="email"
                    class="form-control"
                  />
                  <p class="text-danger" v-if="v$.charityEmail.$error">
                    <small>{{ v$.charityEmail.$errors[0].$message }}</small>
                  </p>

                  <div v-if="errors.charityEmail">
                    {{ errors.charityEmail }}
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label class="mb-1">Instagram Link</label>
                <div class="position-relative icon-form-control">
                  <i class="feather-at-sign position-absolute"></i>
                  <input
                    v-model.trim="form.email"
                    type="email"
                    class="form-control"
                  />
                  <p class="text-danger" v-if="v$.charityEmail.$error">
                    <small>{{ v$.charityEmail.$errors[0].$message }}</small>
                  </p>

                  <div v-if="errors.charityEmail">
                    {{ errors.charityEmail }}
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label class="mb-1">Website Link</label>
                <div class="position-relative icon-form-control">
                  <i class="feather-at-sign position-absolute"></i>
                  <input
                    v-model.trim="form.email"
                    type="email"
                    class="form-control"
                  />
                  <p class="text-danger" v-if="v$.charityEmail.$error">
                    <small>{{ v$.charityEmail.$errors[0].$message }}</small>
                  </p>

                  <div v-if="errors.charityEmail">
                    {{ errors.charityEmail }}
                  </div>
                </div>
              </div>
            </div>
 

            <div class="row">
              <label class="mb-1 mt-2"
                >You agree to the Osahanin <a href="#">User Agreement</a>,
                <a href="#">Privacy Policy</a>, and
                <a href="#">Cookie Policy</a>.</label
              >
            </div>
            <div class="d-flex justify-content-end">
              <button
                class="btn btn-primary text-uppercase mt-3 mx-auto"
                @click.prevent="prevStep"
              >
                Previous Step
              </button>
              <button
                class="btn btn-primary text-uppercase mt-3 mx-auto"
                @click.prevent=""
              >
                Next Step
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-4 h-100">

            <form @submit.prevent="submit">

            
            <div class="row" style="margin-bottom:150px;">
                <file-pond
                v-model="file"
                name="file"
                ref="file"
                v-bind:server="{
            process: {
                url: '/register/charity/upload',
                method: 'POST',
                headers: {
                'X-CSRF-TOKEN': csrfToken
                },
                withCredentials: false
            }
        }"
                />
            </div>

                          <button
                class="btn btn-primary text-uppercase mt-3 mx-auto"
                type="submit"
              >
                Next Step
              </button>
            </form>
      </div>
      </div>
    </section>
  </div>
</template>


<script>
import { reactive, computed } from "vue";
import { Inertia } from "@inertiajs/inertia";
import useVuelidate from "@vuelidate/core";
import {
  helpers,
  required,
  minLength,
  maxLength,
  email,
  sameAs,
} from "@vuelidate/validators";
import { useForm } from "@inertiajs/inertia-vue3";
// Import Vue FilePond
import vueFilePond from "vue-filepond";

// Import FilePond styles
import "filepond/dist/filepond.min.css";

// Import FilePond plugins
// Please note that you need to install these plugins separately

// Import image preview plugin styles
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";

// Import image preview and file type validation plugins
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";

// Create component
const FilePond = vueFilePond(
  FilePondPluginFileValidateType,
  FilePondPluginImagePreview
);

export default {
  components: {
    FilePond,
  },
  setup() {
    let form = useForm({
      charityName: null,
      charityCategory: null,
      charityEmail: null,
      headAdminEmail: null,

      password: null,
      password_confirmation: null,
    });

    let photo = useForm({
        file: []
    })

    const rules = computed(() => ({
      charityName: {
        required: helpers.withMessage("Org Email is invalid", required),
      },
      charityCategory: {
        required: helpers.withMessage(
          "Please select at least 1 category",
          required
        ),
      },
      charityEmail: {
        required: helpers.withMessage("Org Email is invalid", required),
        email,
      },
      headAdminEmail: {
        required: helpers.withMessage("Head Admin Email is invalid", required),
        email,
      },

      password: {
        minLength: minLength(9),
        maxLength: maxLength(19),
        required: helpers.withMessage("Password cannot be empty", required),

        containsSpecial: helpers.withMessage(
          () => `The password requires an special character`,
          (value) => /[#?!@$%^&*-]/.test(value)
        ),
        containsNumber: helpers.withMessage(
          () => `The password requires an numerical character`,
          (value) => /[0-9]/.test(value)
        ),
        containsLowercase: helpers.withMessage(
          () => `The password requires an lowercase character`,
          (value) => /[a-z]/.test(value)
        ),
        containsUppercase: helpers.withMessage(
          () => `The password requires an uppercase character`,
          (value) => /[A-Z]/.test(value)
        ),
      },
      password_confirmation: {
        required: helpers.withMessage(
          "Confirm Password cannot be empty",
          required
        ),
        sameAs: helpers.withMessage(
          "Confirm Password is incorrect",
          sameAs(form.password)
        ),
      },
      city: { required: helpers.withMessage("City cannot be empty", required) },
    }));

    const v$ = useVuelidate(rules, form);

    function submit() {
      Inertia.post("/register/charity/upload", photo);
    }

    return { form, v$, submit };
  },
  props: {
    errors: Object,
  },

  data() {
    return {
    csrfToken: document.querySelector('meta[name="csrf-token"]').content,
      preferences: [],
      step: 1,
      totalSteps: 3,
    };
  },
  methods: {
    handleFilePondInit: function () {
      console.log("FilePond has initialized");

      // FilePond instance methods are available on `this.$refs.pond`
    },
    validateFirstStepFields: function () {
      this.v$.charityName.$validate();
      this.v$.charityEmail.$validate();
      this.v$.charityCategory.$validate();
      this.v$.headAdminEmail.$validate();
      this.v$.password.$validate();
      this.v$.password_confirmation.$validate();
    },
    validateSecondStepFields: function () {},
    prevStep: function () {
      this.step--;
    },

    nextStep: function (e) {
      this.step++;
      /*
      this.validateFirstStepFields();
      //If field is correct
      if (
        !this.v$.charityName.$error &&
        !this.v$.charityCategory.$error &&
        !this.v$.charityEmail.$error &&
        !this.v$.headAdminEmail.$error &&
        !this.v$.password_confirmation.$error
      ) {
        alert("Form ok");
        this.step++;
      } else alert("not okay");
      */
    },
    secondNextStep: function (e) {
        this.stepp++;
    },

    thirdNextStep: function (e) {
      this.v$.preferences.$validate();
      if (!this.v$.preferences.$error) {
        console.log(this.form.preferences);
      } else alert("not okay");
      console.log(this.form.preferences);
    },
  },
};
</script>
