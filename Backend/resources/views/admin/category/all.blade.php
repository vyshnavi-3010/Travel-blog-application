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
                        <a href="{{ url('/admin/dashboard') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Category</li>
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
                    <!--begin::Card title-->
                    <form action="">
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" data-kt-ecommerce-product-filter="search" name="search"
                                    value="{{ request('search') }}" class="form-control form-control-solid w-250px ps-12"
                                    placeholder="Search Category" />

                            </div>
                            <div class="mx-2">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                            <!--end::Search-->
                        </div>
                    </form>
                    <!--end::Card title-->
                    <div>
                        <a href="{{ route('category.index') }}">
                            <button class="btn btn-info">Clear</button>
                        </a>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">

                        <!--begin::Add product-->
                        <!--begin::Add user-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_add_user">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                        transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Add Category
                        </button>
                        <!--end::Add user-->
                        <!--end::Add product-->
                        <!--begin::Modal - Add task-->
                        <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header" id="kt_modal_add_user_header">
                                        <!--begin::Modal title-->
                                        <h2 class="fw-bold">Add Category</h2>
                                        <!--end::Modal title-->
                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                            data-kt-users-modal-action="close">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                                        rx="1" transform="rotate(-45 6 17.3137)"
                                                        fill="currentColor" />
                                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                        transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Modal header-->
                                    <!--begin::Modal body-->
                                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                        <!--begin::Form-->

                                        <form id="kt_modal_add_user_form" class="form"
                                            action="{{ route('category.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <!--begin::Scroll-->
                                            <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                                data-kt-scroll-activate="{default: false, lg: true}"
                                                data-kt-scroll-max-height="auto"
                                                data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                data-kt-scroll-offset="300px">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-semibold fs-6 mb-2">Name</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="name"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="Name" required />
                                                    <!--end::Input-->
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-semibold fs-6 mb-2">Image</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="file" name="image"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="Name" required />
                                                    <!--end::Input-->
                                                </div>
                                                <!--begin::Input group-->
                                            </div>
                                            <!--end::Scroll-->
                                            <!--begin::Actions-->
                                            <div class="text-center pt-15">
                                                {{-- <button type="reset" class="btn btn-light me-3"
                                                    data-kt-users-modal-action="cancel">Discard</button> --}}
                                                <button type="submit" class="btn btn-primary"
                                                    data-kt-users-modal-action="submit">
                                                    <span class="indicator-label">Submit</span>
                                                    <span class="indicator-progress">Please wait...
                                                        <span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                </button>
                                            </div>
                                            <!--end::Actions-->
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Modal body-->
                                </div>
                                <!--end::Modal content-->
                            </div>
                            <!--end::Modal dialog-->
                        </div>
                        <!--end::Modal - Add task-->
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

                                <th class="min-w-200px">Name</th>
                                <th class="min-w-200px">Language</th>
                                <th class=" min-w-100px">Status</th>
                                <th class=" min-w-100px">Edit</th>
                                <th class=" min-w-70px">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @foreach ($data as $category)
                                <tr>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span>
                                                {{ $category->name }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($category->image) }}" style="width: 80px;height:50px"
                                                alt="">
                                        </div>
                                    </td>
                                    <td class=" pe-0" data-order="Published">
                                        @if ($category->status == 'Show')
                                            <div class="badge badge-light-success">{{ ucwords($category->status) }}
                                            </div>
                                        @else
                                            <div class="badge badge-light-primary">{{ ucwords($category->status) }}
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="menu-item px-3">
                                            <button id="{{ $category->id }}"
                                                class="kt_modal_add_user_edit btn btn-primary">Edit</button>
                                        </div>
                                    </td>
                                    <td class="">
                                        {{-- <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                            @csrf
                                            @method('delete') --}}
                                        <button type="submit" class="btn btn-danger" onclick="deleteCategory(this.id)"
                                            id="{{ $category->id }}">
                                            Delete
                                        </button>
                                        {{-- </form> --}}
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
    <!--begin::Modal - Add task-->
    <div class="modal fade" id="kt_modal_add_user_edit" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_edit_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Edit State</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary-edit" data-kt-users-modal-action="close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->

                    <form id="kt_modal_add_user_edit_form" class="form" action="{{ route('category.update', 0) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                            data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                            data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                            data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Input group-->
                            <input type="hidden" name="id" id="edit_id">

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                    id="edit_name" placeholder="Name" required />
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Image</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="file" name="image" class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="Name" />
                                <!--end::Input-->
                            </div>
                            <div class="mb-7 fv-row">
                                <!--begin::Input group-->
                                <!--begin::Label-->
                                <label class="form-label">Status</label>
                                <!--end::Label-->
                                <!--begin::Select2-->
                                <select class="form-select mb-2" id="edit_status" required name="status">
                                    <option value="Show">Show</option>
                                    <option value="Hide">Hide</option>
                                </select>
                                <!--end::Select2-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            {{-- <button type="reset" class="btn btn-light me-3"
                                data-kt-users-modal-action="cancel">Discard</button> --}}
                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Add task-->
    <!--end::Content-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-active-icon-primary').click(function() {

                $('#kt_modal_add_user').modal('hide');
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-active-icon-primary-edit').click(function() {

                $('#kt_modal_add_user_edit').modal('hide');
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.kt_modal_add_user_edit').click(function() {
                var value = this.id;
                console.log(value);
                $.ajax({
                    type: 'get',
                    url: "{{ url('admin/category') }}/" + value,
                    success(data) {
                        console.log(data);
                        $('#edit_id').val(data.id);
                        $('#edit_name').val(data.name);
                        $('#edit_status').val(data.status);
                        $('#kt_modal_add_user_edit').modal('show');
                    }
                });
            });
        });
    </script>

    <script>
        function deleteCategory(value) {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                $.ajax({
                    type: 'get',
                    url: "{{ url('admin/category/delete') }}/" + value,
                    success() {
                        location.reload();

                    }


                });
            else
                return false;
        }
    </script>
@endsection
