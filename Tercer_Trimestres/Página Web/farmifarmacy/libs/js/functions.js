function suggetion() {

     $('#sug_input').keyup(function(e) {

         var formData = {
             'nombre_producto' : $('input[nombre=titulo]').val()
         };

         if(formData['nombre_producto'].length >= 1){

            // process the form
            $.ajax({
                type        : 'POST',
                url         : 'ajax.php',
                data        : formData,
                dataType    : 'json',
                encode      : true
            })
                .done(function(data) {
                    //console.log(data);
                    $('#result').html(data).fadeIn();
                    $('#result li').click(function() {

                     $('#sug_input').val($(this).text());
                     $('#result').fadeOut(500);

                   });

                   $("#sug_input").blur(function(){
                     $("#result").fadeOut(500);
                   });

               });
         } else {
           $("#result").hide();

         };

         e.preventDefault();
     });

 }
  $('#sug-form').submit(function(e) {
      var formData = {
          'p_nombre' : $('input[name=title]').val()
      };
        // process the form
        $.ajax({
            type        : 'POST',
            url         : 'ajax.php',
            data        : formData,
            dataType    : 'json',
            encode      : true
        })
            .done(function(data) {
                //console.log(data);
                $('#product_info').html(data).show();
                total();
                $('.datePicker').datepicker('update', new Date());

            }).fail(function() {
                $('#product_info').html(data).show();
            });
      e.preventDefault();
  });
  function total(){
    $('#product_info input').change(function(e)  {
            var precio   = +$('input[nombre=precio]').val() || 0;
            var cantidad = +$('input[nombre=cantidad]').val() || 0;
            var total    = cantidad * precio ;
                $('input[nombre=total]').val(total.toFixed(2));
    });
  }

  $(document).ready(function() {

    //tooltip
    $('[data-toggle="tooltip"]').tooltip();

    $('.submenu-toggle').click(function () {
       $(this).parent().children('ul.submenu').toggle(200);
    });
    //suggetion for finding product names
    suggetion();
    // Callculate total ammont
    total();

    $('.datepicker')
        .datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            autoclose: true
        });
  })