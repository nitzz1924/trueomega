{{----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------}}
@section('title', 'All Notifications')
<x-app-layout>
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <h4 class="fw-semibold mb-8">@yield('title')- ({{$notificationcount}})</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">@yield('title')</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-2 d-flex justify-content-end align-items-center">
                        <div class="">
                            <a data-bs-toggle="modal" data-bs-target="#primary-header-modal" href="#" class="btn btn-outline-primary">
                                <i class="ti ti-plus"></i> Add New Notification
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="">
                <div class="p-4">
                    <table id="file_export" class="table table-hover table-bordered display text-nowrap py-3">
                        <thead>
                            <tr>
                                <th>SNo.</th>
                                <th>Notification Name</th>
                                <th>Notification Description</th>
                                <th>Notification Sends To</th>
                                <th>Created On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @foreach ($allnotificaitons as $index => $data)
                            <tr>
                                <td>{{ $index + 1}}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-6">
                                        <img src="{{asset('assets/images/Notificaitons/'.$data->notificationimg)}}" width="45" class="rounded">
                                        <h6 class="mb-0">{{ $data->notificationname}}</h6>
                                    </div>
                                </td>
                                <td>{{ Str::limit(strip_tags($data->notificationdes), 20) }}</td>
                                <td>{{ $data->sendto == 'all' ? 'Sent to both' : ucfirst($data->sendto) }}</td>
                                <td>{{ $data->created_at->format('d M Y | h:i A')}}</td>
                                <td>
                                    <div class="hstack gap-3 flex-wrap">
                                        <a href="#" data-value="{{ json_encode($data) }}" data-bs-toggle="modal" data-bs-target="#primary-header-modaledit" class="link-dark fs-6 editbtnmodal" data-bs-toggle="tooltip" title="Edit"><i class="ti ti-edit"></i></a>

                                        <button data-bs-toggle="tooltip" title="Delete" onclick="confirmDelete('{{ $data->id }}')" class="link-danger  fs-6"><i class="ti ti-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="primary-header-modal" class="modal fade" tabindex="-1" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary text-white">
                    <h4 class="modal-title text-white" id="primary-header-modalLabel">
                        Add New Notification
                    </h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="#" class="form-horizontal">
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <label class="form-label">Sent to : </label>
                                    <select name="sendto" class="form-select mr-sm-2  mb-2" id="inlineFormCustomSelect" required>
                                        <option selected="">--select to send--</option>
                                        <option value="all">All</option>
                                        <option value="user">Users</option>
                                        <option value="agent">Agents</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label">Notification Title<span class="text-danger">*</span>
                                    </label>
                                    <input type="text" placeholder="Notification Name" name="notificationname" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="form-label">Notification Description</label>
                            <textarea class="form-control p-7 mb-3" name="notificationdes" id="exampleInputText29" cols="20" rows="1" placeholder="Hi, New Listings Coming Up...."></textarea>
                        </div>
                    </form>
                    <label class="form-label">Any Image to share</label>
                    <form action="#" class="dropzone dz-clickable mb-2" id="notificationimg" enctype="multipart/form-data">
                        <div class="dz-default dz-message">
                            <button class="dz-button" type="button">Drop Thumbnail here
                                to upload</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" id="submitAllForms" class="btn bg-primary-subtle text-primary">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="primary-header-modaledit" class="modal fade" tabindex="-1" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary text-white">
                    <h4 class="modal-title text-white" id="primary-header-modalLabel">
                        Edit Notification
                    </h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" id="modalbodyedit">
                    <form action="#" class="form-horizontal">
                        <div class="mb-4">
                            <label class="form-label">Notification Title<span class="text-danger">*</span>
                            </label>
                            <input type="text" placeholder="Notification Name" name="notificationnameupdate" class="form-control" required>
                        </div>
                        <div>
                            <label class="form-label">Notification Description</label>
                            <textarea class="form-control p-7 mb-3" name="notificationdesupdate" id="exampleInputText29" cols="20" rows="1" placeholder="Hi, New Listings Coming Up...."></textarea>
                        </div>
                    </form>
                    <label class="form-label">Any Image to share</label>
                    <form action="#" class="dropzone dz-clickable mb-2" id="notificationimgupdate" enctype="multipart/form-data">
                        <div class="dz-default dz-message">
                            <button class="dz-button" type="button">Drop Thumbnail here
                                to upload</button>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" id="submitAllFormsupdate" class="btn bg-primary-subtle text-primary">
                        Update Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    {{-- Delete functionality --}}
    <script>
        function confirmDelete(id) {
            Swal.fire({
                    title: "Are you sure?"
                    , html: "You want to delete this nortification ?"
                    , icon: "warning"
                    , showCancelButton: true
                    , confirmButtonColor: "#222222"
                    , cancelButtonColor: "#d33"
                    , confirmButtonText: "Yes, delete it!"
                    , cancelButtonText: "Cancel"
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/admin/deletenortification/" + id;
                    }
                });
        }

    </script>

    {{-- Insert functionality --}}
    <script>
        document.querySelector("#submitAllForms").addEventListener("click", function(event) {
            // Check if required fields are empty
            
            const sendToField = document.querySelector('select[name="sendto"]');
            const notificationNameField = document.querySelector('input[name="notificationname"]');

            if (!sendToField.value || sendToField.value === "--select to send--") {
                Swal.fire({
                    title: "Error!",
                    text: "Please select a recipient for the notification.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
                return;
            }

            if (!notificationNameField.value.trim()) {
                Swal.fire({
                    title: "Error!",
                    text: "Please enter a notification title.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
                return;
            }
            event.preventDefault(); 

            // Create a FormData object
            const combinedFormData = new FormData();

            // Select all forms
            const forms = document.querySelectorAll("form");

            // Iterate through each form and append data to combinedFormData
            forms.forEach(form => {
                const formData = new FormData(form);
                for (let [key, value] of formData.entries()) {
                     if (key === "sendto") {
                        const selectElement = form.querySelector('select[name="sendto"]');
                        combinedFormData.append(key, selectElement.value);
                    } else {
                        combinedFormData.append(key, value);
                    }
                }
            });

            // Log form entries to the console
            for (let [key, value] of combinedFormData.entries()) {
                console.log(key, value);
            }


            const propertyThumbnail = Dropzone.forElement("#notificationimg"); // Single image
            // Check if there are any files selected for the thumbnail
            if (propertyThumbnail.files.length > 0) {
                propertyThumbnail.files.forEach((file) => {
                    combinedFormData.append("notificationimg", file);
                });
                console.log("notificationimg:", propertyThumbnail.files);
            }


            // Submit the form data via AJAX
            $.ajax({
                url: '/admin/insertnotification'
                , method: 'POST'
                , data: combinedFormData
                , processData: false
                , contentType: false
                , headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
                , success: function(data) {
                    console.log("%cRaw response:", "background: black; color: green; font-size: 14px;", data);
                    try {
                        if (data.message) {
                            Swal.fire({
                                title: "Success!"
                                , text: data.message
                                , icon: "success"
                                , confirmButtonText: "OK"
                                , customClass: {
                                    confirmButton: "btn btn-primary w-xs me-2 mt-2"
                                }
                                , buttonsStyling: true
                                , showCancelButton: true
                                , showCloseButton: true
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: "Error!"
                                , text: data.message
                                , icon: "error"
                                , confirmButtonText: "OK"
                                , customClass: {
                                    confirmButton: "btn btn-primary w-xs me-2 mt-2"
                                }
                                , buttonsStyling: true
                                , showCancelButton: true
                                , showCloseButton: true
                            });
                        }
                    } catch (e) {
                        console.error("Failed to parse response:", e);
                        Swal.fire({
                            title: "Error!"
                            , text: "The response from the server is not valid JSON."
                            , icon: "error"
                        });
                    }
                }
            });

        });

    </script>

    {{-- Edit functionality --}}
    <script>
        $(document).ready(function() {
            Dropzone.autoDiscover = false;
            $('.editbtnmodal').click(function() {
                var data = $(this).data('value');
                console.log(data);
                $('#modalbodyedit').empty();
                $('#modalbodyedit').append(
                    `
                   <div class="row">
                        <div class="col-md-6">
                            <form action="#" class="form-horizontal">
                                 <div>
                                    <label class="form-label">Sent to : </label>
                                    <select name="sendtoupdate" class="form-select mr-sm-2  mb-3" id="inlineFormCustomSelect" required>
                                        <option selected="">--select to send--</option>
                                        <option value="all" ${data.sendto == 'all' ? 'selected': ''}>All</option>
                                        <option value="user" ${data.sendto == 'user' ? 'selected': ''}>Users</option>
                                        <option value="agent" ${data.sendto == 'agent' ? 'selected': ''}>Agents</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Notification Title<span class="text-danger">*</span>
                                    </label>
                                    <input type="text" value="${data.notificationname}" placeholder="Notification Name" name="notificationnameupdate" class="form-control" required>
                                    <input type="hidden" name="nortiid" value="${data.id}">
                                </div>
                                <div>
                                    <label class="form-label">Notification Description</label>
                                    <textarea class="form-control p-7 mb-3" name="notificationdesupdate" id="exampleInputText29" cols="20" rows="1" placeholder="Hi, New Listings Coming Up....">${data.notificationdes}</textarea>
                                </div>
                            </form>
                            <label class="form-label">Any Image to share</label>
                            <form action="#" class="dropzone dz-clickable mb-2" id="notificationimgupdate" enctype="multipart/form-data">
                                <div class="dz-default dz-message">
                                    <button class="dz-button" type="button">Drop Thumbnail here
                                        to upload</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                              <div id="thumbnailPreview" class="mt-3">
                                <img src="{{asset('assets/images/Notificaitons/${data.notificationimg}')}}" alt="Thumbnail Preview" class="img-fluid rounded-3" style="display: ${data.notificationimg ? 'block' : 'none'};">
                            </div>
                        </div>
                    </div>
                    `
                );
                $.getScript("{{ asset('assets/js/dropzone.min.js') }}", function() {
                    console.log("Dropzone script loaded successfully.");

                    // Initialize Dropzone manually
                    $("#notificationimgupdate").dropzone({
                        url: "#", // Replace with your upload URL
                        maxFiles: 1
                        , acceptedFiles: "image/*"
                        , addRemoveLinks: true
                        , dictDefaultMessage: "Drop files here or click to upload"
                        , init: function() {
                            console.log("Dropzone initialized successfully.");
                        }
                    });
                });
            });
        });

        document.querySelector("#submitAllFormsupdate").addEventListener("click", function(event) {
            event.preventDefault();

            // Create a FormData object
            const combinedFormData = new FormData();

            // Select all forms
            const forms = document.querySelectorAll("form");

            // Iterate through each form and append data to combinedFormData
            forms.forEach(form => {
                const formData = new FormData(form);
                for (let [key, value] of formData.entries()) {
                   if (key === "sendtoupdate") {
                        const selectElement = form.querySelector('select[name="sendtoupdate"]');
                        combinedFormData.append(key, selectElement.value);
                    } else {
                        combinedFormData.append(key, value);
                    }
                }
            });

            // Log form entries to the console
            for (let [key, value] of combinedFormData.entries()) {
                console.log(key, value);
            }


            const propertyThumbnail = Dropzone.forElement("#notificationimgupdate"); // Single image
            // Check if there are any files selected for the thumbnail
            if (propertyThumbnail.files.length > 0) {
                propertyThumbnail.files.forEach((file) => {
                    combinedFormData.append("notificationimgupdate", file);
                });
                console.log("notificationimgupdate:", propertyThumbnail.files);
            }


            // Submit the form data via AJAX
            $.ajax({
                url: '/admin/udpatenortification'
                , method: 'POST'
                , data: combinedFormData
                , processData: false
                , contentType: false
                , headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
                , success: function(data) {
                    console.log("%cRaw response:", "background: black; color: green; font-size: 14px;", data);
                    try {
                        if (data.message) {
                            Swal.fire({
                                title: "Success!"
                                , text: data.message
                                , icon: "success"
                                , confirmButtonText: "OK"
                                , customClass: {
                                    confirmButton: "btn btn-primary w-xs me-2 mt-2"
                                }
                                , buttonsStyling: true
                                , showCancelButton: true
                                , showCloseButton: true
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: "Error!"
                                , text: data.message
                                , icon: "error"
                                , confirmButtonText: "OK"
                                , customClass: {
                                    confirmButton: "btn btn-primary w-xs me-2 mt-2"
                                }
                                , buttonsStyling: true
                                , showCancelButton: true
                                , showCloseButton: true
                            });
                        }
                    } catch (e) {
                        console.error("Failed to parse response:", e);
                        Swal.fire({
                            title: "Error!"
                            , text: "The response from the server is not valid JSON."
                            , icon: "error"
                        });
                    }
                }
            });

        });

    </script>
</x-app-layout>
