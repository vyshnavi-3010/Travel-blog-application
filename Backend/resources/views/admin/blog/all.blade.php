@extends('layouts.admin')
@section('content')
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    {{ $site->site_name }}</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Blog</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Secondary button-->
                <!--end::Primary button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->

        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <form action="" method="get">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" data-kt-ecommerce-product-filter="search" name="search"
                                    class="form-control form-control-solid w-250px ps-12" placeholder="Search Blog" />
                            </div>
                            <!--end::Search-->
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative m-1">
                                <div class="w-100 mw-150px">
                                    <!--begin::Select2-->
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-hide-search="true" name="status" data-placeholder="Select Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select Status</option>
                                        <option value="Show">Show</option>
                                        <option value="Hide">Hide</option>
                                    </select>
                                    <!--end::Select2-->
                                </div>
                            </div>
                            <!--end::Search-->
                    </form>
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5 ml-2">
                    {{-- <div class="w-100 mw-150px">
                                <!--begin::Select2-->
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="status"
                                    data-placeholder="Status" data-kt-ecommerce-product-filter="status">
                                    <option value="">Select Status</option>
                                    <option value="Show">Show</option>
                                    <option value="Hide">Hide</option>

                                </select>
                                <!--end::Select2-->
                            </div> --}}
                    <!--begin::Add product-->
                    <a href="{{ route('blog.create') }}" class="btn btn-primary">Add Blog</a>
                    <!--end::Add product-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                    <thead>
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">

                            <th class="min-w-200px">Blog Title</th>
                            <th class=" min-w-70px">Author</th>
                            <th class="min-w-100px">Image</th>
                            <th class=" min-w-100px">Status</th>
                            <th class="min-w-70px">Edit</th>
                            <th class="min-w-70px">Delete</th>
                        </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                        @foreach ($data as $blog)
                            <tr>

                                <td>
                                    <div class="d-flex align-items-center">

                                        <div class="ms-5">
                                            <!--begin::Title-->
                                            <a href="{{ route('blog.edit', $blog->id) }}"
                                                class="text-gray-800 text-hover-primary fs-5 fw-bold"
                                                data-kt-ecommerce-product-filter="product_name">{{ $blog->title }} </a>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                </td>

                                <td class=" pe-0" data-order="21">
                                    <span class="fw-bold ms-3">{{ ucwords($blog->author) }} </span>
                                </td>
                                <td class=" pe-0">
                                    <a href="{{ route('blog.edit', $blog->id) }}" class="symbol symbol-50px">
                                        <span class="symbol-label"> <img src="{{ asset($blog->thumbnail) }}" alt="image"
                                                width="50" height="50"></span>
                                    </a>
                                </td>

                                <td class="pe-0" data-order="Published">
                                    @if ($blog->status == 'Show')
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-success">{{ ucwords($blog->status) }} </div>
                                        <!--end::Badges-->
                                    @else
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">{{ ucwords($blog->status) }} </div>
                                    @endif
                                    <!--end::Badges-->
                                </td>

                                <td class=" pe-0" data-order="Published">
                                    <a href="{{ route('blog.edit', $blog->id) }}" class="menu-link px-3"
                                        data-kt-ecommerce-product-filter="delete_row"><button
                                            class="btn btn-primary">Edit</button></a>
                                </td>
                                <td class=" pe-0" data-order="Published">
                                    <button type="submit" class="btn btn-danger" onclick="deleteBlog(this.id)"
                                        id="{{ $blog->id }}">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
            <div class="frame-wrap">
                {{ $data->appends(request()->input())->links() }}
            </div>
        </div>
        <!--end::Products-->
    </div>
    <!--end::Content container-->
    </div>
    <!--end::Content-->
    <script>
        function deleteBlog(value) {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                $.ajax({
                    type: 'get',
                    url: "{{ url('admin/blog/delete') }}/" + value,
                    success() {
                        location.reload();

                    }


                });
            else
                return false;
        }
    </script>
@endsection
