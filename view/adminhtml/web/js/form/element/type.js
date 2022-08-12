/**
 * @package Vegam_Homepage
 */
define([
    'jquery',
    'underscore',
    'uiRegistry',
    'Magento_Ui/js/form/element/select'
], function ($, _, uiRegistry, select) {
    'use strict';
    return select.extend({
 
        initialize: function (){
            var status = this._super().initialValue;
            this.fieldDepend(status);
            return this;
        },
 
 
        /**
         * On value change handler.
         *
         * @param {String} value
         */
        onUpdate: function (value) {
 
            this.fieldDepend(value);
            return this._super();
        },
 
        /**
         * Update field dependency
         *
         * @param {String} value
         */
        fieldDepend: function (value) {
            setTimeout(function () {
                var categoryID = uiRegistry.get('index = category_id');
                var productCount = uiRegistry.get('index = product_count');
                const productid = $('#rh_grid_products');
                if (value == 2) {
                    categoryID.show();
                    productCount.show();
                    productid.hide();
                } else if (value == 5) {
                    categoryID.hide();
                    productCount.hide();
                    productid.show();
                }
                else {
                    categoryID.hide();
                    productCount.hide();
                    productid.hide();
                }
            }, 500);
            return this;
        }
    });
});
