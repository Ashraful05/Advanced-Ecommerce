<!DOCTYPE html>
<html lang="en">

@php
    $seo = \App\Models\Seo::find(1);
@endphp
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <meta name="description" content="{{ $seo->meta_description }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="author" content="{{ $seo->meta_author }}">
    <meta name="keywords" content="{{ $seo->meta_keyword }}">
    <meta name="robots" content="all">

    <script>
        {{ $seo->google_analytics }}
    </script>
    <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/bootstrap.min.css">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/main.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/blue.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/owl.transitions.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/rateit.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/bootstrap-select.min.css">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/font-awesome.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu -->

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{ asset('/') }}frontend/assets/js/jquery-1.11.1.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/bootstrap-hover-dropdown.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/echo.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/jquery.easing-1.3.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/bootstrap-slider.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/jquery.rateit.min.js"></script>
<script type="text/javascript" src="{{ asset('/') }}frontend/assets/js/lightbox.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/bootstrap-select.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/wow.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>

<!--Add to Cart Product Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname"></span></strong></h5>
                <button type="button" class="close" id="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img src=" " class="card-img-top"  alt="..." style="height: 200px;width: 200px;" id="pimage">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item">ProductPrice: <strong class="text-danger">$<span id="pprice"></span></strong>
                                <del id="oldprice">$</del>
                            </li>
                            <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
                            <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
                            <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
                            <li class="list-group-item">Stock: <span id="available" class="badge badge-pill badge-success" style="background: green;color: white;"></span>
                                <span class="badge badge-pill badge-danger" id="stockout" style="background: red;color: white;"></span></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" id="colorArea">
                            <label for="color">Choose Color: </label>
                            <select class="form-control" id="color" name="color">
                                <option>1</option>
                            </select>
                        </div>
                        <div class="form-group" id="sizeArea">
                            <label for="size">Choose Size: </label>
                            <select class="form-control" id="size" name="size">
                                <option>1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity: </label>
                            <input type="number" class="form-control" id="quantity" value="1" min="1">
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="product_id">
                            <button type="submit" class="btn btn-primary" onclick="addToCart()">Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
    function productView(id)
    {
        // alert(id);
        $.ajax({
            type:'get',
            url:'http://localhost/Advanced-Ecommerce/public/product-view-modal/'+id,
            dataType:'json',
            success:function(response)
            {
                // console.log(response);
                $("#pname").text(response.product.product_name_english);
                $("#price").text(response.product.selling_price);
                $("#pcode").text(response.product.product_code);
                $("#pcategory").text(response.product.category.category_name_english);
                $("#pbrand").text(response.product.brand.brand_name_english);
                $("#pimage").attr('src','http://localhost/Advanced-Ecommerce/public/'+response.product.product_thumbnail);
                $("#product_id").val(id);
                $("#quantity").val(1);

                //product price....
                if(response.product.discount_price==null){
                    $("#pprice").text('');
                    $("#oldprice").text('');
                    $("#pprice").text(response.product.selling_price);
                }else{
                    $("#pprice").text(response.product.discount_price);
                    $("#oldprice").text(response.product.selling_price);
                }

                //product stock....
                if(response.product.product_quantity > 0)
                {
                    $("#available").text('');
                    $("#stockout").text('');
                    $('#available').text('available');
                }else{
                    $("#available").text('');
                    $("#stockout").text('');
                    $("#stockout").text('stockout');
                }
                //color
                $('select[name="color"]').empty();
                $.each(response.color,function(key,value){
                    $('select[name="color"]').append('<option value=" '+value+' ">'+value+'</option>')
                    if(response.color== ""){
                        $("#colorArea").hide();
                    }else{
                        $("#colorArea").show();
                    }
                })

                //size
                $('select[name="size"]').empty();
                $.each(response.size,function(key,value){
                    $('select[name="size"]').append('<option value=" '+value+' ">'+value+'</option>')
                    if(response.size == ""){
                        $("#sizeArea").hide();
                    }else{
                        $("#sizeArea").show();
                    }
                })
            },
            error:function(error)
            {
                alert(error);
            }
        })
    }
    // end product view modal

    //Start add to cart product...
    function addToCart()
    {
        var product_name = $('#pname').text();
        var id = $('#product_id').val();
        var color = $('#color option:selected').text();
        var size = $('#size option:selected').text();
        var quantity = $('#quantity').val();
        $.ajax({
            type:"POST",
            datatype:"json",
            data:{
                color:color, size:size, quantity:quantity, product_name:product_name
            },
            url:"http://localhost/Advanced-Ecommerce/public/cart/data/store/"+id,
            success:function(data){
                miniCart()
                $("#closeModal").click();
                //start message...
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if($.isEmptyObject(data.error)){
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    });
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    });
                }
                //end message...
                console.log(data);
            },
            error:function(){

            }
        });
    }

</script>

<script>
    function miniCart()
    {
        $.ajax({
            type:"GET",
            url:"http://localhost/Advanced-Ecommerce/public/product-mini-cart",
            dataType:"JSON",
            success:function(response){
                $('span[id="cartSubTotal"]').text(response.cartTotal);
                $("#cartQuantity").text(response.cartQuantity);
                var miniCart = ""
                $.each(response.carts, function(key,value){
                    miniCart += `<div class="cart-item product-summary">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="image"> <a href="detail.html"><img src="http://localhost/Advanced-Ecommerce/public/${value.options.image}" alt=""></a> </div>
                            </div>
                            <div class="col-xs-7">
                                <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                                <div class="price">${value.price} * ${value.qty} </div>
                            </div>
                            <div class="col-xs-1 action">
                                <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- /.cart-item -->
                    <div class="clearfix"></div>
                    <hr>`
                });
                $("#miniCart").html(miniCart);
                // console.log(response);
            },
            error:function(error){
                alert(error);
            }
        })
    }
    miniCart();//takbe na remove korbo

    //mini cart remove start...
    function miniCartRemove(rowId)
    {
        $.ajax({
            type:"GET",
            url:"http://localhost/Advanced-Ecommerce/public/minicart-product-remove/"+rowId,
            dataType:'json',
            success:function(data){
                miniCart();

                //start message..
                const Toast = Swal.mixin({
                    toast:true,
                    position:'top-end',
                    icon:'success',
                    showConfirmButton:false,
                    timer:3000
                })
                if($.isEmptyObject(data.error)){
                    Toast.fire({
                        type:'success',
                        title:data.success
                    })
                }else{
                    Toast.fire({
                        type:'error',
                        title:data.error
                    })
                }
            }
        });
    }
    //mini cart remove end....

</script>

{{--//add to wishlist start....--}}
<script>
    function addToWishList(product_id)
    {
        $.ajax({
            type:'POST',
            dataType:'json',
            url:'http://localhost/Advanced-Ecommerce/public/add-to-wishlist/'+product_id,
            success:function(data)
            {
                //start message..
                const Toast = Swal.mixin({
                    toast:true,
                    position:'top-end',
                    showConfirmButton:false,
                    timer:3000
                })
                if($.isEmptyObject(data.error)){
                    Toast.fire({
                        type:'success',
                        icon:'success',
                        title:data.success
                    })
                }else{
                    Toast.fire({
                        type:'error',
                        icon:'error',
                        title:data.error
                    })
                }
            },
            error:function(error)
            {
                // alert(error);
            }
        });
    }
</script>
{{--//add to wishlist end....--}}

{{--//view wishlist data start....--}}
<script>
    function wishlist()
    {
        $.ajax({
            type:"GET",
            url:"http://localhost/Advanced-Ecommerce/public/user/get-wishlist-product",
            dataType:"JSON",
            success:function(response){
                var rows = ""
                $.each(response, function(key,value){
                    rows += `<tr>
                                    <td class="col-md-2"><img src="http://localhost/Advanced-Ecommerce/public/${value.product.product_thumbnail}" alt="imga"></td>
                                    <td class="col-md-7">
                                        <div class="product-name"><a href="#">${value.product.product_name_english}</a></div>

                                        <div class="price">
                                            ${value.product.discount_price == null
                        ? `${value.product.selling_price}`
                        : `${value.product.discount_price} <span>${value.product.selling_price}</span>`
                    }
                                        </div>
                                    </td>
                                    <td class="col-md-2">
                                       <button class="btn btn-primary cart-btn" id="${value.product_id}" type="button"
                                       data-toggle="modal" data-target="#exampleModal" onclick="productView(this.id)"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
                                    </td>
                                    <td class="col-md-1 close-btn">
                                        <button type="submit" id="${value.id}" onclick="wishlistRemove(this.id)" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>
                    <hr>`
                });
                $("#wishlist").html(rows);
                // console.log(response);
            },
            error:function(error){
                // alert(error);
            }
        })
    }
    wishlist();
</script>
{{--//view wishlist data end...--}}

{{--wishlist remove function start.....--}}

<script>
    function wishlistRemove(id)
    {
        $.ajax({
            type:"GET",
            url:"http://localhost/Advanced-Ecommerce/public/user/wishlist-remove/"+id,
            dataType:"JSON",
            success:function(response){
                wishlist();
                //start message..
                const Toast = Swal.mixin({
                    toast:true,
                    position:'top-end',
                    showConfirmButton:false,
                    timer:3000
                })
                if($.isEmptyObject(response.error)){
                    Toast.fire({
                        type:'success',
                        icon:'success',
                        title:response.success
                    })
                }else{
                    Toast.fire({
                        type:'error',
                        icon:'error',
                        title:response.error
                    })
                }
            }
        });
    }
    // wishlistRemove();
</script>

{{--wishlist remove function end....--}}

{{--load my cart start--}}
<script>
    function cart()
    {
        $.ajax({
            type:"GET",
            url:"http://localhost/Advanced-Ecommerce/public/user/get-cart-product",
            dataType:"JSON",
            success:function(response){
                var rows = ""
                $.each(response.carts, function(key,value){
                    rows += `<tr>
                                    <td class="col-md-2"><img src="http://localhost/Advanced-Ecommerce/public/${value.options.image}" alt="imga" style="height: 60px;width: 60px;"></td>
                                    <td class="col-md-2">
                                        <div class="product-name"><a href="#">${value.name}</a></div>

                                        <div class="price">
                                            ${value.price}
                                        </div>
                                    </td>
                                    <td class="col-md-2">
                                        <strong >${value.options.color}</strong>
                                    </td>
                                    <td class="col-md-2">
                                        ${ value.options.size==null
                        ?`<span>.........</span>`
                        : `<strong>${value.options.size}</strong>`
                    }
                                    </td>
                                    <td class="col-md-2">

                                        <button class="btn btn-success btn-sm" type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)">+</button>
                                        <input type="text" value="${value.qty}" min="1" max="100" disabled style="width: 25px;">
                                         ${ value.qty > 1
                                                ?`<button class="btn btn-danger btn-sm" type="submit" id="${value.rowId}" onclick="cartDecrement(this.id)">-</button>`
                                                :`<button class="btn btn-danger btn-sm" type="submit" disabled>-</button>`
                                            }

                                    </td>
                                    <td class="col-md-2">
                                        <strong>$ ${value.subtotal}</strong>
                                    </td>
                                    <td class="col-md-1 close-btn">
                                        <button type="submit" id="${value.rowId}" onclick="cartRemove(this.id)" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                    </td>

                                </tr>
                    <hr>`
                });
                $("#cartPage").html(rows);
                // console.log(response);
            },
            error:function(error){
                // alert(error);
            }
        })
    }
    cart();
</script>

<script>
    function cartRemove(rowId)
    {
        $.ajax({
            type:"GET",
            url:"http://localhost/Advanced-Ecommerce/public/user/cart-remove/"+rowId,
            dataType:"JSON",
            success:function(response){
                couponCalculation();
                cart();
                miniCart();
                $("#couponField").show();
                $("#coupon_name").val('');
                //start message..
                const Toast = Swal.mixin({
                    toast:true,
                    position:'top-end',
                    showConfirmButton:false,
                    timer:3000
                })
                if($.isEmptyObject(response.error)){
                    Toast.fire({
                        type:'success',
                        icon:'success',
                        title:response.success
                    })
                }else{
                    Toast.fire({
                        type:'error',
                        icon:'error',
                        title:response.error
                    })
                }
            }
        });
    }
    // cartRemove();
</script>//ami bolci toke function gulo dekacii konta konta remove korbo ektu bole de...

{{--load my cart end--}}

{{--//cart increment && decrement function...--}}
<script>
    function cartIncrement(rowId)
    {
        $.ajax({
            type:'get',
            url:'http://localhost/Advanced-Ecommerce/public/cart-increment/'+rowId,
            dataType:"JSON",
            success:function(response){
                couponCalculation();
                cart();
                miniCart();
            },
            error:function(error){
                // alert(error);
            }
        });
    }
    function cartDecrement(rowId)
    {
        $.ajax({
            type:"GET",
            url:"http://localhost/Advanced-Ecommerce/public/cart-decrement/"+rowId,
            dataType:"JSON",
            success:function(response) {
                couponCalculation();
                cart();
                miniCart();
            },
            error:function(error){
                // alert(error);
            }
        });
    }
</script>
{{--end increment && decrement function..........--}}

{{--apply coupon start..........--}}
<script>
    function applyCoupon()
    {
        var coupon_name = $("#coupon_name").val();
        $.ajax({
            type:"post",
            dataType:"JSON",
            data:{coupon_name:coupon_name},
            url:"http://localhost/Advanced-Ecommerce/public/apply-coupon",
            success:function(response){
                //start message..
                couponCalculation();
                if(response.validity==true){
                    $("#couponField").hide();
                }
                const Toast = Swal.mixin({
                    toast:true,
                    position:'top-end',
                    showConfirmButton:false,
                    timer:3000
                })
                if($.isEmptyObject(response.error)){
                    Toast.fire({
                        type:'success',
                        icon:'success',
                        title:response.success
                    })
                }else{
                    Toast.fire({
                        type:'error',
                        icon:'error',
                        title:response.error
                    })
                }
            },
            error:function(error){
                // alert(error);
            }
        })
    }
    // applyCoupon();
</script>
{{--apply coupon end....--}}

{{--coupon call--}}
<script>
    function couponCalculation()
    {
        $.ajax({
           type:"GET",
            url:"http://localhost/Advanced-Ecommerce/public/coupon-calculation",
            dataType:"JSON",
            success:function(response){
                if(response.total){
                    $("#couponCalCulatedField").html(
                        `<tr>
                            <th>
                                <div class="cart-sub-total">
                                    Subtotal<span class="inner-left-md">$ ${response.total}</span>
                                </div>
                                <div class="cart-grand-total">
                                    Grand Total<span class="inner-left-md">$ ${response.total}</span>
                                </div>
                            </th>
                        </tr>`
                    )
                }else{
                    $("#couponCalCulatedField").html(
                        `<tr>
                            <th>
                                <div class="cart-sub-total">
                                    Subtotal<span class="inner-left-md">$ ${response.subtotal}</span>
                                </div>
                                <div class="cart-sub-total">
                                    Coupon<span class="inner-left-md">$ ${response.coupon_name}</span>
                                    <button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i></button>
                                </div>
                                <div class="cart-sub-total">
                                    Discount Amount<span class="inner-left-md">$ ${response.discount_amount}</span>
                                </div>
                                <div class="cart-grand-total">
                                    Grand Total<span class="inner-left-md">$ ${response.total_amount}</span>
                                </div>
                            </th>
                        </tr>`
                    )
                }
            },
            error:function(error)
            {
                // alert(error);
            }
        });
    }
    couponCalculation();
</script>

<script>
    function couponRemove()
    {
        $.ajax({
           type:"GET",
           url:"http://localhost/Advanced-Ecommerce/public/coupon-remove",
            dataType:"JSON",
            success:function(data)
            {
                couponCalculation();
                $("#couponField").show();
                $("#coupon_name").val('');

                const Toast = Swal.mixin({
                    toast:true,
                    position:'top-end',
                    showConfirmButton:false,
                    timer:3000
                })
                if($.isEmptyObject(data.error)){
                    Toast.fire({
                        type:'success',
                        icon:'success',
                        title:data.success
                    })
                }else{
                    Toast.fire({
                        type:'error',
                        icon:'error',
                        title:data.error
                    })
                }
            },
            error:function(error)
            {

            }
        });
    }
    // couponRemove();
</script>

<script>
    $("body").on("keyup","#search",function(){
        let text = $("#search").val();
        // console.log(text);
        if(text.length > 0)
        {
            $.ajax({
                data: {search : text},
                url: "http://localhost/Advanced-Ecommerce/public/search-product",
                method: "POST",
                beforSend: function(request){
                    return request.setRequestHeader('X-CSRF-TOKEN',("meta[name = 'csrf-token' ]"))
                },
                success:function(result){
                    $("#searchProduct").html(result);
                },


            });
        }
        if(text.length < 1)
        {
            $("#searchProduct").html("");
        }

    });
</script>


</body>
</html>
