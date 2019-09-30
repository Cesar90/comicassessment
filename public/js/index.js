'use strict';
var index = {};
(function(){
    //Private variable
    var that = this;
    this.init = function(){
        this.handlerEvent();
    };

    this.handlerEvent = function(){
        var requestUrl = "", wasClicked = false;
        $(".jsbtnNav").on("click", function(e){
            if(!wasClicked){
                wasClicked = true;
                requestUrl = $("#frmNav").attr('action');
                $("#typenav").val($(this).data('typenav'));
                requestUrl = requestUrl + '/' + $(this).data('comicid');
                $('#frmNav').attr('action', requestUrl).submit();
                return false;
            }
        });
    };

    $(document).ready(function(){
        that.init();
    });

}).call(index);