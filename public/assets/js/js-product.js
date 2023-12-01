// get Delete Product
$(document).on('click', '.btn-delete', function (){
    // get data from button delete
    const id = $(this).data('id');
    const kodevoucher = $(this).data('kodevoucher');
    // Set data to Form Delete
    $('.productID').val(id);
    $('.modal-body #codeVoucer').val(kodevoucher);
});

// get Update Product
$(document).on('click', '.btn-update', function (){
    // get data from button update
    const id = $(this).data('id');
    const desc = $(this).data('desc');
    const productcode = $(this).data('productcode');
    const kodevoucher = $(this).data('kodevoucher');
    const sn= $(this).data('sn');
    const status = $(this).data('status');
    // Set data to Form update
    $('.modal-body #productIdU').val(id);
    $('.modal-body #productDescU').val(desc);
    $('.modal-body #productCodeU').val(productcode);
    $('.modal-body #codeVoucerU').val(kodevoucher);
    $('.modal-body #snU').val(sn);
    $('.modal-body #statusU').val(status);
});