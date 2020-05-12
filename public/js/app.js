(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/app"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Cards.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Cards.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "Cards",
  props: {
    cardset: {
      type: String
    },
    api: {
      type: Object
    },
    user: {
      type: Object
    },
    roomid: {
      type: String
    }
  },
  data: function data() {
    return {
      cards: []
    };
  },
  created: function created() {
    this.cards = JSON.parse(this.cardset);
  },
  methods: {
    vote: function vote(_vote) {
      this.api.vote(this.roomid, this.user.id, _vote).then(function (data) {//   this.saveUserId(data.userid);
        //   this.$emit("joined");
      })["catch"](function (error) {
        console.log(error);
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Join.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Join.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "Join",
  props: {
    api: {
      type: Object
    },
    roomid: {
      type: String
    }
  },
  data: function data() {
    return {
      username: "",
      msg: "",
      userid: null
    };
  },
  mounted: function mounted() {
    if (localStorage.getItem("agile_pointer_userid")) this.userid = localStorage.getItem("agile_pointer_userid");
  },
  methods: {
    join: function join(type) {
      var _this = this;

      this.api.join(this.username, type, this.roomid, this.userid).then(function (data) {
        _this.saveUserId(data.user.id);

        _this.$emit("joined", data.user);
      })["catch"](function (error) {
        console.log(error);
      });
    },
    saveUserId: function saveUserId(userid) {
      if (typeof userid !== "undefined") {
        localStorage.setItem("agile_pointer_userid", userid);
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Observers.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Observers.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "Observers",
  props: {
    users: {
      type: Array
    }
  },
  data: function data() {
    return {
      observers: []
    };
  },
  watch: {
    users: function users(_users) {
      this.observers = _users.filter(function (user) {
        if (user.type === "0") {
          return user;
        }
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Players.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Players.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "Players",
  props: {
    users: {
      type: Array
    },
    vote: {
      type: Object
    },
    api: {
      type: Object
    },
    roomid: {
      type: String
    },
    showVote: {
      type: Boolean,
      "default": false
    },
    clearVote: {
      type: Boolean,
      "default": false
    }
  },
  data: function data() {
    return {
      players: [],
      votetotal: 0,
      uservotecount: 0,
      shouldShowVote: this.showVote
    };
  },
  watch: {
    users: function users(_users) {
      // Only keep players
      this.players = _users.filter(function (user) {
        if (user.type === "1") {
          return user;
        }
      });
    },
    vote: function vote(data) {
      // Register a players vote
      var voters = this.players.map(function (user) {
        if (user.userid === data.userid) {
          user.vote = data.vote;
          user.voted = true;
          return user;
        }

        return user;
      });
      this.players = voters;
      var vote = data.vote;

      if (isNaN(data.vote) === true) {
        vote = 0;
      }

      this.votetotal = this.votetotal + vote; // Check if all users have voted

      this.uservotecount++;

      if (this.uservotecount === this.players.length) {
        this.showVotes();
        this.shouldShowVote = true;
      }
    },
    clearVote: function clearVote() {
      var voters = this.players.map(function (user) {
        user.vote = null;
        user.voted = false;
        return user;
      }); // reset values

      this.players = voters;
      this.votetotal = 0;
      this.uservotecount = 0;
      this.shouldShowVote = false;
    }
  },
  computed: {
    averageVotes: function averageVotes() {
      if (this.votetotal > 0) {
        return this.votetotal / this.players.length;
      }

      return "";
    }
  },
  methods: {
    showVotes: function showVotes() {
      this.api.show(this.roomid);
    },
    clearVotes: function clearVotes() {
      this.api.clear(this.roomid);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Room.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Room.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _support_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../support/api */ "./resources/js/support/api.js");
/* harmony import */ var _Join__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Join */ "./resources/js/components/Join.vue");
/* harmony import */ var _Players__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Players */ "./resources/js/components/Players.vue");
/* harmony import */ var _Observers__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./Observers */ "./resources/js/components/Observers.vue");
/* harmony import */ var _Cards__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./Cards */ "./resources/js/components/Cards.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//





/* harmony default export */ __webpack_exports__["default"] = ({
  name: "Room",
  components: {
    Join: _Join__WEBPACK_IMPORTED_MODULE_1__["default"],
    Players: _Players__WEBPACK_IMPORTED_MODULE_2__["default"],
    Observers: _Observers__WEBPACK_IMPORTED_MODULE_3__["default"],
    Cards: _Cards__WEBPACK_IMPORTED_MODULE_4__["default"]
  },
  props: {
    roomid: {
      type: String
    },
    routes: {
      type: String
    },
    cardset: {
      type: String
    }
  },
  data: function data() {
    return {
      hasJoined: false,
      api: null,
      channel: null,
      users: [],
      vote: null,
      cards: [],
      user: {},
      showVote: false,
      clearVote: false
    };
  },
  created: function created() {
    this.api = new _support_api__WEBPACK_IMPORTED_MODULE_0__["default"](this.routes);
  },
  mounted: function mounted() {},
  methods: {
    handleJoin: function handleJoin(user) {
      this.user = user;
      this.joined();
      this.hasJoined = true;
    },
    joined: function joined() {
      var _this = this;

      this.channel = Echo.join("room" + this.roomid).here(function (users) {
        return _this.users = users;
      }).joining(function (user) {
        return _this.users.push(user);
      }).leaving(function (user) {
        return _this.users = _this.users.filter(function (u) {
          return u.userid !== user.userid;
        });
      }).listen("UserVoted", function (e) {
        _this.vote = e.vote;
      }).listen("ShowVotesEvent", function (e) {
        _this.showVote = !_this.showVote;
      }).listen("ClearVotesEvent", function (e) {
        _this.clearVote = !_this.clearVote;
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Cards.vue?vue&type=template&id=767212f0&":
/*!********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Cards.vue?vue&type=template&id=767212f0& ***!
  \********************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "flex justify-center" },
    _vm._l(this.cards, function(card) {
      return _c(
        "div",
        { key: card, staticClass: "inline w-auto pr-4", attrs: { col: "" } },
        [
          _c(
            "button",
            {
              staticClass:
                "w-16 px-1 py-1 font-semibold text-green-700 bg-transparent border border-green-500 rounded hover:bg-green-500 hover:text-white hover:border-transparent",
              attrs: { type: "button" },
              on: {
                click: function($event) {
                  return _vm.vote(card)
                }
              }
            },
            [_vm._v(_vm._s(card))]
          )
        ]
      )
    }),
    0
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Join.vue?vue&type=template&id=5012af15&":
/*!*******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Join.vue?vue&type=template&id=5012af15& ***!
  \*******************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "w-full max-w-xs m-auto" }, [
    _c("div", { staticClass: "my-10 text-3xl text-center" }, [
      _vm._v("Register for room")
    ]),
    _vm._v(" "),
    _c("label", { attrs: { for: "room_name" } }, [_vm._v("Enter your name")]),
    _vm._v(" "),
    _c("input", {
      directives: [
        {
          name: "model",
          rawName: "v-model",
          value: _vm.username,
          expression: "username"
        }
      ],
      staticClass:
        "block w-full px-4 py-2 leading-normal bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:shadow-outline",
      attrs: { type: "text", required: "", name: "name" },
      domProps: { value: _vm.username },
      on: {
        input: function($event) {
          if ($event.target.composing) {
            return
          }
          _vm.username = $event.target.value
        }
      }
    }),
    _vm._v(" "),
    _vm.msg ? _c("span", [_vm._v(_vm._s(_vm.msg))]) : _vm._e(),
    _vm._v(" "),
    _c("div", { staticClass: "my-6 text-center" }, [
      _c("p", { staticClass: "my-4 text-center" }, [_vm._v("Enter room as:")]),
      _vm._v(" "),
      _c(
        "button",
        {
          staticClass:
            "px-4 py-2 font-bold text-white bg-green-600 rounded hover:bg-green-400",
          attrs: { type: "submit" },
          on: {
            click: function($event) {
              return _vm.join(1)
            }
          }
        },
        [
          _vm._v("\n      Player\n      "),
          _c(
            "svg",
            {
              staticClass: "inline",
              attrs: {
                fill: "currentColor",
                viewBox: "0 0 20 20",
                width: "22",
                height: "22"
              }
            },
            [
              _c("path", {
                attrs: {
                  d: "M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z",
                  "clip-rule": "evenodd",
                  "fill-rule": "evenodd"
                }
              })
            ]
          )
        ]
      ),
      _vm._v(" "),
      _c("span", { staticClass: "inline-block w-12" }),
      _vm._v(" "),
      _c(
        "button",
        {
          staticClass:
            "px-4 py-2 font-bold text-white bg-green-600 rounded hover:bg-green-400",
          attrs: { type: "submit" },
          on: {
            click: function($event) {
              return _vm.join(0)
            }
          }
        },
        [
          _vm._v("\n      Observer\n      "),
          _c(
            "svg",
            {
              staticClass: "inline",
              attrs: { fill: "currentColor", viewBox: "0 0 20 20", width: "22" }
            },
            [
              _c("path", {
                attrs: {
                  d:
                    "M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                }
              })
            ]
          )
        ]
      )
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Observers.vue?vue&type=template&id=5e603c02&":
/*!************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Observers.vue?vue&type=template&id=5e603c02& ***!
  \************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return this.observers.length > 0
    ? _c("div", [
        _c(
          "div",
          { staticClass: "mt-6 overflow-hidden rounded rounded-lg shadow-lg" },
          [
            _vm._m(0),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "p-2" },
              _vm._l(this.observers, function(observer, index) {
                return _c("span", _vm._b({}, "span", index, false), [
                  _c("span", [_vm._v(_vm._s(observer.name))]),
                  _vm._v(" "),
                  index + 1 < _vm.observers.length
                    ? _c("span", [_vm._v(",")])
                    : _vm._e()
                ])
              }),
              0
            )
          ]
        )
      ])
    : _vm._e()
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-full border-b border-gray-400" }, [
      _c("div", { staticClass: "mb-2 text-lg text-center" }, [
        _vm._v("Observers")
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Players.vue?vue&type=template&id=0c847bd2&":
/*!**********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Players.vue?vue&type=template&id=0c847bd2& ***!
  \**********************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("div", { staticClass: "grid grid-cols-2 gap-2" }, [
      _c("div", { staticClass: "py-2 pr-3" }, [
        _c(
          "button",
          {
            staticClass:
              "float-right px-1 py-1 font-semibold text-green-700 bg-transparent border border-green-500 rounded w-22 hover:bg-green-500 hover:text-white hover:border-transparent",
            attrs: { type: "button" },
            on: { click: _vm.clearVotes }
          },
          [_vm._v("Clear Votes")]
        )
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "py-2 pl-3" }, [
        _c(
          "button",
          {
            staticClass:
              "px-1 py-1 font-semibold text-green-700 bg-transparent border border-green-500 rounded w-22 hover:bg-green-500 hover:text-white hover:border-transparent",
            attrs: { type: "button" },
            on: { click: _vm.showVotes }
          },
          [_vm._v("Show Votes")]
        )
      ])
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "grid grid-cols-1" }, [
      _c(
        "table",
        { staticClass: "w-full p-6 border table-fixed border-grey-300" },
        [
          _vm._m(0),
          _vm._v(" "),
          _c(
            "tbody",
            [
              _vm._l(this.players, function(player) {
                return _c(
                  "tr",
                  { key: player.userid, staticClass: "leading-tight" },
                  [
                    _c(
                      "td",
                      { staticClass: "px-4 py-2 border-b border-grey-light" },
                      [_vm._v(_vm._s(player.name))]
                    ),
                    _vm._v(" "),
                    _c(
                      "td",
                      {
                        staticClass:
                          "px-4 py-2 text-center border-b border-grey-light"
                      },
                      [
                        player.voted === false
                          ? _c("span", [_vm._v("---")])
                          : _vm._e(),
                        _vm._v(" "),
                        player.voted === true && _vm.shouldShowVote === false
                          ? _c(
                              "span",
                              {
                                staticClass:
                                  "inline-block mt-1 text-center border-b border-grey-light"
                              },
                              [
                                _c(
                                  "svg",
                                  {
                                    staticClass: "inline",
                                    attrs: {
                                      fill: "currentColor",
                                      viewBox: "0 0 20 20",
                                      width: "20",
                                      color: "green"
                                    }
                                  },
                                  [
                                    _c("path", {
                                      attrs: {
                                        d:
                                          "M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z",
                                        "clip-rule": "evenodd",
                                        "fill-rule": "evenodd"
                                      }
                                    })
                                  ]
                                )
                              ]
                            )
                          : _vm._e(),
                        _vm._v(" "),
                        _vm.shouldShowVote
                          ? _c("span", [_vm._v(_vm._s(player.vote))])
                          : _vm._e()
                      ]
                    )
                  ]
                )
              }),
              _vm._v(" "),
              this.shouldShowVote
                ? _c("tr", { staticClass: "text-right" }, [
                    _c(
                      "td",
                      { staticClass: "pr-12", attrs: { colspan: "2" } },
                      [
                        _c("b", [_vm._v("Average:")]),
                        _vm._v(
                          "\n            " +
                            _vm._s(_vm.averageVotes) +
                            "\n          "
                        )
                      ]
                    )
                  ])
                : _vm._e()
            ],
            2
          )
        ]
      )
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", { staticClass: "leading-tight" }, [
        _c(
          "th",
          {
            staticClass:
              "w-1/2 px-4 py-2 font-bold uppercase bg-gray-300 border-b border-grey-300",
            attrs: { scope: "col" }
          },
          [_vm._v("Player")]
        ),
        _vm._v(" "),
        _c(
          "th",
          {
            staticClass:
              "w-1/4 px-4 py-2 font-bold text-center uppercase bg-gray-300 border-b border-grey-300",
            attrs: { scope: "col" }
          },
          [_vm._v("Vote")]
        )
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Room.vue?vue&type=template&id=cd69db74&":
/*!*******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Room.vue?vue&type=template&id=cd69db74& ***!
  \*******************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "container" }, [
    _vm.hasJoined
      ? _c(
          "div",
          [
            this.user.type == 1
              ? _c("Cards", {
                  attrs: {
                    roomid: this.roomid,
                    user: this.user,
                    cardset: this.cardset,
                    api: this.api
                  }
                })
              : _vm._e(),
            _vm._v(" "),
            _c("Players", {
              attrs: {
                clearVote: _vm.clearVote,
                showVote: _vm.showVote,
                api: _vm.api,
                roomid: _vm.roomid,
                users: _vm.users,
                vote: this.vote
              }
            }),
            _vm._v(" "),
            _c("Observers", { attrs: { users: _vm.users } })
          ],
          1
        )
      : _c(
          "div",
          [
            _c("join", {
              attrs: { api: _vm.api, roomid: _vm.roomid },
              on: { joined: _vm.handleJoin }
            })
          ],
          1
        )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
__webpack_require__(/*! ./bootstrap */ "./resources/js/bootstrap.js");

window.Vue = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('room', __webpack_require__(/*! ./components/Room.vue */ "./resources/js/components/Room.vue")["default"]);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

var app = new Vue({
  el: '#app'
});

/***/ }),

/***/ "./resources/js/bootstrap.js":
/*!***********************************!*\
  !*** ./resources/js/bootstrap.js ***!
  \***********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var laravel_echo__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! laravel-echo */ "./node_modules/laravel-echo/dist/echo.js");
// window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */
// try {
//     window.Popper = require('popper.js').default;
//     window.$ = window.jQuery = require('jquery');
//     require('bootstrap');
// } catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
window.axios = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */


window.Pusher = __webpack_require__(/*! pusher-js */ "./node_modules/pusher-js/dist/web/pusher.js");
window.Echo = new laravel_echo__WEBPACK_IMPORTED_MODULE_0__["default"]({
  broadcaster: 'pusher',
  key: "j1KfhDWAamyjYCX",
  wsHost: window.location.hostname,
  wsPort: 6001,
  disableStats: true
});

/***/ }),

/***/ "./resources/js/components/Cards.vue":
/*!*******************************************!*\
  !*** ./resources/js/components/Cards.vue ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Cards_vue_vue_type_template_id_767212f0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Cards.vue?vue&type=template&id=767212f0& */ "./resources/js/components/Cards.vue?vue&type=template&id=767212f0&");
/* harmony import */ var _Cards_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Cards.vue?vue&type=script&lang=js& */ "./resources/js/components/Cards.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Cards_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Cards_vue_vue_type_template_id_767212f0___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Cards_vue_vue_type_template_id_767212f0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Cards.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Cards.vue?vue&type=script&lang=js&":
/*!********************************************************************!*\
  !*** ./resources/js/components/Cards.vue?vue&type=script&lang=js& ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Cards_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Cards.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Cards.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Cards_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Cards.vue?vue&type=template&id=767212f0&":
/*!**************************************************************************!*\
  !*** ./resources/js/components/Cards.vue?vue&type=template&id=767212f0& ***!
  \**************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Cards_vue_vue_type_template_id_767212f0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Cards.vue?vue&type=template&id=767212f0& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Cards.vue?vue&type=template&id=767212f0&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Cards_vue_vue_type_template_id_767212f0___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Cards_vue_vue_type_template_id_767212f0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/Join.vue":
/*!******************************************!*\
  !*** ./resources/js/components/Join.vue ***!
  \******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Join_vue_vue_type_template_id_5012af15___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Join.vue?vue&type=template&id=5012af15& */ "./resources/js/components/Join.vue?vue&type=template&id=5012af15&");
/* harmony import */ var _Join_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Join.vue?vue&type=script&lang=js& */ "./resources/js/components/Join.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Join_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Join_vue_vue_type_template_id_5012af15___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Join_vue_vue_type_template_id_5012af15___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Join.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Join.vue?vue&type=script&lang=js&":
/*!*******************************************************************!*\
  !*** ./resources/js/components/Join.vue?vue&type=script&lang=js& ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Join_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Join.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Join.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Join_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Join.vue?vue&type=template&id=5012af15&":
/*!*************************************************************************!*\
  !*** ./resources/js/components/Join.vue?vue&type=template&id=5012af15& ***!
  \*************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Join_vue_vue_type_template_id_5012af15___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Join.vue?vue&type=template&id=5012af15& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Join.vue?vue&type=template&id=5012af15&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Join_vue_vue_type_template_id_5012af15___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Join_vue_vue_type_template_id_5012af15___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/Observers.vue":
/*!***********************************************!*\
  !*** ./resources/js/components/Observers.vue ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Observers_vue_vue_type_template_id_5e603c02___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Observers.vue?vue&type=template&id=5e603c02& */ "./resources/js/components/Observers.vue?vue&type=template&id=5e603c02&");
/* harmony import */ var _Observers_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Observers.vue?vue&type=script&lang=js& */ "./resources/js/components/Observers.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Observers_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Observers_vue_vue_type_template_id_5e603c02___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Observers_vue_vue_type_template_id_5e603c02___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Observers.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Observers.vue?vue&type=script&lang=js&":
/*!************************************************************************!*\
  !*** ./resources/js/components/Observers.vue?vue&type=script&lang=js& ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Observers_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Observers.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Observers.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Observers_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Observers.vue?vue&type=template&id=5e603c02&":
/*!******************************************************************************!*\
  !*** ./resources/js/components/Observers.vue?vue&type=template&id=5e603c02& ***!
  \******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Observers_vue_vue_type_template_id_5e603c02___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Observers.vue?vue&type=template&id=5e603c02& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Observers.vue?vue&type=template&id=5e603c02&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Observers_vue_vue_type_template_id_5e603c02___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Observers_vue_vue_type_template_id_5e603c02___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/Players.vue":
/*!*********************************************!*\
  !*** ./resources/js/components/Players.vue ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Players_vue_vue_type_template_id_0c847bd2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Players.vue?vue&type=template&id=0c847bd2& */ "./resources/js/components/Players.vue?vue&type=template&id=0c847bd2&");
/* harmony import */ var _Players_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Players.vue?vue&type=script&lang=js& */ "./resources/js/components/Players.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Players_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Players_vue_vue_type_template_id_0c847bd2___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Players_vue_vue_type_template_id_0c847bd2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Players.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Players.vue?vue&type=script&lang=js&":
/*!**********************************************************************!*\
  !*** ./resources/js/components/Players.vue?vue&type=script&lang=js& ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Players_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Players.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Players.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Players_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Players.vue?vue&type=template&id=0c847bd2&":
/*!****************************************************************************!*\
  !*** ./resources/js/components/Players.vue?vue&type=template&id=0c847bd2& ***!
  \****************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Players_vue_vue_type_template_id_0c847bd2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Players.vue?vue&type=template&id=0c847bd2& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Players.vue?vue&type=template&id=0c847bd2&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Players_vue_vue_type_template_id_0c847bd2___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Players_vue_vue_type_template_id_0c847bd2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/Room.vue":
/*!******************************************!*\
  !*** ./resources/js/components/Room.vue ***!
  \******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Room_vue_vue_type_template_id_cd69db74___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Room.vue?vue&type=template&id=cd69db74& */ "./resources/js/components/Room.vue?vue&type=template&id=cd69db74&");
/* harmony import */ var _Room_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Room.vue?vue&type=script&lang=js& */ "./resources/js/components/Room.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Room_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Room_vue_vue_type_template_id_cd69db74___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Room_vue_vue_type_template_id_cd69db74___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Room.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Room.vue?vue&type=script&lang=js&":
/*!*******************************************************************!*\
  !*** ./resources/js/components/Room.vue?vue&type=script&lang=js& ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Room_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Room.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Room.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Room_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Room.vue?vue&type=template&id=cd69db74&":
/*!*************************************************************************!*\
  !*** ./resources/js/components/Room.vue?vue&type=template&id=cd69db74& ***!
  \*************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Room_vue_vue_type_template_id_cd69db74___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Room.vue?vue&type=template&id=cd69db74& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Room.vue?vue&type=template&id=cd69db74&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Room_vue_vue_type_template_id_cd69db74___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Room_vue_vue_type_template_id_cd69db74___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/support/api.js":
/*!*************************************!*\
  !*** ./resources/js/support/api.js ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _default; });
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_1__);


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }



var _default = /*#__PURE__*/function () {
  function _default(routes) {
    _classCallCheck(this, _default);

    this.routes = JSON.parse(routes);
  }
  /**
   * Join a player to a room
   */


  _createClass(_default, [{
    key: "join",
    value: function () {
      var _join = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee(name, type, roomId, userid) {
        var data, response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                data = {
                  name: name,
                  type: type,
                  roomid: roomId,
                  userid: userid
                };
                _context.prev = 1;
                _context.next = 4;
                return axios__WEBPACK_IMPORTED_MODULE_1___default.a.put(this.routes.join, data);

              case 4:
                response = _context.sent;
                return _context.abrupt("return", response.data);

              case 8:
                _context.prev = 8;
                _context.t0 = _context["catch"](1);
                console.log(_context.t0.message);
                return _context.abrupt("return", _context.t0);

              case 12:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this, [[1, 8]]);
      }));

      function join(_x, _x2, _x3, _x4) {
        return _join.apply(this, arguments);
      }

      return join;
    }()
    /**
     * Record a players vote
     */

  }, {
    key: "vote",
    value: function () {
      var _vote2 = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2(roomid, userid, _vote) {
        var params, response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                params = {
                  roomid: roomid,
                  userid: userid,
                  vote: _vote
                };
                _context2.prev = 1;
                _context2.next = 4;
                return axios__WEBPACK_IMPORTED_MODULE_1___default.a.put(this.routes.vote, params);

              case 4:
                response = _context2.sent;
                return _context2.abrupt("return", response.data);

              case 8:
                _context2.prev = 8;
                _context2.t0 = _context2["catch"](1);
                return _context2.abrupt("return", _context2.t0);

              case 11:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2, this, [[1, 8]]);
      }));

      function vote(_x5, _x6, _x7) {
        return _vote2.apply(this, arguments);
      }

      return vote;
    }()
    /**
    * Record a players vote
    */

  }, {
    key: "show",
    value: function () {
      var _show = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3(roomid) {
        var params, response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
          while (1) {
            switch (_context3.prev = _context3.next) {
              case 0:
                params = {
                  roomid: roomid
                };
                _context3.prev = 1;
                _context3.next = 4;
                return axios__WEBPACK_IMPORTED_MODULE_1___default.a.put(this.routes.show, params);

              case 4:
                response = _context3.sent;
                return _context3.abrupt("return", response.data);

              case 8:
                _context3.prev = 8;
                _context3.t0 = _context3["catch"](1);
                return _context3.abrupt("return", _context3.t0);

              case 11:
              case "end":
                return _context3.stop();
            }
          }
        }, _callee3, this, [[1, 8]]);
      }));

      function show(_x8) {
        return _show.apply(this, arguments);
      }

      return show;
    }()
    /**
     * Record a players vote
     */

  }, {
    key: "clear",
    value: function () {
      var _clear = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee4(roomid) {
        var params, response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee4$(_context4) {
          while (1) {
            switch (_context4.prev = _context4.next) {
              case 0:
                params = {
                  roomid: roomid
                };
                _context4.prev = 1;
                _context4.next = 4;
                return axios__WEBPACK_IMPORTED_MODULE_1___default.a.put(this.routes.clear, params);

              case 4:
                response = _context4.sent;
                return _context4.abrupt("return", response.data);

              case 8:
                _context4.prev = 8;
                _context4.t0 = _context4["catch"](1);
                return _context4.abrupt("return", _context4.t0);

              case 11:
              case "end":
                return _context4.stop();
            }
          }
        }, _callee4, this, [[1, 8]]);
      }));

      function clear(_x9) {
        return _clear.apply(this, arguments);
      }

      return clear;
    }()
  }]);

  return _default;
}();



/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/wes/Documents/Projects/AgilePointer/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /Users/wes/Documents/Projects/AgilePointer/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

},[[0,"/js/manifest","/js/vendor"]]]);