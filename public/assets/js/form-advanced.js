! function(t) {
    "use strict";
    var e = function() {};
    e.prototype.init = function() {
        t(".colorpicker-default").colorpicker({
            format: "hex"
        }), t(".colorpicker-rgba").colorpicker(), t("#colorpicker-horizontal").colorpicker({
            color: "#88cc33",
            horizontal: !0
        }), t("#colorpicker-color-pattern").colorpicker({
            colorSelectors: {
                black: "#000000",
                white: "#ffffff",
                red: "#FF0000",
                default: "#777777",
                primary: "#337ab7",
                success: "#5cb85c",
                info: "#5bc0de",
                warning: "#f0ad4e",
                danger: "#d9534f"
            }
        }), t(".colorpicker-large").colorpicker({
            customClass: "colorpicker-2x",
            sliders: {
                saturation: {
                    maxLeft: 200,
                    maxTop: 200
                },
                hue: {
                    maxTop: 200
                },
                alpha: {
                    maxTop: 200
                }
            }
        }), jQuery("#datepicker").datepicker(), jQuery("#datepicker-inline").datepicker(), jQuery("#datepicker-multiple").datepicker({
            numberOfMonths: 3,
            showButtonPanel: !0
        }), jQuery("#datepicker").datepicker(), jQuery("#datepicker-autoclose").datepicker({
            autoclose: !0,
            todayHighlight: !0
        }), jQuery("#datepicker-multiple-date").datepicker({
            format: "mm/dd/yyyy",
            clearBtn: !0,
            multidate: !0,
            multidateSeparator: ","
        }), jQuery("#date-range").datepicker({
            toggleActive: !0
        }), t("input#defaultconfig").maxlength({
            warningClass: "badge badge-info",
            limitReachedClass: "badge badge-warning"
        }), t("input#thresholdconfig").maxlength({
            threshold: 20,
            warningClass: "badge badge-info",
            limitReachedClass: "badge badge-warning"
        }), t("input#moreoptions").maxlength({
            alwaysShow: !0,
            warningClass: "badge badge-success",
            limitReachedClass: "badge badge-danger"
        }), t("input#alloptions").maxlength({
            alwaysShow: !0,
            warningClass: "badge badge-success",
            limitReachedClass: "badge badge-danger",
            separator: " out of ",
            preText: "You typed ",
            postText: " chars available.",
            validate: !0
        }), t("textarea#textarea").maxlength({
            alwaysShow: !0,
            warningClass: "badge badge-info",
            limitReachedClass: "badge badge-warning"
        }), t("input#placement").maxlength({
            alwaysShow: !0,
            placement: "top-left",
            warningClass: "badge badge-info",
            limitReachedClass: "badge badge-warning"
        }), t(".vertical-spin").TouchSpin({
            verticalbuttons: !0,
            verticalupclass: "ion-plus-round",
            verticaldownclass: "ion-minus-round",
            buttondown_class: "btn btn-primary",
            buttonup_class: "btn btn-primary"
        }), t("input[name='demo1']").TouchSpin({
            min: 0,
            max: 100,
            step: .1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: "%",
            buttondown_class: "btn btn-primary",
            buttonup_class: "btn btn-primary"
        }), t("input[name='demo2']").TouchSpin({
            min: -1e9,
            max: 1e9,
            stepinterval: 50,
            maxboostedstep: 1e7,
            prefix: "$",
            buttondown_class: "btn btn-primary",
            buttonup_class: "btn btn-primary"
        }), t("input[name='demo3']").TouchSpin({
            buttondown_class: "btn btn-primary",
            buttonup_class: "btn btn-primary"
        }), t("input[name='demo3_21']").TouchSpin({
            initval: 40,
            buttondown_class: "btn btn-primary",
            buttonup_class: "btn btn-primary"
        }), t("input[name='demo3_22']").TouchSpin({
            initval: 40,
            buttondown_class: "btn btn-primary",
            buttonup_class: "btn btn-primary"
        }), t("input[name='demo5']").TouchSpin({
            prefix: "pre",
            postfix: "post",
            buttondown_class: "btn btn-primary",
            buttonup_class: "btn btn-primary"
        }), t("input[name='demo0']").TouchSpin({
            buttondown_class: "btn btn-primary",
            buttonup_class: "btn btn-primary"
        }), t(".select2").select2(), t(".select2-limiting").select2({
            maximumSelectionLength: 2
        })
    }, t.AdvancedForm = new e, t.AdvancedForm.Constructor = e
}(window.jQuery),
function(t) {
    "use strict";
    window.jQuery.AdvancedForm.init()
}();