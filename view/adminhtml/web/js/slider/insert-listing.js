/**
 * @package Vegam_Homepage
 */

define([
    'Magento_Ui/js/form/components/insert-listing',
    'underscore'
], function (Insert, _) {
    'use strict';

    return Insert.extend({

        /**
         * On action call
         *
         * @param {Object} data - image and actions
         */
        onAction: function (data) {
            this[data.action + 'Action'].call(this, data.data);
        },

        /**
         * On mass action call
         *
         * @param {Object} data - image
         */
        onMassAction: function (data) {
            this[data.action + 'Massaction'].call(this, data.data);
        },
        
        /**
         * Delete image
         *
         * @param {Object} data - image
         */
        deleteAction: function (data) {
            this._delete([parseFloat(data[data['id_field_name']])]);
        },

        /**
         * Mass action delete
         *
         * @param {Object} data - image
         */
        deleteMassaction: function (data) {
            var ids = data.selected || this.selections().selected();

            ids = _.map(ids, function (val) {
                return parseFloat(val);
            });

            this._delete(ids);
        },

        /**
         * Delete image and selections by provided ids.
         *
         * @param {Array} ids
         */
        _delete: function (ids) {
            _.each(ids, function (id) {
                this.selections().deselect(id.toString(), false);
            }, this);
        }
    });
});
