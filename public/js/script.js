$(document).ready(function () {
    $('#btn-pesquisar-produto').click(function () {

        //$("#products-table tr").detach();
        $("#products-table tbody tr").remove();

        $description = $("#id-descricao").val();
        $code = $("#id-codigo").val();

        $.ajax
        ({
            type: 'POST',
            dataType: 'json',
            contentType: 'application/json',
            data: JSON.stringify({description: $description, code: $code}),
            url: 'api/searchProduct',
            success: function (retorno) {
                $.each(retorno['data'], function (index, value) {
                    newRowTable(index, value);
                });
            },
            error: function (error) {
                alert('erro');
            }
        });
    });


    function newRowTable(index, value)
    {
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td>' + value['itm'] + '</td>';
        cols += '<td>' + value['dsc1'] + '</td>';
        cols += '<td>' + value['srp1'] + '</td>';
        cols += '<td>' + 0 + '</td>';
        cols += '<td><button type="submit" class="btn btn-primary">Adicionar</button></td>';
        newRow.append(cols);
        $("#products-table").append(newRow);
    }

    $(".clickable-tr").click(function() {
        window.location = $(this).data("href");
    });

});

