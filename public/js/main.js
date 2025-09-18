if (document.querySelector('.nav')) {
    $(function () {
      $('.nav a').filter(function () {
          return this.href === location.href;
      }).addClass('text-indigo-600');
    });
    // /для панели в памятниках
}