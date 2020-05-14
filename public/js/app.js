(window.webpackJsonp=window.webpackJsonp||[]).push([[0],{0:function(t,e,r){r("bUC5"),t.exports=r("pyCd")},"9Wh1":function(t,e,r){"use strict";r.r(e);var n=r("Vjiq");window.axios=r("vDqi"),window.axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest",window.Pusher=r("eC5B"),window.Echo=new n.a({broadcaster:"pusher",key:"j1KfhDWAamyjYCX",wsHost:window.location.hostname,wsPort:6001,disableStats:!0})},bUC5:function(t,e,r){r("9Wh1"),window.Vue=r("XuX8"),Vue.component("room",r("ojwi").default);new Vue({el:"#app"})},ojwi:function(t,e,r){"use strict";r.r(e);var n=r("o0o1"),s=r.n(n),o=r("vDqi"),a=r.n(o);function i(t,e,r,n,s,o,a){try{var i=t[o](a),u=i.value}catch(t){return void r(t)}i.done?e(u):Promise.resolve(u).then(n,s)}function u(t){return function(){var e=this,r=arguments;return new Promise((function(n,s){var o=t.apply(e,r);function a(t){i(o,n,s,a,u,"next",t)}function u(t){i(o,n,s,a,u,"throw",t)}a(void 0)}))}}function c(t,e){for(var r=0;r<e.length;r++){var n=e[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}var l=function(){function t(e){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.routes=JSON.parse(e)}var e,r,n,o,i,l,d;return e=t,(r=[{key:"join",value:(d=u(s.a.mark((function t(e,r,n,o){var i,u;return s.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return i={name:e,type:r,roomid:n,userid:o},t.prev=1,t.next=4,a.a.put(this.routes.join,i);case 4:return u=t.sent,t.abrupt("return",u.data);case 8:return t.prev=8,t.t0=t.catch(1),console.log(t.t0.message),t.abrupt("return",t.t0);case 12:case"end":return t.stop()}}),t,this,[[1,8]])}))),function(t,e,r,n){return d.apply(this,arguments)})},{key:"vote",value:(l=u(s.a.mark((function t(e,r,n){var o,i;return s.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return o={roomid:e,userid:r,vote:n},t.prev=1,t.next=4,a.a.put(this.routes.vote,o);case 4:return i=t.sent,t.abrupt("return",i.data);case 8:return t.prev=8,t.t0=t.catch(1),t.abrupt("return",t.t0);case 11:case"end":return t.stop()}}),t,this,[[1,8]])}))),function(t,e,r){return l.apply(this,arguments)})},{key:"show",value:(i=u(s.a.mark((function t(e){var r,n;return s.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return r={roomid:e},t.prev=1,t.next=4,a.a.put(this.routes.show,r);case 4:return n=t.sent,t.abrupt("return",n.data);case 8:return t.prev=8,t.t0=t.catch(1),t.abrupt("return",t.t0);case 11:case"end":return t.stop()}}),t,this,[[1,8]])}))),function(t){return i.apply(this,arguments)})},{key:"clear",value:(o=u(s.a.mark((function t(e){var r,n;return s.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return r={roomid:e},t.prev=1,t.next=4,a.a.put(this.routes.clear,r);case 4:return n=t.sent,t.abrupt("return",n.data);case 8:return t.prev=8,t.t0=t.catch(1),t.abrupt("return",t.t0);case 11:case"end":return t.stop()}}),t,this,[[1,8]])}))),function(t){return o.apply(this,arguments)})}])&&c(e.prototype,r),n&&c(e,n),t}(),d={name:"Join",props:{api:{type:Object},roomid:{type:String}},data:function(){return{username:"",msg:"",userid:null}},mounted:function(){localStorage.getItem("agile_pointer_userid")&&(this.userid=localStorage.getItem("agile_pointer_userid"))},methods:{join:function(t){var e=this;this.api.join(this.username,t,this.roomid,this.userid).then((function(t){e.saveUserId(t.user.id),e.$emit("joined",t.user)})).catch((function(t){console.log(t)}))},saveUserId:function(t){void 0!==t&&localStorage.setItem("agile_pointer_userid",t)}}},p=r("KHd+"),v=Object(p.a)(d,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"w-full max-w-xs m-auto"},[r("div",{staticClass:"my-10 text-3xl text-center"},[t._v("Register for room")]),t._v(" "),r("label",{attrs:{for:"room_name"}},[t._v("Enter your name")]),t._v(" "),r("input",{directives:[{name:"model",rawName:"v-model",value:t.username,expression:"username"}],staticClass:"block w-full px-4 py-2 leading-normal bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:shadow-outline",attrs:{type:"text",required:"",name:"name"},domProps:{value:t.username},on:{input:function(e){e.target.composing||(t.username=e.target.value)}}}),t._v(" "),t.msg?r("span",[t._v(t._s(t.msg))]):t._e(),t._v(" "),r("div",{staticClass:"my-6 text-center"},[r("p",{staticClass:"my-4 text-center"},[t._v("Enter room as:")]),t._v(" "),r("button",{staticClass:"px-4 py-2 font-bold text-white bg-green-600 rounded hover:bg-green-400",attrs:{type:"submit"},on:{click:function(e){return t.join(1)}}},[t._v("\n      Player\n      "),r("svg",{staticClass:"inline",attrs:{fill:"currentColor",viewBox:"0 0 20 20",width:"22",height:"22"}},[r("path",{attrs:{d:"M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z","clip-rule":"evenodd","fill-rule":"evenodd"}})])]),t._v(" "),r("span",{staticClass:"inline-block w-12"}),t._v(" "),r("button",{staticClass:"px-4 py-2 font-bold text-white bg-green-600 rounded hover:bg-green-400",attrs:{type:"submit"},on:{click:function(e){return t.join(0)}}},[t._v("\n      Observer\n      "),r("svg",{staticClass:"inline",attrs:{fill:"currentColor",viewBox:"0 0 20 20",width:"22"}},[r("path",{attrs:{d:"M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"}})])])])])}),[],!1,null,null,null).exports,h={name:"Players",props:{users:{type:Array},api:{type:Object},roomid:{type:String},channel:{type:Object}},data:function(){return{players:[],vote:{},showVote:!1,clearVote:!1}},watch:{users:function(t){this.players=t.filter((function(t){if(1===Number(t.type))return t}))},vote:function(t){var e=this.players.map((function(e){return e.userid===t.userid&&!1===e.voted&&(e.vote=t.vote,e.voted=!0),e}));this.players=e,0===this.players.filter((function(t){return!1===t.voted})).length&&(this.showVotes(),this.showVote=!0)},clearVote:function(){var t=this.players.map((function(t){return t.vote=null,t.voted=!1,t}));this.resetBoard(t)}},mounted:function(){var t=this;this.channel.listen("UserVoted",(function(e){t.vote=e.vote})).listen("ShowVotesEvent",(function(e){t.showVote=!t.showVote})).listen("ClearVotesEvent",(function(e){t.clearVote=!t.clearVote}))},computed:{averageVotes:function(){return this.players.map((function(t){var e=t.vote;return!0===isNaN(t.vote)&&(e=0),e.toLocaleString(void 0,{minimumFractionDigits:1})})).reduce((function(t,e){return Number(t)+Number(e)}))/this.players.length}},methods:{showVotes:function(){this.api.show(this.roomid)},clearVotes:function(){this.api.clear(this.roomid)},resetBoard:function(t){this.players=t,this.showVote=!1}}},f=Object(p.a)(h,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",[r("div",{staticClass:"grid grid-cols-2 gap-2"},[r("div",{staticClass:"py-2 pr-3"},[r("button",{staticClass:"float-right px-1 py-1 font-semibold text-green-700 bg-transparent border border-green-500 rounded w-22 hover:bg-green-500 hover:text-white hover:border-transparent",attrs:{type:"button"},on:{click:t.clearVotes}},[t._v("Clear Votes")])]),t._v(" "),r("div",{staticClass:"py-2 pl-3"},[r("button",{staticClass:"px-1 py-1 font-semibold text-green-700 bg-transparent border border-green-500 rounded w-22 hover:bg-green-500 hover:text-white hover:border-transparent",attrs:{type:"button"},on:{click:t.showVotes}},[t._v("Show Votes")])])]),t._v(" "),r("div",{staticClass:"grid grid-cols-1"},[r("table",{staticClass:"w-full p-6 border table-fixed border-grey-300"},[t._m(0),t._v(" "),r("tbody",t._l(this.players,(function(e){return r("tr",{key:e.userid},[r("td",{staticClass:"px-4 py-2 border-b border-grey-light"},[t._v(t._s(e.name))]),t._v(" "),r("td",{staticClass:"px-4 py-2 text-center border-b border-grey-light"},[!1===e.voted?r("span",[t._v("---")]):t._e(),t._v(" "),!0===e.voted&&!1===t.showVote?r("span",{staticClass:"inline-block mt-1 text-center border-b border-grey-light"},[r("svg",{staticClass:"inline",attrs:{fill:"currentColor",viewBox:"0 0 20 20",width:"20",color:"green"}},[r("path",{attrs:{d:"M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z","clip-rule":"evenodd","fill-rule":"evenodd"}})])]):t._e(),t._v(" "),t.showVote?r("span",[t._v(t._s(e.vote))]):t._e()])])})),0),t._v(" "),r("tfoot",[r("tr",{staticClass:"text-right"},[r("td",{staticClass:"py-2 pr-12",attrs:{colspan:"2"}},[r("b",[t._v("Vote Average:")]),t._v(" "),t.showVote?r("span",[t._v(t._s(t.averageVotes))]):r("span",[t._v("-----")])])])])])])])}),[function(){var t=this.$createElement,e=this._self._c||t;return e("thead",[e("tr",{staticClass:"h-12"},[e("th",{staticClass:"w-1/2 px-4 py-2 font-bold uppercase bg-gray-300 border-b border-grey-300"},[this._v("Player")]),this._v(" "),e("th",{staticClass:"w-1/4 px-4 py-2 font-bold text-center uppercase bg-gray-300 border-b border-grey-300"},[this._v("Vote")])])])}],!1,null,null,null).exports,b={name:"Observers",props:{users:{type:Array}},data:function(){return{observers:[]}},watch:{users:function(t){this.observers=t.filter((function(t){if("0"===t.type)return t}))}}},m=Object(p.a)(b,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return this.observers.length>0?r("div",[r("div",{staticClass:"mt-6 overflow-hidden rounded rounded-lg shadow-lg"},[t._m(0),t._v(" "),r("div",{staticClass:"p-2"},t._l(this.observers,(function(e,n){return r("span",t._b({},"span",n,!1),[r("span",[t._v(t._s(e.name))]),t._v(" "),n+1<t.observers.length?r("span",[t._v(",")]):t._e()])})),0)])]):t._e()}),[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"w-full border-b border-gray-400"},[e("div",{staticClass:"mb-2 text-lg text-center"},[this._v("Observers")])])}],!1,null,null,null).exports,g={name:"Cards",props:{cardset:{type:String},api:{type:Object},user:{type:Object},roomid:{type:String}},data:function(){return{cards:[]}},created:function(){this.cards=JSON.parse(this.cardset)},methods:{vote:function(t){this.api.vote(this.roomid,this.user.id,t).then((function(t){})).catch((function(t){console.log(t)}))}}},y={name:"Room",components:{Join:v,Players:f,Observers:m,Cards:Object(p.a)(g,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"flex justify-center"},t._l(this.cards,(function(e){return r("div",{key:e,staticClass:"inline w-auto pr-4",attrs:{col:""}},[r("button",{staticClass:"w-16 px-1 py-1 font-semibold text-green-700 bg-transparent border border-green-500 rounded hover:bg-green-500 hover:text-white hover:border-transparent",attrs:{type:"button"},on:{click:function(r){return t.vote(e)}}},[t._v(t._s(e))])])})),0)}),[],!1,null,null,null).exports},props:{roomid:{type:String},routes:{type:String},cardset:{type:String}},data:function(){return{hasJoined:!1,api:null,channel:null,users:[],vote:null,cards:[],user:{}}},created:function(){this.api=new l(this.routes)},methods:{handleJoin:function(t){this.user=t,this.joined(),this.hasJoined=!0},joined:function(){var t=this;this.channel=Echo.join("room"+this.roomid).here((function(e){return t.users=e})).joining((function(e){return t.users.push(e)})).leaving((function(e){return t.users=t.users.filter((function(t){return t.userid!==e.userid}))}))}}},w=Object(p.a)(y,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"container"},[r("div",{staticClass:"flex flex-col mx-auto"},[t.hasJoined?r("div",{staticClass:"mb-10"},[1==this.user.type?r("Cards",{attrs:{roomid:this.roomid,user:this.user,cardset:this.cardset,api:this.api}}):t._e()],1):t._e(),t._v(" "),r("div",{staticClass:"grid grid-cols-3 gap-2"},[r("div",{staticClass:"m-auto bg-blue-300 w-300 h-250"},[t._v("ad")]),t._v(" "),t.hasJoined?r("div",[r("Players",{attrs:{api:t.api,roomid:t.roomid,users:t.users,channel:this.channel}}),t._v(" "),r("Observers",{attrs:{users:t.users}})],1):r("div",[r("join",{attrs:{api:t.api,roomid:t.roomid},on:{joined:t.handleJoin}})],1),t._v(" "),r("div",{staticClass:"m-auto bg-blue-300 w-300 h-250"},[t._v("ad")])])])])}),[],!1,null,null,null);e.default=w.exports},pyCd:function(t,e){}},[[0,1,2]]]);