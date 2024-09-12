$(document).ready(function() {

    // Function to update the cart count
    function updateCartCount() {
        $.ajax({
            url: "/cart/count",
            type: 'GET',
            success: function(response) {
                if (response.cart !== undefined) {
                    $('.cart-count').text('(' + response.cart + ')');
                }
            },
            error: function() {
                console.log('Error fetching cart count');
            }
        });
    }

    // Call the function to update the cart count on page load
    updateCartCount();

    // Function to handle Add to Cart
    function bindAddToCart() {
        $('.add-to-cart-btn a').off('click').on('click', function(e) {
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
                        message: xhr.responseJSON ? xhr.responseJSON.error : 'An error occurred.',
                    });
                }
            });
        });
    }

    // Call bindAddToCart on page load to bind the events to current products
    bindAddToCart();

    // Coupon form submit event
    $('#coupon-form').on('submit', function(e) {
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

// AJAX Search and Sorting
    function loadProducts(query = '', sortOption = 'default') {
        $.ajax({
            url: "/products", // Call the combined route
            method: 'GET',
            data: {
                search: query,
                sort: sortOption
            },
            success: function(response) {
                // Update the product grid with the response
                $('#product-grid').html(response);

                // Rebind any dynamic elements (like add to cart) after updating the grid
                bindAddToCart();
            },
            error: function(xhr) {
                iziToast.error({
                    title: '',
                    position: 'topRight',
                    message: 'Error loading products.',
                });
            }
        });
    }

    // Initial load of products
    loadProducts();

    // Event listeners for searching and sorting
    $('#search-query, #sort-options').on('input change', function() {
        var query = $('#search-query').val(); // Get the search query
        var sortOption = $('#sort-options').val(); // Get the current sorting option
        loadProducts(query, sortOption); // Call the load function with search and sort parameters
    });



    // // AJAX Search and Sorting
    // $('#search-query, #sort-options').on('input change', function() {
    //     var query = $('#search-query').val(); // Get the search query
    //     var sortOption = $('#sort-options').val(); // Get the current sorting option
    //
    //     $.ajax({
    //         url: "/products/search", // Define the search route
    //         method: 'GET',
    //         data: {
    //             search: query,
    //             sort: sortOption // Send the sorting option to the server
    //         },
    //         success: function(response) {
    //             // Update the product grid with the response
    //             $('.row.justify-content-center').html(response);
    //
    //             // Rebind the Add to Cart buttons for the new products
    //             bindAddToCart();
    //         },
    //         error: function(xhr) {
    //             iziToast.error({
    //                 title: '',
    //                 position: 'topRight',
    //                 message: 'Error fetching products.',
    //             });
    //         }
    //     });
    // });
});
