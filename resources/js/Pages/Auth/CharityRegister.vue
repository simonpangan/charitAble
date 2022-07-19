<template>
  <Head title="Charity Register"/>
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
                <h5 class="fw-bold mt-3">Charity Creation Setup</h5>
                <p class="text-muted">Step 1 - NGO Information</p>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="mb-1">Organization Name <span class="text-danger">*</span></label>
                      <input v-model="form.name" type="text" class="form-control" />
                      <div v-if="form.errors.name" class="text-danger">
                        {{ form.errors.name }}
                      </div>
                  </div>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col">
                  <label class="mb-1">Organization Email <span class="text-danger">*</span></label>
                    <input v-model.trim="form.charity_email" type="email" class="form-control" />
                    <div v-if="form.errors.charity_email" class="text-danger">
                      {{ form.errors.charity_email }}
                    </div>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col">
                  <div class="form-group">
                    <label class="mb-1">Our Organization deals with <span class="text-danger">*</span> <small><span class="text-muted">(Please select at least one)</span></small></label>
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
              <div class="row">
                <div class="row">
                  <div class="col">
                    <label class="mb-1">Head Admin - Email <span class="text-danger">*</span></label>
                      <input v-model.trim="form.email" type="email" class="form-control" />
                      <small class="form-text text-muted">
                        This is the email you are going to use in login.
                      </small>
                      <div v-if="form.errors.email" class="text-danger">
                        {{ form.errors.email }}
                      </div>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-12">
                    <label class="mb-1">Password <span class="text-danger">*</span></label>
                      <div class="input-group mb-3 d-flex">
                          <div class="icon-form-control position-relative flex-fill">
                                <i class="far fa-lock position-absolute mt-2 ms-3"></i>
                              <input v-model="form.password" 
                                  :type="(showPassword) ? 'text' : 'password'"
                                  class="form-control" :class="{ 'is-invalid': form.errors.password }"
                              />
                          </div>
                          <button type="button" @click="toggleShow" 
                              class="btn input-group-icon" id="inputGroup-sizing-default">
                              <span v-if="showPassword">
                                  <i  class="fas fa-1x fa-eye-slash"></i>
                              </span>
                              <span v-else>
                                  <i  class="fas fa-1x fa-eye"></i>
                              </span>
                          </button>
                      </div>  
                      <div class="alert alert-info mt-2" role="alert">
                        <small>
                          <p class="text-danger nmb-1" v-if="v$.password.containsSpecial.$invalid"> &#10006; Passwords requires an special character. </p>
                        </small>
                        <small>
                          <p class="nmb-1 text-success" v-if="!v$.password.containsSpecial.$invalid"> &check; Passwords requires an special character. </p>
                        </small>
                        <small>
                          <p class="nmb-1 text-success" v-if="!v$.password.containsNumber.$invalid"> &check; Passwords requires an numerical character. </p>
                        </small>
                        <small>
                          <p class="nmb-1 text-danger " v-if="v$.password.containsNumber.$invalid"> &#10006; Passwords requires an numerical character. </p>
                        </small>
                        <small>
                          <p class="nmb-1 text-success" v-if="!v$.password.containsLowercase.$invalid"> &check; Passwords requires an lower case character. </p>
                        </small>
                        <small>
                          <p class="nmb-1 text-danger " v-if="v$.password.containsLowercase.$invalid"> &#10006; Passwords requires an lower case character. </p>
                        </small>
                        <small>
                          <p class="nmb-1 text-success" v-if="!v$.password.containsUppercase.$invalid"> &check; Passwords requires an upper case character. </p>
                        </small>
                         <small>
                          <p class="nmb-1 text-danger" v-if="v$.password.containsUppercase.$invalid"> &#10006; Passwords requires an upper case character. </p>
                        </small>
                        <small>
                          <p style="color: #de4437" v-if="
                            v$.password.minLength.$invalid ||
                            form.password == ''"> &#10006; Passwords needs to have atleast 8 characters.</p>
                          <p style="color: #00c9a7" v-else> &check;  Passwords needs to have atleast 8 characters.</p>
                        </small>
                      </div>
                      <div v-if="form.errors.password" class="text-danger">
                        {{ form.errors.password }}
                      </div>
                  </div>
                  <div class="col">
                    <label class="mb-1">Confirm Password <span class="text-danger">*</span></label>
                      <input v-model.trim="form.password_confirmation" type="password" class="form-control" />
                  </div>
                </div>
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
                      <p>Enter your organization information. Please make sure all inputs are correct.</p>
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
              <div class="card-footer" style="background: inherit; border-color: inherit">
                <div class="row">
                <label class="mb-1 mt-2">By registering to our platform , you are now agreeing to the CharitAble
                    <Link href="/terms" target="_blank">Terms and User Agreement</Link>,
                </label>
              </div>
              <div class="text-center">
                <button class="btn btn-primary text-uppercase mt-3 px-5" @click.prevent="nextStep"> Agree & Join </button>
              </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section v-if="step == 2">
        <div class="row justify-content-center align-items-center d-flex vh-100">
          <div class="col-md-4">
            <div class="osahan-login py-4">
              <div class="text-center mb-4">
                <h5 class="fw-bold mt-3">Charity Creation Setup</h5>
                <p class="text-muted">Step 2 - Additional NGO Information</p>
              </div>
              <div class="row mb-1">
                <div class="col">
                  <div class="form-group">
                    <label class="mb-1">Organization Description <span class="text-danger">*</span></label>
                      <textarea v-model="form.description" type="text" class="form-control" rows="6"></textarea>
                      <div v-if="form.errors.description" class="text-danger">
                        {{ form.errors.description }}
                      </div>
                  </div>
                </div>
              </div>
             <div>
               <label class="mb-1">Address <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                 <textarea type="textarea" v-model="form.address" class="form-control"> </textarea>
                <select v-model="form.city" class="form-select" id="inputGroupSelect02">
                  <option :value="null">Select City</option>
                  <option v-for="city in locations" :key="city.id" :value="city.id">
                    {{ city.name }}
                  </option>
                </select>
              </div>
               <div v-if="form.errors.address" class="text-danger d-block">
                  {{ form.errors.address }}
                </div>
                <div v-if="form.errors.city" class="text-danger d-block">
                  {{ form.errors.city }}
                </div>
             </div>
              <div class="row mt-2">
                <div class="col">
                  <label class="mb-1">Facebook Link</label>
                    <input v-model.trim="form.fb_link" type="text" class="form-control" />
                    <small class="form-text text-muted">
                      Ex: https://www.facebook.com/unicefphilippines/
                    </small>
                    <div v-if="form.errors.fb_link" class="text-danger">
                      {{ form.errors.fb_link }}
                    </div>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col">
                  <label class="mb-1">Twitter Link</label>
                    <input v-model.trim="form.twitter_link" type="text" class="form-control" />
                    <small class="form-text text-muted">
                      Ex: https://twitter.com/unicefphils
                    </small>
                    <div v-if="form.errors.twitter_link" class="text-danger">
                      {{ form.errors.twitter_link }}
                    </div>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col">
                  <label class="mb-1">Instagram Link</label>
                    <input v-model.trim="form.ig_link" type="text" class="form-control" />
                    <small class="form-text text-muted">
                      Ex: https://www.instagram.com/unicef/?hl=en
                    </small>
                    <div v-if="form.errors.ig_link" class="text-danger">
                      {{ form.errors.ig_link }}
                    </div>
                </div>
              </div>
              <div class="row mt-2 mb-2">
                <div class="col">
                  <label class="mb-1">Website Link</label>
                    <input v-model.trim="form.website_link" type="text" class="form-control" />
                    <small class="form-text text-muted">
                      Ex: https://www.unicef.org/
                    </small>
                    <div v-if="form.errors.website_link" class="text-danger">
                      {{ form.errors.website_link }}
                    </div>
                </div>
              </div>

              <label class="pb-2">Organization Logo  <span class="text-danger">*</span></label>
                <div v-if="form.errors.logo" class="text-danger d-block">
                  {{ form.errors.logo }}
                </div>
                <div v-if="this.image_file != ''">
                    <p>Uploaded File : </p>
                      <div class="d-flex me-auto">
                        {{this.image_file}}
                    </div>
                    <button v-if="this.return_from_step3 === 1" type="button" class="btn btn-danger btn-sm mb-1"  @click.prevent="deleteLogoState">Delete currently uploaded file</button>
                </div>
                <file-pond name="file"
                  class="h-25 mb-5"
                required="true"
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
                accepted-file-types="image/jpeg, image/png, image/jpg"
                max-files="1"
                label="Click here to Upload Charity Logo"
                allowDrop="true"
                maxFileSize= "3MB"
                v-on:init="handleFilePondInit"
                v-on:updatefiles="handleFilePondUpdateFiles"
                v-on:removefile="handleRevertFilePond"
                v-on:addfilestart="OnhandleOnAddFileStart"
                v-on:processfile="onHandleaddfile">
                </file-pond>
              </div>
          </div>
          <div class="col-md-4  justify-content-center align-items-center d-flex vh-100">
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
                      <p>We need to know more about your charity. A charity logo would be useful branding tool for benefactors to see.</p>
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
                <button :disabled="this.LoadingState == 'false'" class="btn btn-primary text-uppercase  mx-auto" @click.prevent="prevStep" > Previous Step </button>
                <button :disabled="this.LoadingState == 'false'" class="btn btn-primary text-uppercase  mx-auto" @click.prevent="secondNextStep" > Next Step </button>
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
                <h5 class="fw-bold mt-3">Charity Creation Setup</h5>
                <p class="text-muted">Step 3 - Upload Documents</p>
              </div>
              <div class="row">
                <label class="pb-5">Documents</label>
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
                    allowImagePreview="false"
                    credits="false"
                    accepted-file-types="image/jpeg, image/png, image/jpg, application/pdf"
                    max-files="7"
                    maxFileSize= "5MB"
                    allowDrop="true"
                    dropOnPage="true"
                    v-on:init="handleFilePondInit"
                    v-on:updatefiles="handleFilePondUpdateDocumentFiles"
                    v-on:addfilestart="OnhandleOnAddFileStart"
                    v-on:processfile="onHandleaddfile">
                  </file-pond>

              </div>
              {{this.adedDocumentLists}}
              <div class="d-flex justify-content-end">
                <button :disabled="form.processing || this.LoadingState == 'false'" class="btn btn-primary text-uppercase mt-3 mx-auto" @click.prevent="submit">
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
                      <p>Submit valid documents to get verified and access programs/donate feature. </p>
                      <p>The following documents are valid (DTI , SEC License, PCNC Accreditation License, Mayor's Permit) </p>

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
  import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';
  import FilePondPluginImagePreview from "filepond-plugin-image-preview";
  import axios from "axios";
  import Swal from 'sweetalert2';


  const FilePond = vueFilePond(FilePondPluginFileValidateType,FilePondPluginImagePreview,FilePondPluginFileValidateSize);

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
        address: null,
        city: null,
        fb_link: null,
        twitter_link: null,
        ig_link: null,
        website_link: null,
        logo: [],
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
      csrfToken: String,
      charityCategories: Array,
      locations: Array
    },
    data() {
      return {
        categories: [],
        step: 1,
        totalSteps: 3,
        return_from_step3: 0,
        image_file: '',
        image_file_size: '',
        lastFileName : '',
        uploadedDocumentLists: '',
        LoadingState : 'true',
        documentsFileName : [],
        showPassword: false
      };
    },
    methods: {
      toggleShow() {
        this.showPassword = ! this.showPassword;
      },
      deleteLogoState:function(){
        this.image_file = '';
         this.image_file_size= '';
        this.form.logo = [];
        this.$refs.file.value = null;

      },
      handleFilePondUpdateDocumentFiles:function(documentFile){
        this.form.documentFile = documentFile.map(documentFile => documentFile.file);
      },
      handleFilePondUpdateFiles: function(file) {
        this.return_from_step3 = 0;

        this.image_file = file[0].filename;
        this.image_file_size = file[0].fileSize;

        this.form.logo = file[0].file;
      },
    handleRevertFilePond: function () {
      axios({
        method: "POST",
        url: route('register.charity.upload.logo.revert'),
        data: {
          filename : this.image_file
        },
      }).then((response) => {
       this.image_file = '';
      });
    },
    OnhandleOnAddFileStart: function(){
        this.LoadingState = 'false';
    },
    onHandleaddfile:function(){
        this.LoadingState = 'true';
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
        if(this.image_file === ''){
            Swal.fire({
                title: 'Error!',
                text: 'Please add an charity logo',
                icon: 'error',
                confirmButtonText: 'Close'
                })
        }else{
        this.return_from_step3  = 1;
        this.form.post(route("register.charity.store", {
          step: 2,
        }), {
          onSuccess: () => this.step++,

        })
        }
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
