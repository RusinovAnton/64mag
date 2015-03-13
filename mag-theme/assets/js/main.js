;
(function($) {

    var defaults = {
        interval: 4000,
        pager: true,
        controls: false,
        counter: false
    };

    $.fn.sliderGallery = function(options) {
        if (this.length == 0) return this;
        if (this.length > 1) {
            this.each(function() {
                $(this).sliderGallery(options)
            });
            return this;
        }

        // Variables

        var obj = {},
            el = this,
            activeLi = 0;

        obj.viewportWidth = el.find('.slider-viewport').width();
        $(window).resize(function() {
            obj.viewportWidth = el.find('.slider-viewport').width();
        });
        obj.viewportHeight = el.find('.slider-viewport').height();
        obj.sliderBody = el.find(".slider-body");
        obj.slideNum = el.find(".slide").length;
        obj.slide = el.find('.slide');
        obj.startInterval = function() {
            this.intervalize = setInterval(function() {
                activeLi++;
                changeSlide();
            }, obj.settings.interval);
        }

        obj.stopInterval = function() {
            clearInterval(this.intervalize);
        }
        obj.destroy = function() {
                this.sliderBody.parents('.slider').remove();
            }
            // Inits
        var initSlider = function() {

            var bodyWidth = obj.viewportWidth * obj.slideNum;
            obj.sliderBody.css({
                "width": bodyWidth + "px"
            });

        }


        var initPagination = function() {
            if (el.find(".pagination").index() == -1) {
                el.append("<ul class='pagination'></ul>");
            }
            if (obj.slideNum <= 1) {
                return;
            }
            for (var i = 0; i < obj.slideNum; i++) {
                el.find(".pagination").append("<li></li>");
            }
            el.find(".pagination li").eq(0).addClass("active");

        }

        var initControls = function() {
            el.prepend("<div class='prev'></div><div class='next'></div>");
        }

        var initCounter = function() {
            for (var i = 0; i < obj.slideNum; i++) {
                obj.slide.eq(i).find('.counter').text((i + 1) + ' of ' + obj.slideNum);
            }
        }

        // Initializing slider

        var init = function() {
            obj.settings = $.extend({}, defaults, options);
            initSlider();
            if (obj.settings.pager) {
                initPagination();
            }
            if (obj.settings.controls) {
                initControls();
            }
            if (obj.settings.counter) {
                initCounter();
            }
            if (obj.settings.interval) {
                obj.startInterval();
            }
        }

        init();
        obj.li = el.find(".pagination li");
        obj._prev = el.find(".prev");
        obj._next = el.find(".next");
        // Slider mechanics
        function changeSlide() {
            if (activeLi < 0) {
                activeLi = obj.slide.length - 1;
            } else if (activeLi > obj.slide.length - 1) {
                activeLi = 0;
            }
            moveToActive();
            changeLi(activeLi);
        }

        function moveToActive() {
            var x = -(obj.viewportWidth * activeLi);
            obj.sliderBody.css({
                "transform": "translate3D(" + x + "px,0,0)"
            });
        }
        var changeLi = function(i) {
            obj.li.removeClass('active');
            obj.li.eq(i).addClass('active');
        }
        el.mouseenter(function() {
            obj.stopInterval();
        });

        el.mouseleave(function() {
            if (obj.settings.interval) {
                obj.startInterval();
            }
        });

        obj.li.on("click", function() {
            activeLi = $(this).index();
            changeSlide();

        });

        obj._prev.on("click", function() {
            activeLi--;
            changeSlide();
        });

        obj._next.on("click", function() {
            activeLi++;
            changeSlide();
        });

    }
})(jQuery);

(function() {
    if ($('#wpadminbar').length > 0) {
        $('.fixed-header').css({
            'top': 31 + 'px'
        })
    }
})();
(function() {
    var el = $('.grid');

    function setLast(i, col) {
        var article = el.eq(i).find('article');
        article.each(function(j) {
            var realJ = j + 1;
            if (realJ == col || realJ % col == 0) {
                $(this).addClass('row-last');

            }
        })
    }

    el.each(function(i) {
        var _class = el.eq(i).attr('class');

        var isCol = el.eq(i).attr('class').indexOf('col-'),
            col = -1;

        if (isCol >= 0) {
            col = parseInt(_class.substr(isCol + 4, isCol + 5));
            if (col == 1) {
                return;
            }
            setLast(i, col);
        }
    })
})();

(function() {
    var el = $('.main-slider'),
        init,
        body,
        item,
        full,
        quad, quadFinished = true,
        slides,currSlide=0,currItem=0;

    if (el.length) {
        init = el.find('.init-slides');
        body = el.find('.slider-body');
        item = el.find('.slide-item');
        full = el.find('.fullsize');
        quad = el.find('.quater-slide');

        slides = full.length + Math.ceil(quad.length / 4);
        makeSlides();
        init.remove();
    }

    function makeSlides() {
        var slide = $('<div></div>').addClass('slide');
        for (var i = slides; i > 0; i--) {
            slide.clone().appendTo(body);
        };
        item.each(function() {
            var $this  = $(this), slide = body.find('.slide').eq(currSlide);
            if ($this.hasClass('fullsize')) {
                $this.appendTo(slide);
                currSlide++;
            } else if ($this.hasClass('quater-slide')) {               
                $this.appendTo(slide);
                currItem++;
                if (currItem == 4) {
                    currItem = 0;
                    currSlide++;
                }
            }

        });
    }

})();

$(window).on('load', function() {
    $('.loading').removeClass('loading');  
});

// Size and color picker
(function() {
    if ($('#pa_size').length == 0 && $('#pa_color').length == 0) {
        return
    }

    var sizeSelect = $('#pa_size'),
        colorSelect = $('#pa_color'),
        sizePicker, colorPicker;
    var colorMap = {
        'black': '#000',
        'blue': '#03f',
        'purple': '#c0f',
        'white': '#fff',
        'red': '#f00',
        'orange': '#ff9f23',
        'brown': '#ac8048',
        'yellow': '#ffe323',
        'green': '#06da5b',
        'grey': '#aaa',
        'Choose an option…': 'transparent'
    }
    if (sizeSelect.length > 0) {

        sizePicker = $('<div></div>').addClass('size-picker');
        sizeSelect.find('option').each(function(i) {
            var $this = $(this),
                text = $this.text(),
                item = $('<div></div>').addClass('size-picker-option');
            if (text == 'Choose an option…') {
                text = 'x'
                item.addClass('reset')
            }
            item.text(text);
            sizePicker.append(item)
        });
        sizeSelect.closest('.value').prepend(sizePicker)
    }
    if (colorSelect.length > 0) {

        colorPicker = $('<div></div>').addClass('color-picker');
        colorSelect.find('option').each(function(i) {
            var $this = $(this),
                text = $this.text(),
                color = colorMap[text.toLowerCase()],
                item = $('<div></div>').addClass('color-picker-option');

            if (text == 'Choose an option…') {
                item.text('x').addClass('reset')

            } else {
                item.css({

                    'background-color': color

                })
            }

            colorPicker.append(item)
        })
        colorSelect.closest('.value').prepend(colorPicker);
    }


})();
(function() {
    var header = $('header'),
        height = header.height();

    $(window).scroll(function() {
        var top = window.scrollY;
        if (top > height) {
            header.eq(1).addClass('visible');
        } else {
            header.eq(1).removeClass('visible');
        }
    });
})();
(function() {
    if ($('.variations_form').length == 0) {
        return
    }

})();
(function() {
    var parent = $('#video-section'),
        vid,
        body = parent.find('.video-embed'),
        art = parent.find('.article-item'),
        title = art.eq(0).find('.article-title'),
        innerTitle = parent.find('.inner-title'),
        meta = art.eq(0).find('.article-meta');

    if (parent.length == 0) {
        return
    }
    if (parent.hasClass('video-post')) {
        $('iframe').eq(0).appendTo(body);
    } else {
        parent.find('.vid iframe').appendTo(body);
        parent.find('.vid').remove();
        innerTitle.append(title).append(meta)
    }


})();
(function() {
    Share = {
        vk: function(purl, ptitle, pimg, text) {
            url = 'http://vkontakte.ru/share.php?';
            url += 'url=' + encodeURIComponent(purl);
            url += '&title=' + encodeURIComponent(ptitle);
            url += '&description=' + encodeURIComponent(text);
            url += '&image=' + encodeURIComponent(pimg);
            url += '&noparse=true';
            Share.popup(url);
        },
        fb: function(purl, ptitle, pimg, text) {
            url = 'http://www.facebook.com/sharer.php?s=100';
            url += '&p[title]=' + encodeURIComponent(ptitle);
            url += '&p[summary]=' + encodeURIComponent(text);
            url += '&p[url]=' + encodeURIComponent(purl);
            url += '&p[images][0]=' + encodeURIComponent(pimg);
            Share.popup(url);
        },
        tw: function(purl, ptitle) {
            url = 'http://twitter.com/share?';
            url += 'text=' + encodeURIComponent(ptitle);
            url += '&url=' + encodeURIComponent(purl);
            url += '&counturl=' + encodeURIComponent(purl);
            Share.popup(url);
        },
        popup: function(url) {
            window.open(url, '', 'toolbar=0,status=0,width=626,height=436');
        }
    };
})();
(function() {
    var el = $('.gallery'),
        item,
        icon = '<div class="gallery-photo-summary"><span></span></div>',
        src, orig;
    if (el.length == 0) {
        return
    }

    el.each(function() {
        $el = $(this);

        item = $el.find('.gallery-item');
        item.each(function() {
            var $item = $(this);
            i = $item.index();
            if (i > 6) {
                $item.addClass('unvisible')
            }
        })
        $el.append(icon);
        $el.find('.gallery-photo-summary span').text(item.length);
        src = item.eq(0).find('img').attr('data-orig-file');
        newFig = item.eq(0).clone();
        newFig.find('img').attr('src', src).attr({
            'width': '100%',
            'height': 'auto'
        });
        item.eq(0).remove();
        $el.prepend(newFig)
    })




})();

(function() {
    //comment btn
    var commentArea = $('#comments'),
        el = commentArea.children('#respond'),
        commentBtn = "<button id='comment-this' class='btn'>Comment this</button>";
    el.before(commentBtn);
    el.hide();
    var btn = $('#comment-this');
    btn.click(function() {
        btn.hide();
        el.slideDown();
    });

})();
(function() {
    var el = $('.subscribe-menu'),
        close = $('.close-btn');
    $(document).on('click', function(e) {
        var target = e.target;

        if ((target.tagName == "A" || target.tagName == "BUTTON") && target.getAttribute('data-target') != null) {
            e.preventDefault();
            el.addClass('visible');
        }
    });
    close.on('click', function() {
        $(this).parents('.visible').removeClass('visible')
    });
    $(document).click(function(e) {
        el.find('.success').fadeOut();
        el.find('.error').fadeOut();
    });
})();
(function() {
    var links = $('#exhibitions-widget .link-list li'),
        thumbs = $('#exhibitions-widget .link-thumbs li');
    thumbs.eq(0).addClass('active')
    links.hover(function() {
        var i = $(this).index();

        thumbs.removeClass('active');
        thumbs.eq(i).addClass('active')
    })
})();

(function($) {
    "use strict";

    $.fn.productGallery = function() {
        var el = this,
            body = el.find('.woocommerce-main-image'),
            mainImg = el.find('.woocommerce-main-image img'),
            imgs = $('<div></div>').addClass('orig-container').css('display', 'none'),
            thumbs = el.find('.product-thumbnail'),
            fullSizeBtn = $('<div></div>').addClass('fullsize'),
            closeBtn = $('<div></div>').addClass('close-btn'),
            fullScreen = $('<div></div>').addClass('fullScreen').append(closeBtn);

        el.append(fullSizeBtn);
        el.append(imgs);

        el.find('.fullsize').click(function() {
            var src = body.find('img').attr('src');
            window.open(src);
        })

        el.find('a').click(function(e) {
            e.preventDefault()
        })

        thumbs.each(function() {
            var origSrc = $(this).attr('href'),
                img = $('<img src="' + origSrc + '" alt="" />');

            el.find('.orig-container').append(img)

        })

        thumbs.hover(function() {
            var i = $(this).index(),
                containerImg = el.find('.orig-container img').eq(i);
            body.html('');
            containerImg.clone().appendTo(body)
        })
    };

    if ($("#product-gallery").length) {
        $('#thumbs-slider').sliderGallery({
            controls: true,
            interval: false,
            pager: false
        });

        $("#product-gallery").productGallery();
        $('.slide').each(function() {
            if ($(this).html() == '') {
                $(this).remove();
            }
        });

        if ($('.slide').length == 1) {
            $('.prev').remove();
            $('.next').remove();
        }


    }

})(jQuery);
(function() {
    $('#go-up').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 300);
    });
    $('.currentYear').text("-" + new Date().getFullYear());

})();

$(".main-slider").sliderGallery({
    controls: true,
    interval: 7000
});

$('#video-carousel').sliderGallery({
    controls: true,
    interval: false,
    pager: false
});
