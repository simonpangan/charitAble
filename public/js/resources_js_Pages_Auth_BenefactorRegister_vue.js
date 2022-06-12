"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Auth_BenefactorRegister_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/BenefactorRegister.vue?vue&type=script&lang=js":
/*!************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/BenefactorRegister.vue?vue&type=script&lang=js ***!
  \************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");
/* harmony import */ var _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @inertiajs/inertia-vue3 */ "./node_modules/@inertiajs/inertia-vue3/dist/index.js");
/* harmony import */ var _vuelidate_core__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @vuelidate/core */ "./node_modules/@vuelidate/core/dist/index.esm.js");
/* harmony import */ var _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @vuelidate/validators */ "./node_modules/@vuelidate/validators/dist/index.esm.js");




/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  setup: function setup() {
    var form = (0,_inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_1__.useForm)({
      first_name: null,
      last_name: null,
      email: null,
      password: null,
      password_confirmation: null,
      age: null,
      gender: null,
      account_type: null,
      city: null,
      preferences: []
    });
    var rules = (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)(function () {
      return {
        //2 letter minimum
        first_name: {
          required: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.helpers.withMessage("First name cannot be empty", _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.required)
        },
        //2 letter minimum
        last_name: {
          required: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.helpers.withMessage("Last name cannot be empty", _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.required)
        },
        email: {
          required: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.helpers.withMessage("Email is invalid", _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.required),
          email: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.email
        },
        password: {
          minLength: (0,_vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.minLength)(9),
          maxLength: (0,_vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.maxLength)(19),
          required: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.helpers.withMessage("Password cannot be empty", _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.required),
          containsSpecial: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.helpers.withMessage(function () {
            return "The password requires an special character";
          }, function (value) {
            return /[#?!@$%^&*-]/.test(value);
          }),
          containsNumber: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.helpers.withMessage(function () {
            return "The password requires an numerical character";
          }, function (value) {
            return /[0-9]/.test(value);
          }),
          containsLowercase: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.helpers.withMessage(function () {
            return "The password requires an lowercase character";
          }, function (value) {
            return /[a-z]/.test(value);
          }),
          containsUppercase: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.helpers.withMessage(function () {
            return "The password requires an uppercase character";
          }, function (value) {
            return /[A-Z]/.test(value);
          })
        },
        password_confirmation: {
          required: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.helpers.withMessage("Confirm Password cannot be empty", _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.required),
          sameAs: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.helpers.withMessage("Confirm Password is incorrect", (0,_vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.sameAs)(form.password))
        },
        age: {
          required: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.helpers.withMessage("Age cannot be empty", _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.required),
          numeric: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.helpers.withMessage("Age input needs to be a number", _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.numeric),
          minValue: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.helpers.withMessage("Sorry! User needs to be 18 above to join our platform", (0,_vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.minValue)(18)),
          maxValue: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.helpers.withMessage("Age is invalid", (0,_vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.maxValue)(120))
        },
        account_type: {
          required: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.helpers.withMessage("Account Type cannot be empty", _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.required)
        },
        gender: {
          required: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.helpers.withMessage("Gender cannot be empty", _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.required)
        },
        city: {
          required: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.helpers.withMessage("City cannot be empty", _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.required)
        },
        preferences: {
          required: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.helpers.withMessage("Please select at least 1 categories", _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.required)
        }
      };
    });
    var v$ = (0,_vuelidate_core__WEBPACK_IMPORTED_MODULE_2__["default"])(rules, form);

    function submit() {
      form.post(route("register.benefactor.store", {
        step: 'last'
      }));
    }

    return {
      form: form,
      v$: v$,
      submit: submit
    };
  },
  props: {
    charityCategories: Array
  },
  data: function data() {
    return {
      currentStep: 1,
      preferences: [],
      totalSteps: 3
    };
  },
  methods: {
    validateFirstStepFields: function validateFirstStepFields() {
      this.v$.first_name.$validate();
      this.v$.last_name.$validate();
      this.v$.email.$validate();
      this.v$.password.$validate();
      this.v$.password_confirmation.$validate();
    },
    validateSecondStepFields: function validateSecondStepFields() {
      this.v$.age.$validate();
      this.v$.account_type.$validate();
      this.v$.city.$validate();
      this.v$.gender.$validate();
    },
    prevStep: function prevStep() {
      this.currentStep--;
    },
    nextStep: function nextStep(e) {
      var _this = this;

      // this.validateFirstStepFields();
      if (!this.v$.first_name.$error && !this.v$.last_name.$error && !this.v$.password.$error && !this.v$.password_confirmation.$error && !this.v$.email.$error) {
        this.form.post(route("register.benefactor.store", {
          step: 1
        }), {
          onSuccess: function onSuccess() {
            return _this.currentStep++;
          }
        });
      }
    },
    secondNextStep: function secondNextStep(e) {
      var _this2 = this;

      // this.validateSecondStepFields();
      if (!this.v$.age.$error && !this.v$.account_type.$error && !this.v$.city.$error && !this.v$.gender.$error) {
        this.form.post(route("register.benefactor.store", {
          step: 2
        }), {
          onSuccess: function onSuccess() {
            return _this2.currentStep++;
          }
        });
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/BenefactorRegister.vue?vue&type=template&id=e3fc44cc":
/*!****************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/BenefactorRegister.vue?vue&type=template&id=e3fc44cc ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "container"
};
var _hoisted_2 = {
  "class": "row justify-content-center align-items-center d-flex vh-100"
};
var _hoisted_3 = {
  key: 0
};
var _hoisted_4 = {
  "class": "col-md-4 mx-auto"
};

var _hoisted_5 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-arrow-left me-2"
}, null, -1
/* HOISTED */
);

var _hoisted_6 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
  "class": "fw-bold",
  href: "sign-in.html"
}, "Return to Login", -1
/* HOISTED */
);

var _hoisted_7 = {
  "class": "osahan-login py-4"
};

var _hoisted_8 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"text-center mb-4\"><a href=\"index.html\"><img src=\"img/logo.svg\" alt=\"\"></a><h5 class=\"fw-bold mt-3\">Creating A Better Tomorrow.</h5><p class=\"text-muted\">currentStep 1 - Basic Sign Up</p></div>", 1);

var _hoisted_9 = {
  "class": "row"
};
var _hoisted_10 = {
  "class": "col"
};
var _hoisted_11 = {
  "class": "form-group"
};

var _hoisted_12 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "First name", -1
/* HOISTED */
);

var _hoisted_13 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_14 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-user position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_15 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_16 = {
  key: 1
};
var _hoisted_17 = {
  "class": "text-danger"
};
var _hoisted_18 = {
  "class": "col"
};
var _hoisted_19 = {
  "class": "form-group"
};

var _hoisted_20 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Last name", -1
/* HOISTED */
);

var _hoisted_21 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_22 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-user position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_23 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_24 = {
  key: 1
};
var _hoisted_25 = {
  "class": "text-danger"
};
var _hoisted_26 = {
  "class": "row"
};
var _hoisted_27 = {
  "class": "col"
};

var _hoisted_28 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Email", -1
/* HOISTED */
);

var _hoisted_29 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_30 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-at-sign position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_31 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_32 = {
  key: 1,
  "class": "text-danger"
};
var _hoisted_33 = {
  "class": "text-danger"
};
var _hoisted_34 = {
  "class": "row"
};
var _hoisted_35 = {
  "class": "col"
};

var _hoisted_36 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Password (8 or more characters)", -1
/* HOISTED */
);

var _hoisted_37 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_38 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-unlock position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_39 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_40 = {
  "class": "alert alert-info mt-2",
  role: "alert"
};
var _hoisted_41 = {
  key: 0,
  style: {
    "color": "green"
  },
  "class": "nmb-1"
};
var _hoisted_42 = {
  key: 0,
  style: {
    "color": "orange"
  },
  "class": "nmb-1"
};
var _hoisted_43 = {
  key: 0,
  style: {
    "color": "green"
  },
  "class": "nmb-1"
};
var _hoisted_44 = {
  key: 0,
  style: {
    "color": "orange"
  },
  "class": "nmb-1"
};
var _hoisted_45 = {
  key: 0,
  style: {
    "color": "green"
  },
  "class": "nmb-1"
};
var _hoisted_46 = {
  key: 0,
  style: {
    "color": "orange"
  },
  "class": "nmb-1"
};
var _hoisted_47 = {
  key: 0,
  style: {
    "color": "green"
  },
  "class": "nmb-1"
};
var _hoisted_48 = {
  key: 0,
  style: {
    "color": "orange"
  },
  "class": "nmb-1"
};
var _hoisted_49 = {
  key: 0,
  style: {
    "color": "orange"
  },
  "class": "nmb-1"
};
var _hoisted_50 = {
  key: 1,
  style: {
    "color": "green"
  },
  "class": "nmb-1"
};

var _hoisted_51 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, null, -1
/* HOISTED */
);

var _hoisted_52 = {
  "class": "row"
};
var _hoisted_53 = {
  "class": "col"
};

var _hoisted_54 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Confirm Password", -1
/* HOISTED */
);

var _hoisted_55 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_56 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-unlock position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_57 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_58 = {
  "class": "text-danger"
};

var _hoisted_59 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"row\"></div><div class=\"row\"><label class=\"mb-1 mt-2\">You agree to the Osahanin <a href=\"#\">User Agreement</a>, <a href=\"#\">Privacy Policy</a>, and <a href=\"#\">Cookie Policy</a>. </label></div>", 2);

var _hoisted_61 = {
  "class": "text-center"
};
var _hoisted_62 = ["disabled"];
var _hoisted_63 = {
  key: 0
};

var _hoisted_64 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "spinner-border spinner-border-sm",
  role: "status",
  "aria-hidden": "true"
}, null, -1
/* HOISTED */
);

var _hoisted_65 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Processing... ");

var _hoisted_66 = [_hoisted_64, _hoisted_65];
var _hoisted_67 = {
  key: 1
};

var _hoisted_68 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"text-center mt-3 border-bottom pb-3\"><p class=\"small text-muted\">Or login with</p><div class=\"text-center\"><button type=\"button\" class=\"btn btn-sm btn-outline-instagram btn-block px-5\"><i class=\"feather-instagram\"></i> Sign Up Using Google </button></div></div><div class=\"py-3 d-flex align-item-center\"><a href=\"forgot-password.html\">Forgot password?</a></div><div class=\"py-3 d-flex align-item-center\"><span class=\"me-5\"> Charities or NGO? <a class=\"fw-bold ms-2\" href=\"sign-in.html\">Let&#39;s Work Together</a></span></div>", 3);

var _hoisted_71 = {
  key: 1
};
var _hoisted_72 = {
  "class": "col-md-4 mx-auto"
};
var _hoisted_73 = {
  "class": "osahan-login py-4"
};

var _hoisted_74 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"text-center mb-4\"><a href=\"index.html\"><img src=\"img/logo.svg\" alt=\"\"></a><h5 class=\"fw-bold mt-3\">Creating A Better Tomorrow.</h5><p class=\"text-muted\">currentStep 2 - Personal Information</p></div>", 1);

var _hoisted_75 = {
  "class": "row"
};
var _hoisted_76 = {
  "class": "col"
};
var _hoisted_77 = {
  "class": "form-group"
};

var _hoisted_78 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Age", -1
/* HOISTED */
);

var _hoisted_79 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_80 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-user position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_81 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_82 = {
  key: 1,
  "class": "text-danger"
};
var _hoisted_83 = {
  "class": "text-danger"
};
var _hoisted_84 = {
  "class": "col"
};
var _hoisted_85 = {
  "class": "form-group"
};

var _hoisted_86 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Gender", -1
/* HOISTED */
);

var _hoisted_87 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_88 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-user position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_89 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<option selected>Open this select menu</option><option value=\"Male\">Male</option><option value=\"Female\">Female</option><option value=\"LGBT\">LGBT</option><option value=\"Others\">Others/Prefer Not to Say</option>", 5);

var _hoisted_94 = [_hoisted_89];
var _hoisted_95 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_96 = {
  key: 1,
  "class": "text-danger"
};
var _hoisted_97 = {
  "class": "text-danger"
};
var _hoisted_98 = {
  "class": "row"
};
var _hoisted_99 = {
  "class": "col"
};

var _hoisted_100 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "City", -1
/* HOISTED */
);

var _hoisted_101 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_102 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-at-sign position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_103 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<option disabled value=\"\">Please Select</option><option>Caloocan</option><option>Las Piñas</option><option>Makati</option><option>Malabon</option><option>Mandaluyong</option><option>Manila</option><option>Marikina</option><option>Navotas</option><option>Parañaque</option><option>Pasay</option><option>Pateros</option><option>Quezon City</option><option>San Juan</option><option>Taguig</option><option>Valenzuela</option>", 16);

var _hoisted_119 = [_hoisted_103];
var _hoisted_120 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_121 = {
  key: 1,
  "class": "text-danger"
};
var _hoisted_122 = {
  "class": "text-danger"
};
var _hoisted_123 = {
  "class": "row"
};
var _hoisted_124 = {
  "class": "col"
};

var _hoisted_125 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Account Type", -1
/* HOISTED */
);

var _hoisted_126 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_127 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-at-sign position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_128 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("option", {
  value: "Personal"
}, "Personal Account", -1
/* HOISTED */
);

var _hoisted_129 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("option", {
  value: "Business"
}, "Business Account", -1
/* HOISTED */
);

var _hoisted_130 = [_hoisted_128, _hoisted_129];
var _hoisted_131 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_132 = {
  key: 1,
  "class": "text-danger"
};
var _hoisted_133 = {
  "class": "text-danger"
};

var _hoisted_134 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "row mt-2"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", {
  "class": "text-muted"
}, "For users that are under corporate organization and business, please select Business Account Type")], -1
/* HOISTED */
);

var _hoisted_135 = {
  "class": "d-flex justify-content-end"
};
var _hoisted_136 = ["disabled"];
var _hoisted_137 = {
  key: 0
};

var _hoisted_138 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "spinner-border spinner-border-sm",
  role: "status",
  "aria-hidden": "true"
}, null, -1
/* HOISTED */
);

var _hoisted_139 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Processing... ");

var _hoisted_140 = [_hoisted_138, _hoisted_139];
var _hoisted_141 = {
  key: 1
};
var _hoisted_142 = {
  key: 2
};
var _hoisted_143 = {
  "class": "col-md-6 mx-auto"
};

var _hoisted_144 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"text-center mb-4\"><a href=\"index.html\"><img src=\"img/logo.svg\" alt=\"\"></a><h5 class=\"fw-bold mt-3\">Creating A Better Tomorrow.</h5><p class=\"text-muted\"> currentStep 3 - What do you feel most passionate about? </p></div>", 1);

var _hoisted_145 = {
  "class": "ks-cboxtags"
};
var _hoisted_146 = ["id", "value"];
var _hoisted_147 = ["for"];
var _hoisted_148 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_149 = {
  key: 1,
  "class": "text-danger"
};
var _hoisted_150 = {
  "class": "d-flex justify-content-end"
};
var _hoisted_151 = ["disabled"];
var _hoisted_152 = {
  key: 0
};

var _hoisted_153 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "spinner-border spinner-border-sm",
  role: "status",
  "aria-hidden": "true"
}, null, -1
/* HOISTED */
);

var _hoisted_154 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Processing... ");

var _hoisted_155 = [_hoisted_153, _hoisted_154];
var _hoisted_156 = {
  key: 1
};
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("form", {
    onSubmit: _cache[15] || (_cache[15] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $setup.submit && $setup.submit.apply($setup, arguments);
    }, ["prevent"]))
  }, [$data.currentStep == 1 ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("section", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [_hoisted_5, _hoisted_6, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_7, [_hoisted_8, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_9, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_10, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_11, [_hoisted_12, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_13, [_hoisted_14, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[0] || (_cache[0] = function ($event) {
      return $setup.form.first_name = $event;
    }),
    type: "text",
    "class": "form-control"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.first_name, void 0, {
    trim: true
  }]]), $setup.form.errors.first_name ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_15, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors.first_name), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $setup.v$.first_name.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_16, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_17, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.first_name.$errors[0].$message), 1
  /* TEXT */
  )])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_18, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_19, [_hoisted_20, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_21, [_hoisted_22, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[1] || (_cache[1] = function ($event) {
      return $setup.form.last_name = $event;
    }),
    type: "text",
    "class": "form-control"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.last_name, void 0, {
    trim: true
  }]]), $setup.form.errors.last_name ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_23, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors.last_name), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $setup.v$.first_name.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_24, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_25, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.last_name.$errors[0].$message), 1
  /* TEXT */
  )])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_26, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_27, [_hoisted_28, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_29, [_hoisted_30, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[2] || (_cache[2] = function ($event) {
      return $setup.form.email = $event;
    }),
    type: "email",
    "class": "form-control"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.email, void 0, {
    trim: true
  }]]), $setup.form.errors.email ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_31, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors.email), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $setup.v$.email.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_32, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_33, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.email.$errors[0].$message), 1
  /* TEXT */
  )])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_34, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_35, [_hoisted_36, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_37, [_hoisted_38, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[3] || (_cache[3] = function ($event) {
      return $setup.form.password = $event;
    }),
    type: "password",
    id: "password",
    name: "password",
    "class": "form-control"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.password, void 0, {
    trim: true
  }]]), $setup.form.errors.password ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_39, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors.password), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_40, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [!$setup.v$.password.containsSpecial.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_41, " ✓ Passwords requires an special character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [$setup.v$.password.containsSpecial.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_42, " ✖ Passwords requires an special character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [!$setup.v$.password.containsNumber.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_43, " ✓ Passwords requires an numerical character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [$setup.v$.password.containsNumber.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_44, " ✖ Passwords requires an numerical character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [!$setup.v$.password.containsLowercase.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_45, " ✓ Passwords requires an lower case character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [$setup.v$.password.containsLowercase.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_46, " ✖ Passwords requires an lower case character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [!$setup.v$.password.containsUppercase.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_47, " ✓ Passwords requires an upper case character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [$setup.v$.password.containsUppercase.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_48, " ✖ Passwords requires an upper case character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [$setup.v$.password.minLength.$invalid || $setup.v$.password.maxLength.$invalid || $setup.form.password == '' ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_49, " ✖ Passwords needs to be in between 8 to 19 characters. ")) : ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_50, " ✓ Passwords needs to be in between 8 to 19 characters. "))]), _hoisted_51])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_52, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_53, [_hoisted_54, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_55, [_hoisted_56, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[4] || (_cache[4] = function ($event) {
      return $setup.form.password_confirmation = $event;
    }),
    type: "password",
    "class": "form-control"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.password_confirmation, void 0, {
    trim: true
  }]]), $setup.v$.password_confirmation.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_57, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_58, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.password_confirmation.$errors[0].$message), 1
  /* TEXT */
  )])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]), _hoisted_59, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_61, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    disabled: $setup.form.processing,
    "class": "btn btn-primary text-uppercase mt-3 px-5",
    onClick: _cache[5] || (_cache[5] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $options.nextStep && $options.nextStep.apply($options, arguments);
    }, ["prevent"]))
  }, [$setup.form.processing ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", _hoisted_63, _hoisted_66)) : ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", _hoisted_67, " Agree & Join "))], 8
  /* PROPS */
  , _hoisted_62)]), _hoisted_68])])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $data.currentStep == 2 ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("section", _hoisted_71, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_72, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_73, [_hoisted_74, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_75, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_76, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_77, [_hoisted_78, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_79, [_hoisted_80, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[6] || (_cache[6] = function ($event) {
      return $setup.form.age = $event;
    }),
    type: "number",
    "class": "form-control"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.age]]), $setup.form.errors.age ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_81, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors.age), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $setup.v$.age.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_82, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_83, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.age.$errors[0].$message), 1
  /* TEXT */
  )])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_84, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_85, [_hoisted_86, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_87, [_hoisted_88, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("select", {
    "onUpdate:modelValue": _cache[7] || (_cache[7] = function ($event) {
      return $setup.form.gender = $event;
    }),
    "class": "form-select",
    "aria-label": "Default select example"
  }, _hoisted_94, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelSelect, $setup.form.gender]]), $setup.form.errors.gender ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_95, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors.gender), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $setup.v$.gender.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_96, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_97, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.gender.$errors[0].$message), 1
  /* TEXT */
  )])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_98, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_99, [_hoisted_100, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_101, [_hoisted_102, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("select", {
    "class": "form-select",
    "onUpdate:modelValue": _cache[8] || (_cache[8] = function ($event) {
      return $setup.form.city = $event;
    })
  }, _hoisted_119, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelSelect, $setup.form.city]]), $setup.form.errors.city ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_120, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors.city), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $setup.v$.city.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_121, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_122, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.city.$errors[0].$message), 1
  /* TEXT */
  )])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_123, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_124, [_hoisted_125, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_126, [_hoisted_127, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("select", {
    "class": "form-select",
    "onUpdate:modelValue": _cache[9] || (_cache[9] = function ($event) {
      return $setup.form.account_type = $event;
    })
  }, _hoisted_130, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelSelect, $setup.form.account_type]]), $setup.form.errors.account_type ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_131, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors.account_type), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $setup.v$.account_type.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_132, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_133, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.account_type.$errors[0].$message), 1
  /* TEXT */
  )])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]), _hoisted_134, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_135, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "class": "btn btn-primary text-uppercase mt-3 mx-auto",
    onClick: _cache[10] || (_cache[10] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $options.prevStep && $options.prevStep.apply($options, arguments);
    }, ["prevent"]))
  }, " Previous currentStep "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    disabled: $setup.form.processing,
    "class": "btn btn-primary text-uppercase mt-3 mx-auto",
    onClick: _cache[11] || (_cache[11] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $options.secondNextStep && $options.secondNextStep.apply($options, arguments);
    }, ["prevent"]))
  }, [$setup.form.processing ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", _hoisted_137, _hoisted_140)) : ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", _hoisted_141, " Next currentStep "))], 8
  /* PROPS */
  , _hoisted_136)])])])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $data.currentStep == 3 ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("section", _hoisted_142, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_143, [_hoisted_144, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("ul", _hoisted_145, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($props.charityCategories, function (category, index) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("li", {
      key: category.name
    }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
      "onUpdate:modelValue": _cache[12] || (_cache[12] = function ($event) {
        return $setup.form.preferences = $event;
      }),
      type: "checkbox",
      id: 'checkbox' + index,
      value: category.name
    }, null, 8
    /* PROPS */
    , _hoisted_146), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $setup.form.preferences]]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
      "for": 'checkbox' + index
    }, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(category.value), 9
    /* TEXT, PROPS */
    , _hoisted_147)]);
  }), 128
  /* KEYED_FRAGMENT */
  )), $setup.form.errors['preferences.0'] ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_148, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors['preferences.0']), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $setup.form.errors.preferences ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_149, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors['preferences']), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_150, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "class": "btn btn-primary text-uppercase mt-3 mx-auto",
    onClick: _cache[13] || (_cache[13] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $options.prevStep && $options.prevStep.apply($options, arguments);
    }, ["prevent"]))
  }, " Previous currentStep "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    disabled: $setup.form.processing,
    "class": "btn btn-primary text-uppercase mt-3 mx-auto",
    onClick: _cache[14] || (_cache[14] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $setup.submit && $setup.submit.apply($setup, arguments);
    }, ["prevent"]))
  }, [$setup.form.processing ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", _hoisted_152, _hoisted_155)) : ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", _hoisted_156, " Submit "))], 8
  /* PROPS */
  , _hoisted_151)])])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)], 32
  /* HYDRATE_EVENTS */
  )])]);
}

/***/ }),

/***/ "./resources/js/Pages/Auth/BenefactorRegister.vue":
/*!********************************************************!*\
  !*** ./resources/js/Pages/Auth/BenefactorRegister.vue ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _BenefactorRegister_vue_vue_type_template_id_e3fc44cc__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./BenefactorRegister.vue?vue&type=template&id=e3fc44cc */ "./resources/js/Pages/Auth/BenefactorRegister.vue?vue&type=template&id=e3fc44cc");
/* harmony import */ var _BenefactorRegister_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./BenefactorRegister.vue?vue&type=script&lang=js */ "./resources/js/Pages/Auth/BenefactorRegister.vue?vue&type=script&lang=js");
/* harmony import */ var C_laragon_www_charitable3_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_laragon_www_charitable3_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_BenefactorRegister_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_BenefactorRegister_vue_vue_type_template_id_e3fc44cc__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/Auth/BenefactorRegister.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/Auth/BenefactorRegister.vue?vue&type=script&lang=js":
/*!********************************************************************************!*\
  !*** ./resources/js/Pages/Auth/BenefactorRegister.vue?vue&type=script&lang=js ***!
  \********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_BenefactorRegister_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_BenefactorRegister_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./BenefactorRegister.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/BenefactorRegister.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/Pages/Auth/BenefactorRegister.vue?vue&type=template&id=e3fc44cc":
/*!**************************************************************************************!*\
  !*** ./resources/js/Pages/Auth/BenefactorRegister.vue?vue&type=template&id=e3fc44cc ***!
  \**************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_BenefactorRegister_vue_vue_type_template_id_e3fc44cc__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_BenefactorRegister_vue_vue_type_template_id_e3fc44cc__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./BenefactorRegister.vue?vue&type=template&id=e3fc44cc */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/BenefactorRegister.vue?vue&type=template&id=e3fc44cc");


/***/ })

}]);