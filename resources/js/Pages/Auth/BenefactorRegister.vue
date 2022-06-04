<template>
        <div class="container">
            <div class="row justify-content-center align-items-center d-flex vh-100">
                <form @submit.prevent="submit">
                    <section v-if="step == 1">
                        <div class="col-md-4 mx-auto">
                            <i class="feather-arrow-left me-2"></i
                            ><a class="fw-bold" href="sign-in.html">Return to Login</a>
                            <div class="osahan-login py-4">
                                <div class="text-center mb-4">
                                    <a href="index.html"><img src="img/logo.svg" alt="" /></a>
                                    <h5 class="fw-bold mt-3">Creating A Better Tomorrow.</h5>
                                    <p class="text-muted">Step 1 - Basic Sign Up</p>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="mb-1">First name</label>
                                            <div class="position-relative icon-form-control">
                                                <i class="feather-user position-absolute"></i>
                                                <input
                                                    v-model.trim="form.firstName"
                                                    type="text"
                                                    class="form-control"
                                                />
                                                <div v-if="v$.firstName.$error">
                                                    <p class="text-danger">
                                                        <small>{{
                                                                v$.firstName.$errors[0].$message
                                                            }}</small>
                                                    </p>
                                                </div>

                                                <div v-if="errors.firstName" class="text-danger">
                                                    {{ errors.firstName }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="mb-1">Last name</label>
                                            <div class="position-relative icon-form-control">
                                                <i class="feather-user position-absolute"></i>
                                                <input
                                                    v-model.trim="form.lastName"
                                                    type="text"
                                                    class="form-control"
                                                />
                                                <div class="text-danger" v-if="v$.firstName.$error">
                                                    <p class="text-danger">
                                                        <small>{{ v$.lastName.$errors[0].$message }}</small>
                                                    </p>
                                                </div>

                                                <div v-if="errors.lastName" class="text-danger">
                                                    {{ errors.lastName }}
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
                                            <input
                                                v-model.trim="form.email"
                                                type="email"
                                                class="form-control"
                                            />
                                            <div class="text-danger" v-if="v$.email.$error">
                                                <p class="text-danger">
                                                    <small>{{ v$.email.$errors[0].$message }}</small>
                                                </p>
                                            </div>
                                            <div class="text-danger" v-if="errors.email">{{ errors.email }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
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
                                            <div class="alert alert-info mt-2" role="alert">
                                                <small
                                                ><p
                                                    style="color: green"
                                                    class="nmb-1"
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
                                                    class="nmb-1"
                                                    v-if="
                              v$.password.minLength.$invalid ||
                              v$.password.maxLength.$invalid ||
                              form.password == ''
                            "
                                                >
                                                    &#10006; Passwords needs to be in between 8 to 19
                                                    characters.
                                                </p>
                                                    <p style="color: green" 
                                                    class="nmb-1"
                                                    v-else>
                                                        &check; Passwords needs to be in between 8 to 19
                                                        characters.
                                                    </p></small
                                                >
                                                <small></small>
                                            </div>

                                            <div v-if="errors.password">{{ errors.password }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
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
                                <div class="text-center mt-3 border-bottom pb-3">
                                    <p class="small text-muted">Or login with</p>
                                    <div class="text-center">
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-instagram btn-block px-5"
                                        >
                                            <i class="feather-instagram"></i> Sign Up Using Google
                                        </button>
                                    </div>
                                </div>
                                <div class="py-3 d-flex align-item-center">
                                    <a href="forgot-password.html">Forgot password?</a>
                                </div>
                                <div class="py-3 d-flex align-item-center">
                  <span class="me-5 ">
                    Charities or NGO?
                    <a class="fw-bold ms-2" href="sign-in.html"
                    >Let's Work Together</a
                    ></span
                  >
                                </div>
                            </div>
                        </div>
                    </section>
                    <section v-if="step == 2">
                        <div class="col-md-4 mx-auto">
                            <div class="osahan-login py-4">
                                <div class="text-center mb-4">
                                    <a href="index.html"><img src="img/logo.svg" alt="" /></a>
                                    <h5 class="fw-bold mt-3">Creating A Better Tomorrow.</h5>
                                    <p class="text-muted">Step 2 - Personal Information</p>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="mb-1">Age</label>
                                            <div class="position-relative icon-form-control">
                                                <i class="feather-user position-absolute"></i>
                                                <input
                                                    v-model="form.age"
                                                    type="text"
                                                    class="form-control"
                                                />
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
                                                <select
                                                    v-model="form.gender"
                                                    class="form-select"
                                                    aria-label="Default select example"
                                                >
                                                    <option selected>Open this select menu</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                    <option value="3">Others/Prefer Not to Say</option>
                                                </select>
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
                                            <select class="form-select" v-model="form.accountType">
                                                <option value="Personal">Personal Account</option>
                                                <option value="Business">Business Account</option>
                                            </select>
                                            <div class="text-danger" v-if="v$.accountType.$error">
                                                <p class="text-danger">
                                                    <small>{{
                                                            v$.accountType.$errors[0].$message
                                                        }}</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-2">
                                    <small class="text-muted"
                                    >For users that are under corporate organization and
                                        business, please select Business Account Type</small
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
                                        @click.prevent="secondNextStep"
                                    >
                                        Next Step
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section v-if="step == 3">
                        <div class="col-md-6 mx-auto">
                            <div class="text-center mb-4">
                                <a href="index.html"><img src="img/logo.svg" alt="" /></a>
                                <h5 class="fw-bold mt-3">Creating A Better Tomorrow.</h5>
                                <p class="text-muted">
                                    Step 3 - What do you feel most passionate about?
                                </p>
                            </div>
                            <ul class="ks-cboxtags">
                                <li>
                                    <input
                                        v-model="form.references"
                                        type="checkbox"
                                        id="checkboxOne"
                                        value="Agriculture"
                                    /><label for="checkboxOne">Agriculture</label>
                                </li>
                                <li>
                                    <input
                                        type="checkbox"
                                        v-model="form.preferences"
                                        id="checkboxTwo"
                                        value="Children and Youth"
                                        checked
                                    /><label for="checkboxTwo">Children and Youth</label>
                                </li>
                                <li>
                                    <input
                                        v-model="form.preferences"
                                        type="checkbox"
                                        id="checkboxThree"
                                        value="Community Development"
                                        checked
                                    /><label for="checkboxThree">Community Development</label>
                                </li>
                                <li>
                                    <input
                                        v-model="form.preferences"
                                        type="checkbox"
                                        id="checkboxFour"
                                        value="Education"
                                    /><label for="checkboxFour">Education</label>
                                </li>
                                <li>
                                    <input
                                        v-model="form.preferences"
                                        type="checkbox"
                                        id="checkboxFive"
                                        value="Environment"
                                    /><label for="checkboxFive">Environment</label>
                                </li>
                                <li>
                                    <input
                                        v-model="form.preferences"
                                        type="checkbox"
                                        id="checkboxSix"
                                        value="Wildlife Protection"
                                        checked
                                    /><label for="checkboxSix">Wildlife Protection</label>
                                </li>
                                <li>
                                    <input
                                        v-model="form.preferences"
                                        type="checkbox"
                                        id="checkboxSeven"
                                        value="Women's Empowerment"
                                    /><label for="checkboxSeven">Women's Empowerment</label>
                                </li>
                                <li>
                                    <input
                                        v-model="form.preferences"
                                        type="checkbox"
                                        id="checkboxEight"
                                        value="Animal Conservation"
                                    /><label for="checkboxEight">Animal Conservation</label>
                                </li>                                
                            </ul>
                            <div class="d-flex justify-content-end">
                                <button
                                    class="btn btn-primary text-uppercase mt-3 mx-auto"
                                    @click.prevent="prevStep"
                                >
                                    Previous Step
                                </button>
                                <button
                                    class="btn btn-primary text-uppercase mt-3 mx-auto"
                                    @click.prevent="submit"
                                >
                                    Next Step
                                </button>
                            </div>
                        </div>
                    </section>

                    <section v-if="step == 4">
                    
                    </section>
                </form>
            </div>
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
    numeric,
    minValue,
    maxValue,
} from "@vuelidate/validators";
import axios from 'axios'

export default {
    setup() {
        const form = reactive({
            firstName: null,
            lastName: null,
            email: null,
            password: null,
            password_confirmation: null,
            isSetupCompleted: 0,
            age: null,
            gender: null,
            accountType: null,
            city: null,
            preferences: [],
        });

        const rules = computed(() => ({
            //2 letter minimum
            firstName: {
                required: helpers.withMessage("First name cannot be empty", required),
            },
            //2 letter minimum
            lastName: {
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
            age: {
                required: helpers.withMessage("Age cannot be empty", required),
                numeric: helpers.withMessage("Age input needs to be a number", numeric),
                minValue: helpers.withMessage(
                    "Sorry! User needs to be 18 above to join our platform",
                    minValue(18)
                ),
                maxValue: helpers.withMessage("Age is invalid", maxValue(120)),
            },
            accountType: {
                required: helpers.withMessage("Account Type cannot be empty", required),
            },
            gender: {
                required: helpers.withMessage("Gender cannot be empty", required),
            },
            city: { required: helpers.withMessage("City cannot be empty", required) },
            preferences: {
                required: helpers.withMessage(
                    "Please select at least 1 categories",
                    required
                ),
            },
        }));

        const v$ = useVuelidate(rules, form);

        function submit() {
             Inertia.post("/register", form);
        }

        return { form, v$, submit };
    },
    props: {
        errors: Object,
    },

    data() {
        return {
            preferences: [],
            step: 1,
            totalSteps: 3,
            checkIfEmailExistsData: ''
        };
    },
    methods: {
        validateFirstStepFields: function () {
            this.v$.firstName.$validate();
            this.v$.lastName.$validate();
            this.v$.email.$validate();
            this.v$.password.$validate();
            this.v$.password_confirmation.$validate();
        },
        validateSecondStepFields: function () {
            this.v$.age.$validate();
            this.v$.accountType.$validate();
            this.v$.city.$validate();
            this.v$.gender.$validate();
        },
        prevStep: function () {
            this.step--;
        },
        checkIfEmailExists: function(){

        //code here

        },

        nextStep: function (e) {
            this.validateFirstStepFields();
            this.checkIfEmailExists();
            //If field is correct
            if (
                !this.v$.firstName.$error &&
                !this.v$.lastName.$error &&
                !this.v$.password.$error &&
                !this.v$.password_confirmation.$error &&
                !this.v$.email.$error 
            ) {
                alert("Form ok");
                
            } else alert("not okay");
        },
        secondNextStep: function (e) {
            this.validateSecondStepFields();
            if (
                !this.v$.age.$error &&
                !this.v$.accountType.$error &&
                !this.v$.city.$error &&
                !this.v$.gender.$error
            ) {
                alert("Form ok");
                this.step++;
            } else alert("not okay");
        },

        thirdNextStep: function (e) {
            this.v$.preferences.$validate();
            if (!this.v$.preferences.$error) {
                console.log(this.form.preferences);
                this.step++;
            } else alert("not okay"); console.log(this.form.preferences); this.step++;

        },
    },
};
</script>
