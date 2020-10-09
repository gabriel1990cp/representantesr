$(document).ready(function () {

    $('#btn-pesquisar-produto').click(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#products-table tbody tr").remove();

        var description = $("#id-descricao").val();

        var itm = $("#id-codigo").val();


        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {description, itm},
            url: 'search-product',
            success: function (retorno) {
                $.each(retorno['data'], function (index, value) {
                    newRowTableSearch(index, value);
                });
            },
            error: function (error) {
                alert(error);
            }
        });
    });


    function newRowTableSearch(index, value) {
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td>' + value['itm'] + '</td>';
        cols += '<td>' + value['dsc1'] + '</td>';
        cols += '<td>' + value['srp1'] + '</td>';
        cols += '<td><input type="number" name="" id="" class="amount" value="0">' +
            '<input type="hidden" value="' + value['idProduto'] + '" class="idProduto"></td>' + 0 + '</td>';
        cols += '<td><button type="button" class="btn btn-primary btn-add-product">Adicionar</button></td>';
        newRow.append(cols);
        $("#products-table").append(newRow);
    }
});
