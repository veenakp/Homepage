/**
 * @package Vegam_Homepage
 */

define([
    'Magento_Ui/js/form/components/button',
    'underscore'
], function (Button, _) {
    'use strict';

    return Button.extend({
        defaults: {
            imageId: null,
            parentId: null,           
        },

        /**
         * Apply action on target component,
         * but previously create this component from template if it is not existed
         *
         * @param {Object} action - action configuration
         */
        applyAction: function (action) {
            if (action.params && action.params[0]) {
                action.params[0]['image_id'] = this.imageId;
                action.params[0]['parent_id'] = this.parentId;
            } else {
                action.params = [{
                    'image_id': this.imageId,
                    'parent_id': this.parentId
                }];
            }

            this._super();
        },
    });
});
