 $(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure to delete this?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href=link;
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    });
});
 $(function(){
    $(document).on('click','#confirm',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure to confirm?',
            text: "Once confirm, You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, confirm it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href=link;
                Swal.fire(
                    'Confirm!',
                    'Confirm Changes.',
                    'success'
                )
            }
        })
    });
});
 $(function(){
    $(document).on('click','#processing',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure to process?',
            text: "Once confirm, You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, confirm it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href=link;
                Swal.fire(
                    'Confirm!',
                    'Confirm Changes.',
                    'success'
                )
            }
        })
    });
});
 $(function(){
    $(document).on('click','#picked',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure to pick?',
            text: "Once picked, You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, pick it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href=link;
                Swal.fire(
                    'Picked!',
                    'Picked Changes.',
                    'success'
                )
            }
        })
    });
});
 $(function(){
    $(document).on('click','#shipped',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure to ship?',
            text: "Once shipped, You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, ship it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href=link;
                Swal.fire(
                    'Shipped!',
                    'Shipped Changes.',
                    'success'
                )
            }
        })
    });
});
 $(function(){
    $(document).on('click','#delivered',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure to deliver?',
            text: "Once delivered, You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, deliver it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href=link;
                Swal.fire(
                    'Delivered!',
                    'Delivered Changes.',
                    'success'
                )
            }
        })
    });
});
 $(function(){
    $(document).on('click','#cancel',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure to cancel?',
            text: "Once delivered, You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, cancel it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href=link;
                Swal.fire(
                    'Cancelled!',
                    'Cancelled Changes.',
                    'success'
                )
            }
        })
    });
});
