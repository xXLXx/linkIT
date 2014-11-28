+function ($) {

    var Menu = function (element) {
        var current = 0;
        var showMenuClass = 'show-menu';
        var iconListItemSelector = '.icon-list > span';
        var selectedSelector = 'selected';
        $body = $('body');

        $element = $(element)
        $element.find('.menu-button').on('click', function () {

            if (!$body.hasClass(showMenuClass)) {
               $body.addClass(showMenuClass);
            } else {
                $body.removeClass(showMenuClass);
            }
        });

        $element.on('click', iconListItemSelector, function () {
            $this = $(this);

            if (!$this.hasClass(selectedSelector) && $body.hasClass(showMenuClass)) {
                if (current != -1) {
                    $element.find(iconListItemSelector).eq(current).removeClass(selectedSelector);
                }
                $this.addClass(selectedSelector);
                current = $this.index();

                $body.removeClass(showMenuClass);
            }
        });

        $('#content-wrapper').on('click', function () {
            $body.removeClass(showMenuClass);
        });
    }

    $.fn.menu = function () {
        $(this).data = new Menu(this);
    }
} (jQuery);