(()=>{function e(e,r){if(e){if("string"==typeof e)return t(e,r);var n=Object.prototype.toString.call(e).slice(8,-1);return"Object"===n&&e.constructor&&(n=e.constructor.name),"Map"===n||"Set"===n?Array.from(e):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?t(e,r):void 0}}function t(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}!function(){"use strict";var t=function(){return function(t){var r,n,o,a=function(t,r){var n="undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"];if(!n){if(Array.isArray(t)||(n=e(t))){n&&(t=n);var o=0,a=function(){};return{s:a,n:function(){return o>=t.length?{done:!0}:{done:!1,value:t[o++]}},e:function(e){throw e},f:a}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var c,i=!0,l=!1;return{s:function(){n=n.call(t)},n:function(){var e=n.next();return i=e.done,e},e:function(e){l=!0,c=e},f:function(){try{i||null==n.return||n.return()}finally{if(l)throw c}}}}(document.cookie.split("; "));try{for(a.s();!(r=a.n()).done;){var c=(n=r.value.split("="),o=2,function(e){if(Array.isArray(e))return e}(n)||function(e,t){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var n,o,a,c,i=[],l=!0,u=!1;try{if(a=(r=r.call(e)).next,0===t){if(Object(r)!==r)return;l=!1}else for(;!(l=(n=a.call(r)).done)&&(i.push(n.value),i.length!==t);l=!0);}catch(e){u=!0,o=e}finally{try{if(!l&&null!=r.return&&(c=r.return(),Object(c)!==c))return}finally{if(u)throw o}}return i}}(n,o)||e(n,o)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()),i=c[0],l=c[1];if(i===t)return l}}catch(e){a.e(e)}finally{a.f()}return null}("theme")||(window.matchMedia("(prefers-color-scheme: dark)").matches?"dark":"light")},r=function(e){var t,r,n;document.documentElement.setAttribute("data-bs-theme",e),t=e,r="",(n=new Date).setTime(n.getTime()+31536e6),r="; expires=".concat(n.toUTCString()),document.cookie="".concat("theme","=").concat(t||"").concat(r,"; path=/")},n=function(e){var t=document.querySelector("#toggleDarkMode");if(t){"dark"===e&&!1===t.checked&&(t.checked=!0);var r=document.querySelector('[data-bs-theme-value="'.concat(e,'"]'));document.querySelectorAll("[data-bs-theme-value]").forEach((function(e){e.classList.remove("active"),e.setAttribute("aria-pressed","false")})),r&&(r.classList.add("active"),r.setAttribute("aria-pressed","true"),t.setAttribute("aria-label","Toggle theme (".concat(r.dataset.bsThemeValue,")")))}},o=document.getElementById("toggleDarkMode");o&&o.addEventListener("click",(function(){console.log("Toggle theme");var e="dark"===document.documentElement.getAttribute("data-bs-theme")?"light":"dark";r(e),n(e)})),window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change",(function(){var e=t();console.log("Theme changed to",e),r(e),n(e)}));var a=t();r(a),n(a)}()})();