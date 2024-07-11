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
                    <li class="breadcrumb-item text-muted">Dashboard</li>
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
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <!--begin::Row-->
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10 mt-3 ">
                {{-- <div class="col-md-5 col-lg-5 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10 m-2"
                    style="background-color: rgb(191, 225, 235);height:80px">
                    <a href="{{ route('company.index') }}">

                        <div class="row">
                            <div class="col-7">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Amount-->
                                        <span
                                            class="fs-2hx fw-bold  text-dark me-2 lh-1 ls-n2">{{ $data['totalCompanies'] }}</span>
                                        <!--end::Amount-->
                                        <!--begin::Subtitle-->
                                        <span class="text-gray-700 pt-1 fw-semibold fs-6">Total Companies</span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                            </div>
                            <div class="col-5">
                                <div class="card-header pt-5" style="float:right">
                                    <i class="fa fa-box fa-2xl" style="font-size: 4rem"></i>
                                </div>
                            </div>
                        </div>
                    </a>



                </div>
                <div class="col-md-5 col-lg-5 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10 m-2 "
                    style="background-color: rgb(197, 242, 199);height:80px">
                    <a href="{{ route('client.index') }}">
                        <div class="row">

                            <div class="col-7">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->

                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Amount-->
                                        <span
                                            class="fs-2hx fw-bold  text-dark me-2 lh-1 ls-n2">{{ $data['totalClients'] }}</span>
                                        <!--end::Amount-->
                                        <!--begin::Subtitle-->
                                        <span class="text-gray-700 pt-1 fw-semibold fs-6">Total Clients</span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                            </div>
                            <div class="col-5">
                                <div class="card-header pt-5" style="float:right">
                                    <i class="fa fa-box fa-2xl" style="font-size: 4rem"></i>
                                </div>
                            </div>
                        </div>
                    </a>



                </div>
                <div class="col-md-5 col-lg-5 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10 m-2 "
                    style="background-color: rgb(244, 195, 248);height:80px">
                    <a href="{{ route('products.index') }}">
                        <div class="row">
                            <div class="col-7">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Amount-->
                                        <span
                                            class="fs-2hx fw-bold  text-dark me-2 lh-1 ls-n2">{{ $data['totalProducts'] }}</span>
                                        <!--end::Amount-->
                                        <!--begin::Subtitle-->
                                        <span class="text-gray-700 pt-1 fw-semibold fs-6">Total Products</span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                            </div>
                            <div class="col-5">
                                <div class="card-header pt-5" style="float:right">
                                    <i class="fa fa-box fa-2xl" style="font-size: 4rem"></i>
                                </div>
                            </div>
                        </div>
                    </a>

                </div> --}}

            </div>

        </div>
        <!--end::Content container-->
    </div>
@endsection
