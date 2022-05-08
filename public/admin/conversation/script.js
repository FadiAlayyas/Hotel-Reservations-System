
$(document).ready(() => {
    $("#Send").click(() => {
       $(".right").hide();
         $(".select").show();
    })
})
$(document).ready(() => {
    $("#cross").click(() => {
       $(".right").show();
         $(".select").hide();
    })
})

// chats
$(document).ready(() => {
    $("#Send").click(() => {
       $(".chatssright").hide();
         $(".select").show();
    })
})
$(document).ready(() => {
    $("#cross").click(() => {
       $(".chatssright").show();
         $(".select").hide();
    })
})
var chatBox = document.getElementById("chat");
  chatBox.scrollTop = chatBox.scrollHeight;

  function delet(idd){

    $("#d"+idd).fadeToggle();
  }
/**** chat ************/
