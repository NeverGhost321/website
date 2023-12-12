$("textarea").blur(function () {
    $("#feedback textarea").each(function () {
      $this = $(this);
      if (this.value != "") {
        $this.addClass("focused");
        $("textarea + label + span").css({ opacity: 1 });
      } else {
        $this.removeClass("focused");
        $("textarea + label + span").css({ opacity: 0 });
      }
    });
  });
  
  $("#feedback .field:first-child input").blur(function () {
    $("#feedback .field:first-child input").each(function () {
      $this = $(this);
      if (this.value != "") {
        $this.addClass("focused");
        $(".field:first-child input + label + span").css({ opacity: 1 });
      } else {
        $this.removeClass("focused");
        $(".field:first-child input + label + span").css({ opacity: 0 });
      }
    });
  });
  
  $("#feedback .field:nth-child(2) input").blur(function () {
    $("#feedback .field:nth-child(2) input").each(function () {
      $this = $(this);
      if (this.value != "") {
        $this.addClass("focused");
        $(".field:nth-child(2) input + label + span").css({ opacity: 1 });
      } else {
        $this.removeClass("focused");
        $(".field:nth-child(2) input + label + span").css({ opacity: 0 });
      }
    });
  });
  