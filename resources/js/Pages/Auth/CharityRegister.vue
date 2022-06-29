<template>
  <Head title="Charity Register" />
  <div class="container mb-4 mt-4">
    <form @submit.prevent="submit">
      <section v-if="step == 1">
        <div class="row justify-content-center align-items-center d-flex vh-100">
          <div class="col-md-4">
             <Link class="fw-bold" :href="$route('auth.login')">
              <i class="far fa-angle-double-left fa-lg"></i>
              Return to Login
            </Link>
            <div class="osahan-login py-4">
              <div class="text-center mb-4">
                <a href="index.html">
                  <img src="img/logo.svg" alt="" />
                </a>
                <h5 class="fw-bold mt-3">Charity Creation Setup</h5>
                <p class="text-muted">Step 1 - NGO Information</p>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="mb-1">Organization Name</label>
                    <div class="position-relative icon-form-control">
                      <i class="feather-user position-absolute"></i>
                      <input v-model="form.name" type="text" class="form-control" />
                      <div v-if="form.errors.name" class="text-danger">
                        {{ form.errors.name }}
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
                    <input v-model.trim="form.charity_email" type="email" class="form-control" />
                    <div v-if="errors.charity_email" class="text-danger">
                      {{ errors.charity_email }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="mb-1">Our Organization deals with</label>
                    <div class="position-relative icon-form-control">
                      <ul class="ks-cboxtags">
                        <li v-for="(category, index) in charityCategories" :key="category.id">
                          <input
                            v-model="form.categories"
                            type="checkbox"
                            :id="'checkbox' + index"
                            :value="category.id"
                          />
                          <label :for="'checkbox' + index">{{ category.name }}</label>
                        </li>
                        <div v-if="form.errors['categories.0']" class="text-danger">
                          {{ form.errors['categories.0'] }}
                        </div>
                        <div v-if="form.errors.categories" class="text-danger">
                          {{ form.errors['categories'] }}
                        </div>
                      </ul>
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
                      <input v-model.trim="form.email" type="email" class="form-control" />
                      <small class="form-text text-muted">
                        This is the email you are going to use in login.
                      </small>
                      <div v-if="errors.email" class="text-danger">
                        {{ errors.email }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <label class="mb-1">Password</label>
                    <div class="position-relative icon-form-control">
                      <input v-model.trim="form.password" type="password" id="password" name="password" class="form-control" />
                      <div class="mt-2">
                        <small>
                          <p class="text-danger nmb-1" v-if="v$.password.containsSpecial.$invalid"> &check; Passwords requires an special character. </p>
                        </small>
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
                          <p style="color: orange" v-if="
                            v$.password.minLength.$invalid ||
                            form.password == ''
                          "> &#10006; Passwords needs to have atlest 8 characters.</p>
                          <p style="color: green" v-else> &check;  Passwords needs to have atlest 8 characters.</p>
                        </small>
                      </div>
                      <div v-if="errors.password" class="text-danger">
                        {{ errors.password }}
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <label class="mb-1">Confirm Password</label>
                    <div class="position-relative icon-form-control">
                      <i class="feather-unlock position-absolute"></i>
                      <input v-model.trim="form.password_confirmation" type="password" class="form-control" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row"></div>
              <div class="row">
                <label class="mb-1 mt-2">You agree to the Osahanin <a href="#">User Agreement</a>, <a href="#">Privacy Policy</a>, and <a href="#">Cookie Policy</a>. </label>
              </div>
              <div class="text-center">
                <button class="btn btn-primary text-uppercase mt-3 px-5" @click.prevent="nextStep"> Agree & Join </button>
              </div>
            </div>
          </div>
          <div class="
            col-md-4
            justify-content-center
            align-items-center
            d-flex
            vh-100
          ">
            <div class="card card-custom bg-white border-white border-0">
              <div class="card-custom-img" style="
                  background-image: url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);
                "></div>
              <div class="card-body" style="overflow-y: auto">
                <div class="wrapper">
                  <ul class="StepProgress">
                    <li class="StepProgress-item current">
                      <strong>Step One - Organization Information</strong>
                      <p>Got more entries that you love? Buy more entries anytime! Just hover on your favorite entry and click the Buy button</p>
                    </li>
                    <li class="StepProgress-item">
                      <strong>Step Two - Additional Organization Information</strong>
                    </li>
                    <li class="StepProgress-item">
                      <strong>Step Three - Documents</strong>
                    </li>
                    <li class="StepProgress-item">
                      <strong>Step Four - Email Verification</strong>
                    </li>
                  </ul>
                  <p class="card-text"> Please input the organization details properly & correctly. Any further corrections, please contact charitable@gmail.com </p>
                </div>
              </div>
              <div class="card-footer" style="background: inherit; border-color: inherit"></div>
            </div>
          </div>
        </div>
      </section>
      <section v-if="step == 2">
        <div class="row justify-content-center align-items-center d-flex vh-100">
          <div class="col-md-4">
            <div class="osahan-login py-4">
              <div class="text-center mb-4">
                <a href="index.html">
                  <img src="img/logo.svg" alt="" />
                </a>
                <h5 class="fw-bold mt-3">Charity Creation Setup</h5>
                <p class="text-muted">Step 2 - Additional NGO Information</p>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="mb-1">Organization Description</label>
                    <div class="position-relative icon-form-control">
                      <i class="feather-user position-absolute"></i>
                      <textarea v-model="form.description" type="text" class="form-control" rows="6"></textarea>
                      <div v-if="errors.name" class="text-danger">
                        {{ errors.name }}
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
                    <input v-model.trim="form.fb_link" type="email" class="form-control" />
                    <div v-if="errors.charity_email">
                      {{ errors.charity_email }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label class="mb-1">Twitter Link</label>
                  <div class="position-relative icon-form-control">
                    <i class="feather-at-sign position-absolute"></i>
                    <input v-model.trim="form.twitter_link" type="email" class="form-control" />
                    <div v-if="errors.charity_email">
                      {{ errors.charity_email }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label class="mb-1">Instagram Link</label>
                  <div class="position-relative icon-form-control">
                    <i class="feather-at-sign position-absolute"></i>
                    <input v-model.trim="form.ig_link" type="email" class="form-control" />
                    <div v-if="errors.charity_email">
                      {{ errors.charity_email }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label class="mb-1">Website Link</label>
                  <div class="position-relative icon-form-control">
                    <i class="feather-at-sign position-absolute"></i>
                    <input v-model.trim="form.website_link" type="email" class="form-control" />
                    <div v-if="errors.charity_email">
                      {{ errors.charity_email }}
                    </div>
                  </div>
                </div>
              </div>

                  <label class="pb-5">Organization Logo</label>
                    <div v-if="this.image_file">
                        <p>Uploaded File : </p>
                         <div class="d-flex mx-auto">
                            {{this.image_file}}
                        </div>
                    </div>



                    <file-pond name="file"
                     class="h-50 mb-5"
                      v-model="file"
                       ref="file"
                        v-bind:files="file"
                         v-bind:server="{
                        timeout: 7000,
                        url: '/register/charity/upload',
                        process: {
                        headers: {
                            url: '/register/charity/upload',
                            method: 'POST',
                            'X-CSRF-TOKEN': this.$page.props.csrfToken,
                        },
                        withCredentials: false,
                        },
                    }"
                    allow-multiple="false"
                    accepted-file-types="image/jpeg, image/png"
                    max-files="1"
                    allowDrop="true"
                    dropOnPage="true"
                    v-on:init="handleFilePondInit"
                    v-on:updatefiles="handleFilePondUpdateFiles"></file-pond>



            </div>
          </div>
          <div class="col-md-4 justify-content-center align-items-center d-flex vh-100">
            <div class="card card-custom bg-white border-white border-0">
              <div class="card-custom-img" style="
                background-image: url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);
              "></div>
              <div class="card-body" style="overflow-y: auto">
                <div class="wrapper">
                  <ul class="StepProgress">
                    <li class="StepProgress-item is-done">
                      <strong>Step One - Organization Information</strong>
                    </li>
                    <li class="StepProgress-item current">
                      <strong>Step Two - Additional Organization Information</strong>
                      <p>Got more entries that you love? Buy more entries anytime! Just hover on your favorite entry and click the Buy button</p>
                    </li>
                    <li class="StepProgress-item">
                      <strong>Step Three - Documents</strong>
                    </li>
                    <li class="StepProgress-item">
                      <strong>Step Four - Email Verification</strong>
                    </li>
                  </ul>
                  <p class="card-text"> Please input the organization details properly & correctly. Any further corrections, please contact charitable@gmail.com </p>
                </div>
              </div>
              <div class="card-footer" >
                <div class="d-flex justify-content-end">
                <button class="btn btn-primary text-uppercase  mx-auto" @click.prevent="prevStep"> Previous Step </button>
                <button class="btn btn-primary text-uppercase  mx-auto" @click.prevent="secondNextStep"> Next Step </button>
              </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section v-if="step == 3">
        <div class="row justify-content-center align-items-center d-flex vh-100">
          <div class="col-md-4">
            <div class="osahan-login py-4">
              <div class="text-center mb-4">
                <a href="index.html">
                  <img src="img/logo.svg" alt="" />
                </a>
                <h5 class="fw-bold mt-3">Charity Creation Setup</h5>
                <p class="text-muted">Step 3 - Upload Documents</p>
              </div>
              <div class="row">
                    <label class="pb-5">Organization Logo</label>
                    <file-pond name="documentFile"
                     class="h-50 mb-5"
                      v-model="documentFile"
                       ref="documentFile"
                        v-bind:files="documentFile"
                         v-bind:server="{
                        timeout: 7000,
                        url: '/register/charity/uploadDocuments',
                        process: {
                        headers: {
                            url: '/register/charity/uploadDocuments',
                            method: 'POST',
                            'X-CSRF-TOKEN': this.$page.props.csrfToken,
                        },
                        withCredentials: false,
                        },
                    }"
                    allow-multiple="false"
                    accepted-file-types="image/*"
                    max-files="7"
                    allowDrop="true"
                    dropOnPage="true"
                    v-on:init="handleFilePondInit"
                    v-on:updatefiles="handleFilePondUpdateDocumentFiles"></file-pond>


              </div>
              <div class="d-flex justify-content-end">
                <button class="btn btn-primary text-uppercase mt-3 mx-auto" @click.prevent="prevStep"> Previous Step </button>
                <button :disabled="form.processing" class="btn btn-primary text-uppercase mt-3 mx-auto" @click.prevent="submit">
                  <span v-if="form.processing">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing... </span>
                  <span v-else> Submit </span>
                </button>
              </div>
            </div>
          </div>
          <div class="
            col-md-4
            justify-content-center
            align-items-center
            d-flex
            vh-100
          ">
            <div class="card card-custom bg-white border-white border-0">
              <div class="card-custom-img" style="
                  background-image: url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);
                "></div>
              <div class="card-body" style="overflow-y: auto">
                <div class="wrapper">
                  <ul class="StepProgress">
                    <li class="StepProgress-item is-done">
                      <strong>Step One - Organization Information</strong>
                    </li>
                    <li class="StepProgress-item is-done">
                      <strong>Step Two - Additional Organization Information</strong>
                    </li>
                    <li class="StepProgress-item current">
                      <strong>Step Three - Documents</strong>
                      <p>Got more entries that you love? Buy more entries anytime! Just hover on your favorite entry and click the Buy button</p>
                    </li>
                    <li class="StepProgress-item">
                      <strong>Step Four - Email Verification</strong>
                    </li>
                  </ul>
                  <p class="card-text"> Please input the organization details properly & correctly. Any further corrections, please contact charitable@gmail.com </p>
                </div>
              </div>
              <div class="card-footer" style="background: inherit; border-color: inherit"></div>
            </div>
          </div>
        </div>
      </section>
    </form>
  </div>
</template>
<script>
  import { computed } from "vue";
  import { Inertia } from "@inertiajs/inertia";
  import useVuelidate from "@vuelidate/core";
  import { helpers, required, minLength, maxLength, email, sameAs } from "@vuelidate/validators";
  import { useForm } from "@inertiajs/inertia-vue3";
  import vueFilePond from "vue-filepond";
  import "filepond/dist/filepond.min.css";
  import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
  import FilePondPluginImagePreview from "filepond-plugin-image-preview";

  const FilePond = vueFilePond(FilePondPluginFileValidateType,FilePondPluginImagePreview);

  export default {
    components: {
      FilePond,
    },
    setup() {
      let form = useForm({
        name: null,
        email: null,
        charity_email: null,
        password: null,
        password_confirmation: null,
        description: null,
        fb_link: null,
        twitter_link: null,
        ig_link: null,
        website_link: null,
        file: [],
        categories: [],
        documentFile: null,
        categories: []
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
        form.post(route("register.charity.store"))
      }

      return { form, v$, submit };
    },
    props: {
      errors: Object,
      csrfToken: String,
      charityCategories: Array
    },
    data() {
      return {
        categories: [],
        step: 1,
        totalSteps: 3,
        image_file: '',
        image_file_size: '',
      };
    },
    methods: {
      handleFilePondInit: function() {
        console.log("FilePond has initialized");
        // FilePond instance methods are available on `this.$refs.pond`
      },
      handleFilePondUpdateDocumentFiles:function(documentFile){
        this.form.documentFile = documentFile.map(documentFile => documentFile.file);
      },
      handleFilePondUpdateFiles: function(file) {

        this.image_file = file[0].filename;
        this.image_file_size = file[0].fileSize;

        this.form.file = file[0].file;
      },
      prevStep: function() {
        this.step--;
      },
      nextStep: function(e) {
        this.form.post(route("register.charity.store", {
          step: 1,
        }), {
          onSuccess: () => this.step++,
        })
      },
      secondNextStep: function(e) {
        this.step++;
      },
    },
  };
</script>

<style>
  @import "filepond/dist/filepond.css";

  .filepond--drop-label{
    background-color:white;
    border-radius: 25px;
    border: 2px solid #007bff;
    padding: 20px;
  }

  @import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";

</style>
