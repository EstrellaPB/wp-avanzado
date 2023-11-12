jQuery(document).foundation();
(function ($) {
  $('#platillos > div').not(':first').hide();
  $('#filtrar  .menu li:first-child').addClass('active');
  $('#filtrar .menu a').on('click', function () {
    $('#filtrar .menu li').removeClass('active');
    $(this).parent().addClass('active');
    var enlace = $(this).attr('href');
    $('#platillos > div').hide();
    $(enlace).fadeIn();
    // para evitar que de un brinco hacia abajo
    return false;
  });

  // jQuery
  //   .ajax({
  //     url: admin_url.ajax_url,
  //     type: 'post',
  //     data: {
  //       action: 'recetas_comer',
  //     },
  //   })
  //   .done(function (response) {
  //     console.log(response);
  //   });
  var fecha = new Date();
  var hora = fecha.getHours();
  console.log(`⌛`, hora);
  var comida;
  if (hora <= 10) {
    comida = 'desayunar';
  } else if (hora >= 11 && hora <= 17) {
    comida = 'comer';
  } else {
    comida = 'cenar';
  }
  $.ajax({
    url: admin_url.ajax_url,
    type: 'post',
    data: {
      action: 'recetas_' + comida,
    },
  })
    .done((response) => {
      // console.log('done', response);
      $('#hora').append('<em>' + comida + '</em>');
      $.each(response, function (index, object) {
        var plato_hora =
          '<div class="medium-4 small-12 columns">' +
          object.imagen +
          '<div class="contenido">' +
          '<h3 class="text-center">' +
          '<a href="' +
          object.link +
          '">' +
          object.nombre +
          '</a>' +
          '</h3>' +
          '</div>' +
          '</div>';
        $('#por-hora').append(plato_hora);
      });
    })
    .fail(() => console.log('fail'));
})(jQuery);
