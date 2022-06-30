<template>
  <Head title="Add Board Member" />
  <div class="container">
    <div class="row justify-content-center align-items-center d-flex h-75 mt-5">
      <div class="col-md-6">
        <Link :href="$route('charity.profile.index')" class="fw-bold text-muted ">
          <i class="far fa-arrow-left me-2 "></i>
          Return to Profile
        </Link>
        <form @submit.prevent="submit">
        <div class="box shadow-sm border rounded bg-white mb-3 mt-3 osahan-post">
          <div
            class="p-3 d-flex align-items-center border-bottom osahan-post-header">
            <div class="me-3">
              <h6>Add Board Member</h6>
            </div>
          </div>
          <div class="p-3 border-bottom osahan-post-body">
            <div class="row">
                <div class="col-sm-6 mb-2">
                  <div class="js-form-message">
                    <label id="nameLabel" class="form-label"> First Name <span class="text-danger">*</span>
                    </label>
                    <div class="form-group">
                      <input type="text" class="form-control" 
                        v-model="form.first_name" 
                        placeholder="Enter name" />
                        <span v-if="form.errors.first_name" class="text-danger">
                          {{ form.errors.first_name }}
                        </span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-2">
                  <div class="js-form-message">
                    <label id="usernameLabel" class="form-label"> Last Name <span class="text-danger">*</span>
                    </label>
                    <div class="form-group">
                      <input  type="text" class="form-control" v-model="form.last_name" placeholder="Enter last name" />
                        <span v-if="form.errors.last_name" class="text-danger">
                          {{ form.errors.last_name }}
                        </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="mb-1">Position</label>
                    <div class="position-relative">
                      <input type="text" class="form-control" 
                        v-model="form.position" 
                        placeholder="Enter position" />
                      <span v-if="form.errors.position" class="text-danger">
                          {{ form.errors.position }}
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-2">
                  <div class="col">
                      <div class="form-group">
                          <label class="mb-1">Officer since...</label>
                          <input type="date" v-model="form.officer_since" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                      </div>
                        <span v-if="form.errors.officer_since" class="text-danger">
                          {{ form.errors.officer_since }}
                      </span>
                  </div>
              </div>    
          </div>
          <div class="p-3 border-bottom osahan-post-footer">
            <div class="p-3 d-flex">
              <span class="mx-auto">
                <button :disabled="form.processing"  type="submit" class="btn btn-primary btn-sm rounded">
                  Submit
                </button>
              </span>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3"

export default {
  setup() {
    let form = useForm({
        first_name: null,
        last_name: null,
        position: null,
        officer_since:null
    })

    let submit = () => {
        form.post(route('charity.officer.store'));
    }

    return { form, submit}
  }
};
</script>
