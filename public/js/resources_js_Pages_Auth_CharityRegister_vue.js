"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Auth_CharityRegister_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/CharityRegister.vue?vue&type=script&lang=js":
/*!*********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/CharityRegister.vue?vue&type=script&lang=js ***!
  \*********************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");
/* harmony import */ var _inertiajs_inertia__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @inertiajs/inertia */ "./node_modules/@inertiajs/inertia/dist/index.js");
/* harmony import */ var _vuelidate_core__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @vuelidate/core */ "./node_modules/@vuelidate/core/dist/index.esm.js");
/* harmony import */ var _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @vuelidate/validators */ "./node_modules/@vuelidate/validators/dist/index.esm.js");
/* harmony import */ var _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @inertiajs/inertia-vue3 */ "./node_modules/@inertiajs/inertia-vue3/dist/index.js");
/* harmony import */ var vue_filepond__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! vue-filepond */ "./node_modules/vue-filepond/dist/vue-filepond.js");
/* harmony import */ var vue_filepond__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(vue_filepond__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var filepond_dist_filepond_min_css__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! filepond/dist/filepond.min.css */ "./node_modules/filepond/dist/filepond.min.css");
/* harmony import */ var filepond_plugin_file_validate_type__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! filepond-plugin-file-validate-type */ "./node_modules/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js");
/* harmony import */ var filepond_plugin_file_validate_type__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(filepond_plugin_file_validate_type__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var filepond_plugin_image_preview__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! filepond-plugin-image-preview */ "./node_modules/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js");
/* harmony import */ var filepond_plugin_image_preview__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(filepond_plugin_image_preview__WEBPACK_IMPORTED_MODULE_7__);




 // Import Vue FilePond

 // Import FilePond styles

 // Import image preview and file type validation plugins


 // Create component

var FilePond = vue_filepond__WEBPACK_IMPORTED_MODULE_4___default()((filepond_plugin_file_validate_type__WEBPACK_IMPORTED_MODULE_6___default()), (filepond_plugin_image_preview__WEBPACK_IMPORTED_MODULE_7___default()));
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  components: {
    FilePond: FilePond
  },
  setup: function setup() {
    var form = (0,_inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_3__.useForm)({
      charityName: null,
      charityCategory: 'sadsa',
      charityEmail: null,
      headAdminEmail: null,
      password: null,
      password_confirmation: null,
      description: null,
      fb_link: null,
      twitter_link: null,
      ig_link: null,
      website_link: null,
      file: [],
      documentFile: null
    });
    var rules = (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)(function () {
      return {
        charityName: {
          required: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.helpers.withMessage("Org Email is invalid", _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.required)
        },
        charityCategory: {
          required: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.helpers.withMessage("Please select at least 1 category", _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.required)
        },
        charityEmail: {
          required: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.helpers.withMessage("Org Email is invalid", _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.required),
          email: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.email
        },
        headAdminEmail: {
          required: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.helpers.withMessage("Head Admin Email is invalid", _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.required),
          email: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.email
        },
        password: {
          minLength: (0,_vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.minLength)(9),
          maxLength: (0,_vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.maxLength)(19),
          required: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.helpers.withMessage("Password cannot be empty", _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.required),
          containsSpecial: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.helpers.withMessage(function () {
            return "The password requires an special character";
          }, function (value) {
            return /[#?!@$%^&*-]/.test(value);
          }),
          containsNumber: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.helpers.withMessage(function () {
            return "The password requires an numerical character";
          }, function (value) {
            return /[0-9]/.test(value);
          }),
          containsLowercase: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.helpers.withMessage(function () {
            return "The password requires an lowercase character";
          }, function (value) {
            return /[a-z]/.test(value);
          }),
          containsUppercase: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.helpers.withMessage(function () {
            return "The password requires an uppercase character";
          }, function (value) {
            return /[A-Z]/.test(value);
          })
        },
        password_confirmation: {
          required: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.helpers.withMessage("Confirm Password cannot be empty", _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.required),
          sameAs: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.helpers.withMessage("Confirm Password is incorrect", (0,_vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.sameAs)(form.password))
        },
        city: {
          required: _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.helpers.withMessage("City cannot be empty", _vuelidate_validators__WEBPACK_IMPORTED_MODULE_8__.required)
        }
      };
    });
    var v$ = (0,_vuelidate_core__WEBPACK_IMPORTED_MODULE_2__["default"])(rules, form);

    function submit() {
      form.post(route("register.charity.store"));
    }

    return {
      form: form,
      v$: v$,
      submit: submit
    };
  },
  props: {
    errors: Object,
    csrfToken: String
  },
  data: function data() {
    return {
      preferences: [],
      step: 1,
      totalSteps: 3
    };
  },
  methods: {
    handleFilePondInit: function handleFilePondInit() {
      console.log("FilePond has initialized"); // FilePond instance methods are available on `this.$refs.pond`
    },
    handleFilePondUpdateDocumentFiles: function handleFilePondUpdateDocumentFiles(documentFile) {
      this.form.documentFile = documentFile.map(function (documentFile) {
        return documentFile.file;
      });
    },
    handleFilePondUpdateFiles: function handleFilePondUpdateFiles(file) {
      this.form.file = file[0].file;
    },
    validateFirstStepFields: function validateFirstStepFields() {
      this.v$.charityName.$validate();
      this.v$.charityEmail.$validate();
      this.v$.charityCategory.$validate();
      this.v$.headAdminEmail.$validate();
      this.v$.password.$validate();
      this.v$.password_confirmation.$validate();
    },
    validateSecondStepFields: function validateSecondStepFields() {},
    prevStep: function prevStep() {
      this.step--;
    },
    nextStep: function nextStep(e) {
      //this.step++;
      this.validateFirstStepFields(); //If field is correct

      if (!this.v$.charityName.$error && !this.v$.charityCategory.$error && !this.v$.charityEmail.$error && !this.v$.headAdminEmail.$error && !this.v$.password_confirmation.$error) {
        alert("Form ok");
        this.step++;
      } else alert("not okay");
    },
    secondNextStep: function secondNextStep(e) {
      this.step++;
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

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/CharityRegister.vue?vue&type=template&id=68463606":
/*!*************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/CharityRegister.vue?vue&type=template&id=68463606 ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************/
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
  key: 0
};
var _hoisted_3 = {
  "class": "row justify-content-center align-items-center d-flex vh-100"
};
var _hoisted_4 = {
  "class": "col-md-4"
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

var _hoisted_8 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"text-center mb-4\"><a href=\"index.html\"><img src=\"img/logo.svg\" alt=\"\"></a><h5 class=\"fw-bold mt-3\">Charity Creation Setup</h5><p class=\"text-muted\">Step 1 - NGO Information</p></div>", 1);

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
}, "Organization Name", -1
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
  key: 1,
  "class": "text-danger"
};
var _hoisted_17 = {
  "class": "row"
};
var _hoisted_18 = {
  "class": "col"
};

var _hoisted_19 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Organization Email", -1
/* HOISTED */
);

var _hoisted_20 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_21 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-at-sign position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_22 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_23 = {
  key: 1
};

var _hoisted_24 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"row\"><div class=\"col\"><div class=\"form-group\"><label class=\"mb-1\">Our Organization deals with</label><div class=\"position-relative icon-form-control\"><select class=\"form-select\" aria-label=\"Default select example\"><option disabled selected>Please select one</option><option value=\"1\">One</option><option value=\"2\">Two</option><option value=\"3\">Three</option></select></div></div></div><div class=\"col\"><div class=\"form-group\"><label class=\"mb-1\">*Optional Org Category</label><div class=\"position-relative icon-form-control\"><i class=\"feather-user position-absolute\"></i><select class=\"form-select\" aria-label=\"Default select example\"><option selected></option><option value=\"1\">One</option><option value=\"2\">Two</option><option value=\"3\">Three</option></select></div></div></div></div>", 1);

var _hoisted_25 = {
  "class": "row mt-3"
};
var _hoisted_26 = {
  "class": "row"
};
var _hoisted_27 = {
  "class": "col"
};

var _hoisted_28 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Head Admin - Email", -1
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
  key: 1
};
var _hoisted_33 = {
  "class": "row"
};
var _hoisted_34 = {
  "class": "col-12"
};

var _hoisted_35 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Password (8 or more characters)", -1
/* HOISTED */
);

var _hoisted_36 = {
  "class": "position-relative icon-form-control"
};
var _hoisted_37 = {
  "class": "mt-2"
};
var _hoisted_38 = {
  key: 0,
  "class": "text-danger nmb-1"
};
var _hoisted_39 = {
  key: 0,
  style: {
    "color": "green"
  },
  "class": "nmb-1"
};
var _hoisted_40 = {
  key: 0,
  style: {
    "color": "orange"
  },
  "class": "nmb-1"
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
    "color": "orange"
  }
};
var _hoisted_48 = {
  key: 1,
  style: {
    "color": "green"
  }
};

var _hoisted_49 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, null, -1
/* HOISTED */
);

var _hoisted_50 = {
  key: 0
};
var _hoisted_51 = {
  "class": "col"
};

var _hoisted_52 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Confirm Password", -1
/* HOISTED */
);

var _hoisted_53 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_54 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-unlock position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_55 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_56 = {
  "class": "text-danger"
};

var _hoisted_57 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"row\"></div><div class=\"row\"><label class=\"mb-1 mt-2\">You agree to the Osahanin <a href=\"#\">User Agreement</a>, <a href=\"#\">Privacy Policy</a>, and <a href=\"#\">Cookie Policy</a>. </label></div>", 2);

var _hoisted_59 = {
  "class": "text-center"
};

var _hoisted_60 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"col-md-4 justify-content-center align-items-center d-flex vh-100\"><div class=\"card card-custom bg-white border-white border-0\"><div class=\"card-custom-img\" style=\"background-image:url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);\"></div><div class=\"card-body\" style=\"overflow-y:auto;\"><div class=\"wrapper\"><ul class=\"StepProgress\"><li class=\"StepProgress-item current\"><strong>Step One - Organization Information</strong><p>Got more entries that you love? Buy more entries anytime! Just hover on your favorite entry and click the Buy button</p></li><li class=\"StepProgress-item\"><strong>Step Two - Additional Organization Information</strong></li><li class=\"StepProgress-item\"><strong>Step Three - Documents</strong></li><li class=\"StepProgress-item\"><strong>Step Four - Email Verification</strong></li></ul><p class=\"card-text\"> Please input the organization details properly &amp; correctly. Any further corrections, please contact charitable@gmail.com </p></div></div><div class=\"card-footer\" style=\"background:inherit;border-color:inherit;\"></div></div></div>", 1);

var _hoisted_61 = {
  key: 1
};
var _hoisted_62 = {
  "class": "row justify-content-center align-items-center d-flex vh-100"
};
var _hoisted_63 = {
  "class": "col-md-4"
};
var _hoisted_64 = {
  "class": "osahan-login py-4"
};

var _hoisted_65 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"text-center mb-4\"><a href=\"index.html\"><img src=\"img/logo.svg\" alt=\"\"></a><h5 class=\"fw-bold mt-3\">Charity Creation Setup</h5><p class=\"text-muted\">Step 2 - Additional NGO Information</p></div>", 1);

var _hoisted_66 = {
  "class": "row"
};
var _hoisted_67 = {
  "class": "col"
};
var _hoisted_68 = {
  "class": "form-group"
};

var _hoisted_69 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Organization Description", -1
/* HOISTED */
);

var _hoisted_70 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_71 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-user position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_72 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_73 = {
  key: 1,
  "class": "text-danger"
};
var _hoisted_74 = {
  "class": "row"
};
var _hoisted_75 = {
  "class": "col"
};

var _hoisted_76 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Facebook Link", -1
/* HOISTED */
);

var _hoisted_77 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_78 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-at-sign position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_79 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_80 = {
  key: 1
};
var _hoisted_81 = {
  "class": "row"
};
var _hoisted_82 = {
  "class": "col"
};

var _hoisted_83 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Twitter Link", -1
/* HOISTED */
);

var _hoisted_84 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_85 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-at-sign position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_86 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_87 = {
  key: 1
};
var _hoisted_88 = {
  "class": "row"
};
var _hoisted_89 = {
  "class": "col"
};

var _hoisted_90 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Instagram Link", -1
/* HOISTED */
);

var _hoisted_91 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_92 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-at-sign position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_93 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_94 = {
  key: 1
};
var _hoisted_95 = {
  "class": "row"
};
var _hoisted_96 = {
  "class": "col"
};

var _hoisted_97 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "mb-1"
}, "Website Link", -1
/* HOISTED */
);

var _hoisted_98 = {
  "class": "position-relative icon-form-control"
};

var _hoisted_99 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-at-sign position-absolute"
}, null, -1
/* HOISTED */
);

var _hoisted_100 = {
  key: 0,
  "class": "text-danger"
};
var _hoisted_101 = {
  key: 1
};

var _hoisted_102 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "pb-5"
}, "Organization Logo", -1
/* HOISTED */
);

var _hoisted_103 = {
  "class": "col-md-4 justify-content-center align-items-center d-flex vh-100"
};
var _hoisted_104 = {
  "class": "card card-custom bg-white border-white border-0"
};

var _hoisted_105 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"card-custom-img\" style=\"background-image:url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);\"></div><div class=\"card-body\" style=\"overflow-y:auto;\"><div class=\"wrapper\"><ul class=\"StepProgress\"><li class=\"StepProgress-item is-done\"><strong>Step One - Organization Information</strong></li><li class=\"StepProgress-item current\"><strong>Step Two - Additional Organization Information</strong><p>Got more entries that you love? Buy more entries anytime! Just hover on your favorite entry and click the Buy button</p></li><li class=\"StepProgress-item\"><strong>Step Three - Documents</strong></li><li class=\"StepProgress-item\"><strong>Step Four - Email Verification</strong></li></ul><p class=\"card-text\"> Please input the organization details properly &amp; correctly. Any further corrections, please contact charitable@gmail.com </p></div></div>", 2);

var _hoisted_107 = {
  "class": "card-footer"
};
var _hoisted_108 = {
  "class": "d-flex justify-content-end"
};
var _hoisted_109 = {
  key: 2
};
var _hoisted_110 = {
  "class": "row justify-content-center align-items-center d-flex vh-100"
};
var _hoisted_111 = {
  "class": "col-md-4"
};
var _hoisted_112 = {
  "class": "osahan-login py-4"
};

var _hoisted_113 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"text-center mb-4\"><a href=\"index.html\"><img src=\"img/logo.svg\" alt=\"\"></a><h5 class=\"fw-bold mt-3\">Charity Creation Setup</h5><p class=\"text-muted\">Step 3 - Upload Documents</p></div>", 1);

var _hoisted_114 = {
  "class": "row"
};

var _hoisted_115 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "pb-5"
}, "Organization Logo", -1
/* HOISTED */
);

var _hoisted_116 = {
  "class": "d-flex justify-content-end"
};
var _hoisted_117 = ["disabled"];
var _hoisted_118 = {
  key: 0
};

var _hoisted_119 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "spinner-border spinner-border-sm",
  role: "status",
  "aria-hidden": "true"
}, null, -1
/* HOISTED */
);

var _hoisted_120 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Processing... ");

var _hoisted_121 = [_hoisted_119, _hoisted_120];
var _hoisted_122 = {
  key: 1
};

var _hoisted_123 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"col-md-4 justify-content-center align-items-center d-flex vh-100\"><div class=\"card card-custom bg-white border-white border-0\"><div class=\"card-custom-img\" style=\"background-image:url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);\"></div><div class=\"card-body\" style=\"overflow-y:auto;\"><div class=\"wrapper\"><ul class=\"StepProgress\"><li class=\"StepProgress-item is-done\"><strong>Step One - Organization Information</strong></li><li class=\"StepProgress-item is-done\"><strong>Step Two - Additional Organization Information</strong></li><li class=\"StepProgress-item current\"><strong>Step Three - Documents</strong><p>Got more entries that you love? Buy more entries anytime! Just hover on your favorite entry and click the Buy button</p></li><li class=\"StepProgress-item\"><strong>Step Four - Email Verification</strong></li></ul><p class=\"card-text\"> Please input the organization details properly &amp; correctly. Any further corrections, please contact charitable@gmail.com </p></div></div><div class=\"card-footer\" style=\"background:inherit;border-color:inherit;\"></div></div></div>", 1);

function render(_ctx, _cache, $props, $setup, $data, $options) {
  var _component_file_pond = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("file-pond");

  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("form", {
    onSubmit: _cache[17] || (_cache[17] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $setup.submit && $setup.submit.apply($setup, arguments);
    }, ["prevent"]))
  }, [$data.step == 1 ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("section", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [_hoisted_5, _hoisted_6, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_7, [_hoisted_8, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_9, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_10, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_11, [_hoisted_12, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_13, [_hoisted_14, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[0] || (_cache[0] = function ($event) {
      return $setup.form.charityName = $event;
    }),
    type: "text",
    "class": "form-control"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.charityName]]), $setup.v$.charityName.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_15, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.charityName.$errors[0].$message), 1
  /* TEXT */
  )])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $props.errors.charityName ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_16, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.charityName), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_17, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_18, [_hoisted_19, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_20, [_hoisted_21, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[1] || (_cache[1] = function ($event) {
      return $setup.form.charityEmail = $event;
    }),
    type: "email",
    "class": "form-control"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.charityEmail, void 0, {
    trim: true
  }]]), $setup.v$.charityEmail.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_22, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.charityEmail.$errors[0].$message), 1
  /* TEXT */
  )])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $props.errors.charityEmail ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_23, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.charityEmail), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]), _hoisted_24, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_25, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_26, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_27, [_hoisted_28, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_29, [_hoisted_30, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[2] || (_cache[2] = function ($event) {
      return $setup.form.headAdminEmail = $event;
    }),
    type: "email",
    "class": "form-control"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.headAdminEmail, void 0, {
    trim: true
  }]]), $setup.v$.headAdminEmail.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_31, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.headAdminEmail.$errors[0].$message), 1
  /* TEXT */
  )])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $props.errors.headAdminEmail ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_32, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.headAdminEmail), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_33, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_34, [_hoisted_35, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_36, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
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
  }]]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_37, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [$setup.v$.password.containsSpecial.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_38, " ✓ Passwords requires an special character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [!$setup.v$.password.containsSpecial.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_39, " ✓ Passwords requires an special character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [$setup.v$.password.containsSpecial.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_40, " ✖ Passwords requires an special character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [!$setup.v$.password.containsNumber.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_41, " ✓ Passwords requires an numerical character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [$setup.v$.password.containsNumber.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_42, " ✖ Passwords requires an numerical character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [!$setup.v$.password.containsLowercase.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_43, " ✓ Passwords requires an lower case character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [$setup.v$.password.containsLowercase.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_44, " ✖ Passwords requires an lower case character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [!$setup.v$.password.containsUppercase.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_45, " ✓ Passwords requires an upper case character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [$setup.v$.password.containsUppercase.$invalid ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_46, " ✖ Passwords requires an upper case character. ")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [$setup.v$.password.minLength.$invalid || $setup.v$.password.maxLength.$invalid || $setup.form.password == '' ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_47, " ✖ Passwords needs to be in between 8 to 19 characters. ")) : ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_48, " ✓ Passwords needs to be in between 8 to 19 characters. "))]), _hoisted_49]), $props.errors.password ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_50, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.password), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_51, [_hoisted_52, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_53, [_hoisted_54, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[4] || (_cache[4] = function ($event) {
      return $setup.form.password_confirmation = $event;
    }),
    type: "password",
    "class": "form-control"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.password_confirmation, void 0, {
    trim: true
  }]]), $setup.v$.password_confirmation.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_55, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_56, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.password_confirmation.$errors[0].$message), 1
  /* TEXT */
  )])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])])]), _hoisted_57, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_59, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "class": "btn btn-primary text-uppercase mt-3 px-5",
    onClick: _cache[5] || (_cache[5] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $options.nextStep && $options.nextStep.apply($options, arguments);
    }, ["prevent"]))
  }, " Agree & Join ")])])]), _hoisted_60])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $data.step == 2 ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("section", _hoisted_61, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_62, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_63, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_64, [_hoisted_65, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_66, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_67, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_68, [_hoisted_69, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_70, [_hoisted_71, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("textarea", {
    "onUpdate:modelValue": _cache[6] || (_cache[6] = function ($event) {
      return $setup.form.description = $event;
    }),
    type: "text",
    "class": "form-control",
    rows: "6"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.description]]), $setup.v$.charityName.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_72, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.charityName.$errors[0].$message), 1
  /* TEXT */
  )])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $props.errors.charityName ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_73, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.charityName), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_74, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_75, [_hoisted_76, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_77, [_hoisted_78, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[7] || (_cache[7] = function ($event) {
      return $setup.form.fb_link = $event;
    }),
    type: "email",
    "class": "form-control"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.fb_link, void 0, {
    trim: true
  }]]), $setup.v$.charityEmail.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_79, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.charityEmail.$errors[0].$message), 1
  /* TEXT */
  )])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $props.errors.charityEmail ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_80, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.charityEmail), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_81, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_82, [_hoisted_83, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_84, [_hoisted_85, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[8] || (_cache[8] = function ($event) {
      return $setup.form.twitter_link = $event;
    }),
    type: "email",
    "class": "form-control"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.twitter_link, void 0, {
    trim: true
  }]]), $setup.v$.charityEmail.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_86, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.charityEmail.$errors[0].$message), 1
  /* TEXT */
  )])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $props.errors.charityEmail ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_87, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.charityEmail), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_88, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_89, [_hoisted_90, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_91, [_hoisted_92, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[9] || (_cache[9] = function ($event) {
      return $setup.form.ig_link = $event;
    }),
    type: "email",
    "class": "form-control"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.ig_link, void 0, {
    trim: true
  }]]), $setup.v$.charityEmail.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_93, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.charityEmail.$errors[0].$message), 1
  /* TEXT */
  )])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $props.errors.charityEmail ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_94, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.charityEmail), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_95, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_96, [_hoisted_97, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_98, [_hoisted_99, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[10] || (_cache[10] = function ($event) {
      return $setup.form.website_link = $event;
    }),
    type: "email",
    "class": "form-control"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.website_link, void 0, {
    trim: true
  }]]), $setup.v$.charityEmail.$error ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_100, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.v$.charityEmail.$errors[0].$message), 1
  /* TEXT */
  )])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $props.errors.charityEmail ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_101, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.charityEmail), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]), _hoisted_102, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_file_pond, {
    name: "file",
    "class": "h-50 mb-5",
    modelValue: _ctx.file,
    "onUpdate:modelValue": _cache[11] || (_cache[11] = function ($event) {
      return _ctx.file = $event;
    }),
    ref: "file",
    files: _ctx.file,
    server: {
      timeout: 7000,
      url: '/register/charity/upload',
      process: {
        headers: {
          url: '/register/charity/upload',
          method: 'POST',
          'X-CSRF-TOKEN': this.$page.props.csrfToken
        },
        withCredentials: false
      }
    },
    "allow-multiple": "false",
    "accepted-file-types": "image/jpeg, image/png",
    "max-files": "1",
    allowDrop: "true",
    dropOnPage: "true",
    onInit: $options.handleFilePondInit,
    onUpdatefiles: $options.handleFilePondUpdateFiles
  }, null, 8
  /* PROPS */
  , ["modelValue", "files", "server", "onInit", "onUpdatefiles"])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_103, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_104, [_hoisted_105, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_107, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_108, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "class": "btn btn-primary text-uppercase mx-auto",
    onClick: _cache[12] || (_cache[12] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $options.prevStep && $options.prevStep.apply($options, arguments);
    }, ["prevent"]))
  }, " Previous Step "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "class": "btn btn-primary text-uppercase mx-auto",
    onClick: _cache[13] || (_cache[13] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $options.secondNextStep && $options.secondNextStep.apply($options, arguments);
    }, ["prevent"]))
  }, " Next Step ")])])])])])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $data.step == 3 ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("section", _hoisted_109, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_110, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_111, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_112, [_hoisted_113, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_114, [_hoisted_115, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_file_pond, {
    name: "documentFile",
    "class": "h-50 mb-5",
    modelValue: _ctx.documentFile,
    "onUpdate:modelValue": _cache[14] || (_cache[14] = function ($event) {
      return _ctx.documentFile = $event;
    }),
    ref: "documentFile",
    files: _ctx.documentFile,
    server: {
      timeout: 7000,
      url: '/register/charity/uploadDocuments',
      process: {
        headers: {
          url: '/register/charity/uploadDocuments',
          method: 'POST',
          'X-CSRF-TOKEN': this.$page.props.csrfToken
        },
        withCredentials: false
      }
    },
    "allow-multiple": "false",
    "accepted-file-types": "image/*",
    "max-files": "7",
    allowDrop: "true",
    dropOnPage: "true",
    onInit: $options.handleFilePondInit,
    onUpdatefiles: $options.handleFilePondUpdateDocumentFiles
  }, null, 8
  /* PROPS */
  , ["modelValue", "files", "server", "onInit", "onUpdatefiles"])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_116, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "class": "btn btn-primary text-uppercase mt-3 mx-auto",
    onClick: _cache[15] || (_cache[15] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $options.prevStep && $options.prevStep.apply($options, arguments);
    }, ["prevent"]))
  }, " Previous Step "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    disabled: $setup.form.processing,
    "class": "btn btn-primary text-uppercase mt-3 mx-auto",
    onClick: _cache[16] || (_cache[16] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $setup.submit && $setup.submit.apply($setup, arguments);
    }, ["prevent"]))
  }, [$setup.form.processing ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", _hoisted_118, _hoisted_121)) : ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", _hoisted_122, " Submit "))], 8
  /* PROPS */
  , _hoisted_117)])])]), _hoisted_123])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)], 32
  /* HYDRATE_EVENTS */
  )]);
}

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/CharityRegister.vue?vue&type=style&index=0&id=68463606&lang=css":
/*!************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/CharityRegister.vue?vue&type=style&index=0&id=68463606&lang=css ***!
  \************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_use_1_node_modules_filepond_dist_filepond_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! -!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-10.use[1]!../../../../node_modules/filepond/dist/filepond.css */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10.use[1]!./node_modules/filepond/dist/filepond.css");
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_use_1_node_modules_filepond_plugin_image_preview_dist_filepond_plugin_image_preview_min_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! -!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-10.use[1]!../../../../node_modules/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10.use[1]!./node_modules/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css");
// Imports



var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
___CSS_LOADER_EXPORT___.i(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_use_1_node_modules_filepond_dist_filepond_css__WEBPACK_IMPORTED_MODULE_1__["default"]);
___CSS_LOADER_EXPORT___.i(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_use_1_node_modules_filepond_plugin_image_preview_dist_filepond_plugin_image_preview_min_css__WEBPACK_IMPORTED_MODULE_2__["default"]);
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.filepond--drop-label{\n    background-color:white;\n    border-radius: 25px;\n    border: 2px solid #007bff;\n    padding: 20px;\n}\n\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/CharityRegister.vue?vue&type=style&index=0&id=68463606&lang=css":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/CharityRegister.vue?vue&type=style&index=0&id=68463606&lang=css ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_CharityRegister_vue_vue_type_style_index_0_id_68463606_lang_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-10.use[1]!../../../../node_modules/vue-loader/dist/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10.use[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./CharityRegister.vue?vue&type=style&index=0&id=68463606&lang=css */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/CharityRegister.vue?vue&type=style&index=0&id=68463606&lang=css");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_CharityRegister_vue_vue_type_style_index_0_id_68463606_lang_css__WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_CharityRegister_vue_vue_type_style_index_0_id_68463606_lang_css__WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./resources/js/Pages/Auth/CharityRegister.vue":
/*!*****************************************************!*\
  !*** ./resources/js/Pages/Auth/CharityRegister.vue ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _CharityRegister_vue_vue_type_template_id_68463606__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CharityRegister.vue?vue&type=template&id=68463606 */ "./resources/js/Pages/Auth/CharityRegister.vue?vue&type=template&id=68463606");
/* harmony import */ var _CharityRegister_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CharityRegister.vue?vue&type=script&lang=js */ "./resources/js/Pages/Auth/CharityRegister.vue?vue&type=script&lang=js");
/* harmony import */ var _CharityRegister_vue_vue_type_style_index_0_id_68463606_lang_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./CharityRegister.vue?vue&type=style&index=0&id=68463606&lang=css */ "./resources/js/Pages/Auth/CharityRegister.vue?vue&type=style&index=0&id=68463606&lang=css");
/* harmony import */ var C_laragon_www_charitable3_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;


const __exports__ = /*#__PURE__*/(0,C_laragon_www_charitable3_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_3__["default"])(_CharityRegister_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_CharityRegister_vue_vue_type_template_id_68463606__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/Auth/CharityRegister.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/Auth/CharityRegister.vue?vue&type=script&lang=js":
/*!*****************************************************************************!*\
  !*** ./resources/js/Pages/Auth/CharityRegister.vue?vue&type=script&lang=js ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_CharityRegister_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_CharityRegister_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./CharityRegister.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/CharityRegister.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/Pages/Auth/CharityRegister.vue?vue&type=template&id=68463606":
/*!***********************************************************************************!*\
  !*** ./resources/js/Pages/Auth/CharityRegister.vue?vue&type=template&id=68463606 ***!
  \***********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_CharityRegister_vue_vue_type_template_id_68463606__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_CharityRegister_vue_vue_type_template_id_68463606__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./CharityRegister.vue?vue&type=template&id=68463606 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/CharityRegister.vue?vue&type=template&id=68463606");


/***/ }),

/***/ "./resources/js/Pages/Auth/CharityRegister.vue?vue&type=style&index=0&id=68463606&lang=css":
/*!*************************************************************************************************!*\
  !*** ./resources/js/Pages/Auth/CharityRegister.vue?vue&type=style&index=0&id=68463606&lang=css ***!
  \*************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_CharityRegister_vue_vue_type_style_index_0_id_68463606_lang_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-10.use[1]!../../../../node_modules/vue-loader/dist/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10.use[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./CharityRegister.vue?vue&type=style&index=0&id=68463606&lang=css */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Auth/CharityRegister.vue?vue&type=style&index=0&id=68463606&lang=css");


/***/ })

}]);