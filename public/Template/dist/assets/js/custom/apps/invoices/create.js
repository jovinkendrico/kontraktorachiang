"use strict";

var KTAppInvoicesCreate = (function () {
    var element,
        updateTotals = function () {
            var items = [].slice.call(
                element.querySelectorAll(
                    '[data-kt-element="items"] [data-kt-element="item"]'
                )
            );
            var total = 0;
            var formatter = wNumb({ decimals: 2, thousand: "," });

            items.forEach(function (item) {
                var quantityInput = item.querySelector('[data-kt-element="quantity"]');
                var priceInput = item.querySelector('[data-kt-element="price"]');
                var totalElement = item.querySelector('[data-kt-element="total"]');

                var price = formatter.from(priceInput.value) || 0;
                var quantity = parseInt(quantityInput.value) || 1;

                price = price < 0 ? 0 : price;

                priceInput.value = formatter.to(price);
                quantityInput.value = quantity;
                totalElement.innerText = formatter.to(price * quantity);
                total += price * quantity;
            });

            element.querySelector('[data-kt-element="sub-total"]').innerText = formatter.to(total);
            element.querySelector('[data-kt-element="grand-total"]').innerText = formatter.to(total);
        },
        checkEmpty = function () {
            var items = element.querySelectorAll('[data-kt-element="items"] [data-kt-element="item"]');
            if (items.length === 0) {
                var emptyTemplate = element.querySelector('[data-kt-element="empty-template"] tr').cloneNode(true);
                element.querySelector('[data-kt-element="items"] tbody').appendChild(emptyTemplate);
            } else {
                KTUtil.remove(element.querySelector('[data-kt-element="items"] [data-kt-element="empty"]'));
            }
        };

    return {
        init: function () {
            element = document.querySelector("#kt_invoice_form");

            element.querySelector('[data-kt-element="items"] [data-kt-element="add-item"]').addEventListener("click", function (event) {
                event.preventDefault();
                var newItemRow = element.querySelector('[data-kt-element="item-template"] tr').cloneNode(true);
                element.querySelector('[data-kt-element="items"] tbody').appendChild(newItemRow);



                checkEmpty();
                updateTotals();



            });

            KTUtil.on(
                element,
                '[data-kt-element="items"] [data-kt-element="remove-item"]',
                "click",
                function (event) {
                    event.preventDefault();
                    KTUtil.remove(this.closest('[data-kt-element="item"]'));
                    checkEmpty();
                    updateTotals();
                }
            );

            KTUtil.on(
                element,
                '[data-kt-element="items"] [data-kt-element="quantity"], [data-kt-element="items"] [data-kt-element="price"]',
                "change",
                function (event) {
                    event.preventDefault();
                    updateTotals();
                }
            );

            $(element.querySelector('[name="invoice_date"]')).flatpickr({
                enableTime: false,
                dateFormat: "d, M Y",
            });

            $(element.querySelector('[name="invoice_due_date"]')).flatpickr({
                enableTime: false,
                dateFormat: "d, M Y",
            });

            updateTotals();
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTAppInvoicesCreate.init();
});
