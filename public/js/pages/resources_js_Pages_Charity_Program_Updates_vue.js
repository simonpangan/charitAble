"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Charity_Program_Updates_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Charity/Program/ProgramLayout.vue?vue&type=script&setup=true&lang=js":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Charity/Program/ProgramLayout.vue?vue&type=script&setup=true&lang=js ***!
  \*****************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _inertiajs_inertia__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @inertiajs/inertia */ "./node_modules/@inertiajs/inertia/dist/index.js");
/* harmony import */ var _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @inertiajs/inertia-vue3 */ "./node_modules/@inertiajs/inertia-vue3/dist/index.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! sweetalert2 */ "./node_modules/sweetalert2/dist/sweetalert2.all.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(sweetalert2__WEBPACK_IMPORTED_MODULE_2__);

var __default__ = {
  props: ['program'],
  data: function data() {
    return {
      stats: this.$page.props.stats
    };
  },
  computed: {
    donationPercentage: function donationPercentage() {
      var percentage = Math.round(this.stats.total_donation / this.program.total_needed_amount * 100);
      return percentage >= 100 ? '100' : percentage;
    }
  },
  methods: {
    formatNumber: function formatNumber(number) {
      return number == null ? 0 : number.toLocaleString();
    },
    deletePost: function deletePost(id) {
      var _this = this;

      this.$swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then(function (result) {
        if (result.isConfirmed) {
          _inertiajs_inertia__WEBPACK_IMPORTED_MODULE_0__.Inertia["delete"](route('charity.program.destroy', {
            id: id
          }), {
            onSuccess: function onSuccess() {
              _this.$swal.fire('Deleted!', 'Your program has been deleted.', 'success');
            }
          });
        }
      });
    }
  }
};


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (/*#__PURE__*/Object.assign(__default__, {
  setup: function setup(__props, _ref) {
    var expose = _ref.expose;
    expose();
    var form = (0,_inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_1__.useForm)({
      amount: null
    });

    var withdrawRequest = function withdrawRequest(id) {
      sweetalert2__WEBPACK_IMPORTED_MODULE_2___default().fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, sent it!'
      }).then(function (result) {
        if (result.isConfirmed) {
          form.post(route('charity.program.withdraw-request', {
            'id': id
          }), {
            onSuccess: function onSuccess() {
              sweetalert2__WEBPACK_IMPORTED_MODULE_2___default().fire('Sent!', 'Your withdraw request has been sent.', 'success');
            }
          });
        }
      });
    };

    var cancelRequest = function cancelRequest(id) {
      sweetalert2__WEBPACK_IMPORTED_MODULE_2___default().fire({
        title: 'Are you sure?',
        icon: 'warning',
        text: "You won't be able to revert this!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, cancel it!'
      }).then(function (result) {
        if (result.isConfirmed) {
          _inertiajs_inertia__WEBPACK_IMPORTED_MODULE_0__.Inertia.post(route('charity.program.withdraw-request.cancel', {
            'id': id
          }), {}, {
            onSuccess: function onSuccess() {
              sweetalert2__WEBPACK_IMPORTED_MODULE_2___default().fire('Sent!', 'Your withdraw request has been cancelled.', 'success');
            }
          });
        }
      });
    };

    var __returned__ = {
      form: form,
      withdrawRequest: withdrawRequest,
      cancelRequest: cancelRequest,
      Inertia: _inertiajs_inertia__WEBPACK_IMPORTED_MODULE_0__.Inertia,
      useForm: _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_1__.useForm,
      Swal: (sweetalert2__WEBPACK_IMPORTED_MODULE_2___default())
    };
    Object.defineProperty(__returned__, '__isScriptSetup', {
      enumerable: false,
      value: true
    });
    return __returned__;
  }
}));

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Charity/Program/Updates.vue?vue&type=script&setup=true&lang=js":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Charity/Program/Updates.vue?vue&type=script&setup=true&lang=js ***!
  \***********************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _ProgramLayout__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProgramLayout */ "./resources/js/Pages/Charity/Program/ProgramLayout.vue");

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: {
    program: Array,
    posts: Array,
    charity: Array
  },
  setup: function setup(__props, _ref) {
    var expose = _ref.expose;
    expose();
    var props = __props;
    var __returned__ = {
      props: props,
      ProgramLayout: _ProgramLayout__WEBPACK_IMPORTED_MODULE_0__["default"]
    };
    Object.defineProperty(__returned__, '__isScriptSetup', {
      enumerable: false,
      value: true
    });
    return __returned__;
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Charity/Program/ProgramLayout.vue?vue&type=template&id=17264b9a":
/*!**********************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Charity/Program/ProgramLayout.vue?vue&type=template&id=17264b9a ***!
  \**********************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "bg-white shadow-sm border-bottom"
};
var _hoisted_2 = {
  "class": "container"
};
var _hoisted_3 = {
  "class": "row"
};
var _hoisted_4 = {
  "class": "col-md-12"
};
var _hoisted_5 = {
  "class": "d-flex align-items-center py-3"
};
var _hoisted_6 = {
  "class": "profile-left"
};
var _hoisted_7 = {
  "class": "font-weight-bold text-dark mb-1 mt-0"
};
var _hoisted_8 = {
  "class": "text-muted"
};

var _hoisted_9 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" A Program by ");

var _hoisted_10 = {
  "class": "text-muted"
};
var _hoisted_11 = {
  key: 0,
  "class": "profile-right ms-auto"
};

var _hoisted_12 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "fad fa-edit"
}, null, -1
/* HOISTED */
);

var _hoisted_13 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "fad fa-trash"
}, null, -1
/* HOISTED */
);

var _hoisted_14 = {
  "class": "pb-4 pt-3"
};
var _hoisted_15 = {
  "class": "container"
};
var _hoisted_16 = {
  "class": "row"
};
var _hoisted_17 = {
  "class": "col col-xl-8 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12"
};
var _hoisted_18 = {
  "class": "box shadow-sm rounded bg-white mb-3 overflow-hidden"
};
var _hoisted_19 = {
  "class": "nav border-bottom osahan-line-tab",
  id: "myTab",
  role: "tablist"
};
var _hoisted_20 = {
  "class": "nav-item"
};

var _hoisted_21 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("Program Description");

var _hoisted_22 = {
  "class": "nav-item"
};

var _hoisted_23 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("Supporters");

var _hoisted_24 = {
  "class": "nav-item"
};

var _hoisted_25 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("Gallery");

var _hoisted_26 = {
  "class": "nav-item ms-auto"
};

var _hoisted_27 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "fas fa-cog text-primary me-2"
}, null, -1
/* HOISTED */
);

var _hoisted_28 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("Admin : Program Settings");

var _hoisted_29 = {
  "class": "tab-content",
  id: "myTabContent"
};
var _hoisted_30 = {
  "class": "col col-xl-4 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12"
};
var _hoisted_31 = {
  key: 0
};
var _hoisted_32 = ["href"];

var _hoisted_33 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Download Report ");

var _hoisted_34 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "fad fa-download ms-2"
}, null, -1
/* HOISTED */
);

var _hoisted_35 = [_hoisted_33, _hoisted_34];
var _hoisted_36 = {
  key: 0
};
var _hoisted_37 = {
  "class": "input-group mb-3"
};
var _hoisted_38 = ["value"];

var _hoisted_39 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Cancel Request ");

var _hoisted_40 = ["textContent"];

var _hoisted_41 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, "You still have an ongoing withdraw request.")], -1
/* HOISTED */
);

var _hoisted_42 = {
  key: 1,
  "class": "input-group mb-3"
};

var _hoisted_43 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Send Withdraw Request ");

var _hoisted_44 = ["textContent"];
var _hoisted_45 = {
  "class": "box shadow-sm border rounded bg-white mb-3"
};

var _hoisted_46 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "box-title border-bottom p-3 mt-2"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h6", {
  "class": "m-0"
}, "Donations")], -1
/* HOISTED */
);

var _hoisted_47 = {
  "class": "box-body p-3"
};
var _hoisted_48 = {
  "class": "progress"
};
var _hoisted_49 = ["aria-valuenow"];
var _hoisted_50 = {
  "class": "mx-auto nmb-1"
};
var _hoisted_51 = {
  "class": ""
};

var _hoisted_52 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("funded out of ");

var _hoisted_53 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "fa-1x text-gray-300"
}, "₱", -1
/* HOISTED */
);

var _hoisted_54 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "fa-1x"
}, "₱", -1
/* HOISTED */
);

var _hoisted_55 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", {
  "class": "text-muted"
}, "Withdrawn Money", -1
/* HOISTED */
);

var _hoisted_56 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", {
  "class": "text-muted"
}, "Total Donors", -1
/* HOISTED */
);

var _hoisted_57 = {
  "class": "text-truncate"
};

var _hoisted_58 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "d-flex"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", {
  clas: "",
  s: "text-muted"
}, "ETH Address"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "fad fa-info-circle mt-1 ms-2 text-primary",
  title: "This is a special account for charities to conduct blockchain transaction"
})], -1
/* HOISTED */
);

var _hoisted_59 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", {
  "class": "fw-light"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("What is a blockchain, and other questions. Learn more about our "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
  href: "#",
  "class": "text-decoration-underline"
}, "transparency blockchain program")])], -1
/* HOISTED */
);

var _hoisted_60 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "feather-plus"
}, null, -1
/* HOISTED */
);

var _hoisted_61 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Donate Now! ");

function render(_ctx, _cache, $props, $setup, $data, $options) {
  var _component_Link = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("Link");

  var _component_Button = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("Button");

  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_5, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_6, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h3", _hoisted_7, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.program.name), 1
  /* TEXT */
  ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_8, [_hoisted_9, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_Link, {
    "class": "text-dark",
    href: _ctx.$route('charity.profile.index', {
      'id': $props.program.charity.id
    })
  }, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("u", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.program.charity.name), 1
      /* TEXT */
      )];
    }),
    _: 1
    /* STABLE */

  }, 8
  /* PROPS */
  , ["href"])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_10, " Updated at : " + (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.program.updated_at), 1
  /* TEXT */
  )]), this.$page.props.can.modify ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_11, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_Link, {
    "class": "btn btn-success btn-lg",
    href: _ctx.$route('charity.program.edit', {
      id: $props.program.id
    })
  }, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [_hoisted_12];
    }),
    _: 1
    /* STABLE */

  }, 8
  /* PROPS */
  , ["href"]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_Link, {
    onClick: _cache[0] || (_cache[0] = function ($event) {
      return $options.deletePost($props.program.id);
    }),
    as: "button",
    "class": "btn btn-danger btn-lg ms-2"
  }, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [_hoisted_13];
    }),
    _: 1
    /* STABLE */

  })])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_14, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_15, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_16, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("main", _hoisted_17, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_18, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("ul", _hoisted_19, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", _hoisted_20, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_Link, {
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(["nav-link", {
      'active': _ctx.$page.component === 'Charity/Program/Show'
    }]),
    href: _ctx.$route('charity.program.show', {
      'id': $props.program.id
    })
  }, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [_hoisted_21];
    }),
    _: 1
    /* STABLE */

  }, 8
  /* PROPS */
  , ["class", "href"])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", _hoisted_22, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_Link, {
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(["nav-link", {
      'active': _ctx.$page.component === 'Charity/Program/Supports'
    }]),
    href: _ctx.$route('charity.program.supporters', {
      'id': $props.program.id
    })
  }, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [_hoisted_23];
    }),
    _: 1
    /* STABLE */

  }, 8
  /* PROPS */
  , ["class", "href"])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", _hoisted_24, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_Link, {
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(["nav-link", {
      'active': _ctx.$page.component === 'Charity/Program/Gallery'
    }]),
    href: _ctx.$route('charity.program.gallery', {
      'id': $props.program.id
    })
  }, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [_hoisted_25];
    }),
    _: 1
    /* STABLE */

  }, 8
  /* PROPS */
  , ["class", "href"])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", _hoisted_26, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_Link, {
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(["nav-link", {
      'active': _ctx.$page.component === 'Charity/Program/CharitySettings'
    }]),
    href: _ctx.$route('charity.program.setting', {
      'id': $props.program.id
    })
  }, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [_hoisted_27, _hoisted_28];
    }),
    _: 1
    /* STABLE */

  }, 8
  /* PROPS */
  , ["class", "href"])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_29, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.renderSlot)(_ctx.$slots, "default")])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("aside", _hoisted_30, [this.$page.props.can.modify ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_31, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
    href: _ctx.$route('charity.program.report', {
      'id': $props.program.id
    }),
    "class": "btn btn-block btn-lg btn-primary w-100 mb-3"
  }, _hoisted_35, 8
  /* PROPS */
  , _hoisted_32), $props.program.has_withdraw_request ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_36, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_37, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "number",
    "class": "form-control",
    placeholder: "Amount",
    value: $props.program.withdraw_request_amount,
    disabled: ""
  }, null, 8
  /* PROPS */
  , _hoisted_38), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_Button, {
    onClick: _cache[1] || (_cache[1] = function ($event) {
      return $setup.cancelRequest(_ctx.$page.props.program.id);
    }),
    method: "post",
    as: "button",
    type: "button",
    "class": "btn btn-danger"
  }, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [_hoisted_39];
    }),
    _: 1
    /* STABLE */

  }), $setup.form.errors.amount ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", {
    key: 0,
    textContent: (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors.amount),
    "class": "invalid-feedback d-block",
    role: "alert"
  }, null, 8
  /* PROPS */
  , _hoisted_40)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), _hoisted_41])) : ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_42, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "number",
    "class": "form-control",
    placeholder: "Amount",
    "onUpdate:modelValue": _cache[2] || (_cache[2] = function ($event) {
      return $setup.form.amount = $event;
    })
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.amount]]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_Button, {
    onClick: _cache[3] || (_cache[3] = function ($event) {
      return $setup.withdrawRequest(_ctx.$page.props.program.id);
    }),
    method: "post",
    as: "button",
    type: "button",
    "class": "btn btn-secondary"
  }, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [_hoisted_43];
    }),
    _: 1
    /* STABLE */

  }), $setup.form.errors.amount ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", {
    key: 0,
    textContent: (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors.amount),
    "class": "invalid-feedback d-block",
    role: "alert"
  }, null, 8
  /* PROPS */
  , _hoisted_44)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]))])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_45, [_hoisted_46, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_47, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_48, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
    "class": "progress-bar",
    role: "progressbar",
    style: (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeStyle)({
      width: $options.donationPercentage + '%'
    }),
    "aria-valuenow": $options.donationPercentage,
    "aria-valuemin": "0",
    "aria-valuemax": "100"
  }, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($options.donationPercentage) + " % ", 13
  /* TEXT, STYLE, PROPS */
  , _hoisted_49)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h3", _hoisted_50, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($options.formatNumber($data.stats.total_donation)), 1
  /* TEXT */
  ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_51, [_hoisted_52, _hoisted_53, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" " + (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($options.formatNumber($props.program.total_needed_amount)), 1
  /* TEXT */
  )])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h5", null, [_hoisted_54, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" " + (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($options.formatNumber($props.program.total_withdrawn_amount)), 1
  /* TEXT */
  )]), _hoisted_55]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h5", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($data.stats.total_donors), 1
  /* TEXT */
  ), _hoisted_56]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h5", _hoisted_57, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.program.charity.eth_address), 1
  /* TEXT */
  ), _hoisted_58, _hoisted_59]), _ctx.$page.props.auth.user.roleID == 4 ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)(_component_Link, {
    key: 0,
    "class": "btn btn-block btn-lg btn-primary w-100 mt-5",
    href: _ctx.$route('charity.donate.create', {
      'id': _ctx.$page.props.program.id
    })
  }, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [_hoisted_60, _hoisted_61];
    }),
    _: 1
    /* STABLE */

  }, 8
  /* PROPS */
  , ["href"])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])])])])])], 64
  /* STABLE_FRAGMENT */
  );
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Charity/Program/Updates.vue?vue&type=template&id=cb0d3022":
/*!****************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Charity/Program/Updates.vue?vue&type=template&id=cb0d3022 ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "tab-pane fade show active",
  id: "home",
  role: "tabpanel",
  "aria-labelledby": "home-tab"
};
var _hoisted_2 = {
  "class": "box shadow-sm border rounded bg-white mb-3 osahan-post"
};
var _hoisted_3 = {
  "class": "p-3 d-flex align-items-center border-bottom osahan-post-header"
};
var _hoisted_4 = {
  "class": "dropdown-list-image me-3"
};
var _hoisted_5 = ["src"];
var _hoisted_6 = {
  "class": "font-weight-bold"
};
var _hoisted_7 = {
  "class": "text-truncate"
};

var _hoisted_8 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "text-info ms-1"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "data-bs-toggle": "tooltip",
  "data-bs-placement": "top",
  title: "Verified",
  "class": "feather-check-circle"
})], -1
/* HOISTED */
);

var _hoisted_9 = {
  "class": "small text-gray-500"
};

var _hoisted_10 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "ms-auto small"
}, null, -1
/* HOISTED */
);

var _hoisted_11 = {
  "class": "p-3 border-bottom osahan-post-body"
};
var _hoisted_12 = ["src"];
function render(_ctx, _cache, $props, $setup, $data, $options) {
  var _component_Head = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("Head");

  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_Head, {
    title: "Charity Program"
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup["ProgramLayout"], {
    program: $props.program
  }, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_1, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($props.posts, function (post) {
        return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", {
          key: post.id
        }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("img", {
          "class": "rounded-circle",
          src: $props.charity[0].logo,
          alt: ""
        }, null, 8
        /* PROPS */
        , _hoisted_5)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_6, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_7, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)((0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.charity[0].name), 1
        /* TEXT */
        ), _hoisted_8]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_9, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(post.created_at_formatted), 1
        /* TEXT */
        )]), _hoisted_10]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_11, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)((0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(post.main_content_body) + " ", 1
        /* TEXT */
        ), post.main_content_body_image ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("img", {
          key: 0,
          src: post.main_content_body_image,
          "class": "img-fluid",
          alt: "post image"
        }, null, 8
        /* PROPS */
        , _hoisted_12)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]);
      }), 128
      /* KEYED_FRAGMENT */
      ))])];
    }),
    _: 1
    /* STABLE */

  }, 8
  /* PROPS */
  , ["program"])], 64
  /* STABLE_FRAGMENT */
  );
}

/***/ }),

/***/ "./resources/js/Pages/Charity/Program/ProgramLayout.vue":
/*!**************************************************************!*\
  !*** ./resources/js/Pages/Charity/Program/ProgramLayout.vue ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _ProgramLayout_vue_vue_type_template_id_17264b9a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProgramLayout.vue?vue&type=template&id=17264b9a */ "./resources/js/Pages/Charity/Program/ProgramLayout.vue?vue&type=template&id=17264b9a");
/* harmony import */ var _ProgramLayout_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProgramLayout.vue?vue&type=script&setup=true&lang=js */ "./resources/js/Pages/Charity/Program/ProgramLayout.vue?vue&type=script&setup=true&lang=js");
/* harmony import */ var C_laragon_www_newcharti_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_laragon_www_newcharti_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_ProgramLayout_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_ProgramLayout_vue_vue_type_template_id_17264b9a__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/Charity/Program/ProgramLayout.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/Charity/Program/Updates.vue":
/*!********************************************************!*\
  !*** ./resources/js/Pages/Charity/Program/Updates.vue ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Updates_vue_vue_type_template_id_cb0d3022__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Updates.vue?vue&type=template&id=cb0d3022 */ "./resources/js/Pages/Charity/Program/Updates.vue?vue&type=template&id=cb0d3022");
/* harmony import */ var _Updates_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Updates.vue?vue&type=script&setup=true&lang=js */ "./resources/js/Pages/Charity/Program/Updates.vue?vue&type=script&setup=true&lang=js");
/* harmony import */ var C_laragon_www_newcharti_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_laragon_www_newcharti_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_Updates_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Updates_vue_vue_type_template_id_cb0d3022__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/Charity/Program/Updates.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/Charity/Program/ProgramLayout.vue?vue&type=script&setup=true&lang=js":
/*!*************************************************************************************************!*\
  !*** ./resources/js/Pages/Charity/Program/ProgramLayout.vue?vue&type=script&setup=true&lang=js ***!
  \*************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_ProgramLayout_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_ProgramLayout_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./ProgramLayout.vue?vue&type=script&setup=true&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Charity/Program/ProgramLayout.vue?vue&type=script&setup=true&lang=js");
 

/***/ }),

/***/ "./resources/js/Pages/Charity/Program/Updates.vue?vue&type=script&setup=true&lang=js":
/*!*******************************************************************************************!*\
  !*** ./resources/js/Pages/Charity/Program/Updates.vue?vue&type=script&setup=true&lang=js ***!
  \*******************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Updates_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Updates_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Updates.vue?vue&type=script&setup=true&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Charity/Program/Updates.vue?vue&type=script&setup=true&lang=js");
 

/***/ }),

/***/ "./resources/js/Pages/Charity/Program/ProgramLayout.vue?vue&type=template&id=17264b9a":
/*!********************************************************************************************!*\
  !*** ./resources/js/Pages/Charity/Program/ProgramLayout.vue?vue&type=template&id=17264b9a ***!
  \********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_ProgramLayout_vue_vue_type_template_id_17264b9a__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_ProgramLayout_vue_vue_type_template_id_17264b9a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./ProgramLayout.vue?vue&type=template&id=17264b9a */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Charity/Program/ProgramLayout.vue?vue&type=template&id=17264b9a");


/***/ }),

/***/ "./resources/js/Pages/Charity/Program/Updates.vue?vue&type=template&id=cb0d3022":
/*!**************************************************************************************!*\
  !*** ./resources/js/Pages/Charity/Program/Updates.vue?vue&type=template&id=cb0d3022 ***!
  \**************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Updates_vue_vue_type_template_id_cb0d3022__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Updates_vue_vue_type_template_id_cb0d3022__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Updates.vue?vue&type=template&id=cb0d3022 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Charity/Program/Updates.vue?vue&type=template&id=cb0d3022");


/***/ })

}]);