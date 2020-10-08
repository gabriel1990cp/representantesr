$(document).ready(function () {

    $('.btn-add-product').click(function () {

        var amount = $(this).closest("tr").find(".amount").val();

        alert(amount);

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: JSON.stringify({amount: amount}),
            url: 'addProduct',
            success: function (retorno) {

            },
            error: function (error) {
                alert(error);
            }
        });
    });
});

