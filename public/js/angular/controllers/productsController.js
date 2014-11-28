(function () {
    MyCompany.controller('ProductsController', ProductsController);

    function ProductsController () {
        var vm = this;

        vm.products = [];

        vm.init = function () {
            for (var x = 0; x <= 40; x++) {
                vm.products.push((x % 6 + 1) + '.png');
            }
        }

        vm.init();
    }
})();