<template>
  <Head title="Create Program"></Head>
  <form @submit.prevent="submit">
    <div class="py-4">
      <div class="container">
        <Link class="fw-bold text-muted" v-on:click="goBack">
          <i class="far fa-arrow-left me-2"></i>
          Go Back
        </Link>
        <div class="row mt-2">
          <aside class="col-md-4">
            <div class="mb-3 border rounded bg-white profile-box text-center w-10">
              <div class="p-4 d-flex align-items-center">
                <h6 class="m-0">Create Programs</h6>
              </div>
            </div>
            <div class="border rounded bg-white mb-3">
              <div class="box-title border-bottom p-3">
                <h6 class="m-0">Program Image Header</h6>
                  <span v-if="form.errors.header" v-text="form.errors.header"
                    class="invalid-feedback d-block" role="alert">
                  </span>
              </div>
              <div class="box-body">
                <div class="p-3 border-bottom">
                  <div class="form-group mb-4">
                    <file-pond
                    name="header"
                    class="h-75 mt-4 mb-2"
                    v-model="header"
                    credits="false"
                    ref="header"
                    v-bind:files="header"
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
                    maxFileSize= "5MB"
                    labelIdle="Click Here To Upload File"
                    v-on:init="handleFilePondInit"
                    v-on:updatefiles="handleFilePondUpdateFiles"
                    v-on:removefile="handleRevertFilePond"
                    v-on:addfilestart="OnhandleOnAddFileStart"
                    v-on:processfile="onHandleaddfile"
                    ></file-pond>
                  </div>
                  <div class="form-group mb-0"></div>
                </div>
              </div>
            </div>
          </aside>
          <main class="col-md-8">
            <div class="border rounded bg-white mb-3">
              <div class="box-title border-bottom p-3">
                <h6 class="m-0">Program Basic Info</h6>
              </div>
              <div class="box-body p-3">
                <form class="js-validate" novalidate="novalidate">
                  <div class="row">
                    <div class="col-sm-12 mb-2">
                      <div class="js-form-message">
                        <label id="nameLabel" class="form-label">
                          Program Name
                          <span class="text-danger">*</span>
                        </label>
                        <div class="form-group">
                          <input
                            type="text"
                            class="form-control"
                            v-model="form.name"
                          />
                          <span v-if="form.errors.name" v-text="form.errors.name"
                            class="invalid-feedback d-block" role="alert">
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 mb-2">
                      <label class="mb-1">Program Description</label>
                      <span class="text-danger">*</span>
                      <div class="position-relative">
                        <textarea class="form-control" rows="4" v-model="form.description" />
                        <span v-if="form.errors.description" v-text="form.errors.description"
                            class="invalid-feedback d-block" role="alert">
                        </span>
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
                            v-model="form.location"
                          />
                          <span v-if="form.errors.location" v-text="form.errors.location"
                            class="invalid-feedback d-block" role="alert">
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="border rounded bg-white mb-3">
              <div class="box-title border-bottom p-3">
                <h6 class="m-0">Goal</h6>
              </div>
              <div class="box-body px-3 pt-3 pb-0">
                <div class="row" v-for="(goal, index) in form.goals" :key="index">
                  <div class="col-sm-6">
                    <label id="FROM" class="form-label">Goal</label>
                    <span class="text-danger">*</span>
                    <div class="input-group">
                        <input type="text" class="form-control mb-2" v-model="goal.name" />
                        <span v-text="form.errors['goals.'+ (index) +'.name']"
                          v-if="form.errors['goals.'+ (index) +'.name']" class="invalid-feedback d-block" role="alert">
                        </span>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label">Date of Expected Completion</label>
                    <div class="d-flex">
                      <Datepicker :minDate="new Date()" format="MM/dd/yyyy" :enableTimePicker="false"
                        v-model="goal.date" class="mb-2 w-100"
                      >
                      </Datepicker>
                      <button @click.stop.prevent="removeGoal(index)"
                        class="py-0 btn btn-sm btn-danger ms-2" style="height: 35px">
                        <i class="fad fa-trash"></i>
                      </button>
                    </div>
                    <span  v-text="form.errors['goals.'+ (index) +'.date']"
                      v-if="form.errors['goals.'+ (index) +'.date']" class="invalid-feedback d-block" role="alert">
                    </span>
                  </div>
                </div>
                <span v-if="form.errors.goals"
                    v-text="form.errors.goals"
                    class="invalid-feedback d-block" role="alert">
                </span>
                <button class="btn btn-light d-inline-block u-text-muted mb-2"
                    @click.stop.prevent="addGoal">
                    <i class="fad fa-plus"></i>
                    Add Goal
                </button>
              </div>
            </div>
            <div class="border rounded bg-white mb-3">
              <div class="box-title border-bottom p-3">
                <h6 class="m-0">Program Donation Details</h6>
              </div>
              <div class="box-body p-3">
                <form class="js-validate" novalidate="novalidate">
                  <label class="mb-1">Program Expenses <span class="text-danger">*</span></label>
                  <div class="row" v-for="(expense, index) in form.expenses" :key="index">
                    <div class="col-sm-6 mb-4">
                      <label id="FROM" class="form-label">Expense name</label>
                        <div class="input-group">
                          <input type="text" class="form-control mb-2" v-model="expense.name" />
                        </div>
                      <span v-if="form.errors['expenses.'+ (index) +'.name']"
                        v-text="form.errors['expenses.'+ (index) +'.name']"
                        class="invalid-feedback d-block" role="alert">
                      </span>
                    </div>
                    <div class="col-sm-6 mb-4">
                      <label class="form-label">Amount</label>
                      <div class="input-group">
                        <input type="number" class="form-control mb-2" v-model="expense.amount" />
                        <button @click.stop.prevent="removeExpense(index)"
                          class="ms-2 py-0 btn btn-sm btn-danger" style="height: 35px">
                          <i class="fad fa-trash"></i>
                        </button>
                      </div>
                      <span v-if="form.errors['expenses.'+ (index) +'.amount']"
                        v-text="form.errors['expenses.'+ (index) +'.amount']"
                        class="invalid-feedback d-block" role="alert">
                      </span>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between">
                      <button class="btn btn-light d-inline-block u-text-muted"
                        @click.stop.prevent="addExpense">
                        <i class="fad fa-plus"></i>
                        Add Program Expenses
                      </button>
                      <div class="align-items-center">
                        <span class="fw-bold">
                          Total:
                        </span>
                        <span class="fa-1x text-gray-300">₱</span>
                        {{ expenseTotal }}
                      </div>
                      <div></div>
                  </div>
                </form>
              </div>
            </div>
            <div class="mb-3 text-right float-end">
              <Link class="btn btn-danger rounded p-3 me-3" v-on:click="goBack">
                <i class="far fa-arrow-left me-2"></i>
                Cancel
              </Link>
              <button type="submit" class="font-weight-bold btn btn-primary rounded p-3" :disabled="this.LoadingState == 'false'">
                Save Changes
                 <i class="far fa-arrow-right me-2"></i>
              </button>
            </div>
          </main>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";

import vueFilePond from "vue-filepond";
import "filepond/dist/filepond.min.css";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';
``
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

import axios from "axios";

import { ref, computed } from 'vue';

const FilePond = vueFilePond(
  FilePondPluginFileValidateType,
  FilePondPluginImagePreview,
  FilePondPluginFileValidateSize
);

export default {
  components: {
    FilePond, Datepicker
  },
  setup() {

    let form = useForm({
      name: null,
      description: null,
      location: null,
      goals: [{name: '', date: ''}],
      expenses: [{name: '', amount: 0}],
      header: null,
      total_needed_amount: null,
    });

    let submit = () => {
      form.post(route("charity.program.store"));
    };
    
    return { form, submit };
  },
  data() {
    return{
    lastFileName : '',
    LoadingState : 'true'
    }
  },
  props: {
    csrfToken: String,
  },
  methods: {
    goBack() {
      this.handleRevertFilePond();
      return window.history.back();
    },
    addExpense(){
      this.form.expenses.push({
        name:'',
        amount: 0
      })
    },
    removeExpense(item){
      this.form.expenses.splice(item, 1);
    },
    addGoal(){
      this.form.goals.push({
        name:'',
        date: ''
      })
    },
    removeGoal(item){
      this.form.goals.splice(item, 1);
    },
      handleFilePondUpdateFiles: function (header) {
      this.form.header = header.map(
        (header) => header.file
      );
      this.lastFileName = this.form.header;
    },
    handleRevertFilePond: function (header) {
      return axios({
        method: "POST",
        url: "/charity/uploadProgramPhoto/revert",
        data: {
          filename : this.lastFileName[0].name
        },
      }).then((response) => {

      });
    },
    OnhandleOnAddFileStart: function(){
        this.LoadingState = 'false';
    },
    onHandleaddfile:function(){
        this.LoadingState = 'true';
    },
  },
  computed: {
    expenseTotal() {
      var total = 0;
      this.form.expenses.forEach((item, index) => {
        total += item['amount'];
      });

      return total;
    }
  }
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
