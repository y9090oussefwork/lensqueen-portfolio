"use strict";
var $ = $.noConflict();
$(document).ready(function(){
    var x, i, j, selElmnt, a, b, c;
    x = document.getElementsByClassName("select-redesign");
    for (i = 0; i < x.length; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 0; j < selElmnt.length; j++) {
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                var y, i, k, s, h;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                h = this.parentNode.previousSibling;
                for (i = 0; i < s.length; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        for (k = 0; k < y.length; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
            this.classList.add("tick-active");
        });
    }
    function closeAllSelect(elmnt) {
        var x, y, i, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        for (i = 0; i < y.length; i++) {
            if (elmnt == y[i]) {
                arrNo.push(i)
            } else {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < x.length; i++) {
            if (arrNo.indexOf(i)) {
                x[i].classList.add("select-hide");
            }
        }
    }
    document.addEventListener("click", closeAllSelect);

    var bootstrapButton = $.fn.button.noConflict();
    $.fn.bootstrapBtn = bootstrapButton;

    new WOW().init();


    /*

    $(".login-signup a").on('click', function(e) {
        e.preventDefault();
        $("#modal-login").toggleClass("modal-open");
    });
    $(".modal-login-body").on('click',function(e){
        e.stopPropagation();
    });
    $(".modal-wrapper").on('click', function(e) {
        e.preventDefault();
        $("#modal-login").removeClass("modal-open");
    });
    $(".btn-close").on('click',function(){
        $("#modal-login").removeClass("modal-open");
    });
    $(".btn-forget").on('click',function(){
        $(".signin").css("display","none");
        $(".reset-password").fadeIn();
    });
    $(".btn-signup").on('click',function(){
        $(".signin").css("display","none");
        $(".reset-password").css("display","none");
        $(".register").fadeIn();
    });
    $(".btn-login-back").on('click',function(){
        $(".reset-password").css("display","none");
        $(".register").css("display","none");
        $(".signin").fadeIn();
    });

     */


    $('.navbar-toggler').on('click',function(){
        $(this).toggleClass('custom-toggler');
    });

    $('.das-nav').on('click',function(){
        $(this).parent('.dashboard-nav').find('.active').removeClass('active');
        $(this).addClass('active');
    });
    $('.sidenavbar-toggler').on('click',function(){
        $('#sidenavbar').css('left', '0');
    });
    $('.sidenav-close').on('click',function(){
        $('#sidenavbar').css('left', '-330px');
    });

    //
    // $(".modal-content").click(function(e){
    //     e.stopPropagation();
    // });

});













