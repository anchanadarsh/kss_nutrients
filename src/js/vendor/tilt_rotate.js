//==============tilt and rotate function==============
var tiltnrotate = function (parent, target, rotateDeg, transname, transDir, orientationDir) {
    //parent mousemove animation
    var parentW = $(parent).outerWidth();
    var parentH = $(parent).outerHeight();
    var setpercV = rotateDeg;
    //get target transform property value
    var transval = $(target).css('transform');
    $(parent).mousemove(function (e) {
        //            var xco = e.pageX;
        //            var yco = e.pageY;
        var xco = e.pageX - parentW / 2;
        var yco = e.pageY - parentH / 2;
        //                    console.log('xco', xco);
        var getpercX = (xco / parentW) * setpercV;
        var getpercY = (yco / parentH) * setpercV;
        if (transname == 'rotate') {
            if (orientationDir == 'opposite') {
                if (transDir == 'leftright') {
                    $(target).css('transform', transval + 'rotateY(' + getpercY + 'deg)');
                } else if (transDir == 'updown') {
                    $(target).css('transform', transval + 'rotateX(' + getpercX + 'deg)');
                } else if (transDir == 'both') {
                    $(target).css('transform', transval + 'rotateX(' + getpercX + 'deg) rotateY(' + getpercY + 'deg)');
                }
            } else if (orientationDir == 'same') {
                if (transDir == 'leftright') {
                    $(target).css('transform', transval + 'rotateY(' + getpercX + 'deg)');
                } else if (transDir == 'updown') {
                    $(target).css('transform', transval + 'rotateX(' + getpercY + 'deg)');
                } else if (transDir == 'both') {
                    $(target).css('transform', transval + 'rotateX(' + getpercY + 'deg) rotateY(' + getpercX + 'deg)');
                }
            }
        } else if (transname == 'translate') {
            if (orientationDir == 'same') {
                if (transDir == 'leftright') {
                    $(target).css('transform', transval + 'translateX(' + getpercX + 'px)');
                } else if (transDir == 'updown') {
                    $(target).css('transform', transval + 'translateY(' + getpercY + 'px)');
                } else if (transDir == 'both') {
                    $(target).css('transform', transval + 'translateX(' + getpercX + 'px) translateY(' + getpercY + 'px)');
                }
            } else if (orientationDir == 'opposite') {
                if (transDir == 'leftright') {
                    $(target).css('transform', transval + 'translateX(' + getpercY + 'px)');
                } else if (transDir == 'updown') {
                    $(target).css('transform', transval + 'translateY(' + getpercX + 'px)');
                } else if (transDir == 'both') {
                    $(target).css('transform', transval + 'translateX(' + getpercY + 'px) translateY(' + getpercX + 'px)');
                }
            }
        }
    });
    $(parent).mouseleave(function (e) {
        if (transname == 'rotate') {
            $(target).css('transform', transval + 'rotateX(0deg) rotateY(0deg)');
        } else if (transname == 'translate') {
            $(target).css('transform', transval);
        }
    });
    $(parent + ' *').mousemove(function (e) {
        $(parent).trigger('mousemove');
    });
}
