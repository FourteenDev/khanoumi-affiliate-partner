/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/edit.js":
/*!*********************!*\
  !*** ./src/edit.js ***!
  \*********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Edit)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./editor.scss */ "./src/editor.scss");

/**
 * Retrieves the translation of text.
 *
 * @see	https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */


/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see	https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */


/**
 * Provides generic WordPress components to be used for creating common UI elements shared between screens and features of the WordPress dashboard.
 *
 * @see	https://wordpress.github.io/gutenberg/?path=/docs/components-introduction--docs
 */


/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see	https://www.npmjs.com/package/@wordpress/scripts#using-css
 */


/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see	https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
function Edit({
  attributes,
  setAttributes
}) {
  const {
    category,
    tag,
    brand,
    limit,
    speed,
    intro
  } = attributes;
  const firstSelectOption = [{
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('All', 'khanoumi-affiliate-partner'),
    value: 0
  }];
  const categoryOptions = firstSelectOption.concat(allCategories.map(function (cat) {
    return {
      label: cat.name,
      value: cat.id
    };
  }));
  const tagOptions = firstSelectOption.concat(allTags.map(function (tag) {
    return {
      label: tag.name,
      value: tag.id
    };
  }));
  const brandOptions = firstSelectOption.concat(allBrands.map(function (brand) {
    return {
      label: brand.name_per,
      value: brand.id
    };
  }));
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Settings', 'khanoumi-affiliate-partner')
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Category', 'khanoumi-affiliate-partner'),
    value: category,
    options: categoryOptions,
    onChange: value => setAttributes({
      category: parseInt(value)
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Tag', 'khanoumi-affiliate-partner'),
    value: tag,
    options: tagOptions,
    onChange: value => setAttributes({
      tag: parseInt(value)
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Brand', 'khanoumi-affiliate-partner'),
    value: brand,
    options: brandOptions,
    onChange: value => setAttributes({
      brand: parseInt(value)
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalNumberControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Limit', 'khanoumi-affiliate-partner'),
    value: limit,
    min: 1,
    max: 50,
    onChange: value => setAttributes({
      limit: parseInt(value)
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalNumberControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Slider speed (milliseconds)', 'khanoumi-affiliate-partner'),
    value: speed,
    min: 500,
    onChange: value => setAttributes({
      speed: parseInt(value)
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.CheckboxControl, {
    __nextHasNoMarginBottom: true,
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Display first slide (introduction)', 'khanoumi-affiliate-partner'),
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Adds an extra slide in the beginning of the product carousel.', 'khanoumi-affiliate-partner'),
    checked: intro,
    onChange: value => setAttributes({
      intro: value
    })
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    ...(0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.useBlockProps)()
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('A Khanoumi slider with these values will be shown here:', 'khanoumi-affiliate-partner')), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Category', 'khanoumi-affiliate-partner'),
    value: category,
    options: categoryOptions,
    onChange: value => setAttributes({
      category: parseInt(value)
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Tag', 'khanoumi-affiliate-partner'),
    value: tag,
    options: tagOptions,
    onChange: value => setAttributes({
      tag: parseInt(value)
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Brand', 'khanoumi-affiliate-partner'),
    value: brand,
    options: brandOptions,
    onChange: value => setAttributes({
      brand: parseInt(value)
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalNumberControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Limit', 'khanoumi-affiliate-partner'),
    value: limit,
    min: 1,
    max: 50,
    onChange: value => setAttributes({
      limit: parseInt(value)
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalNumberControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Slider speed (milliseconds)', 'khanoumi-affiliate-partner'),
    value: speed,
    min: 500,
    onChange: value => setAttributes({
      speed: parseInt(value)
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.CheckboxControl, {
    __nextHasNoMarginBottom: true,
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Display first slide (introduction)', 'khanoumi-affiliate-partner'),
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Adds an extra slide in the beginning of the product carousel.', 'khanoumi-affiliate-partner'),
    checked: intro,
    onChange: value => setAttributes({
      intro: value
    })
  })));
}

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./style.scss */ "./src/style.scss");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./edit */ "./src/edit.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./block.json */ "./src/block.json");

/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see	https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */


/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see	https://www.npmjs.com/package/@wordpress/scripts#using-css
 */


/**
 * Internal dependencies
 */



/**
 * Every block starts by registering a new block type definition.
 *
 * @see	https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.registerBlockType)(_block_json__WEBPACK_IMPORTED_MODULE_4__.name, {
  icon: {
    src: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      width: "121",
      height: "48",
      viewBox: "0 0 121 48",
      fill: "none",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M57.9447 28.1145C52.9255 29.7858 50.4158 27.0699 52.7163 24.1451C53.762 22.8916 57.1082 20.3846 58.5721 23.1005C58.5721 23.1005 58.7813 23.3094 58.7813 23.7273C58.7813 23.9362 58.9904 23.9362 58.9904 24.1451C58.9904 24.1451 58.9904 24.1451 58.9904 24.354C59.4087 25.1897 59.4087 26.6521 57.9447 28.1145ZM65.4736 12.4458C65.0553 9.1032 64.0096 9.52103 62.5457 11.8191C61.2909 13.6993 60.8726 14.9528 61.0817 15.9974C61.2909 17.6687 61.5 18.7133 61.5 18.7133C57.5264 12.6548 48.9519 17.6687 46.024 26.6521C43.5144 34.7998 52.2981 34.382 52.2981 34.382C52.2981 34.382 47.0697 39.6049 35.7764 39.3959C29.084 39.3959 26.5744 36.68 25.7379 35.4265C24.483 33.1285 23.6465 34.5909 23.8556 36.4711C23.8556 37.0979 24.0648 37.7246 23.8556 38.7692C23.6465 41.2762 25.3196 43.1564 27.2018 44.201C32.8485 46.9169 42.2596 46.9169 51.6706 41.694C58.363 37.9335 63.5914 31.875 65.0553 22.8916C65.6827 20.5935 66.101 16.4152 65.4736 12.4458Z",
      fill: "#DB2777"
    }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M99.7718 28.5322C84.2958 36.6799 76.3487 29.9946 76.3487 29.9946C82.2045 19.9667 97.2622 12.2368 105.837 14.3259C109.81 15.3705 113.157 21.4291 99.7718 28.5322ZM112.738 15.3705C112.32 9.72981 107.719 7.43174 103.745 7.22282C84.0867 7.01391 73.2117 26.0252 73.2117 26.0252C69.0289 21.4291 70.702 11.819 71.5386 9.31198C72.3751 7.01391 70.702 5.96933 69.6563 8.68523C64.2188 22.8915 69.8655 33.1283 69.8655 33.1283C69.8655 33.1283 67.7741 37.7245 67.565 42.5295C67.565 44.8276 68.8198 45.8722 70.702 45.8722C73.4208 45.8722 74.0482 42.7384 73.0025 41.0671C72.166 39.6047 73.4208 36.6799 73.4208 36.6799C73.4208 36.6799 82.2045 43.783 98.517 35.8442C108.974 30.6214 113.157 21.0112 112.738 15.3705Z",
      fill: "#DB2777"
    }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M53.3435 8.89421C54.3892 9.52095 55.2257 9.93879 55.644 9.93879C56.6897 10.1477 57.5262 9.72987 58.1536 9.10312C59.4084 7.84963 59.1993 5.34265 57.1079 5.13373C56.4805 5.13373 55.8531 5.13373 55.4348 5.76048C57.1079 4.92481 58.5719 6.59614 57.7353 8.05855C57.3171 8.68529 56.6897 9.10312 55.8531 8.89421C54.3892 8.68529 53.5526 7.22289 53.9709 5.96939C54.3892 4.50698 56.0622 3.88024 57.3171 4.08915C60.0358 4.50699 60.0358 7.4318 59.8267 8.05855C59.6176 9.10312 58.9901 9.93879 58.1536 10.3566C54.8074 11.819 53.3435 8.89421 53.3435 8.89421ZM55.2257 12.2369C58.1536 12.6547 61.0815 10.5655 61.2906 7.84963C61.7089 5.34265 60.0358 4.08915 59.4084 3.67132C58.9901 3.46241 58.3627 3.25349 57.7353 3.04458C55.644 2.83566 53.5526 4.08915 53.1344 5.96939C53.1344 6.59614 53.1344 7.01397 53.3435 7.64072C51.8795 5.13373 54.18 2.41783 56.0622 2C53.5526 2.20892 51.2521 3.88024 50.8339 6.38723V6.59614C50.8339 6.59614 50.8339 6.59614 50.8339 6.80505C50.8339 7.22288 50.8339 7.84963 51.043 8.47638C51.4613 10.5655 53.1344 12.0279 55.2257 12.2369Z",
      fill: "#DB2777"
    }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M84.923 6.80502C84.923 9.31201 82.6225 11.4012 80.1128 11.1922C77.3941 11.1922 75.3027 9.10309 75.5119 6.59611C75.5119 4.08912 77.6032 1.99997 80.322 2.20888C83.0407 2.20888 85.1321 4.29804 84.923 6.80502Z",
      fill: "#DB2777"
    }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M40.5864 8.26746C43.9325 7.01397 45.6056 7.64072 44.3508 9.31204C43.3051 10.5655 38.0768 11.6101 35.7763 10.7744C37.4493 9.52096 39.3316 8.68529 40.5864 8.26746ZM31.5936 13.4903C32.4301 15.9973 37.0311 15.9973 40.5864 16.2062C44.7691 16.2062 48.3244 14.5349 48.3244 11.1923C48.3244 7.84963 46.233 2 41.6321 2C37.2402 2 30.1296 6.17831 25.3195 11.4012C23.2281 13.4903 21.7642 15.7884 20.9277 17.8776C20.5094 18.7132 20.0911 19.9667 20.0911 21.4291C20.0911 23.5183 21.5551 25.3985 26.7834 24.5629C39.5407 22.4737 39.7498 23.7272 39.7498 23.7272C39.7498 23.7272 27.4108 32.2927 16.9541 29.3679C8.17039 27.0698 11.5166 14.9528 18.418 8.05855C20.7185 5.34265 19.2546 4.29807 16.5358 6.59614C13.6079 9.31204 9.21607 13.9082 8.37953 21.638C7.12471 32.9195 14.2353 35.4265 18.8363 36.0532C26.7834 37.0978 34.3123 32.9195 37.0311 31.4571C38.7042 30.6214 44.9782 27.4877 44.56 20.8024C44.3508 17.0419 39.3316 16.833 31.5936 18.2954C26.156 19.1311 25.5286 18.7132 25.5286 18.7132C26.3652 17.0419 28.6657 15.1617 31.5936 13.4903Z",
      fill: "#DB2777"
    }))
  },
  /**
   * @see	./edit.js
   */
  edit: _edit__WEBPACK_IMPORTED_MODULE_3__["default"]
});

/***/ }),

/***/ "./src/editor.scss":
/*!*************************!*\
  !*** ./src/editor.scss ***!
  \*************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/style.scss":
/*!************************!*\
  !*** ./src/style.scss ***!
  \************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

module.exports = window["React"];

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "./src/block.json":
/*!************************!*\
  !*** ./src/block.json ***!
  \************************/
/***/ ((module) => {

module.exports = /*#__PURE__*/JSON.parse('{"$schema":"https://json.schemastore.org/block.json","apiVersion":3,"name":"kapp/khanoumi-products-slider","title":"Khanoumi Products Slider","category":"widgets","keywords":["khanoumi","slider","carousel","slick"],"description":"Displays Khanoumi.com products as a slider.","version":"1.0.0","textdomain":"khanoumi-affiliate-partner","attributes":{"category":{"type":"number","default":0},"tag":{"type":"number","default":0},"brand":{"type":"number","default":0},"limit":{"type":"number","default":10,"minimum":1,"maximum":50},"speed":{"type":"number","default":3000,"minimum":500},"intro":{"type":"boolean","default":true}},"editorScript":"file:./index.js","editorStyle":"file:./index.css","style":"file:./style-index.css","render":"file:./render.php","viewScript":"file:./view.js"}');

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var chunkIds = deferred[i][0];
/******/ 				var fn = deferred[i][1];
/******/ 				var priority = deferred[i][2];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"index": 0,
/******/ 			"./style-index": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var chunkIds = data[0];
/******/ 			var moreModules = data[1];
/******/ 			var runtime = data[2];
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkkhanoumi_products_slider"] = self["webpackChunkkhanoumi_products_slider"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["./style-index"], () => (__webpack_require__("./src/index.js")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=index.js.map