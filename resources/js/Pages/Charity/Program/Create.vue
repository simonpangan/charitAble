<template>
  <form @submit.prevent="submit">
    <div class="py-4">
      <div class="container">
        <div class="row">
          <!-- Main Content -->
          <aside class="col-md-4">
            <div
              class="mb-3 border rounded bg-white profile-box text-center w-10"
            >
              <div class="p-4 d-flex align-items-center">
                <h6 class="m-0">Create Programs</h6>
              </div>
            </div>
            <div class="border rounded bg-white mb-3">
              <div class="box-title border-bottom p-3">
                <h6 class="m-0">Program Image Header</h6>
                <p class="mb-0 mt-0 small">
                  Tell about yourself in two sentences.
                </p>
              </div>
              <div class="box-body">
                <div class="p-3 border-bottom">
                  <div class="form-group mb-4">
                    <file-pond
                      name="file"
                      class="h-50 mb-5"
                      v-model="file"
                      ref="file"
                      credits="false"
                      v-bind:files="file"
                      v-bind:server="{
                        timeout: 7000,
                        url: '/charity/uploadProgramPhoto',
                        process: {
                          headers: {
                            url: '/charity/uploadProgramPhoto',
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
                      v-on:updatefiles="handleFilePondUpdateFiles"
                    ></file-pond>
                  </div>
                  <div class="form-group mb-0"></div>
                </div>
                <div class="overflow-hidden text-center p-3">
                  <a
                    class="font-weight-bold btn btn-light rounded p-3 d-block"
                    href="#"
                  >
                    SAVE
                  </a>
                </div>
              </div>
            </div>
          </aside>
          <main class="col-md-8">
            <div class="border rounded bg-white mb-3">
              <div class="box-title border-bottom p-3">
                <h6 class="m-0">Edit Basic Info</h6>
                <p class="mb-0 mt-0 small">
                  Lorem ipsum dolor sit amet, consecteturs.
                </p>
              </div>
              <div class="box-body p-3">
                <form class="js-validate" novalidate="novalidate">
                  <div class="row">
                    <!-- Input -->
                    <div class="col-sm-6 mb-2">
                      <div class="js-form-message">
                        <label id="nameLabel" class="form-label">
                          Program Name
                          <span class="text-danger">*</span>
                        </label>
                        <div class="form-group">
                          <input
                            type="text"
                            class="form-control"
                            v-model="form.program_name"
                          />
                          <small class="form-text text-muted"
                            >Displayed on your public profile, notifications and
                            other places.</small
                          >
                        </div>
                      </div>
                    </div>
                    <!-- End Input -->
                    <!-- Input -->
                    <div class="col-sm-6 mb-2">
                      <div class="js-form-message">
                        <label id="usernameLabel" class="form-label">
                          Program Type
                          <span class="text-danger">*</span>
                        </label>
                        <div class="form-group">
                          <input
                            type="text"
                            class="form-control"
                            v-model="form.program_type"
                          />
                        </div>
                      </div>
                    </div>
                    <!-- End Input -->
                  </div>

                  <div class="row">
                    <div class="col-sm-12 mb-2">
                      <label class="mb-1">Program Description</label>
                      <span class="text-danger">*</span>
                      <span class="text-danger">*</span>
                      <div class="position-relative">
                        <textarea
                          class="form-control"
                          rows="4"
                          v-model="form.program_description"
                        >
Write something for benefactors to know more about this wonderful program.
                    </textarea
                        >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 mb-2">
                      <div class="js-form-message">
                        <label id="locationLabel" class="form-label">
                          Location
                          <span class="text-danger">*</span>
                        </label>
                        <div class="form-group">
                          <input
                            type="text"
                            class="form-control"
                            name="program_location"
                          />
                        </div>
                      </div>
                    </div>
                    <!-- End Input -->
                  </div>
                </form>
              </div>
            </div>
            <div class="border rounded bg-white mb-3">
              <div class="box-title border-bottom p-3">
                <h6 class="m-0">Goal</h6>
                <p class="mb-0 mt-0 small">
                  Tell about your work, job, and other experiences.
                </p>
              </div>
              <div class="box-body px-3 pt-3 pb-0">
                <div class="row">
                  <div class="col-sm-6 mb-4">
                    <label id="FROM" class="form-label">Goal</label>
                    <span class="text-danger">*</span>

                    <!-- Input -->

                    <div v-for="key in count" :key="key">
                      <div class="input-group">
                        <input
                          type="text"
                          class="form-control mb-2"
                          v-model="goal_values[key]"
                          placeholder="From"
                          aria-label="FROM"
                          aria-describedby="FROM"
                        />
                      </div>
                    </div>
                    <div class="d-flex">
                      <a
                        class="d-inline-block u-text-muted"
                        href="#"
                        @click="add"
                      >
                        <span class="mr-1">+</span>
                        Add Goal
                      </a>
                      <a
                        class="d-inline-block text-danger mx-auto"
                        href="#"
                        v-if="count > 1"
                        @click="remove"
                      >
                        <span class="mr-1">+</span>
                        Remove Goal
                      </a>
                    </div>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label id="TO" class="form-label"
                      >Date of Expected Completion</label
                    >
                    <div v-for="key in count" :key="key">
                      <div class="input-group">
                        <input
                          type="date"
                          class="form-control mb-2"
                          v-model="goal_date_values[key]"
                          placeholder="From"
                          aria-label="FROM"
                          aria-describedby="FROM"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="border rounded bg-white mb-3">
              <div class="box-title border-bottom p-3">
                <h6 class="m-0">Program Donation Details</h6>
                <p class="mb-0 mt-0 small">
                  Lorem ipsum dolor sit amet, consecteturs.
                </p>
              </div>
              <div class="box-body p-3">
                <form class="js-validate" novalidate="novalidate">
                  <div class="row">
                    <!-- Input -->
                    <div class="col-sm-12 mb-2">
                      <div class="js-form-message">
                        <label id="nameLabel" class="form-label">
                          Total Donation Amount<span class="text-danger"
                            >*</span
                          >
                        </label>
                        <div class="form-group">
                          <input
                            type="number"
                            class="form-control"
                            v-model="form.program_donation_total"
                          />
                          <small class="form-text text-muted"
                            >Displayed on your public profile, notifications and
                            other places.</small
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6 mb-4">
                      <label id="FROM" class="form-label"
                        >Add Program Expenses</label
                      >
                      <!-- Input -->
                      <div v-for="keyProgram in countProgram" :key="keyProgram">
                        <div class="input-group">
                          <input
                            type="text"
                            class="form-control mb-2"
                            v-model="program_expenses[keyProgram]"
                            placeholder="From"
                            aria-label="FROM"
                            aria-describedby="FROM"
                          />
                        </div>
                      </div>
                      <div class="d-flex">
                        <a
                          class="d-inline-block u-text-muted"
                          href="#"
                          @click="addProgram"
                        >
                          <span class="mr-1">+</span>
                          Add Program Expenses
                        </a>
                        <a
                          class="d-inline-block text-danger mx-auto"
                          href="#"
                          v-if="countProgram > 1"
                          @click="removeProgram"
                        >
                          <span class="mr-1">+</span>
                          Add Program Expenses
                        </a>
                      </div>
                    </div>
                    <div class="col-sm-6 mb-4">
                      <label id="TO" class="form-label"
                        >Date of Expected Completion</label
                      >
                      <div v-for="keyProgram in countProgram" :key="keyProgram">
                        <div class="input-group">
                          <input
                            type="number"
                            class="form-control mb-2"
                            v-model="program_date_expenses[keyProgram]"
                            placeholder="From"
                            aria-label="FROM"
                            aria-describedby="FROM"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="mb-3 text-right">
              <a class="font-weight-bold btn btn-link rounded p-3">
                &nbsp;&nbsp;&nbsp;&nbsp; Cancel &nbsp;&nbsp;&nbsp;&nbsp;
              </a>
              <button
                class="font-weight-bold btn btn-primary rounded p-3"
                @click="SubmitFormButton"
              >
                Save Changes
              </button>
            </div>
          </main>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-vue3";

import vueFilePond from "vue-filepond";
// Import FilePond styles
import "filepond/dist/filepond.min.css";
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
      program_name: null,
      program_type: null,
      program_description: null,
      location: null,
      goal: null,
      program_expenses: null,
      header: [],
      program_donation_total: null,
    });

    let submit = () => {
      form.post(route("charity.program.store"));
    };

    return { form, submit };
  },
  props: {
    csrfToken: String,
  },
  data() {
    return {
      goalData: {},
      count: 1,
      countProgram: 1,
      goal_values: [],
      goal_date_values: [],
      program_expenses: [],
      program_date_expenses: [],
      program_donation_total: null,
    };
  },
  methods: {
    add: function () {
      this.count++;
   
    },
    remove: function () {
      this.count--;
    },
    addProgram: function () {
      this.countProgram++;
    },
    removeProgram: function () {
      this.countProgram--;
    },
    handleFilePondUpdateFiles: function (file) {
      this.form.header = file[0].file;
    },
    SubmitFormButton: function () {
      console.log(this.goal_values + this.goal_date_values);
      var goal_array = [];
      var expenses = [];

      for (let i = 0; i < this.goal_values.length; i++) {
        if (this.goal_values[i] && this.goal_date_values[i] != null) {
          //goal_array.push(this.goal_values[i] +','+ this.goal_date_values[i]);
          goal_array.push({
            goal: this.goal_values[i],
            goal_date: this.goal_date_values[i],
          });

          this.form.goal = goal_array;
        }
      }

      for (let i = 0; i < this.program_expenses.length; i++) {
        if (this.program_expenses[i] && this.program_date_expenses[i] != null) {
          expenses.push({
            program_expenses: this.program_expenses[i],
            program_date_expenses: this.program_date_expenses[i],
          });
          this.form.program_expenses = expenses;
        }
      }
      this.form.post(route("charity.program.store"));
    },
  },
};
</script>
<style>
@import "filepond/dist/filepond.css";

.filepond--drop-label {
  background-color: white;
  border-radius: 25px;
  border: 2px solid #007bff;
  padding: 20px;
}

.filepond--wrapper {
  max-height: 220px;
}
@import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";
</style>
