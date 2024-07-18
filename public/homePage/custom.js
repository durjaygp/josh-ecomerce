$(document).ready(function() {
    // Function to update the cart count
    function updateCartCount() {
        $.ajax({
            url: "/cart/count",
            type: 'GET',
            success: function(response) {
                if(response.cart !== undefined) {
                    $('.cart-count').text('(' + response.cart + ')');
                }
            },
            error: function() {
              //  console.log('Error fetching cart count');
            }
        });
    }

    // Call the function to update the cart count on page load
    updateCartCount();

    $(document).ready(function() {
        // Add to cart button click event
        $('.add-to-cart-btn a').click(function(e) {
            e.preventDefault();
            var product_id = $(this).data('product-id');
            var quantity = 1; // Set your desired quantity here

            $.ajax({
                url: "/cart/store",
                type: "POST",
                data: {
                    product_id: product_id,
                    quantity: quantity
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        // Update cart count by calling the function
                        updateCartCount();

                        iziToast.success({
                            title: '',
                            position: 'topRight',
                            message: response.success,
                        });
                    } else {
                        iziToast.error({
                            title: '',
                            position: 'topRight',
                            message: response.error,
                        });
                    }
                },
                error: function(xhr) {
                    iziToast.error({
                        title: '',
                        position: 'topRight',
                        message: xhr.responseJSON.error,
                    });
                }
            });
        });
    });

    $(document).ready(function(){
        $('#coupon-form').on('submit', function(e){
            e.preventDefault(); // Prevent the form from submitting the default way
            var couponCode = $('#code').val();

            $.ajax({
                url: "/coupon-apply",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'code': couponCode
                },
                success: function(response) {
                    if (response.success) {
                        iziToast.success({
                            title: '',
                            position: 'topRight',
                            message: response.success,
                        });
                        // You can update the cart or UI as needed here
                    } else {
                        iziToast.error({
                            title: '',
                            position: 'topRight',
                            message: response.error,
                        });
                    }
                },
                error: function(xhr) {
                    iziToast.error({
                        title: '',
                        position: 'topRight',
                        message: xhr.responseJSON ? xhr.responseJSON.error : 'An error occurred.',
                    });
                }
            });
        });
    });



});
