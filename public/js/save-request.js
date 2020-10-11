$(document).ready(function () {
    $( ".save-request" ).click(function() {

        aexp = $("#aexp").val();
        if (aexp == '0,00') {
            $(".alert-create-request").show();
            $(".alert-create-request").text('Selecione um produto!')
            return false
        }

        mcu = $("#mcu option:selected").val();
        if (mcu == 'Selecione') {
            alertError('selecione o local de retirada')
            return false
        }

        ptc = $("#ptc").val();
        if (!ptc){
            alertError('condição de pagamento')
            return false
        }

        frth = $("#frth option:selected").val();
        if (frth == 'Selecione') {
            alertError('frete por conta de');
            return false
        }

        $(".form-save-request").submit();
    });
});


function alertError($MsgError)
{
    $(".alert-create-request").show();
    $(".alert-create-request").text('Campo: "' + $MsgError + '" inválido!')

}
