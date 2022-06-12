"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Auth_Register_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/Register.vue?vue&type=script&lang=js":
/*!**************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/Register.vue?vue&type=script&lang=js ***!
  \**************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");
/* harmony import */ var _inertiajs_inertia__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @inertiajs/inertia */ "./node_modules/@inertiajs/inertia/dist/index.js");
/* harmony import */ var _vuelidate_core__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @vuelidate/core */ "./node_modules/@vuelidate/core/dist/index.esm.js");
/* harmony import */ var _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @vuelidate/validators */ "./node_modules/@vuelidate/validators/dist/index.esm.js");




/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  setup: function setup() {
    var form = (0,vue__WEBPACK_IMPORTED_MODULE_0__.reactive)({
      firstName: null,
      lastName: null,
      email: null,
      password: null,
      password_confirmation: null,
      age: null,
      gender: null,
      accountType: null,
      city: null,
      preferences: null
    });
    var rules = (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)(function () {
      return {
        //2 letter minimum
        firstName: {
          required: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.helpers.withMessage("First name cannot be empty", _vuelidate_validators__WEBPACK_IMPORTED_MODULE_3__.required)
        },
        //2 letter minimum
        lastName: {
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
        accountType: {
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
      _inertiajs_inertia__WEBPACK_IMPORTED_MODULE_1__.Inertia.post("/register", form);
    }

    return {
      form: form,
      v$: v$,
      submit: submit
    };
  },
  props: {
    errors: Object
  },
  data: function data() {
    return {
      preferences: [],
      step: 1,
      totalSteps: 3
    };
  },
  methods: {
    validateFirstStepFields: function validateFirstStepFields() {
      this.v$.firstName.$validate();
      this.v$.lastName.$validate();
      this.v$.email.$validate();
      this.v$.password.$validate();
      this.v$.password_confirmation.$validate();
    },
    validateSecondStepFields: function validateSecondStepFields() {
      this.v$.age.$validate();
      this.v$.accountType.$validate();
      this.v$.city.$validate();
      this.v$.gender.$validate();
    },
    prevStep: function prevStep() {
      this.step--;
    },
    nextStep: function nextStep(e) {
      this.validateFirstStepFields(); //If field is correct

      if (!this.v$.firstName.$error && !this.v$.lastName.$error && !this.v$.password.$error && !this.v$.password_confirmation.$error) {
        alert("Form ok");
        this.step++;
      } else alert("not okay");
    },
    secondNextStep: function secondNextStep(e) {
      this.validateSecondStepFields();

      if (!this.v$.age.$error && !this.v$.accountType.$error && !this.v$.city.$error && !this.v$.gender.$error) {
        alert("Form ok");
        this.step++;
      } else alert("not okay");
    },
    thirdNextStep: function thirdNextStep(e) {
      this.v$.preferences.$validate();

      if (!this.v$.preferences.$error) {
        console.log(this.form.preferences);
      } else alert("not okay");

      console.log(this.form.preferences);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/Register.vue?vue&type=template&id=e59c811e":
/*!******************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/Register.vue?vue&type=template&id=e59c811e ***!
  \******************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "section"
};
var _hoisted_2 = {
  "class": "container"
};
var _hoisted_3 = {
  "class": "row justify-content-center align-items-center d-flex vh-100"
};
var _hoisted_4 = {
  key: 0
};
var _hoisted_5 = {
  "class": "col-md-4 mx-auto"
};

var _hoisted_6 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-arrow-left me-2"
}, null, -1
/* HOISTED */
);

var _hoisted_7 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
  "class": "fw-bold",
  href: "sign-in.html"
}, "Return to Login", -1
/* HOISTED */
);

var _hoisted_8 = {
  "class": "osahan-login py-4"
};

var _hoisted_9 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"text-center mb-4\"><a href=\"index.html\"><img src=\"img/logo.svg\" alt=\"\"></a><h5 class=\"fw-bold mt-3\">Creating A Better Tomorrow.</h5><p class=\"text-muted\">Step 1 - Basic Sign Up</p></div>", 1);

var _hoisted_10 = {
  "class": "row"
};
var _hoisted_11 = {
  "class": "col"
};
var _hoisted_12 = {
  "class": "form-group"
};

var _hoisted_13 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "First name", -1
/* HOISTED */
);

var _hoisted_14 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_15 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-user position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_16 = {
  key: 0
};
var _hoisted_17 = {
  "class": "text-danger"
};
var _hoisted_18 = {
  key: 1,
  "class": "text-danger"
};
var _hoisted_19 = {
  "class": "col"
};
var _hoisted_20 = {
  "class": "form-group"
};

var _hoisted_21 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Last name", -1
/* HOISTED */
);

var _hoisted_22 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_23 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-user position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_24 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_25 = {
  "class": "text-danger"
};
var _hoisted_26 = {
  key: 1,
  "class": "text-danger"
};
var _hoisted_27 = {
  "class": "row"
};
var _hoisted_28 = {
  "class": "col"
};

var _hoisted_29 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Email", -1
/* HOISTED */
);

var _hoisted_30 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_31 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-at-sign position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_32 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_33 = {
  "class": "text-danger"
};
var _hoisted_34 = {
  key: 1
};
var _hoisted_35 = {
  "class": "row"
};
var _hoisted_36 = {
  "class": "col"
};

var _hoisted_37 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Password (8 or more characters)", -1
/* HOISTED */
);

var _hoisted_38 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_39 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-unlock position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_40 = {
  "class": "alert alert-info",
  role: "alert"
};
var _hoisted_41 = {
  key: 0,
  style: {
    "color": "green",
    "margin-bottom": "-10px"
  },
  "class": "nmb-1"
};
var _hoisted_42 = {
  key: 0,
  style: {
    "color": "orange"
  }
};
var _hoisted_43 = {
  key: 0,
  style: {
    "color": "green"
  }
};
var _hoisted_44 = {
  key: 0,
  style: {
    "color": "orange"
  }
};
var _hoisted_45 = {
  key: 0,
  style: {
    "color": "green"
  }
};
var _hoisted_46 = {
  key: 0,
  style: {
    "color": "orange"
  }
};
var _hoisted_47 = {
  key: 0,
  style: {
    "color": "green"
  }
};
var _hoisted_48 = {
  key: 0,
  style: {
    "color": "orange"
  }
};
var _hoisted_49 = {
  key: 0,
  style: {
    "color": "orange"
  }
};
var _hoisted_50 = {
  key: 1,
  style: {
    "color": "green"
  }
};

var _hoisted_51 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, null, -1
/* HOISTED */
);

var _hoisted_52 = {
  key: 0
};
var _hoisted_53 = {
  "class": "row"
};
var _hoisted_54 = {
  "class": "col"
};

var _hoisted_55 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Confirm Password", -1
/* HOISTED */
);

var _hoisted_56 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_57 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-unlock position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_58 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_59 = {
  "class": "text-danger"
};

var _hoisted_60 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"row\"></div><div class=\"row\"><label class=\"mb-1 mt-2\">You agree to the Osahanin <a href=\"#\">User Agreement</a>, <a href=\"#\">Privacy Policy</a>, and <a href=\"#\">Cookie Policy</a>.</label></div>", 2);

var _hoisted_62 = {
  "class": "text-center"
};

var _hoisted_63 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"text-center mt-3 border-bottom pb-3\"><p class=\"small text-muted\">Or login with</p><div class=\"text-center\"><button type=\"button\" class=\"btn btn-sm btn-outline-instagram btn-block px-5\"><i class=\"feather-instagram\"></i> Sign Up Using Google </button></div></div><div class=\"py-3 d-flex align-item-center\"><a href=\"forgot-password.html\">Forgot password?</a></div><div class=\"py-3 d-flex align-item-center\"><span class=\"me-5\"> Charities or NGO? <a class=\"fw-bold ms-2\" href=\"sign-in.html\">Let&#39;s Work Together</a></span></div>", 3);

var _hoisted_66 = {
  key: 1
};
var _hoisted_67 = {
  "class": "col-md-4 mx-auto"
};
var _hoisted_68 = {
  "class": "osahan-login py-4"
};

var _hoisted_69 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"text-center mb-4\"><a href=\"index.html\"><img src=\"img/logo.svg\" alt=\"\"></a><h5 class=\"fw-bold mt-3\">Creating A Better Tomorrow.</h5><p class=\"text-muted\">Step 2 - Personal Information</p></div>", 1);

var _hoisted_70 = {
  "class": "row"
};
var _hoisted_71 = {
  "class": "col"
};
var _hoisted_72 = {
  "class": "form-group"
};

var _hoisted_73 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Age", -1
/* HOISTED */
);

var _hoisted_74 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_75 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-user position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_76 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_77 = {
  "class": "text-danger"
};
var _hoisted_78 = {
  "class": "col"
};
var _hoisted_79 = {
  "class": "form-group"
};

var _hoisted_80 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Gender", -1
/* HOISTED */
);

var _hoisted_81 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_82 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-user position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_83 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("option", {
  selected: ""
}, "Open this select menu", -1
/* HOISTED */
);

var _hoisted_84 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("option", {
  value: "1"
}, "Male", -1
/* HOISTED */
);

var _hoisted_85 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("option", {
  value: "2"
}, "Female", -1
/* HOISTED */
);

var _hoisted_86 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("option", {
  value: "3"
}, "Others/Prefer Not to Say", -1
/* HOISTED */
);

var _hoisted_87 = [_hoisted_83, _hoisted_84, _hoisted_85, _hoisted_86];
var _hoisted_88 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_89 = {
  "class": "text-danger"
};
var _hoisted_90 = {
  "class": "row"
};
var _hoisted_91 = {
  "class": "col"
};

var _hoisted_92 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "City", -1
/* HOISTED */
);

var _hoisted_93 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_94 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-at-sign position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_95 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<option disabled value=\"\">Please Select</option><option>Caloocan</option><option>Las Piñas</option><option>Makati</option><option>Malabon</option><option>Mandaluyong</option><option>Manila</option><option>Marikina</option><option>Navotas</option><option>Parañaque</option><option>Pasay</option><option>Pateros</option><option>Quezon City</option><option>San Juan</option><option>Taguig</option><option>Valenzuela</option>", 16);

var _hoisted_111 = [_hoisted_95];
var _hoisted_112 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_113 = {
  "class": "text-danger"
};
var _hoisted_114 = {
  "class": "row"
};
var _hoisted_115 = {
  "class": "col"
};

var _hoisted_116 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Account Type", -1
/* HOISTED */
);

var _hoisted_117 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_118 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-at-sign position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_119 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("option", {
  value: "Personal"
}, "Personal Account", -1
/* HOISTED */
);

var _hoisted_120 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("option", {
  value: "Business"
}, "Business Account", -1
/* HOISTED */
);

var _hoisted_121 = [_hoisted_119, _hoisted_120];
var _hoisted_122 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_123 = {
  "class": "text-danger"
};

var _hoisted_124 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "row mt-2"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", {
  "class": "text-muted"
}, "For users that are under corporate organization and business, please select Business Account Type")], -1
/* HOISTED */
);

var _hoisted_125 = {
  "class": "d-flex justify-content-end"
};
var _hoisted_126 = {
  key: 2
};
var _hoisted_127 = {
  "class": "col-md-6 mx-auto"
};

var _hoisted_128 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"text-center mb-4\"><a href=\"index.html\"><img src=\"img/logo.svg\" alt=\"\"></a><h5 class=\"fw-bold mt-3\">Creating A Better Tomorrow.</h5><p class=\"text-muted\"> Step 3 - What do you feel most passionate about? </p></div>", 1);

var _hoisted_129 = {
  "class": "ks-cboxtags"
};

var _hoisted_130 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "checkboxEight"
}, "Animal Conservation", -1
/* HOISTED */
);

var _hoisted_131 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "checkboxOne"
}, "Agriculture", -1
/* HOISTED */
);

var _hoisted_132 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "checkboxTwo"
}, "Children and Youth", -1
/* HOISTED */
);

var _hoisted_133 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "checkboxThree"
}, "Community Development", -1
/* HOISTED */
);

var _hoisted_134 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "checkboxFour"
}, "Education", -1
/* HOISTED */
);

var _hoisted_135 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "checkboxFive"
}, "Environment", -1
/* HOISTED */
);

var _hoisted_136 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "checkboxSix"
}, "Wildlife Protection", -1
/* HOISTED */
);

var _hoisted_137 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "checkboxSeven"
}, "Women's Empowerment", -1
/* HOISTED */
);

var _hoisted_138 = {
  "class": "d-flex justify-content-end"
};
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("form", {
    onSubmit: _cache[22] || (_cache[22] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $setup.submit && $setup.submit.apply($setup, arguments);
    }, ["prevent"]))
  }, [$data.step == 1 ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("section", _hoisted_4, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_5, [_hoisted_6, _hoisted_7, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_8, [_hoisted_9, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_10, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_11, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_12, [_hoisted_13, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_14, [_hoisted_15, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[0] || (_cache[0] = function ($event) {
      return $setup.form.firstName = $event;
    }),
    type: "text",
    "class": "form-control"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.firstName, void 0, {
    trim: true
  }]]), $setup.v$.firstName.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_16, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_17, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.firstName.$errors[0].$message), 1
  /* TEXT */
  )])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $props.errors.firstName ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_18, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.firstName), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_19, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_20, [_hoisted_21, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_22, [_hoisted_23, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[1] || (_cache[1] = function ($event) {
      return $setup.form.lastName = $event;
    }),
    type: "text",
    "class": "form-control"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.lastName, void 0, {
    trim: true
  }]]), $setup.v$.firstName.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_24, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_25, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.lastName.$errors[0].$message), 1
  /* TEXT */
  )])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $props.errors.lastName ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_26, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.lastName), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_27, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_28, [_hoisted_29, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_30, [_hoisted_31, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[2] || (_cache[2] = function ($event) {
      return $setup.form.email = $event;
    }),
    type: "email",
    "class": "form-control"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.email, void 0, {
    trim: true
  }]]), $setup.v$.email.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_32, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_33, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.email.$errors[0].$message), 1
  /* TEXT */
  )])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $props.errors.email ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_34, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.email), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_35, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_36, [_hoisted_37, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_38, [_hoisted_39, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
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
  }]]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_40, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [!$setup.v$.password.containsSpecial.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_41, " ✓ Passwords requires an special character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [$setup.v$.password.containsSpecial.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_42, " ✖ Passwords requires an special character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [!$setup.v$.password.containsNumber.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_43, " ✓ Passwords requires an numerical character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [$setup.v$.password.containsNumber.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_44, " ✖ Passwords requires an numerical character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [!$setup.v$.password.containsLowercase.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_45, " ✓ Passwords requires an lower case character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [$setup.v$.password.containsLowercase.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_46, " ✖ Passwords requires an lower case character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [!$setup.v$.password.containsUppercase.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_47, " ✓ Passwords requires an upper case character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [$setup.v$.password.containsUppercase.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_48, " ✖ Passwords requires an upper case character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [$setup.v$.password.minLength.$invalid || $setup.v$.password.maxLength.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_49, " ✖ Passwords needs to be in between 8 to 19 characters. ")) : ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_50, " ✓ Passwords needs to be in between 8 to 19 characters. "))]), _hoisted_51]), $props.errors.password ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_52, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.password), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_53, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_54, [_hoisted_55, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_56, [_hoisted_57, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[4] || (_cache[4] = function ($event) {
      return $setup.form.password_confirmation = $event;
    }),
    type: "password",
    "class": "form-control"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.password_confirmation, void 0, {
    trim: true
  }]]), $setup.v$.password_confirmation.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_58, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_59, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.password_confirmation.$errors[0].$message), 1
  /* TEXT */
  )])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]), _hoisted_60, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_62, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "class": "btn btn-primary text-uppercase mt-3 px-5",
    onClick: _cache[5] || (_cache[5] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $options.nextStep && $options.nextStep.apply($options, arguments);
    }, ["prevent"]))
  }, " Agree & Join ")]), _hoisted_63])])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $data.step == 2 ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("section", _hoisted_66, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_67, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_68, [_hoisted_69, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_70, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_71, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_72, [_hoisted_73, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_74, [_hoisted_75, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[6] || (_cache[6] = function ($event) {
      return $setup.form.age = $event;
    }),
    type: "text",
    "class": "form-control"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.age]]), $setup.v$.age.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_76, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_77, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.age.$errors[0].$message), 1
  /* TEXT */
  )])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_78, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_79, [_hoisted_80, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_81, [_hoisted_82, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("select", {
    "onUpdate:modelValue": _cache[7] || (_cache[7] = function ($event) {
      return $setup.form.gender = $event;
    }),
    "class": "form-select",
    "aria-label": "Default select example"
  }, _hoisted_87, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelSelect, $setup.form.gender]]), $setup.v$.gender.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_88, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_89, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.gender.$errors[0].$message), 1
  /* TEXT */
  )])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_90, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_91, [_hoisted_92, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_93, [_hoisted_94, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("select", {
    "class": "form-select",
    "onUpdate:modelValue": _cache[8] || (_cache[8] = function ($event) {
      return $setup.form.city = $event;
    })
  }, _hoisted_111, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelSelect, $setup.form.city]]), $setup.v$.city.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_112, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_113, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.city.$errors[0].$message), 1
  /* TEXT */
  )])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_114, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_115, [_hoisted_116, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_117, [_hoisted_118, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("select", {
    "class": "form-select",
    "onUpdate:modelValue": _cache[9] || (_cache[9] = function ($event) {
      return $setup.form.accountType = $event;
    })
  }, _hoisted_121, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelSelect, $setup.form.accountType]]), $setup.v$.accountType.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_122, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_123, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.accountType.$errors[0].$message), 1
  /* TEXT */
  )])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]), _hoisted_124, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_125, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "class": "btn btn-primary text-uppercase mt-3 mx-auto",
    onClick: _cache[10] || (_cache[10] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $options.prevStep && $options.prevStep.apply($options, arguments);
    }, ["prevent"]))
  }, " Previous Step "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "class": "btn btn-primary text-uppercase mt-3 mx-auto",
    onClick: _cache[11] || (_cache[11] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $options.secondNextStep && $options.secondNextStep.apply($options, arguments);
    }, ["prevent"]))
  }, " Next Step ")])])])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $data.step == 3 ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("section", _hoisted_126, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_127, [_hoisted_128, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("ul", _hoisted_129, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[12] || (_cache[12] = function ($event) {
      return $data.preferences = $event;
    }),
    type: "checkbox",
    id: "checkboxEight",
    value: "Animal Conservation"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $data.preferences]]), _hoisted_130]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[13] || (_cache[13] = function ($event) {
      return $data.preferences = $event;
    }),
    type: "checkbox",
    id: "checkboxOne",
    value: "Agriculture"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $data.preferences]]), _hoisted_131]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "checkbox",
    "onUpdate:modelValue": _cache[14] || (_cache[14] = function ($event) {
      return $data.preferences = $event;
    }),
    id: "checkboxTwo",
    value: "Children and Youth",
    checked: ""
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $data.preferences]]), _hoisted_132]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[15] || (_cache[15] = function ($event) {
      return $data.preferences = $event;
    }),
    type: "checkbox",
    id: "checkboxThree",
    value: "Community Development",
    checked: ""
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $data.preferences]]), _hoisted_133]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[16] || (_cache[16] = function ($event) {
      return $data.preferences = $event;
    }),
    type: "checkbox",
    id: "checkboxFour",
    value: "Education"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $data.preferences]]), _hoisted_134]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[17] || (_cache[17] = function ($event) {
      return $data.preferences = $event;
    }),
    type: "checkbox",
    id: "checkboxFive",
    value: "Environment"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $data.preferences]]), _hoisted_135]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[18] || (_cache[18] = function ($event) {
      return $data.preferences = $event;
    }),
    type: "checkbox",
    id: "checkboxSix",
    value: "Wildlife Protection",
    checked: ""
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $data.preferences]]), _hoisted_136]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[19] || (_cache[19] = function ($event) {
      return $data.preferences = $event;
    }),
    type: "checkbox",
    id: "checkboxSeven",
    value: "Women's Empowerment"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $data.preferences]]), _hoisted_137])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_138, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "class": "btn btn-primary text-uppercase mt-3 mx-auto",
    onClick: _cache[20] || (_cache[20] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $options.prevStep && $options.prevStep.apply($options, arguments);
    }, ["prevent"]))
  }, " Previous Step "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "class": "btn btn-primary text-uppercase mt-3 mx-auto",
    onClick: _cache[21] || (_cache[21] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $options.thirdNextStep && $options.thirdNextStep.apply($options, arguments);
    }, ["prevent"]))
  }, " Next Step ")])])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)], 32
  /* HYDRATE_EVENTS */
  )])])]);
}

/***/ }),

/***/ "./resources/js/Pages/Auth/Register.vue":
/*!**********************************************!*\
  !*** ./resources/js/Pages/Auth/Register.vue ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Register_vue_vue_type_template_id_e59c811e__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Register.vue?vue&type=template&id=e59c811e */ "./resources/js/Pages/Auth/Register.vue?vue&type=template&id=e59c811e");
/* harmony import */ var _Register_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Register.vue?vue&type=script&lang=js */ "./resources/js/Pages/Auth/Register.vue?vue&type=script&lang=js");
/* harmony import */ var C_laragon_www_charitable3_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_laragon_www_charitable3_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_Register_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Register_vue_vue_type_template_id_e59c811e__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/Auth/Register.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/Auth/Register.vue?vue&type=script&lang=js":
/*!**********************************************************************!*\
  !*** ./resources/js/Pages/Auth/Register.vue?vue&type=script&lang=js ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Register_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Register_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Register.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/Register.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/Pages/Auth/Register.vue?vue&type=template&id=e59c811e":
/*!****************************************************************************!*\
  !*** ./resources/js/Pages/Auth/Register.vue?vue&type=template&id=e59c811e ***!
  \****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Register_vue_vue_type_template_id_e59c811e__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Register_vue_vue_type_template_id_e59c811e__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Register.vue?vue&type=template&id=e59c811e */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/Register.vue?vue&type=template&id=e59c811e");


/***/ })

}]);