<!doctype html>
<html lang="en">
<head>
    <title>Problem 1</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .btn-add-row {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            line-height: 1;
            color: #fff;
            background-color: #000;
            border: 0;
        }
    </style>
</head>
<body>
<div>
    <a href="{{ route('problem_1') }}" class="btn btn-success">Problem 1</a>
    <a href="{{ route('problem_2') }}" class="btn btn-info">Problem 2</a>
</div>

<div class="container my5 py-5">
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    <div class="row">
        <div class="col-12">
            <form method="post" action="{{ route('order.store') }}">
                @csrf
                <table id="table_1" class="border-0">
                    <tbody>
                    <tr class="data-row">
                        <td class="p-2">
                            <input type="number" min="1" name="quantity[]" placeholder="Quantity"
                                   class="form-control quantity" required>
                        </td>
                        <td class="p-2">
                            <input type="text" name="unit_price[]" id="unit_price" placeholder="Unit Price"
                                   class="form-control unit_price" required>
                        </td>
                        <td class="p-2">
                            <span>=</span>
                        </td>
                        <td class="p-2">
                            <input type="text" name="total_price[]" id="total_price" placeholder="Total Price"
                                   class="form-control total_price" readonly>
                        </td>
                        <td class="p-2">
                            <button type="button" class="btn-add-row">+</button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td class="p-2" colspan="1">
                            <input type="text" name="grand_total" id="grand_total" placeholder="Grand Total Price"
                                   class="form-control" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-center my-2">
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </td>
                    </tr>
                    </tbody>

                </table>
            </form>

        </div>
    </div>
</div>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    $('.btn-add-row').on('click', function () {
        addRow();
    });

    function addRow() {
        var tr = '<tr class="data-row">' +
            '<td class="p-2"> <input type="number" min="1" name="quantity[]" placeholder="Quantity" class="form-control quantity" required> </td>' +
            '<td class="p-2"> <input type="text" name="unit_price[]" placeholder="Unit Price" class="form-control unit_price" required></td>' +
            '<td class="p-2"> <span>=</span></td>' +
            '<td class="p-2"> <input type="text" name="total_price[]" placeholder="Total Price" class="form-control total_price" readonly> </td>' +
            '<td class="p-2"> <button type="button" class="btn-add-row remove">-</button></td>' +
            '</tr>';

        $('#table_1 tr:nth-last-child(2)').before(tr);
    };

    $(document).on('click','.remove', function () {
        $(this).closest('tr.data-row').remove();
        $('.unit_price').each(function () {
            let total_price = 0;
            let grand_total = 0;
            let price = $(this).val();
            let quantity = $(this).closest('tr.data-row').find('.quantity').val();
            if (quantity > 0) {
                if (price !== "" && price > 0) {
                    total_price = quantity * parseFloat(price);
                    if (total_price > 0) {
                        $(this).closest('tr.data-row').find('.total_price').val(total_price);
                    } else {
                        $(this).closest('tr.data-row').find('.total_price').val(0);
                    }

                    $('.total_price').each(function () {
                        let new_price = $(this).val();
                        grand_total += parseFloat(new_price);
                    });
                    $('#grand_total').val(grand_total);
                }
            }
        });
    });
</script>
<script>
    $(document).on('keyup', '.unit_price', function () {

        $('.unit_price').each(function () {
            let total_price = 0;
            let grand_total = 0;
            let price = $(this).val();
            let quantity = $(this).closest('tr.data-row').find('.quantity').val();
            if (quantity > 0) {
                if (price !== "" && price > 0) {
                    total_price = quantity * parseFloat(price);
                    if (total_price > 0) {
                        $(this).closest('tr.data-row').find('.total_price').val(total_price);
                    } else {
                        $(this).closest('tr.data-row').find('.total_price').val(0);
                    }

                    $('.total_price').each(function () {
                        let new_price = $(this).val();
                        grand_total += parseFloat(new_price);
                    });
                    $('#grand_total').val(grand_total);
                }
            }
        });

    });
    $(document).on('keyup', '.quantity', function () {
        $('.quantity').each(function () {
            let total_price = 0;
            let grand_total = 0;
            let quantity = $(this).val();
            let unit_price = $(this).closest('tr.data-row').find('.unit_price').val();
            if (quantity !== "" && quantity > 0) {
                total_price = quantity * parseFloat(unit_price);
                if (total_price > 0) {
                    $(this).closest('tr.data-row').find('.total_price').val(total_price);
                } else {
                    $(this).closest('tr.data-row').find('.total_price').val(0);
                }

                $('.total_price').each(function () {
                    let new_price = $(this).val();
                    grand_total += parseFloat(new_price);
                });
                $('#grand_total').val(grand_total);
            }

        });


    });
    $(document).on('change', '.quantity', function () {
        $('.quantity').each(function () {
            let total_price = 0;
            let grand_total = 0;
            let quantity = $(this).val();
            let unit_price = $(this).closest('tr.data-row').find('.unit_price').val();
            if (quantity !== "" && quantity > 0) {
                total_price = quantity * parseFloat(unit_price);
                if (total_price > 0) {
                    $(this).closest('tr.data-row').find('.total_price').val(total_price);
                } else {
                    $(this).closest('tr.data-row').find('.total_price').val(0);
                }

                $('.total_price').each(function () {
                    let new_price = $(this).val();
                    grand_total += parseFloat(new_price);
                });
                $('#grand_total').val(grand_total);
            }

        });


    })
</script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>
</html>