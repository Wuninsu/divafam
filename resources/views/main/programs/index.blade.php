@extends('layouts.main')

@section('content')
<nav class="mb-3" aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
        <li class="breadcrumb-item active">Projects</li>
    </ol>
</nav>
<div class="mb-9">
    <div id="projectSummary"
        data-list="{&quot;valueNames&quot;:[&quot;projectName&quot;,&quot;assignees&quot;,&quot;start&quot;,&quot;deadline&quot;,&quot;task&quot;,&quot;projectprogress&quot;,&quot;status&quot;,&quot;action&quot;],&quot;page&quot;:6,&quot;pagination&quot;:true}">
        <div class="row mb-4 gx-6 gy-3 align-items-center">
            <div class="col-auto">
                <h2 class="mb-0">Projects<span class="fw-normal text-body-tertiary ms-3">(32)</span></h2>
            </div>
            <div class="col-auto"><a class="btn btn-primary px-5" href="{{route('programs.create')}}">
                    <i class="fa-solid fa-plus me-2"></i>Add new project</a></div>
        </div>
        <div class="row g-3 justify-content-between align-items-end mb-4">
            <div class="col-12 col-sm-auto">
                <ul class="nav nav-links mx-n2 project-tab">
                    <li class="nav-item"><a class="nav-link px-2 py-1 active" aria-current="page"
                            href="#"><span>All</span><span class="text-body-tertiary fw-semibold">(32)</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link px-2 py-1" href="#"><span>Ongoing</span><span
                                class="text-body-tertiary fw-semibold">(14)</span></a></li>
                    <li class="nav-item"><a class="nav-link px-2 py-1" href="#"><span>Cancelled</span><span
                                class="text-body-tertiary fw-semibold">(2)</span></a></li>
                    <li class="nav-item"><a class="nav-link px-2 py-1" href="#"><span>Finished</span><span
                                class="text-body-tertiary fw-semibold">(14)</span></a></li>
                    <li class="nav-item"><a class="nav-link px-2 py-1" href="#"><span>Postponed</span><span
                                class="text-body-tertiary fw-semibold">(2)</span></a></li>
                </ul>
            </div>
            <div class="col-12 col-sm-auto">
                <div class="d-flex align-items-center">
                    <div class="search-box me-3">
                        <form class="position-relative"><input class="form-control search-input search" type="search"
                                placeholder="Search projects" aria-label="Search">
                            <span class="fas fa-search search-box-icon"></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive scrollbar">
            <table class="table fs-9 mb-0 border-top border-translucent">
                <thead>
                    <tr>
                        <th class="sort white-space-nowrap align-middle ps-0" scope="col" data-sort="projectName"
                            style="width:30%;">PROJECT NAME</th>
                        <th class="sort align-middle ps-3" scope="col" data-sort="assignees" style="width:10%;">
                            ASSIGNEES</th>
                        <th class="sort align-middle ps-3" scope="col" data-sort="start" style="width:10%;">START
                            DATE</th>
                        <th class="sort align-middle ps-3" scope="col" data-sort="deadline" style="width:15%;">
                            DEADLINE</th>
                        <th class="sort align-middle ps-3" scope="col" data-sort="task" style="width:12%;">TASK</th>
                        <th class="sort align-middle ps-3" scope="col" data-sort="projectprogress" style="width:5%;">
                            PROGRESS</th>
                        <th class="sort align-middle text-end" scope="col" data-sort="statuses" style="width:10%;">
                            STATUS</th>
                        <th class="sort align-middle text-end" scope="col" style="width:10%;"></th>
                    </tr>
                </thead>
                <tbody class="list" id="project-list-table-body">
                    <tr class="position-static">
                        <td class="align-middle time white-space-nowrap ps-0 projectName py-4"><a class="fw-bold fs-8"
                                href="#">Project Doughnut Dungeon</a></td>
                        <td class="align-middle white-space-nowrap assignees ps-3 py-4">
                            <div class="avatar-group avatar-group-dense"><a
                                    class="dropdown-toggle dropdown-caret-none d-inline-block" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                    <div class="avatar avatar-s  rounded-circle">
                                        <img class="rounded-circle " src="../../assets/img/team/34.webp" alt="">
                                    </div>
                                </a>
                                <div class="dropdown-menu avatar-dropdown-menu p-0 overflow-hidden"
                                    style="width: 320px;">
                                    <div class="position-relative">
                                        <div class="bg-holder z-n1"
                                            style="background-image:url(../../assets/img/bg/bg-32.png);background-size: auto;">
                                        </div>
                                        <!--/.bg-holder-->
                                        <div class="p-3">
                                            <div class="text-end"><button class="btn p-0 me-2"><svg
                                                        class="svg-inline--fa fa-user-plus text-white"
                                                        aria-hidden="true" focusable="false" data-prefix="fas"
                                                        data-icon="user-plus" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM504 312l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z">
                                                        </path>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-user-plus text-white"></span> Font Awesome fontawesome.com --></button><button
                                                    class="btn p-0"><svg class="svg-inline--fa fa-ellipsis text-white"
                                                        aria-hidden="true" focusable="false" data-prefix="fas"
                                                        data-icon="ellipsis" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                                        </path>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-ellipsis text-white"></span> Font Awesome fontawesome.com --></button>
                                            </div>
                                            <div class="text-center">
                                                <div
                                                    class="avatar avatar-xl status-online position-relative me-2 me-sm-0 me-xl-2 mb-2">
                                                    <img class="rounded-circle border border-light-subtle"
                                                        src="../../assets/img/team/34.webp" alt="">
                                                </div>
                                                <h6 class="text-white">Jean Renoir</h6>
                                                <p class="text-light text-opacity-50 fw-semibold fs-10 mb-2">
                                                    @tyrion222</p>
                                                <div class="d-flex flex-center mb-3">
                                                    <h6 class="text-white mb-0">224 <span
                                                            class="fw-normal text-light text-opacity-75">connections</span>
                                                    </h6><svg class="svg-inline--fa fa-circle mx-1 text-body-tertiary"
                                                        data-fa-transform="shrink-10 up-2" aria-hidden="true"
                                                        focusable="false" data-prefix="fas" data-icon="circle"
                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 512 512" data-fa-i2svg=""
                                                        style="transform-origin: 0.5em 0.375em;">
                                                        <g transform="translate(256 256)">
                                                            <g
                                                                transform="translate(0, -64)  scale(0.375, 0.375)  rotate(0 0 0)">
                                                                <path fill="currentColor"
                                                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512z"
                                                                    transform="translate(-256 -256)"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-circle text-body-tertiary mx-1" data-fa-transform="shrink-10 up-2"></span> Font Awesome fontawesome.com -->
                                                    <h6 class="text-white mb-0">23 <span
                                                            class="fw-normal text-light text-opacity-75">mutual</span>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-body-emphasis">
                                        <div class="p-3 border-bottom border-translucent">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex"><button
                                                        class="btn btn-phoenix-secondary btn-icon btn-icon-lg me-2"><svg
                                                            class="svg-inline--fa fa-phone" aria-hidden="true"
                                                            focusable="false" data-prefix="fas" data-icon="phone"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z">
                                                            </path>
                                                        </svg>
                                                        <!-- <span class="fa-solid fa-phone"></span> Font Awesome fontawesome.com --></button><button
                                                        class="btn btn-phoenix-secondary btn-icon btn-icon-lg me-2"><svg
                                                            class="svg-inline--fa fa-message" aria-hidden="true"
                                                            focusable="false" data-prefix="fas" data-icon="message"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                d="M64 0C28.7 0 0 28.7 0 64L0 352c0 35.3 28.7 64 64 64l96 0 0 80c0 6.1 3.4 11.6 8.8 14.3s11.9 2.1 16.8-1.5L309.3 416 448 416c35.3 0 64-28.7 64-64l0-288c0-35.3-28.7-64-64-64L64 0z">
                                                            </path>
                                                        </svg>
                                                        <!-- <span class="fa-solid fa-message"></span> Font Awesome fontawesome.com --></button><button
                                                        class="btn btn-phoenix-secondary btn-icon btn-icon-lg"><svg
                                                            class="svg-inline--fa fa-video" aria-hidden="true"
                                                            focusable="false" data-prefix="fas" data-icon="video"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 576 512" data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                d="M0 128C0 92.7 28.7 64 64 64l256 0c35.3 0 64 28.7 64 64l0 256c0 35.3-28.7 64-64 64L64 448c-35.3 0-64-28.7-64-64L0 128zM559.1 99.8c10.4 5.6 16.9 16.4 16.9 28.2l0 256c0 11.8-6.5 22.6-16.9 28.2s-23 5-32.9-1.6l-96-64L416 337.1l0-17.1 0-128 0-17.1 14.2-9.5 96-64c9.8-6.5 22.4-7.2 32.9-1.6z">
                                                            </path>
                                                        </svg>
                                                        <!-- <span class="fa-solid fa-video"></span> Font Awesome fontawesome.com --></button>
                                                </div><button class="btn btn-phoenix-primary"><svg
                                                        class="svg-inline--fa fa-envelope me-2" aria-hidden="true"
                                                        focusable="false" data-prefix="fas" data-icon="envelope"
                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 512 512" data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z">
                                                        </path>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-envelope me-2"></span> Font Awesome fontawesome.com -->Send
                                                    Email</button>
                                            </div>
                                        </div>
                                        <ul class="nav d-flex flex-column py-3 border-bottom">
                                            <li class="nav-item"><a class="nav-link px-3 d-flex flex-between-center"
                                                    href="#!"> <svg xmlns="http://www.w3.org/2000/svg" width="16px"
                                                        height="16px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-clipboard me-2 text-body d-inline-block">
                                                        <path
                                                            d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                                        </path>
                                                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                                    </svg><span class="text-body-highlight flex-1">Assigned
                                                        Projects</span><svg
                                                        class="svg-inline--fa fa-chevron-right fs-11" aria-hidden="true"
                                                        focusable="false" data-prefix="fas" data-icon="chevron-right"
                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 320 512" data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z">
                                                        </path>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-chevron-right fs-11"></span> Font Awesome fontawesome.com --></a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link px-3 d-flex flex-between-center"
                                                    href="#!"> <svg xmlns="http://www.w3.org/2000/svg" width="16px"
                                                        height="16px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-pie-chart me-2 text-body">
                                                        <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                                                        <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                                                    </svg><span class="text-body-highlight flex-1">View
                                                        activiy</span><svg class="svg-inline--fa fa-chevron-right fs-11"
                                                        aria-hidden="true" focusable="false" data-prefix="fas"
                                                        data-icon="chevron-right" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z">
                                                        </path>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-chevron-right fs-11"></span> Font Awesome fontawesome.com --></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="p-3 d-flex justify-content-between"><a
                                            class="btn btn-link p-0 text-decoration-none" href="#!">Details </a><a
                                            class="btn btn-link p-0 text-decoration-none text-danger" href="#!">Unassign
                                        </a></div>
                                </div><a class="dropdown-toggle dropdown-caret-none d-inline-block" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    data-bs-auto-close="outside">
                                    <div class="avatar avatar-s  rounded-circle">
                                        <img class="rounded-circle " src="../../assets/img/team/59.webp" alt="">
                                    </div>
                                </a>
                                <div class="dropdown-menu avatar-dropdown-menu p-0 overflow-hidden"
                                    style="width: 320px;">
                                    <div class="position-relative">
                                        <div class="bg-holder z-n1"
                                            style="background-image:url(../../assets/img/bg/bg-32.png);background-size: auto;">
                                        </div>
                                        <!--/.bg-holder-->
                                        <div class="p-3">
                                            <div class="text-end"><button class="btn p-0 me-2"><svg
                                                        class="svg-inline--fa fa-user-plus text-white"
                                                        aria-hidden="true" focusable="false" data-prefix="fas"
                                                        data-icon="user-plus" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM504 312l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z">
                                                        </path>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-user-plus text-white"></span> Font Awesome fontawesome.com --></button><button
                                                    class="btn p-0"><svg class="svg-inline--fa fa-ellipsis text-white"
                                                        aria-hidden="true" focusable="false" data-prefix="fas"
                                                        data-icon="ellipsis" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                                        </path>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-ellipsis text-white"></span> Font Awesome fontawesome.com --></button>
                                            </div>
                                            <div class="text-center">
                                                <div
                                                    class="avatar avatar-xl status-online position-relative me-2 me-sm-0 me-xl-2 mb-2">
                                                    <img class="rounded-circle border border-light-subtle"
                                                        src="../../assets/img/team/59.webp" alt="">
                                                </div>
                                                <h6 class="text-white">Katerina Karenin</h6>
                                                <p class="text-light text-opacity-50 fw-semibold fs-10 mb-2">
                                                    @tyrion222</p>
                                                <div class="d-flex flex-center mb-3">
                                                    <h6 class="text-white mb-0">224 <span
                                                            class="fw-normal text-light text-opacity-75">connections</span>
                                                    </h6><svg class="svg-inline--fa fa-circle mx-1 text-body-tertiary"
                                                        data-fa-transform="shrink-10 up-2" aria-hidden="true"
                                                        focusable="false" data-prefix="fas" data-icon="circle"
                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 512 512" data-fa-i2svg=""
                                                        style="transform-origin: 0.5em 0.375em;">
                                                        <g transform="translate(256 256)">
                                                            <g
                                                                transform="translate(0, -64)  scale(0.375, 0.375)  rotate(0 0 0)">
                                                                <path fill="currentColor"
                                                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512z"
                                                                    transform="translate(-256 -256)"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-circle text-body-tertiary mx-1" data-fa-transform="shrink-10 up-2"></span> Font Awesome fontawesome.com -->
                                                    <h6 class="text-white mb-0">23 <span
                                                            class="fw-normal text-light text-opacity-75">mutual</span>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-body-emphasis">
                                        <div class="p-3 border-bottom border-translucent">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex"><button
                                                        class="btn btn-phoenix-secondary btn-icon btn-icon-lg me-2"><svg
                                                            class="svg-inline--fa fa-phone" aria-hidden="true"
                                                            focusable="false" data-prefix="fas" data-icon="phone"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z">
                                                            </path>
                                                        </svg>
                                                        <!-- <span class="fa-solid fa-phone"></span> Font Awesome fontawesome.com --></button><button
                                                        class="btn btn-phoenix-secondary btn-icon btn-icon-lg me-2"><svg
                                                            class="svg-inline--fa fa-message" aria-hidden="true"
                                                            focusable="false" data-prefix="fas" data-icon="message"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                d="M64 0C28.7 0 0 28.7 0 64L0 352c0 35.3 28.7 64 64 64l96 0 0 80c0 6.1 3.4 11.6 8.8 14.3s11.9 2.1 16.8-1.5L309.3 416 448 416c35.3 0 64-28.7 64-64l0-288c0-35.3-28.7-64-64-64L64 0z">
                                                            </path>
                                                        </svg>
                                                        <!-- <span class="fa-solid fa-message"></span> Font Awesome fontawesome.com --></button><button
                                                        class="btn btn-phoenix-secondary btn-icon btn-icon-lg"><svg
                                                            class="svg-inline--fa fa-video" aria-hidden="true"
                                                            focusable="false" data-prefix="fas" data-icon="video"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 576 512" data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                d="M0 128C0 92.7 28.7 64 64 64l256 0c35.3 0 64 28.7 64 64l0 256c0 35.3-28.7 64-64 64L64 448c-35.3 0-64-28.7-64-64L0 128zM559.1 99.8c10.4 5.6 16.9 16.4 16.9 28.2l0 256c0 11.8-6.5 22.6-16.9 28.2s-23 5-32.9-1.6l-96-64L416 337.1l0-17.1 0-128 0-17.1 14.2-9.5 96-64c9.8-6.5 22.4-7.2 32.9-1.6z">
                                                            </path>
                                                        </svg>
                                                        <!-- <span class="fa-solid fa-video"></span> Font Awesome fontawesome.com --></button>
                                                </div><button class="btn btn-phoenix-primary"><svg
                                                        class="svg-inline--fa fa-envelope me-2" aria-hidden="true"
                                                        focusable="false" data-prefix="fas" data-icon="envelope"
                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 512 512" data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z">
                                                        </path>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-envelope me-2"></span> Font Awesome fontawesome.com -->Send
                                                    Email</button>
                                            </div>
                                        </div>
                                        <ul class="nav d-flex flex-column py-3 border-bottom">
                                            <li class="nav-item"><a class="nav-link px-3 d-flex flex-between-center"
                                                    href="#!"> <svg xmlns="http://www.w3.org/2000/svg" width="16px"
                                                        height="16px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-clipboard me-2 text-body d-inline-block">
                                                        <path
                                                            d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                                        </path>
                                                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                                    </svg><span class="text-body-highlight flex-1">Assigned
                                                        Projects</span><svg
                                                        class="svg-inline--fa fa-chevron-right fs-11" aria-hidden="true"
                                                        focusable="false" data-prefix="fas" data-icon="chevron-right"
                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 320 512" data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z">
                                                        </path>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-chevron-right fs-11"></span> Font Awesome fontawesome.com --></a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link px-3 d-flex flex-between-center"
                                                    href="#!"> <svg xmlns="http://www.w3.org/2000/svg" width="16px"
                                                        height="16px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-pie-chart me-2 text-body">
                                                        <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                                                        <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                                                    </svg><span class="text-body-highlight flex-1">View
                                                        activiy</span><svg class="svg-inline--fa fa-chevron-right fs-11"
                                                        aria-hidden="true" focusable="false" data-prefix="fas"
                                                        data-icon="chevron-right" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z">
                                                        </path>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-chevron-right fs-11"></span> Font Awesome fontawesome.com --></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="p-3 d-flex justify-content-between"><a
                                            class="btn btn-link p-0 text-decoration-none" href="#!">Details </a><a
                                            class="btn btn-link p-0 text-decoration-none text-danger" href="#!">Unassign
                                        </a></div>
                                </div><a class="dropdown-toggle dropdown-caret-none d-inline-block" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    data-bs-auto-close="outside">
                                    <div class="avatar avatar-s  rounded-circle">
                                        <img class="rounded-circle " src="../../assets/img/team/35.webp" alt="">
                                    </div>
                                </a>
                                <div class="dropdown-menu avatar-dropdown-menu p-0 overflow-hidden"
                                    style="width: 320px;">
                                    <div class="position-relative">
                                        <div class="bg-holder z-n1"
                                            style="background-image:url(../../assets/img/bg/bg-32.png);background-size: auto;">
                                        </div>
                                        <!--/.bg-holder-->
                                        <div class="p-3">
                                            <div class="text-end"><button class="btn p-0 me-2"><svg
                                                        class="svg-inline--fa fa-user-plus text-white"
                                                        aria-hidden="true" focusable="false" data-prefix="fas"
                                                        data-icon="user-plus" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM504 312l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z">
                                                        </path>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-user-plus text-white"></span> Font Awesome fontawesome.com --></button><button
                                                    class="btn p-0"><svg class="svg-inline--fa fa-ellipsis text-white"
                                                        aria-hidden="true" focusable="false" data-prefix="fas"
                                                        data-icon="ellipsis" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                                        </path>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-ellipsis text-white"></span> Font Awesome fontawesome.com --></button>
                                            </div>
                                            <div class="text-center">
                                                <div
                                                    class="avatar avatar-xl status-online position-relative me-2 me-sm-0 me-xl-2 mb-2">
                                                    <img class="rounded-circle border border-light-subtle"
                                                        src="../../assets/img/team/35.webp" alt="">
                                                </div>
                                                <h6 class="text-white">Stanly Drinkwater</h6>
                                                <p class="text-light text-opacity-50 fw-semibold fs-10 mb-2">
                                                    @tyrion222</p>
                                                <div class="d-flex flex-center mb-3">
                                                    <h6 class="text-white mb-0">224 <span
                                                            class="fw-normal text-light text-opacity-75">connections</span>
                                                    </h6><svg class="svg-inline--fa fa-circle mx-1 text-body-tertiary"
                                                        data-fa-transform="shrink-10 up-2" aria-hidden="true"
                                                        focusable="false" data-prefix="fas" data-icon="circle"
                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 512 512" data-fa-i2svg=""
                                                        style="transform-origin: 0.5em 0.375em;">
                                                        <g transform="translate(256 256)">
                                                            <g
                                                                transform="translate(0, -64)  scale(0.375, 0.375)  rotate(0 0 0)">
                                                                <path fill="currentColor"
                                                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512z"
                                                                    transform="translate(-256 -256)"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-circle text-body-tertiary mx-1" data-fa-transform="shrink-10 up-2"></span> Font Awesome fontawesome.com -->
                                                    <h6 class="text-white mb-0">23 <span
                                                            class="fw-normal text-light text-opacity-75">mutual</span>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-body-emphasis">
                                        <div class="p-3 border-bottom border-translucent">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex"><button
                                                        class="btn btn-phoenix-secondary btn-icon btn-icon-lg me-2"><svg
                                                            class="svg-inline--fa fa-phone" aria-hidden="true"
                                                            focusable="false" data-prefix="fas" data-icon="phone"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z">
                                                            </path>
                                                        </svg>
                                                        <!-- <span class="fa-solid fa-phone"></span> Font Awesome fontawesome.com --></button><button
                                                        class="btn btn-phoenix-secondary btn-icon btn-icon-lg me-2"><svg
                                                            class="svg-inline--fa fa-message" aria-hidden="true"
                                                            focusable="false" data-prefix="fas" data-icon="message"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                d="M64 0C28.7 0 0 28.7 0 64L0 352c0 35.3 28.7 64 64 64l96 0 0 80c0 6.1 3.4 11.6 8.8 14.3s11.9 2.1 16.8-1.5L309.3 416 448 416c35.3 0 64-28.7 64-64l0-288c0-35.3-28.7-64-64-64L64 0z">
                                                            </path>
                                                        </svg>
                                                        <!-- <span class="fa-solid fa-message"></span> Font Awesome fontawesome.com --></button><button
                                                        class="btn btn-phoenix-secondary btn-icon btn-icon-lg"><svg
                                                            class="svg-inline--fa fa-video" aria-hidden="true"
                                                            focusable="false" data-prefix="fas" data-icon="video"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 576 512" data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                d="M0 128C0 92.7 28.7 64 64 64l256 0c35.3 0 64 28.7 64 64l0 256c0 35.3-28.7 64-64 64L64 448c-35.3 0-64-28.7-64-64L0 128zM559.1 99.8c10.4 5.6 16.9 16.4 16.9 28.2l0 256c0 11.8-6.5 22.6-16.9 28.2s-23 5-32.9-1.6l-96-64L416 337.1l0-17.1 0-128 0-17.1 14.2-9.5 96-64c9.8-6.5 22.4-7.2 32.9-1.6z">
                                                            </path>
                                                        </svg>
                                                        <!-- <span class="fa-solid fa-video"></span> Font Awesome fontawesome.com --></button>
                                                </div><button class="btn btn-phoenix-primary"><svg
                                                        class="svg-inline--fa fa-envelope me-2" aria-hidden="true"
                                                        focusable="false" data-prefix="fas" data-icon="envelope"
                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 512 512" data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z">
                                                        </path>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-envelope me-2"></span> Font Awesome fontawesome.com -->Send
                                                    Email</button>
                                            </div>
                                        </div>
                                        <ul class="nav d-flex flex-column py-3 border-bottom">
                                            <li class="nav-item"><a class="nav-link px-3 d-flex flex-between-center"
                                                    href="#!"> <svg xmlns="http://www.w3.org/2000/svg" width="16px"
                                                        height="16px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-clipboard me-2 text-body d-inline-block">
                                                        <path
                                                            d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                                        </path>
                                                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                                    </svg><span class="text-body-highlight flex-1">Assigned
                                                        Projects</span><svg
                                                        class="svg-inline--fa fa-chevron-right fs-11" aria-hidden="true"
                                                        focusable="false" data-prefix="fas" data-icon="chevron-right"
                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 320 512" data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z">
                                                        </path>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-chevron-right fs-11"></span> Font Awesome fontawesome.com --></a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link px-3 d-flex flex-between-center"
                                                    href="#!"> <svg xmlns="http://www.w3.org/2000/svg" width="16px"
                                                        height="16px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-pie-chart me-2 text-body">
                                                        <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                                                        <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                                                    </svg><span class="text-body-highlight flex-1">View
                                                        activiy</span><svg class="svg-inline--fa fa-chevron-right fs-11"
                                                        aria-hidden="true" focusable="false" data-prefix="fas"
                                                        data-icon="chevron-right" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z">
                                                        </path>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-chevron-right fs-11"></span> Font Awesome fontawesome.com --></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="p-3 d-flex justify-content-between"><a
                                            class="btn btn-link p-0 text-decoration-none" href="#!">Details </a><a
                                            class="btn btn-link p-0 text-decoration-none text-danger" href="#!">Unassign
                                        </a></div>
                                </div><a class="dropdown-toggle dropdown-caret-none d-inline-block" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    data-bs-auto-close="outside">
                                    <div class="avatar avatar-s  rounded-circle">
                                        <img class="rounded-circle " src="../../assets/img/team/58.webp" alt="">
                                    </div>
                                </a>
                                <div class="dropdown-menu avatar-dropdown-menu p-0 overflow-hidden"
                                    style="width: 320px;">
                                    <div class="position-relative">
                                        <div class="bg-holder z-n1"
                                            style="background-image:url(../../assets/img/bg/bg-32.png);background-size: auto;">
                                        </div>
                                        <!--/.bg-holder-->
                                        <div class="p-3">
                                            <div class="text-end"><button class="btn p-0 me-2"><svg
                                                        class="svg-inline--fa fa-user-plus text-white"
                                                        aria-hidden="true" focusable="false" data-prefix="fas"
                                                        data-icon="user-plus" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM504 312l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z">
                                                        </path>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-user-plus text-white"></span> Font Awesome fontawesome.com --></button><button
                                                    class="btn p-0"><svg class="svg-inline--fa fa-ellipsis text-white"
                                                        aria-hidden="true" focusable="false" data-prefix="fas"
                                                        data-icon="ellipsis" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                                        </path>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-ellipsis text-white"></span> Font Awesome fontawesome.com --></button>
                                            </div>
                                            <div class="text-center">
                                                <div
                                                    class="avatar avatar-xl status-online position-relative me-2 me-sm-0 me-xl-2 mb-2">
                                                    <img class="rounded-circle border border-light-subtle"
                                                        src="../../assets/img/team/58.webp" alt="">
                                                </div>
                                                <h6 class="text-white">Igor Borvibson</h6>
                                                <p class="text-light text-opacity-50 fw-semibold fs-10 mb-2">
                                                    @tyrion222</p>
                                                <div class="d-flex flex-center mb-3">
                                                    <h6 class="text-white mb-0">224 <span
                                                            class="fw-normal text-light text-opacity-75">connections</span>
                                                    </h6><svg class="svg-inline--fa fa-circle mx-1 text-body-tertiary"
                                                        data-fa-transform="shrink-10 up-2" aria-hidden="true"
                                                        focusable="false" data-prefix="fas" data-icon="circle"
                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 512 512" data-fa-i2svg=""
                                                        style="transform-origin: 0.5em 0.375em;">
                                                        <g transform="translate(256 256)">
                                                            <g
                                                                transform="translate(0, -64)  scale(0.375, 0.375)  rotate(0 0 0)">
                                                                <path fill="currentColor"
                                                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512z"
                                                                    transform="translate(-256 -256)"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-circle text-body-tertiary mx-1" data-fa-transform="shrink-10 up-2"></span> Font Awesome fontawesome.com -->
                                                    <h6 class="text-white mb-0">23 <span
                                                            class="fw-normal text-light text-opacity-75">mutual</span>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-body-emphasis">
                                        <div class="p-3 border-bottom border-translucent">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex"><button
                                                        class="btn btn-phoenix-secondary btn-icon btn-icon-lg me-2"><svg
                                                            class="svg-inline--fa fa-phone" aria-hidden="true"
                                                            focusable="false" data-prefix="fas" data-icon="phone"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z">
                                                            </path>
                                                        </svg>
                                                        <!-- <span class="fa-solid fa-phone"></span> Font Awesome fontawesome.com --></button><button
                                                        class="btn btn-phoenix-secondary btn-icon btn-icon-lg me-2"><svg
                                                            class="svg-inline--fa fa-message" aria-hidden="true"
                                                            focusable="false" data-prefix="fas" data-icon="message"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                d="M64 0C28.7 0 0 28.7 0 64L0 352c0 35.3 28.7 64 64 64l96 0 0 80c0 6.1 3.4 11.6 8.8 14.3s11.9 2.1 16.8-1.5L309.3 416 448 416c35.3 0 64-28.7 64-64l0-288c0-35.3-28.7-64-64-64L64 0z">
                                                            </path>
                                                        </svg>
                                                        <!-- <span class="fa-solid fa-message"></span> Font Awesome fontawesome.com --></button><button
                                                        class="btn btn-phoenix-secondary btn-icon btn-icon-lg"><svg
                                                            class="svg-inline--fa fa-video" aria-hidden="true"
                                                            focusable="false" data-prefix="fas" data-icon="video"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 576 512" data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                d="M0 128C0 92.7 28.7 64 64 64l256 0c35.3 0 64 28.7 64 64l0 256c0 35.3-28.7 64-64 64L64 448c-35.3 0-64-28.7-64-64L0 128zM559.1 99.8c10.4 5.6 16.9 16.4 16.9 28.2l0 256c0 11.8-6.5 22.6-16.9 28.2s-23 5-32.9-1.6l-96-64L416 337.1l0-17.1 0-128 0-17.1 14.2-9.5 96-64c9.8-6.5 22.4-7.2 32.9-1.6z">
                                                            </path>
                                                        </svg>
                                                        <!-- <span class="fa-solid fa-video"></span> Font Awesome fontawesome.com --></button>
                                                </div><button class="btn btn-phoenix-primary"><svg
                                                        class="svg-inline--fa fa-envelope me-2" aria-hidden="true"
                                                        focusable="false" data-prefix="fas" data-icon="envelope"
                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 512 512" data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z">
                                                        </path>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-envelope me-2"></span> Font Awesome fontawesome.com -->Send
                                                    Email</button>
                                            </div>
                                        </div>
                                        <ul class="nav d-flex flex-column py-3 border-bottom">
                                            <li class="nav-item"><a class="nav-link px-3 d-flex flex-between-center"
                                                    href="#!"> <svg xmlns="http://www.w3.org/2000/svg" width="16px"
                                                        height="16px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-clipboard me-2 text-body d-inline-block">
                                                        <path
                                                            d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                                        </path>
                                                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                                    </svg><span class="text-body-highlight flex-1">Assigned
                                                        Projects</span><svg
                                                        class="svg-inline--fa fa-chevron-right fs-11" aria-hidden="true"
                                                        focusable="false" data-prefix="fas" data-icon="chevron-right"
                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 320 512" data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z">
                                                        </path>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-chevron-right fs-11"></span> Font Awesome fontawesome.com --></a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link px-3 d-flex flex-between-center"
                                                    href="#!"> <svg xmlns="http://www.w3.org/2000/svg" width="16px"
                                                        height="16px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-pie-chart me-2 text-body">
                                                        <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                                                        <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                                                    </svg><span class="text-body-highlight flex-1">View
                                                        activiy</span><svg class="svg-inline--fa fa-chevron-right fs-11"
                                                        aria-hidden="true" focusable="false" data-prefix="fas"
                                                        data-icon="chevron-right" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z">
                                                        </path>
                                                    </svg>
                                                    <!-- <span class="fa-solid fa-chevron-right fs-11"></span> Font Awesome fontawesome.com --></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="p-3 d-flex justify-content-between"><a
                                            class="btn btn-link p-0 text-decoration-none" href="#!">Details </a><a
                                            class="btn btn-link p-0 text-decoration-none text-danger" href="#!">Unassign
                                        </a></div>
                                </div>
                                <div class="avatar avatar-s  rounded-circle">
                                    <div class="avatar-name rounded-circle "><span>+2</span></div>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle white-space-nowrap start ps-3 py-4">
                            <p class="mb-0 fs-9 text-body">Nov 17, 2020</p>
                        </td>
                        <td class="align-middle white-space-nowrap deadline ps-3 py-4">
                            <p class="mb-0 fs-9 text-body">May 21, 2028</p>
                        </td>
                        <td class="align-middle white-space-nowrap task ps-3 py-4">
                            <p class="fw-bo text-body fs-9 mb-0">287</p>
                        </td>
                        <td class="align-middle white-space-nowrap ps-3 projectprogress">
                            <p class="text-body-secondary fs-10 mb-0">145 / 145</p>
                            <div class="progress" style="height:3px;">
                                <div class="progress-bar bg-success" style="width: 100%" role="progressbar"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end statuses"><span
                                class="badge badge-phoenix fs-10 badge-phoenix-success">completed</span></td>
                        <td class="align-middle text-end white-space-nowrap pe-0 action">
                            <div class="btn-reveal-trigger position-static"><button
                                    class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                    type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                    aria-expanded="false" data-bs-reference="parent"><svg
                                        class="svg-inline--fa fa-ellipsis fs-10" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="ellipsis" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                        </path>
                                    </svg>
                                    <!-- <span class="fas fa-ellipsis-h fs-10"></span> Font Awesome fontawesome.com --></button>
                                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item"
                                        href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                        href="#!">Remove</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div
            class="d-flex flex-wrap align-items-center justify-content-between py-3 pe-0 fs-9 border-bottom border-translucent">
            <div class="d-flex">
                <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info">1 to 6
                    <span class="text-body-tertiary"> Items of </span>7
                </p><a class="fw-semibold" href="#!" data-list-view="*">View all<svg
                        class="svg-inline--fa fa-angle-right ms-1" data-fa-transform="down-1" aria-hidden="true"
                        focusable="false" data-prefix="fas" data-icon="angle-right" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""
                        style="transform-origin: 0.3125em 0.5625em;">
                        <g transform="translate(160 256)">
                            <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)">
                                <path fill="currentColor"
                                    d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"
                                    transform="translate(-160 -256)"></path>
                            </g>
                        </g>
                    </svg>
                    <!-- <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span> Font Awesome fontawesome.com --></a><a
                    class="fw-semibold d-none" href="#!" data-list-view="less">View Less<svg
                        class="svg-inline--fa fa-angle-right ms-1" data-fa-transform="down-1" aria-hidden="true"
                        focusable="false" data-prefix="fas" data-icon="angle-right" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""
                        style="transform-origin: 0.3125em 0.5625em;">
                        <g transform="translate(160 256)">
                            <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)">
                                <path fill="currentColor"
                                    d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"
                                    transform="translate(-160 -256)"></path>
                            </g>
                        </g>
                    </svg>
                    <!-- <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span> Font Awesome fontawesome.com --></a>
            </div>
            <div class="d-flex"><button class="page-link disabled" data-list-pagination="prev" disabled=""><svg
                        class="svg-inline--fa fa-chevron-left" aria-hidden="true" focusable="false" data-prefix="fas"
                        data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                        data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z">
                        </path>
                    </svg><!-- <span class="fas fa-chevron-left"></span> Font Awesome fontawesome.com --></button>
                <ul class="mb-0 pagination">
                    <li class="active"><button class="page" type="button" data-i="1" data-page="6">1</button></li>
                    <li><button class="page" type="button" data-i="2" data-page="6">2</button></li>
                </ul><button class="page-link pe-0" data-list-pagination="next"><svg
                        class="svg-inline--fa fa-chevron-right" aria-hidden="true" focusable="false" data-prefix="fas"
                        data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                        data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z">
                        </path>
                    </svg><!-- <span class="fas fa-chevron-right"></span> Font Awesome fontawesome.com --></button>
            </div>
        </div>
    </div>
</div>

@endsection