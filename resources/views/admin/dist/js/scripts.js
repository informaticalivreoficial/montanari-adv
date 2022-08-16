$(function () {
    //TOOLTIPS
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    Inputmask({"mask": "999.999.999-99"}).mask('.cpfmask');
    Inputmask({"mask": "99.999.999-9"}).mask('.rgmask');
    Inputmask({"mask": "99999-999"}).mask('.cepmask');
    Inputmask({"mask": "(99) 9999-9999"}).mask('.telefonemask');
    Inputmask({"mask": "(99) 99999-9999"}).mask('.celularmask');
    Inputmask({"mask": "(99) 99999-9999"}).mask('.whatsappmask');    
    Inputmask({"mask": "99.999.999/9999-99"}).mask('.cnpjmask');
    
    $(".mask-zipcode").mask('00000-000', {reverse: true});
    $(".mask-money").mask('R$ 000.000.000.000.000,00', {reverse: true, placeholder: "R$ 0,00"});
    
    //Date range picker
    $('#nasc').datetimepicker({
        format: 'DD/MM/YYYY',
        locale: 'pt-br'
    });
    //$('#nasc').datetimepicker().setLocale('pt-BR'); 
    $('#nasc-conjuje').datetimepicker({
        format: 'DD/MM/YYYY',  
        locale: 'pt-br'
    });

    function normalizeSpouse() {
        if (typeof ($('select[name="estado_civil"]')) !== 'undefined') {
            if ($('select[name="estado_civil"]').val() === 'casado' || $('select[name="estado_civil"]').val() === 'separado') {
                $('.content_spouse input, .content_spouse select').prop('disabled', false);
            } else {
                $('.content_spouse input, .content_spouse select').prop('disabled', true);
            }
        }
    }
    normalizeSpouse();
    $('select[name="estado_civil"]').change(function () {
        normalizeSpouse();
    });   
   
    
    //EDITOR CONFIGURAÇÕES GLOBAIS
    $('#compose-textarea').summernote({
        fontSizes: ['8', '9', '10', '11', '12', '14', '18'],
        minHeight: 300,
        lang: 'pt-BR', // default: 'en-US'
        toolbar: [
          ['style', ['style']],
          ['fontname', ['fontname']],
          ['fontsize', ['fontsize']],
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video','hr']],
          ['view', ['fullscreen', 'codeview']]
        ]
    });
    
     // ENABLE INPUT TO PRICE
//    $('input[type="checkbox"][name="venda"]').change(function(){
//        if($(this).get(0).checked) {
//            $('input[name="sale_price"]').attr('disabled', false);
//            $('input[name="valor_venda"]').attr('disabled', false);
//        } else {
//            $('input[name="sale_price"]').attr('disabled', true);
//            $('input[name="valor_venda"]').attr('disabled', true);
//        }
//    });
    
    // ENABLE INPUT TO PRICE
    $('input[type="radio"][name="purpose"]').change(function(){
        
        if($(this).val() == 'venda') {
            $('input[name="sale_price"]').attr('disabled', false);
            //$('input[name="valor_venda"]').attr('disabled', false);
        } else {
            $('input[name="sale_price"]').attr('disabled', true);
            //$('input[name="valor_venda"]').attr('disabled', true);
        }
        
        if($(this).val() == 'locacao') {
            $('input[name="rent_price"]').attr('disabled', false);
            //$('input[name="valor_locacao"]').attr('disabled', false);
        } else {
            $('input[name="rent_price"]').attr('disabled', true);
            //$('input[name="valor_locacao"]').attr('disabled', true);
        }
    });

    // ENABLE INPUT TO PRICE
    $('input[type="checkbox"][name="locacao"]').change(function(){
        if($(this).get(0).checked) {
            $('input[name="rent_price"]').attr('disabled', false);
            //$('input[name="valor_locacao"]').attr('disabled', false);
        } else {
            $('input[name="rent_price"]').attr('disabled', true);
            //$('input[name="valor_locacao"]').attr('disabled', true);
        }
    });

    // ENABLE INPUT TO PRICE
    $('input[type="checkbox"][name="venda"]').change(function(){
        if($(this).get(0).checked) {
            $('input[name="rent_price"]').attr('disabled', false);
        } else {
            $('input[name="rent_price"]').attr('disabled', true);
        }
    });

    

});