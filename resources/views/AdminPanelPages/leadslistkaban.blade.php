{{----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------}}
@section('title', 'All Leads')
<x-app-layout>
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <h4 class="fw-semibold mb-8">@yield('title')- ({{$leadcount}})</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">@yield('title')</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-2 d-flex justify-content-end align-items-center gap-1">
                        <div class="" data-bs-toggle="tooltip" title="Switch to Kanban">
                            <a href="{{ route('admin.leadslistkaban') }}" class="btn btn-outline-dark">
                                <i class="ti ti-layout-kanban"></i>
                            </a>
                        </div>
                        <div class="" data-bs-toggle="tooltip" title="Switch to List">
                            <a href="{{ route('admin.leadslist') }}" class="btn btn-outline-dark">
                                <i class="ti ti-list"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="scrumboard" id="cancel-row">
            <div class="layout-spacing pb-3">
                <div data-simplebar>
                    <div class="task-list-section">
                        <div id="New" ondrop="drop(event)" ondragover="allowDrop(event)" class="task-list-container">
                            <div class="connect-sorting connect-sorting-todo">
                                <div class="task-container-header">
                                    <h6 class="item-head mb-0 fs-4 fw-semibold" data-item-title="Todo">New</h6>
                                </div>
                                <div class="connect-sorting-content" data-sortable="true">
                                    @foreach($newleads as $new)
                                    <div data-draggable="true" draggable="true" ondragstart="drag(event)" class="card img-task" data-id="{{ $new->id }}">
                                        <div class="card-body">
                                            <div class="task-header" id="table-body">
                                                <div>
                                                    <h4 data-item-title="{{$new->name}}">{{$new->name}}</h4>
                                                </div>
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle" href="javascript:void(0)" role="button" id="dropdownMenuLink-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <i class="ti ti-dots-vertical text-dark"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink-1">
                                                        <a class="dropdown-item kanban-item-edit cursor-pointer d-flex align-items-center gap-1 editbtnmodalnew" href="#" data-record="{{ json_encode($new) }}" data-bs-toggle="modal" data-bs-target="#primary-header-modaledit">
                                                            <i class="ti ti-pencil fs-5"></i>Edit
                                                        </a>
                                                        <a onclick="confirmDelete('{{ $new->id }}')" class="dropdown-item kanban-item-delete cursor-pointer d-flex align-items-center gap-1" href="#">
                                                            <i class="ti ti-trash fs-5"></i>Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="task-content">
                                                <p class="mb-0" data-item-text="Lorem ipsum dolor sit amet, consectetur adipisicing elit, o eiusmod tempor incid.">
                                                    <span class="fw-bold">In : </span>{{$new->city}} / {{$new->state}}
                                                </p>
                                                <p class="mb-0" data-item-text="{{$new->mobilenumber}}">
                                                      <span class="fw-bold">Mobile : </span>+91-{{$new->mobilenumber}}
                                                </p>
                                                <p class="mb-0" data-item-text="{{$new->inwhichcity}}">
                                                     <span class="fw-bold">For City : </span>{{$new->inwhichcity}}
                                                </p>
                                            </div>
                                            <div class="task-body">
                                                <div class="task-bottom">
                                                    <div class="tb-section-1">
                                                        <span class="hstack gap-2 fs-2" data-item-date="{{ $new->created_at->format('d M Y | h:i A')}}">
                                                            <i class="ti ti-calendar fs-5"></i> {{ $new->created_at->format('d M Y | h:i A')}}
                                                        </span>
                                                    </div>
                                                    <div class="tb-section-2">
                                                        <span class="badge text-bg-primary fs-1">{{$new->housecategory}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="Qualified" data-item="qualified" ondrop="drop(event)" ondragover="allowDrop(event)" class="task-list-container" data-action="sorting">
                            <div class="connect-sorting connect-sorting-inprogress">
                                <div class="task-container-header">
                                    <h6 class="item-head mb-0 fs-4 fw-semibold" data-item-title="In Progress">Qualified</h6>
                                </div>
                                <div class="connect-sorting-content" data-sortable="true">
                                    @foreach($qualified as $new)
                                    <div data-draggable="true" draggable="true" ondragstart="drag(event)" class="card img-task" data-id="{{ $new->id }}">
                                        <div class="card-body">
                                            <div class="task-header">
                                                <div>
                                                    <h4 data-item-title="{{$new->name}}">{{$new->name}}</h4>
                                                </div>
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle" href="javascript:void(0)" role="button" id="dropdownMenuLink-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <i class="ti ti-dots-vertical text-dark"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink-1">
                                                        <a class="dropdown-item kanban-item-edit cursor-pointer d-flex align-items-center gap-1 editbtnmodalnew" href="#" data-record="{{ json_encode($new) }}" data-bs-toggle="modal" data-bs-target="#primary-header-modaledit">
                                                            <i class="ti ti-pencil fs-5"></i>Edit
                                                        </a>
                                                        <a onclick="confirmDelete('{{ $new->id }}')"  class="dropdown-item kanban-item-delete cursor-pointer d-flex align-items-center gap-1" href="#">
                                                            <i class="ti ti-trash fs-5"></i>Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="task-content">
                                                <p class="mb-0" data-item-text="Lorem ipsum dolor sit amet, consectetur adipisicing elit, o eiusmod tempor incid.">
                                                    <span class="fw-bold">For City : </span>{{$new->city}} / {{$new->state}}
                                                </p>
                                                <p class="mb-0" data-item-text="{{$new->mobilenumber}}">
                                                    <span class="fw-bold">Mobile : </span>+91-{{$new->mobilenumber}}
                                                </p>
                                                <p class="mb-0" data-item-text="{{$new->inwhichcity}}">
                                                    <span class="fw-bold">For City : </span>{{$new->inwhichcity}}
                                                </p>
                                            </div>
                                            <div class="task-body">
                                                <div class="task-bottom">
                                                    <div class="tb-section-1">
                                                        <span class="hstack gap-2 fs-2" data-item-date="{{ $new->created_at->format('d M Y | h:i A')}}">
                                                            <i class="ti ti-calendar fs-5"></i> {{ $new->created_at->format('d M Y | h:i A')}}
                                                        </span>
                                                    </div>
                                                    <div class="tb-section-2">
                                                        <span class="badge text-bg-primary fs-1">{{$new->housecategory}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="Not Responded" data-item="not responded" ondrop="drop(event)" ondragover="allowDrop(event)" class="task-list-container" data-action="sorting">
                            <div class="connect-sorting connect-sorting-pending">
                                <div class="task-container-header">
                                    <h6 class="item-head mb-0 fs-4 fw-semibold" data-item-title="Pending">Not Responded</h6>
                                </div>
                                <div class="connect-sorting-content" data-sortable="true">
                                    @foreach($notresponded as $new)
                                    <div data-draggable="true" draggable="true" ondragstart="drag(event)" class="card img-task" data-id="{{ $new->id }}">
                                        <div class="card-body">
                                            <div class="task-header">
                                                <div>
                                                    <h4 data-item-title="{{$new->name}}">{{$new->name}}</h4>
                                                </div>
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle" href="javascript:void(0)" role="button" id="dropdownMenuLink-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <i class="ti ti-dots-vertical text-dark"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink-1">
                                                        <a class="dropdown-item kanban-item-edit cursor-pointer d-flex align-items-center gap-1 editbtnmodalnew" href="#" data-record="{{ json_encode($new) }}" data-bs-toggle="modal" data-bs-target="#primary-header-modaledit">
                                                            <i class="ti ti-pencil fs-5"></i>Edit
                                                        </a>
                                                        <a onclick="confirmDelete('{{ $new->id }}')"  class="dropdown-item kanban-item-delete cursor-pointer d-flex align-items-center gap-1" href="#">
                                                            <i class="ti ti-trash fs-5"></i>Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="task-content">
                                                <p class="mb-0" data-item-text="Lorem ipsum dolor sit amet, consectetur adipisicing elit, o eiusmod tempor incid.">
                                                      <span class="fw-bold">In : </span>{{$new->city}} / {{$new->state}}
                                                </p>
                                                <p class="mb-0" data-item-text="{{$new->mobilenumber}}">
                                                    <span class="fw-bold">Mobile : </span>+91-{{$new->mobilenumber}}
                                                </p>
                                                <p class="mb-0" data-item-text="{{$new->inwhichcity}}">
                                                    <span class="fw-bold">For City : </span>{{$new->inwhichcity}}
                                                </p>
                                            </div>
                                            <div class="task-body">
                                                <div class="task-bottom">
                                                    <div class="tb-section-1">
                                                        <span class="hstack gap-2 fs-2" data-item-date="{{ $new->created_at->format('d M Y | h:i A')}}">
                                                            <i class="ti ti-calendar fs-5"></i> {{ $new->created_at->format('d M Y | h:i A')}}
                                                        </span>
                                                    </div>
                                                    <div class="tb-section-2">
                                                        <span class="badge text-bg-primary fs-1">{{$new->housecategory}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="Final" data-item="final" ondrop="drop(event)" ondragover="allowDrop(event)" class="task-list-container" data-action="sorting">
                            <div class="connect-sorting connect-sorting-done">
                                <div class="task-container-header">
                                    <h6 class="item-head mb-0 fs-4 fw-semibold" data-item-title="Done">Final</h6>
                                </div>
                                <div class="connect-sorting-content" data-sortable="true">
                                    @foreach($paymentmode as $new)
                                    <div data-draggable="true" draggable="true" ondragstart="drag(event)" class="card img-task" data-id="{{ $new->id }}">
                                        <div class="card-body">
                                            <div class="task-header">
                                                <div>
                                                    <h4 data-item-title="{{$new->name}}">{{$new->name}}</h4>
                                                </div>
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle" href="javascript:void(0)" role="button" id="dropdownMenuLink-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <i class="ti ti-dots-vertical text-dark"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink-1">
                                                        <a class="dropdown-item kanban-item-edit cursor-pointer d-flex align-items-center gap-1 editbtnmodalnew" href="#" data-record="{{ json_encode($new) }}" data-bs-toggle="modal" data-bs-target="#primary-header-modaledit">
                                                            <i class="ti ti-pencil fs-5"></i>Edit
                                                        </a>
                                                        <a onclick="confirmDelete('{{ $new->id }}')"  class="dropdown-item kanban-item-delete cursor-pointer d-flex align-items-center gap-1" href="#">
                                                            <i class="ti ti-trash fs-5"></i>Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="task-content">
                                                <p class="mb-0" data-item-text="Lorem ipsum dolor sit amet, consectetur adipisicing elit, o eiusmod tempor incid.">
                                                      <span class="fw-bold">In : </span>{{$new->city}} / {{$new->state}}
                                                </p>
                                                <p class="mb-0" data-item-text="{{$new->mobilenumber}}">
                                                    <span class="fw-bold">Mobile : </span>+91-{{$new->mobilenumber}}
                                                </p>
                                                <p class="mb-0" data-item-text="{{$new->inwhichcity}}">
                                                    <span class="fw-bold">For City : </span>{{$new->inwhichcity}}
                                                </p>
                                            </div>
                                            <div class="task-body">
                                                <div class="task-bottom">
                                                    <div class="tb-section-1">
                                                        <span class="hstack gap-2 fs-2" data-item-date="{{ $new->created_at->format('d M Y | h:i A')}}">
                                                            <i class="ti ti-calendar fs-5"></i> {{ $new->created_at->format('d M Y | h:i A')}}
                                                        </span>
                                                    </div>
                                                    <div class="tb-section-2">
                                                        <span class="badge text-bg-primary fs-1">{{$new->housecategory}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="Won" data-item="won" ondrop="drop(event)" ondragover="allowDrop(event)" class="task-list-container" data-action="sorting">
                            <div class="connect-sorting connect-sorting-done">
                                <div class="task-container-header">
                                    <h6 class="item-head mb-0 fs-4 fw-semibold" data-item-title="Done">Won</h6>
                                </div>
                                <div class="connect-sorting-content" data-sortable="true">
                                    @foreach($won as $new)
                                    <div data-draggable="true" draggable="true" ondragstart="drag(event)" class="card img-task" data-id="{{ $new->id }}">
                                        <div class="card-body">
                                            <div class="task-header">
                                                <div>
                                                    <h4 data-item-title="{{$new->name}}">{{$new->name}}</h4>
                                                </div>
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle" href="javascript:void(0)" role="button" id="dropdownMenuLink-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <i class="ti ti-dots-vertical text-dark"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink-1">
                                                        <a class="dropdown-item kanban-item-edit cursor-pointer d-flex align-items-center gap-1 editbtnmodalnew" href="#" data-record="{{ json_encode($new) }}" data-bs-toggle="modal" data-bs-target="#primary-header-modaledit">
                                                            <i class="ti ti-pencil fs-5"></i>Edit
                                                        </a>
                                                        <a onclick="confirmDelete('{{ $new->id }}')"  class="dropdown-item kanban-item-delete cursor-pointer d-flex align-items-center gap-1" href="#">
                                                            <i class="ti ti-trash fs-5"></i>Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="task-content">
                                                <p class="mb-0" data-item-text="Lorem ipsum dolor sit amet, consectetur adipisicing elit, o eiusmod tempor incid.">
                                                      <span class="fw-bold">In : </span>{{$new->city}} / {{$new->state}}
                                                </p>
                                                <p class="mb-0" data-item-text="{{$new->mobilenumber}}">
                                                    <span class="fw-bold">Mobile : </span>+91-{{$new->mobilenumber}}
                                                </p>
                                                <p class="mb-0" data-item-text="{{$new->inwhichcity}}">
                                                    <span class="fw-bold">For City : </span>{{$new->inwhichcity}}
                                                </p>
                                            </div>
                                            <div class="task-body">
                                                <div class="task-bottom">
                                                    <div class="tb-section-1">
                                                        <span class="hstack gap-2 fs-2" data-item-date="{{ $new->created_at->format('d M Y | h:i A')}}">
                                                            <i class="ti ti-calendar fs-5"></i> {{ $new->created_at->format('d M Y | h:i A')}}
                                                        </span>
                                                    </div>
                                                    <div class="tb-section-2">
                                                        <span class="badge text-bg-primary fs-1">{{$new->housecategory}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="primary-header-modaledit" class="modal fade" tabindex="-1" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary text-white">
                    <h4 class="modal-title text-white" id="primary-header-modalLabel">
                        Edit Details
                    </h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.updatelead') }}" class="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body" id="modalbodynew">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn bg-primary-subtle text-primary ">
                            Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    {{--BASSSS HAWA NICKAL GAI THI TUM DONO KII MUJE KARTE KARTE AB YAAD RAKHNA MUJE😂--}}
    <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
            console.log("Div ID : " + data);
            var targetId = ev.target.id;
            console.log("Dropped in column ID: " + targetId);
        }

        function kanbanSortable() {
            $('[data-sortable="true"]').sortable({
                connectWith: ".connect-sorting-content", // Allow sorting across different columns
                items: ".card", // Specify draggable items
                cursor: "move", // Change cursor when dragging
                placeholder: "ui-state-highlight", // Visual feedback for the drop area
                refreshPosition: true, // Refresh positions when dragging
                update: function(event, ui) {
                    // Get card and column details after dropping
                    var card_id = ui.item.attr("data-id"); // Get the dragged card's ID
                    var box_id = ui.item.closest('.task-list-container').attr("id"); // Get the target column's ID

                    console.log("Card ID: " + card_id + ", Box ID: " + box_id);

                    // Perform AJAX request to update the lead's status
                    $.ajax({
                        url: "{{ route('admin.updateLeadStatusKanban') }}", // Your backend route
                        method: "POST"
                        , data: {
                            _token: "{{ csrf_token() }}", // CSRF token for security
                            card_id: card_id, // Card ID
                            box_status: box_id // Target column ID
                        }
                        , success: function(response) {
                            if (response.success) {
                                console.log(response.message);
                            } else {
                                console.error("Failed to update status:", response.message);
                            }
                        }
                        , error: function(xhr) {
                            console.error("Error updating status:", xhr.responseText);
                        }
                    });
                }
            }).disableSelection();
        }

    </script>


    {{-- Edit & Delete Functionality Code--}}
    <script>
        $('.editbtnmodalnew').on('click', function() {
            const rowdata = $(this).data('record');
            console.log(rowdata);
            $('#modalbodynew').empty();
            $('#modalbodynew').html(`
                     <div class="">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                     <div class="">
                                        <label class="mb-2">Customer Name
                                        </label>
                                        <input type="text" name="customername" placeholder="Customer Name" class="form-control" value="${rowdata.name}" >
                                    </div>
                                    <input type="hidden" name="leadid" class="" value="${rowdata.id}">
                                </div>
                                <div class="col-md-4">
                                     <div class="">
                                        <label class="mb-2">Mobile Number
                                        </label>
                                        <input type="text" name="mobilenumber" placeholder="Mobile Number" class="form-control" value="${rowdata.mobilenumber}" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <div class="">
                                        <label class="mb-2">Email
                                        </label>
                                        <input type="text" name="email" placeholder="Email" class="form-control" value="${rowdata.email}" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <div class="mt-3">
                                        <label class="mb-2">City
                                        </label>
                                        <input type="text" name="city" placeholder="City" class="form-control" value="${rowdata.city}" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <div class="mt-3">
                                        <label class="mb-2">City of Property
                                        </label>
                                        <input type="text" name="cityofproperty" placeholder="City of Property" class="form-control" value="${rowdata.inwhichcity}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
        });


         function confirmDelete(id) {
            Swal.fire({
                    title: "Are you sure?"
                    , html: "You want to delete ?"
                    , icon: "warning"
                    , showCancelButton: true
                    , confirmButtonColor: "#222222"
                    , cancelButtonColor: "#d33"
                    , confirmButtonText: "Yes, delete it!"
                    , cancelButtonText: "Cancel"
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/admin/deletelead/" + id;
                    }
                });
        }
    </script>

</x-app-layout>
