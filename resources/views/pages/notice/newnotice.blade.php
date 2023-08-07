@extends('home')
@section('content')
    <!-- start: page toolbar -->
    <div class="page-body body-layout-1 my-task">
        <div class="my-task d-flex flex-nowrap">
            <div class="order-1 custom_scroll">
                <button type="button" class="btn bg-secondary text-light mb-3 w-100" data-bs-toggle="modal"
                    data-bs-target="#new_task">Create Notice</button>
                <ul class="nav nav-tabs menu-list list-unstyled mb-0 border-0" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" data-bs-toggle="tab" data-bs-target="#task_all"
                            role="tab">
                            <svg viewBox="0 0 16 16" width="20px" class="me-3" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path class="fill-secondary"
                                    d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v2A1.5 1.5 0 0 1 14.5 5h-13A1.5 1.5 0 0 1 0 3.5v-2zM1.5 1a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-13z" />
                                <path
                                    d="M2 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm10.823.323-.396-.396A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2H1zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2h14zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
                            </svg>
                            <span>All Task</span>
                            <span class="badge bg-light text-dark ms-2 ms-auto">28</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#task_priority"
                            role="tab">
                            <svg viewBox="0 0 16 16" width="20px" class="me-3" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                <path class="fill-secondary"
                                    d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                            </svg>
                            <span>Priority Task</span>
                            <span class="badge bg-danger ms-2 ms-auto">2</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#task_today" role="tab">
                            <svg viewBox="0 0 16 16" width="20px" class="me-3" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path class="fill-secondary"
                                    d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                            </svg>
                            <span>Today's Tasks</span>
                            <span class="badge bg-light text-dark ms-2 ms-auto">7</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#task_week" role="tab">
                            <svg viewBox="0 0 16 16" width="20px" class="me-3" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path class="fill-secondary"
                                    d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                            </svg>
                            <span>This week tasks</span>
                            <span class="badge bg-light text-dark ms-2 ms-auto">19</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#task_me" role="tab">
                            <svg viewBox="0 0 16 16" width="20px" class="me-3" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path class="fill-secondary"
                                    d="M14 9.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm-6 5.7c0 .8.8.8.8.8h6.4s.8 0 .8-.8-.8-3.2-4-3.2-4 2.4-4 3.2Z" />
                                <path
                                    d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h5.243c.122-.326.295-.668.526-1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v7.81c.353.23.656.496.91.783.059-.187.09-.386.09-.593V4a2 2 0 0 0-2-2H2Z" />
                            </svg>
                            <span>Created by me</span>
                            <span class="badge bg-primary ms-2 ms-auto">4</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="order-2 flex-grow-1 px-lg-3 px-0 custom_scroll">
                <!-- start: page toolbar -->
                <div class="page-toolbar py-2">
                    <div class="container-fluid">
                        <div class="row g-3 mb-3 align-items-center">
                            <div class="col">
                                <ol class="breadcrumb bg-transparent mb-0">
                                    <li class="breadcrumb-item"><a class="text-secondary" href="index.html">Home</a></li>
                                    <li class="breadcrumb-item"><a class="text-secondary" href="app.html">App</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">My Tasks</li>
                                </ol>
                            </div>
                        </div> <!-- .row end -->
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="task_all" role="tabpanel">
                                    <div class="d-flex justify-content-between mb-2">
                                        <h4 class="mt-1 mb-0">All Notices</h4>
                                        <button class="btn btn-sm d-block d-lg-none btn-primary task-list-toggle"
                                            type="button"><i class="fa fa-bars"></i></button>
                                    </div>
                                    <ul class="list-group list-group-flush list-group-custom">
                                        @foreach ($notice as $notice)
                                            <li class="row g-0 list-group-item d-flex align-items-start py-3">
                                                <div class="col col-md-10 col-xxl-11">
                                                    <div class="row">
                                                        <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                                            <span class="fs-6 me-2">{{ $notice->notice_title }}</span>
                                                            <div>
                                                                <span class="small text-muted text-uppercase me-2">Noticed
                                                                    By:
                                                                    <span class="text-info">
                                                                        {{ getUsername($notice->notice_created_by) }}</span>
                                                                    <span
                                                                        class="border px-1 rounded small">{{ $notice->noticed_created_for }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p class="i-msg mb-0 text-muted">
                                                                {{ $notice->notice_body }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-auto ms-auto d-flex flex-column justify-content-between small">
                                                    {{ $notice->notice_published_time }}</div>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="task_priority" role="tabpanel">
                                    <div class="d-flex justify-content-between mb-2">
                                        <h4 class="mt-1 mb-0">Priority Task</h4>
                                        <button class="btn btn-sm d-block d-lg-none btn-primary task-list-toggle"
                                            type="button"><i class="fa fa-bars"></i></button>
                                    </div>
                                    <ul class="list-group list-group-flush list-group-custom">
                                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                                            <div class="hover-actions end-0 me-3 bg-light rounded">
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><i
                                                        class="fa fa-inbox"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Snooze"><i
                                                        class="fa fa-clock-o"></i></button>
                                            </div>
                                            <div class="col col-md-10 col-xxl-11">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                                        <span class="fs-6 me-2">Start Figma to HTML onepage with
                                                            bootstrap</span>
                                                        <div>
                                                            <span class="small text-muted text-uppercase me-2">Assigned By:
                                                                Alexander</span>
                                                            <span
                                                                class="border border-info text-info px-1 rounded small">HTML</span>
                                                            <span
                                                                class="bg-danger text-light px-1 rounded small">Priority</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <p class="i-msg mb-0 text-muted">All the Lorem Ipsum generators on
                                                            the Internet tend to repeat predefined</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto ms-auto d-flex flex-column justify-content-between small">
                                                Feb 15</div>
                                        </li>
                                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                                            <div class="hover-actions end-0 me-3 bg-light rounded">
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><i
                                                        class="fa fa-inbox"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Snooze"><i
                                                        class="fa fa-clock-o"></i></button>
                                            </div>
                                            <div class="col col-md-10 col-xxl-11">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                                        <span class="fs-6 me-2">Create new onepage Figma</span>
                                                        <div>
                                                            <span class="small text-muted text-uppercase me-2">Assigned By:
                                                                Chris Fox</span>
                                                            <span class="border px-1 rounded small">Design</span>
                                                            <span
                                                                class="bg-danger text-light px-1 rounded small">Priority</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <p class="i-msg mb-0 text-muted">Many desktop publishing packages
                                                            and web page editors now use Lorem Ipsum</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto ms-auto d-flex flex-column justify-content-between small">
                                                Feb 15</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="task_today" role="tabpanel">
                                    <div class="d-flex justify-content-between mb-2">
                                        <h4 class="mt-1 mb-0">Today's Task</h4>
                                        <button class="btn btn-sm d-block d-lg-none btn-primary task-list-toggle"
                                            type="button"><i class="fa fa-bars"></i></button>
                                    </div>
                                    <ul class="list-group list-group-flush list-group-custom">
                                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                                            <div class="hover-actions end-0 me-3 bg-light rounded">
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><i
                                                        class="fa fa-inbox"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Snooze"><i
                                                        class="fa fa-clock-o"></i></button>
                                            </div>
                                            <div class="col col-md-10 col-xxl-11">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                                        <span class="fs-6 me-2">LUNO admin Responsive design issue in
                                                            mobile</span>
                                                        <div>
                                                            <span class="small text-muted text-uppercase me-2">Assigned By:
                                                                Chris Fox</span>
                                                            <span
                                                                class="border border-danger text-danger px-1 rounded small">BugFix</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <p class="i-msg mb-0 text-muted">Richard McClintock, a Latin
                                                            professor at Hampden-Sydney College in Virginia, looked</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto ms-auto d-flex flex-column justify-content-between small">
                                                Feb 11</div>
                                        </li>
                                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                                            <div class="hover-actions end-0 me-3 bg-light rounded">
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><i
                                                        class="fa fa-inbox"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Snooze"><i
                                                        class="fa fa-clock-o"></i></button>
                                            </div>
                                            <div class="col col-md-10 col-xxl-11">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                                        <span class="fs-6 me-2">Start working on new Admin dashboard</span>
                                                        <div>
                                                            <span class="small text-muted text-uppercase me-2">Assigned By:
                                                                Robert</span>
                                                            <span class="border px-1 rounded small">Design</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <p class="i-msg mb-0 text-muted">It was popularised in the 1960s
                                                            with the release of Letraset sheets containing Lorem Ipsum</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto ms-auto d-flex flex-column justify-content-between small">
                                                Feb 12</div>
                                        </li>
                                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                                            <div class="hover-actions end-0 me-3 bg-light rounded">
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><i
                                                        class="fa fa-inbox"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Snooze"><i
                                                        class="fa fa-clock-o"></i></button>
                                            </div>
                                            <div class="col col-md-10 col-xxl-11">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                                        <span class="fs-6 me-2">Start Figma to HTML onepage with
                                                            bootstrap</span>
                                                        <div>
                                                            <span class="small text-muted text-uppercase me-2">Assigned By:
                                                                Alexander</span>
                                                            <span
                                                                class="border border-info text-info px-1 rounded small">HTML</span>
                                                            <span
                                                                class="bg-danger text-light px-1 rounded small">Priority</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <p class="i-msg mb-0 text-muted">All the Lorem Ipsum generators on
                                                            the Internet tend to repeat predefined</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto ms-auto d-flex flex-column justify-content-between small">
                                                Feb 15</div>
                                        </li>
                                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                                            <div class="hover-actions end-0 me-3 bg-light rounded">
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><i
                                                        class="fa fa-inbox"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Snooze"><i
                                                        class="fa fa-clock-o"></i></button>
                                            </div>
                                            <div class="col col-md-10 col-xxl-11">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                                        <span class="fs-6 me-2">Create new onepage Figma</span>
                                                        <div>
                                                            <span class="small text-muted text-uppercase me-2">Assigned By:
                                                                Chris Fox</span>
                                                            <span class="border px-1 rounded small">Design</span>
                                                            <span
                                                                class="bg-danger text-light px-1 rounded small">Priority</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <p class="i-msg mb-0 text-muted">Many desktop publishing packages
                                                            and web page editors now use Lorem Ipsum</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto ms-auto d-flex flex-column justify-content-between small">
                                                Feb 15</div>
                                        </li>
                                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                                            <div class="hover-actions end-0 me-3 bg-light rounded">
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><i
                                                        class="fa fa-inbox"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Snooze"><i
                                                        class="fa fa-clock-o"></i></button>
                                            </div>
                                            <div class="col col-md-10 col-xxl-11">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                                        <span class="fs-6 me-2">LUNO admin Responsive design issue in
                                                            mobile</span>
                                                        <div>
                                                            <span class="small text-muted text-uppercase me-2">Assigned By:
                                                                Chris Fox</span>
                                                            <span
                                                                class="border border-danger text-danger px-1 rounded small">BugFix</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <p class="i-msg mb-0 text-muted">Richard McClintock, a Latin
                                                            professor at Hampden-Sydney College in Virginia, looked</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto ms-auto d-flex flex-column justify-content-between small">
                                                Feb 22</div>
                                        </li>
                                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                                            <div class="hover-actions end-0 me-3 bg-light rounded">
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><i
                                                        class="fa fa-inbox"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Snooze"><i
                                                        class="fa fa-clock-o"></i></button>
                                            </div>
                                            <div class="col col-md-10 col-xxl-11">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                                        <span class="fs-6 me-2">Create Logo for LUNO admin app</span>
                                                        <div>
                                                            <span class="small text-muted text-uppercase me-2">Assigned By:
                                                                Chris Fox</span>
                                                            <span class="border px-1 rounded small">Design</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <p class="i-msg mb-0 text-muted">Contrary to popular belief, Lorem
                                                            Ipsum is not simply random text.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto ms-auto d-flex flex-column justify-content-between small">
                                                March 9</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="task_week" role="tabpanel">
                                    <div class="d-flex justify-content-between mb-2">
                                        <h4 class="mt-1 mb-0">This week Task</h4>
                                        <button class="btn btn-sm d-block d-lg-none btn-primary task-list-toggle"
                                            type="button"><i class="fa fa-bars"></i></button>
                                    </div>
                                    <ul class="list-group list-group-flush list-group-custom">
                                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                                            <div class="hover-actions end-0 me-3 bg-light rounded">
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><i
                                                        class="fa fa-inbox"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Snooze"><i
                                                        class="fa fa-clock-o"></i></button>
                                            </div>
                                            <div class="col col-md-10 col-xxl-11">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                                        <span class="fs-6 me-2">Create new onepage Figma</span>
                                                        <div>
                                                            <span class="small text-muted text-uppercase me-2">Assigned By:
                                                                Chris Fox</span>
                                                            <span class="border px-1 rounded small">Design</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <p class="i-msg mb-0 text-muted">Many desktop publishing packages
                                                            and web page editors now use Lorem Ipsum</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto ms-auto d-flex flex-column justify-content-between small">
                                                Feb 11</div>
                                        </li>
                                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                                            <div class="hover-actions end-0 me-3 bg-light rounded">
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><i
                                                        class="fa fa-inbox"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Snooze"><i
                                                        class="fa fa-clock-o"></i></button>
                                            </div>
                                            <div class="col col-md-10 col-xxl-11">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                                        <span class="fs-6 me-2">LUNO admin Responsive design issue in
                                                            mobile</span>
                                                        <div>
                                                            <span class="small text-muted text-uppercase me-2">Assigned By:
                                                                Chris Fox</span>
                                                            <span
                                                                class="border border-danger text-danger px-1 rounded small">BugFix</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <p class="i-msg mb-0 text-muted">Richard McClintock, a Latin
                                                            professor at Hampden-Sydney College in Virginia, looked</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto ms-auto d-flex flex-column justify-content-between small">
                                                Feb 11</div>
                                        </li>
                                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                                            <div class="hover-actions end-0 me-3 bg-light rounded">
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><i
                                                        class="fa fa-inbox"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Snooze"><i
                                                        class="fa fa-clock-o"></i></button>
                                            </div>
                                            <div class="col col-md-10 col-xxl-11">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                                        <span class="fs-6 me-2">Start working on new Admin dashboard</span>
                                                        <div>
                                                            <span class="small text-muted text-uppercase me-2">Assigned By:
                                                                Robert</span>
                                                            <span class="border px-1 rounded small">Design</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <p class="i-msg mb-0 text-muted">It was popularised in the 1960s
                                                            with the release of Letraset sheets containing Lorem Ipsum</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto ms-auto d-flex flex-column justify-content-between small">
                                                Feb 12</div>
                                        </li>
                                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                                            <div class="hover-actions end-0 me-3 bg-light rounded">
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><i
                                                        class="fa fa-inbox"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Snooze"><i
                                                        class="fa fa-clock-o"></i></button>
                                            </div>
                                            <div class="col col-md-10 col-xxl-11">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                                        <span class="fs-6 me-2">Create Logo for LUNO admin app</span>
                                                        <div>
                                                            <span class="small text-muted text-uppercase me-2">Assigned By:
                                                                Chris Fox</span>
                                                            <span class="border px-1 rounded small">Design</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <p class="i-msg mb-0 text-muted">Contrary to popular belief, Lorem
                                                            Ipsum is not simply random text.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto ms-auto d-flex flex-column justify-content-between small">
                                                Feb 12</div>
                                        </li>
                                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                                            <div class="hover-actions end-0 me-3 bg-light rounded">
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><i
                                                        class="fa fa-inbox"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Snooze"><i
                                                        class="fa fa-clock-o"></i></button>
                                            </div>
                                            <div class="col col-md-10 col-xxl-11">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                                        <span class="fs-6 me-2">Start Figma to HTML onepage with
                                                            bootstrap</span>
                                                        <div>
                                                            <span class="small text-muted text-uppercase me-2">Assigned By:
                                                                Alexander</span>
                                                            <span
                                                                class="border border-info text-info px-1 rounded small">HTML</span>
                                                            <span
                                                                class="bg-danger text-light px-1 rounded small">Priority</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <p class="i-msg mb-0 text-muted">All the Lorem Ipsum generators on
                                                            the Internet tend to repeat predefined</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto ms-auto d-flex flex-column justify-content-between small">
                                                Feb 15</div>
                                        </li>
                                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                                            <div class="hover-actions end-0 me-3 bg-light rounded">
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><i
                                                        class="fa fa-inbox"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Snooze"><i
                                                        class="fa fa-clock-o"></i></button>
                                            </div>
                                            <div class="col col-md-10 col-xxl-11">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                                        <span class="fs-6 me-2">Create new onepage Figma</span>
                                                        <div>
                                                            <span class="small text-muted text-uppercase me-2">Assigned By:
                                                                Chris Fox</span>
                                                            <span class="border px-1 rounded small">Design</span>
                                                            <span
                                                                class="bg-danger text-light px-1 rounded small">Priority</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <p class="i-msg mb-0 text-muted">Many desktop publishing packages
                                                            and web page editors now use Lorem Ipsum</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto ms-auto d-flex flex-column justify-content-between small">
                                                Feb 15</div>
                                        </li>
                                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                                            <div class="hover-actions end-0 me-3 bg-light rounded">
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><i
                                                        class="fa fa-inbox"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Snooze"><i
                                                        class="fa fa-clock-o"></i></button>
                                            </div>
                                            <div class="col col-md-10 col-xxl-11">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                                        <span class="fs-6 me-2">LUNO admin Responsive design issue in
                                                            mobile</span>
                                                        <div>
                                                            <span class="small text-muted text-uppercase me-2">Assigned By:
                                                                Chris Fox</span>
                                                            <span
                                                                class="border border-danger text-danger px-1 rounded small">BugFix</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <p class="i-msg mb-0 text-muted">Richard McClintock, a Latin
                                                            professor at Hampden-Sydney College in Virginia, looked</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto ms-auto d-flex flex-column justify-content-between small">
                                                Feb 22</div>
                                        </li>
                                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                                            <div class="hover-actions end-0 me-3 bg-light rounded">
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><i
                                                        class="fa fa-inbox"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Snooze"><i
                                                        class="fa fa-clock-o"></i></button>
                                            </div>
                                            <div class="col col-md-10 col-xxl-11">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                                        <span class="fs-6 me-2">Start working on new Admin
                                                            dashboard</span>
                                                        <div>
                                                            <span class="small text-muted text-uppercase me-2">Assigned
                                                                By: Robert</span>
                                                            <span class="border px-1 rounded small">Design</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <p class="i-msg mb-0 text-muted">It was popularised in the 1960s
                                                            with the release of Letraset sheets containing Lorem Ipsum</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto ms-auto d-flex flex-column justify-content-between small">
                                                March 2</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="task_me" role="tabpanel">
                                    <div class="d-flex justify-content-between mb-2">
                                        <h4 class="mt-1 mb-0">Created by me Task</h4>
                                        <button class="btn btn-sm d-block d-lg-none btn-primary task-list-toggle"
                                            type="button"><i class="fa fa-bars"></i></button>
                                    </div>
                                    <!-- widgets: No data -->
                                    <div class="card">
                                        <div class="card-body text-center p-5">
                                            <img src="../assets/img/no-data.svg" class="w120" alt="No Data">
                                            <div class="mt-4 mb-3">
                                                <span class="text-muted">No data to show</span>
                                            </div>
                                            <button type="button" class="btn btn-white border lift">Get
                                                Started</button>
                                            <button type="button" class="btn btn-primary border lift">Back to
                                                Home</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .row end -->
                    </div>
                </div>
                <!-- start: page footer -->

            </div>
        </div>
        <!-- <button class="btn btn-primary px-4 text-uppercase" data-bs-toggle="modal" data-bs-target="#new_task" type="button">Add New Contact</button> -->
        <!-- Modal: New Task -->
        <div class="modal fade" id="new_task" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Notice</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="notice_form">
                            <div class="col-12">
                                <label class="form-label">Notice For</label>
                                <select class="form-select" aria-label="Default select example"
                                    name="noticed_created_for">
                                    <option selected>Select Type</option>
                                    <option value="RENTEE">Rentee</option>
                                    <option value="FLAT_OWNER">Flat Owner</option>
                                    <option value="COMMON">Common</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Notice Title</label>
                                <input class="form-control" type="text" name="notice_title" required=""
                                    autocomplete="off">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Notice Body</label>
                                <textarea class="form-control" name="notice_body" type="text" required="" autocomplete="off" rows="3"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="new_task" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create New Notice</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Task Title</label>
                                <input class="form-control" type="text" required="" autocomplete="off">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Task Detail</label>
                                <textarea class="form-control" type="text" required="" autocomplete="off" rows="3"></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Select Date/Time</label>
                                <div class="input-group">
                                    <input type="date" class="form-control">
                                    <input type="time" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="Remindon">
                                    <label class="form-check-label" for="Remindon">Remind on</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Task tag</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">Design</option>
                                    <option value="2">BugFix</option>
                                    <option value="3">Help</option>
                                    <option value="3">R&D</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Plugin Js -->
        <!-- Jquery Page Js -->
        <script>
            $('.my-task .task-list-toggle').on('click', function() {
                $('.my-task .order-1').toggleClass('open');
            });


            $("#notice_form").submit(function(e) {
                e.preventDefault();
                $(this).find(':input[type=submit]').prop('disabled', true);
                $(".error_msg").html('');
                $('.loader').show();
                var data = new FormData($('#notice_form')[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST",
                    url: "{{ url('real-time-notice-post') }}",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, textStatus, jqXHR) {
                        $('.loader').hide();
                        window.location.href = "{{ url('real-time-notice') }}";
                    }
                }).done(function() {
                    $("#success_msg").html("Data Save Successfully");
                    $('.loader').hide();
                    window.location.href = "{{ url('real-time-notice') }}";
                    // location.reload();
                }).fail(function(data, textStatus, jqXHR) {
                    $("#loader").hide();
                    $(this).find(':input[type=submit]').prop('enabled', true);
                    var json_data = JSON.parse(data.responseText);
                    $.each(json_data.errors, function(key, value) {
                        $("#" + key).after(
                            "<span class='error_msg' style='color: red;font-weigh: 600'>" + value +
                            "</span>");
                    });
                });
            });
        </script>
    </div>
@endsection
