(window.webpackJsonp_tester_buid=window.webpackJsonp_tester_buid||[]).push([[1],{5:function(e,t,r){}}]),function(e){function t(t){for(var n,u,c=t[0],p=t[1],s=t[2],a=0,d=[];a<c.length;a++)u=c[a],Object.prototype.hasOwnProperty.call(o,u)&&o[u]&&d.push(o[u][0]),o[u]=0;for(n in p)Object.prototype.hasOwnProperty.call(p,n)&&(e[n]=p[n]);for(l&&l(t);d.length;)d.shift()();return i.push.apply(i,s||[]),r()}function r(){for(var e,t=0;t<i.length;t++){for(var r=i[t],n=!0,c=1;c<r.length;c++){var p=r[c];0!==o[p]&&(n=!1)}n&&(i.splice(t--,1),e=u(u.s=r[0]))}return e}var n={},o={0:0},i=[];function u(t){if(n[t])return n[t].exports;var r=n[t]={i:t,l:!1,exports:{}};return e[t].call(r.exports,r,r.exports,u),r.l=!0,r.exports}u.m=e,u.c=n,u.d=function(e,t,r){u.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},u.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},u.t=function(e,t){if(1&t&&(e=u(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(u.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var n in e)u.d(r,n,function(t){return e[t]}.bind(null,n));return r},u.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return u.d(t,"a",t),t},u.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},u.p="";var c=window.webpackJsonp_tester_buid=window.webpackJsonp_tester_buid||[],p=c.push.bind(c);c.push=t,c=c.slice();for(var s=0;s<c.length;s++)t(c[s]);var l=p;i.push([7,1]),r()}([function(e,t){e.exports=window.wp.i18n},function(e,t){e.exports=window.wp.element},function(e,t){e.exports=window.wp.blocks},function(e,t){e.exports=window.wp.blockEditor},function(e,t){e.exports=window.wp.serverSideRender},,function(e,t,r){},function(e,t,r){"use strict";r.r(t);var n=r(2),o=r(0),i=(r(5),r(1)),u=r(3),c=r(4),p=r.n(c);r(6),Object(n.registerBlockType)("create-block/tester-buid",{apiVersion:2,title:Object(o.__)("Tester Buid","tester-buid"),description:Object(o.__)("Example block written with ESNext standard and JSX support – build step required.","tester-buid"),category:"media",icon:"smiley",supports:{html:!1,align:["wide","full"]},attributes:{align:{type:"string",default:""}},edit:function(e){var t=Object(u.useBlockProps)();return Object(i.createElement)("div",t,Object(i.createElement)(p.a,{block:"create-block/tester-buid",attributes:e.attributes}))}})}]);