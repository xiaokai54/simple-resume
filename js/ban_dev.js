$(function(){
    $(document).bind("contextmenu", function () { return false; });//禁止右键
    document.oncontextmenu = function () { return false; };
    document.onkeydown = function () {
        if (window.event && window.event.keyCode == 123) {
            event.keyCode = 0;
            event.returnValue = false;
            return false;
        }
    };//禁止F12
})