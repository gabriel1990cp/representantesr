$(document).on('click', '.btn-add-product', function (event) {
    event.preventDefault()

    amount = $(this).closest("tr").find(".amount").val();
    idProduto = $(this).closest("tr").find(".idProduto").val();

    if (amount < 1) {
        $(".alert-ajax").show();
        $(".alert-ajax").text('Selecione a quantidade!')
        return false;
    } else {
        $(".alert-ajax").hide();
    }

    ajaxSetup();

    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: {idProduto, amount},
        url: 'add-product',
        success: function (retorno) {
            if (retorno) {
                getProductByCnpj();
            }
        },
        error: function (error) {
            console.log(error)
        }
    });
})

function ajaxSetup() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}


function getProductByCnpj() {
    ajaxSetup();

    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: {},
        url: 'get-product-by-cnpj',
        success: function (retorno) {
            $("#products-cnpj tbody tr").remove();

                valueAmount = 0;

                $.each(retorno['data'], function (index, value) {

                    if (value['quantidade'] > value['info_product']['estoque']) {
                        var zeroedProduct = 'style="background-color:#f1a8a8" title="Estoque zerado!"';
                    }

                    if (value['valorSugerido'] > 0) {
                        valueProduct = value['valorSugerido'];
                    } else {
                        valueProduct = value['info_product']['uprc'];
                    }

                    rowTable(index, value, zeroedProduct, valueProduct);

                    valueAmount = valueAmount + valueProduct * value['quantidade'];
                });

                $("#aexp").val(valueAmount.toLocaleString('pt-br', {minimumFractionDigits: 2}));
        },
        error: function (error) {
            alert(error);
        }
    });
}


function rowTable(index, value, zeroedProduct, valueProduct) {

    valueAmountRow = value['quantidade'] * valueProduct;

    var newRow = $("<tr>");
    var cols = "";
    cols += '<td>' + value['info_product']['itm'] + '</td>';
    cols += '<td>' + value['info_product']['dsc1'] + '</td>';
    cols += '<td>' + value['info_product']['srp1'] + '</td>';
    cols += '<td ' + zeroedProduct + '>' + value['quantidade'] + '</td>';
    cols += '<td>' + value['info_product']['uprc'] + '</td>';
    cols += '<td>' + '<input type="text" name="" class="valorSugerido_user" value="' + valueProduct + '" >' + '<input type="hidden" class="suggested-value" value="' + value['id'] + '"></td>';
    cols += '<td>' + valueAmountRow.toLocaleString('pt-br', {minimumFractionDigits: 2}) + '</td>';
    cols += '<td><button type="button" class="btn btn-secondary mr-1 valorSugerido">Atualizar valor</button><button type="button" class="btn btn-danger remove-product" data-id="' + value['id'] + '">Deletar</button></td>';
    newRow.append(cols);
    $("#products-cnpj").append(newRow);
}


$(parent).ready(function () {
    getProductByCnpj()
})

$(document).on('click', '.remove-product', function (event) {
    event.preventDefault()
    var idPedidoTemp = $(this).data('id');

    ajaxSetup();

    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: {idPedidoTemp},
        url: 'remove-product',
        success: function () {
            getProductByCnpj()
        },
        error: function (error) {
            console.log(error)
        }
    });
})


$(document).on('click', '.valorSugerido', function (event) {
    event.preventDefault()

    var valorSugerido = $(this).closest("tr").find(".valorSugerido_user").val();
    var idPedidoTemp = $(this).closest("tr").find(".suggested-value").val();

    ajaxSetup();

    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: {idPedidoTemp, valorSugerido},
        url: 'suggested-value-product',
        success: function () {
            getProductByCnpj()
        },
        error: function (error) {
            console.log(error)
        }
    });
})

