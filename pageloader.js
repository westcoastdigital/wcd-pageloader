(function($) {
  $(function() {
    document.body.onload = function() {
      setTimeout(function() {
        var preloader = document.getElementById("wcd-pageloader");
        if (!preloader.classList.contains("done")) {
          preloader.classList.add("done");
        }
      }, 1000);
    };
  });
})(jQuery);
