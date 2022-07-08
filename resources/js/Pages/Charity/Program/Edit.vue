<template>
  <Head title="Edit Program"></Head>
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
                <h6 class="m-0">Edit Programs</h6>
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
                            name="program_location"
                            v-model="form.location"
                          />
                          <span v-if="form.errors.location" v-text="form.errors.description"
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
                        <input type="text" class="form-control mb-2" 
                          v-model="form.goals[index].name" />
                        <span v-text="form.errors['goals.'+ (index) +'.name']" 
                          v-if="form.errors['goals.'+ (index) +'.name']" class="invalid-feedback d-block" role="alert">
                        </span>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label">Date of Expected Completion</label>
                    <div class="input-group">
                      <input type="date" class="form-control mb-2" v-model="form.goals[index].date"/>
                        <button @click.stop.prevent="removeGoal(index)"
                          class="ms-2 py-0 btn btn-sm btn-danger" style="height: 35px">
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
                  <div class="row">
                    <div class="col-sm-12 mb-2">
                      <div class="js-form-message">
                        <label id="nameLabel" class="form-label"> 
                          Total Needed Amount
                          <span class="text-danger">*</span>
                        </label>
                        <div class="form-group">
                          <input type="number" class="form-control" v-model="form.total_needed_amount" />
                          <span v-if="form.errors.total_needed_amount" 
                            v-text="form.errors.total_needed_amount"
                            class="invalid-feedback d-block" role="alert">
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <label class="mb-1">Program Expenses</label>
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
                        {{ expenseTotal() }}
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
              <button type="submit" class="font-weight-bold btn btn-primary rounded p-3">
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

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { computed, toRaw } from 'vue';


import vueFilePond from "vue-filepond";
import "filepond/dist/filepond.min.css";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";

const FilePond = vueFilePond(
  FilePondPluginFileValidateType,
  FilePondPluginImagePreview
);

let props = defineProps({
  csrfToken: String,
  program: Object
});

let form = useForm({
  name: props.program.name,
  description: props.program.description,
  location: props.program.location,
  goals: props.program.goals,
  total_needed_amount: props.program.total_needed_amount,
  expenses: props.program.expenses,
  header: [],
});

let goBack = () =>  {
    return window.history.back();
};

let handleFilePondUpdateFiles = (file) => {
  form.header = file[0].file;
};

let addGoal = () => {
  let temp = Object.values(toRaw(form.goals));

  temp.push({
    'name': '',
    'value': ''
  });

  form.goals = temp;
};

let removeGoal = (item) => {
  let temp = Object.values(toRaw(form.goals));

  temp.splice(item, 1);

  form.goals = temp;
};

let addExpense = () => {
  let temp = Object.values(toRaw(form.expenses));

  temp.push({
    name:'',
    amount: ''
  });

  form.expenses = temp;
};

let removeExpense = (item) => {
  let temp = Object.values(toRaw(form.expenses));

  temp.splice(item, 1);

  form.expenses = temp;
};

const expenseTotal = () => {
  var total = 0;
  var expenses = Object.values(toRaw(form.expenses));

  expenses.forEach((item, index) => {
    total += item['amount'];
  });

  return total;
}

let submit = () => {
  form.put(route("charity.program.update", {
    'id': props.program.id
  }));
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
