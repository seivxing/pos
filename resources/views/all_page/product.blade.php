@extends('layout.app')
@extends('layout.navbar-sidebar')

@section('title', 'Products')
@section('content')
    <h1>Products Page</h1>
    @include('all_page.delete-model')
    <a href="{{ route('products.create') }}" class="btn btn-primary "style="float:right;">Create Products</a>
    <br>
    @include('message.message')
    <table class="table table-hover align-middle mt-2 mb-0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Barcode</th>
                <th>Price</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <img src="{{ Storage::url($product->image) }}" alt="" width="100">
                    </td>
                    <td>{{ $product->barcode }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <span class="right text-white badge-{{ $product->status ? 'success' : 'danger' }}">
                            {{ $product->status ? 'Active' : 'InActve' }}
                        </span>
                    </td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->updated_at }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-primary"><i class="fa fa-pencil"
                                aria-hidden="true"></i></a>
                        <button type="button" class="btn btn-sm btn-danger btn-deleteuser" data-bs-toggle="modal"
                            data-bs-target="#userDelete" value="{{ $product->id }}">Delete</button>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links('pagination::bootstrap-4') }}
@endsection

@section('js')
    {{-- <script>
        $(document).ready(function() {

            $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

            $(document).on('click', '.btn-delete', function(e) {
                e.preventDefault();
                var proid = $(this).val();
                $('#proid').val(proid);

                // const swalWithBootstrapButtons = Swal.mixin({
                //     customClass: {
                //         confirmButton: "btn btn-success",
                //         cancelButton: "btn btn-danger"
                //     },
                //     buttonsStyling: false
                // });
                // swalWithBootstrapButtons.fire({
                //     title: "Are you sure?",
                //     text: "You won't be able to revert this!",
                //     icon: "warning",
                //     showCancelButton: true,
                //     confirmButtonText: "Yes, delete it!",
                //     cancelButtonText: "No, cancel!",
                //     reverseButtons: true
                // }).then((result) => {
                //     if (result.value) {
                //         $.post($this.data('url'), {
                //                 _method: 'DELETE',
                //                 _token: '{{ csrf_token() }}'
                //             },
                //             function(res) {
                //                 $this.closest('tr').fadeOut(500, fuction() {
                //                     $(this).remove();
                //                 })
                //             })
                //     }
                // })
            })

        })
    </script> --}}
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $(document).on("click", ".btn-deleteuser", function(e) {
                e.preventDefault();
                var userId = $(this).val();
                $('#userID').val(userId);
                console.log(userId);
            });

        });
    </script>
@endsection
