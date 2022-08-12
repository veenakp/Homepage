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
        initialize: function () {
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
            var sliderWidth = uiRegistry.get('index = slider_width');
            if (value) {
                if (value == 'singleslider') {
                    $(".block-banner-image").hide();
                    sliderWidth.hide();
                } else {
                    $(".block-banner-image").show();
                    sliderWidth.show();
                }
                $(".slider_preview").show();
                $(".slider_preview").html('<img src="' + require.toUrl('Vegam_Homepage/images/' + value + '.jpg') + '" width="700" height="300" style="margin-left:300px">');
            } else {
                $(".slider_preview").hide();
                sliderWidth.hide();
            }
            return this;
        }
    });
});
