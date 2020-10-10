$(document).on('click', '.btn-add-product', function (event) {
    event.preventDefault()

    var amount = $(this).closest("tr").find(".amount").val();
    var idProduto = $(this).closest("tr").find(".idProduto").val();


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

function ajaxSetup()
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}


function getProductByCnpj()
{
    ajaxSetup();

    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: {},
        url: 'get-product-by-cnpj',
        success: function (retorno) {
            $("#products-cnpj tbody tr").remove();
            $.each(retorno['data'], function (index, value) {

                if (value['quantidade'] > value['info_product']['estoque']) {
                    var zeroedProduct = 'style="background-color:#f1a8a8" title="Estoque zerado!"';
                }

                rowTable(index, value, zeroedProduct);
            });
        },
        error: function (error) {
            alert(error);
        }
    });
}

var atual = 600000.00;

//com R$
var f = atual.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

function rowTable(index, value, zeroedProduct) {

    var newRow = $("<tr>");
    var cols = "";
    cols += '<td>' + value['info_product']['itm'] + '</td>';
    cols += '<td>' + value['info_product']['dsc1'] + '</td>';
    cols += '<td>' + value['info_product']['srp1'] + '</td>';
    cols += '<td ' + zeroedProduct + '>' + value['quantidade'] + '</td>';
    cols += '<td>' + value['info_product']['uprc'] + '</td>';
    cols += '<td>' + '<input type="text" name="" id="valor_sugerido" class="valor_sugerido" value="' + value['valor_sugerido'] + '" >' + '<input type="hidden" class="suggested-value" id="suggested-value" value="' + value['id'] + '"></td>';
    cols += '<td>' + '-' + '</td>';
    cols += '<td><button type="button" class="btn btn-danger remove-product" data-id="' + value['id'] + '">Remover</button></td>';
    newRow.append(cols);
    $("#products-cnpj").append(newRow);
}




$(parent).ready(function(){
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


$(document).on('mouseout', '.valor_sugerido', function (event) {
    event.preventDefault()

    var valor_sugerido = $(this).closest("tr").find(".valor_sugerido").val();
    var idPedidoTemp = $(this).closest("tr").find(".suggested-value").val();

    ajaxSetup();

    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: {idPedidoTemp, valor_sugerido},
        url: 'suggested-value-product',
        success: function () {
            getProductByCnpj()
        },
        error: function (error) {
            console.log(error)
        }
    });

})
