<template>
	         <div class="container">
            <div class="row justify-content-center align-items-center d-flex vh-100">
               <div class="col-md-4 mx-auto">
                  <i class="feather-arrow-left me-2 "></i><a class="fw-bold" href="sign-in.html">Return to Login</a>
                  <div class="osahan-login py-4">
                     <div class="text-center mb-4">
                        <a href="index.html"><img src="img/logo.svg" alt=""></a>
                        <h5 class="fw-bold mt-3">Creating A Better Tomorrow.</h5>
                        <p class="text-muted">Step 1 - Basic Sign Up</p>
                     </div>
                     <form @submit.prevent="submit">
                        <div class="row">
                           <div class="col">
                              <div class="form-group">
                                 <label class="mb-1">First name</label>
                                 <div class="position-relative icon-form-control">
                                    <i class="feather-user position-absolute"></i>
                                    <input v-model="form.firstName" type="text" class="form-control">
                                    <div v-if="errors.firstName">{{ errors.firstName }}</div>

                                 </div>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-group">
                                 <label class="mb-1">Last name</label>
                                 <div class="position-relative icon-form-control">
                                    <i class="feather-user position-absolute"></i>
                                    <input v-model="form.lastName"  type="text" class="form-control">
                                    <div v-if="errors.lastName">{{ errors.lastName }}</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col">
                              <label class="mb-1">Email</label>
                              <div class="position-relative icon-form-control">
                                 <i class="feather-at-sign position-absolute"></i>
                                 <input v-model="form.email" type="email" class="form-control">
                                 <div v-if="errors.email">{{ errors.email }}</div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col">
                              <label class="mb-1">Password (8 or more characters)</label>
                              <div class="position-relative icon-form-control">
                                 <i class="feather-unlock position-absolute"></i>
                                 <input v-model="form.password" type="password" class="form-control">
                                 <div v-if="errors.password">{{ errors.password }}</div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col">
                              <label class="mb-1">Confirm Password</label>
                              <div class="position-relative icon-form-control">
                                 <i class="feather-unlock position-absolute"></i>
                                 <input v-model="form.password_confirmation" type="password" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <label class="mb-1 mt-2">You agree to the Osahanin <a href="#">User Agreement</a>, <a href="#">Privacy Policy</a>, and <a  href="#">Cookie Policy</a>.</label>
                        </div>
                        <div class="text-center">
                           <button class="btn btn-primary text-uppercase mt-3 px-5" type="submit"> Agree & Join </button>
                        </div>
                        <div class="text-center mt-3 border-bottom pb-3">
                           <p class="small text-muted">Or login with</p>
                           <div class="text-center">
                              <button type="button" class="btn btn-sm btn-outline-instagram btn-block px-5"><i class="feather-instagram"></i> Sign Up Using Google</button>
                           </div>
                        </div>
                        <div class="py-3 d-flex align-item-center">
                           <a href="forgot-password.html">Forgot password?</a>
                        </div>
                        <div class="py-3 d-flex align-item-center">
                           <span class="me-5"> Charities or NGO?  <a class="fw-bold ms-2" href="sign-in.html">Let's Work Together</a></span>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
</template>

<script>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

export default {
props:{
    errors: Object,
},

  setup () {
    const form = reactive({
      firstName: null,
      lastName: null,
      email: null,
      password: null,
      password_confirmation:null,
      isSetupCompleted: 0
    })

    function submit() {
      Inertia.post('/register', form)
    }

    return { form, submit }
  },
}
</script>
