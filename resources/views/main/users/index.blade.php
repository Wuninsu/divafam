@extends('layouts.main')

@section('content')
<div class="">
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
        </ol>
    </nav>
    <h2 class="text-bold text-body-emphasis mb-5">Users</h2>
    <div id="members"
        data-list="{&quot;valueNames&quot;:[&quot;customer&quot;,&quot;email&quot;,&quot;mobile_number&quot;,&quot;city&quot;,&quot;last_active&quot;,&quot;joined&quot;],&quot;page&quot;:10,&quot;pagination&quot;:true}">
        <div class="row align-items-center justify-content-between g-3 mb-4">
            <div class="col col-auto">
                <div class="search-box">
                    <form class="position-relative"><input class="form-control search-input search" type="search"
                            placeholder="Search members" aria-label="Search">
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
            </div>
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <button class="btn btn-link text-body me-4 px-0">
                        <span class="fa-solid fa-file-export fs-9 me-2"></span> Export
                    </button>
                    <a href="{{route('users.create')}}" class="btn btn-primary">
                        <span class="fas fa-plus me-2"></span>
                        Add user
                    </a>
                </div>
            </div>
        </div>
        <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-body-emphasis border-y mt-2 position-relative top-1">
            <div class="table-responsive scrollbar ms-n1 ps-1">
                <table class="table table-sm fs-9 mb-0">
                    <thead>
                        <tr>
                            <th class="white-space-nowrap fs-9 align-middle ps-0">
                                <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                        id="checkbox-bulk-members-select" type="checkbox"
                                        data-bulk-select="{&quot;body&quot;:&quot;members-table-body&quot;}"></div>
                            </th>
                            <th class="sort align-middle" scope="col" data-sort="customer"
                                style="width:15%; min-width:200px;">CUSTOMER</th>
                            <th class="sort align-middle" scope="col" data-sort="email"
                                style="width:15%; min-width:200px;">EMAIL</th>
                            <th class="sort align-middle pe-3" scope="col" data-sort="mobile_number"
                                style="width:20%; min-width:200px;">MOBILE NUMBER</th>
                            <th class="sort align-middle" scope="col" data-sort="city" style="width:10%;">CITY</th>
                            <th class="sort align-middle text-end" scope="col" data-sort="last_active"
                                style="width:21%;  min-width:200px;">LAST ACTIVE</th>
                            <th class="sort align-middle text-end pe-0" scope="col" data-sort="joined"
                                style="width:19%;  min-width:200px;">JOINED</th>
                        </tr>
                    </thead>
                    <tbody class="list" id="members-table-body">
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                            <td class="fs-9 align-middle ps-0 py-3">
                                <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox"
                                        data-bulk-select-row="{&quot;customer&quot;:{&quot;avatar&quot;:&quot;/team/32.webp&quot;,&quot;name&quot;:&quot;Carry Anna&quot;},&quot;email&quot;:&quot;annac34@gmail.com&quot;,&quot;mobile&quot;:&quot;+912346578&quot;,&quot;city&quot;:&quot;Budapest&quot;,&quot;lastActive&quot;:&quot;34 min ago&quot;,&quot;joined&quot;:&quot;Dec 12, 12:56 PM&quot;}">
                                </div>
                            </td>
                            <td class="customer align-middle white-space-nowrap"><a
                                    class="d-flex align-items-center text-body text-hover-1000" href="#!">
                                    <div class="avatar avatar-m"><img class="rounded-circle"
                                            src="../assets/img/team/32.webp" alt=""></div>
                                    <h6 class="mb-0 ms-3 fw-semibold">Carry Anna</h6>
                                </a></td>
                            <td class="email align-middle white-space-nowrap"><a class="fw-semibold"
                                    href="mailto:annac34@gmail.com">annac34@gmail.com</a></td>
                            <td class="mobile_number align-middle white-space-nowrap"><a
                                    class="fw-bold text-body-emphasis" href="tel:+912346578">+912346578</a></td>
                            <td class="city align-middle white-space-nowrap text-body">Budapest</td>
                            <td class="last_active align-middle text-end white-space-nowrap text-body-tertiary">34 min
                                ago</td>
                            <td class="joined align-middle white-space-nowrap text-body-tertiary text-end">Dec 12, 12:56
                                PM</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row align-items-center justify-content-between py-2 pe-0 fs-9">
                <div class="col-auto d-flex">
                    <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info">1 to 10
                        <span class="text-body-tertiary"> Items of </span>15
                    </p><a class="fw-semibold" href="#!" data-list-view="*">View all
                        <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                    </a>
                    <a class="fw-semibold d-none" href="#!" data-list-view="less">View less
                        <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                    </a>
                </div>
                <div class="col-auto d-flex">
                    <button class="page-link disabled" data-list-pagination="prev" disabled=""><span
                            class="fas fa-chevron-left"></span>
                    </button>
                    <ul class="mb-0 pagination">
                        <li class="active"><button class="page" type="button" data-i="1" data-page="10">1</button></li>
                        <li><button class="page" type="button" data-i="2" data-page="10">2</button></li>
                    </ul><button class="page-link pe-0" data-list-pagination="next">
                        <span class="fas fa-chevron-right"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection