(function(){
 /* $(window).scroll(function () {
      var top = $(document).scrollTop();
      $('.splash').css({
        'background-position': '0px -'+(top/3).toFixed(2)+'px'
      });
      if(top > 50)
        $('#home > .navbar').removeClass('navbar-transparent');
      else
        $('#home > .navbar').addClass('navbar-transparent');
  });

  $("a[href='#']").click(function(e) {
    e.preventDefault();
  });*/

  var $button = $("<div id='source-button' class='btn btn-primary btn-xs'>&lt; &gt;</div>").click(function(){
    var html = $(this).parent().html();
    html = cleanSource(html);
    $("#source-modal pre").text(html);
    $("#source-modal").modal();
  });

  //Confirmar accion con modal
  $('#confirm-action').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    //Si es necesario se captura un mensaje para mostrar desde data-msj
    $(this).find('.btn-ok').attr('msj', $(e.relatedTarget).data('msj'));
    $('.debug-url').html('<strong>' + $(this).find('.btn-ok').attr('msj') + '</strong>');
  });

  // $('#myModal').modal('show');

  //PopOver
  $('[data-toggle="popover"]').popover();
  //Tooltip
  $('[data-toggle="tooltip"]').tooltip({trigger: "hover"});
  
  //Aqui  muestra para copiar el codigo
  /*$(".bs-component").hover(function(){
    $(this).append($button);
    $button.show();
  }, function(){
    $button.hide();
  });

  function cleanSource(html) {
    var lines = html.split(/\n/);

    lines.shift();
    lines.splice(-1, 1);

    var indentSize = lines[0].length - lines[0].trim().length,
        re = new RegExp(" {" + indentSize + "}");

    lines = lines.map(function(line){
      if (line.match(re)) {
        line = line.substring(indentSize);
      }

      return line;
    });

    lines = lines.join("\n");

    return lines;
  }*/

})();
