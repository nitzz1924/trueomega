{{----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------}}
@section('title', 'Invest Settings')
<x-app-layout>
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <h4 class="fw-semibold mb-8">@yield('title')</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">@yield('title')</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 ">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-7">
                            <h4 class="card-title">Invest Page Information</h4>
                        </div>
                        <div class="">
                            <div class="">
                                <h4 class="card-title mb-7">Banner Video</h4>
                                <form action="#" class="dropzone dz-clickable mb-2" id="bannervideo">
                                    <div class="dz-default dz-message">
                                        <button class="dz-button" type="button">Drop Video here
                                            to upload</button>
                                    </div>
                                </form>
                                <p class="fs-3 text-left text-danger mb-0 fw-bold">
                                    Set the banner Video. Only *.mp4, *.mov and *.avi video files are accepted.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="#" class="form-horizontal">
                            <div>
                                <h4 class="card-title mb-7">Text to Share</h4>
                                <div id="editor">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-7">Images</h4>
                        <form action="#" class="dropzone dz-clickable mb-2" id="imagestoshare" enctype="multipart/form-data">
                            <div class="dz-default dz-message">
                                <button class="dz-button" type="button">Drop files here
                                    to upload</button>
                            </div>
                        </form>
                        <p class="fs-3 text-left text-danger mb-0 fw-bold">
                            Only *.png, *.jpg and *.jpeg image files are accepted.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-7">Videos</h4>
                        <form action="#" class="dropzone dz-clickable mb-2" id="videostoshare" enctype="multipart/form-data">
                            <div class="dz-default dz-message">
                                <button class="dz-button" type="button">Drop Video Files here
                                    to upload</button>
                            </div>
                        </form>
                        <p class="fs-3 text-left text-danger pt-3 mb-0 fw-bold">
                            Only *.mp4, *.mov and *.avi video files are accepted. <br> Video Max size : 30MB
                        </p>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-start mb-5">
                <button type="button" id="submitAllForms" class="btn btn-primary">
                    Save changes
                </button>
            </div>
        </div>
    </div>
    <script>
        document.querySelector("#submitAllForms").addEventListener("click", function(event) {
            event.preventDefault();

            // Create a FormData object
            const combinedFormData = new FormData();

            // Select all forms
            const forms = document.querySelectorAll("form");

            // Iterate through each form and append data to combinedFormData
            forms.forEach(form => {
                const formData = new FormData(form);
                for (let [key, value] of formData.entries()) {
                    combinedFormData.append(key, value);
                }
            });

            // Get Dropzone instances
            const bannerVideo = Dropzone.forElement("#bannervideo");
            const imagesToShare = Dropzone.forElement("#imagestoshare");
            const descriptionContent = quill.root.innerHTML;
            combinedFormData.append("description", descriptionContent);

            // Check if there are any files selected for the banner video
            if (bannerVideo.files.length > 0) {
                bannerVideo.files.forEach((file) => {
                    // Append each file to FormData
                    combinedFormData.append("bannervideo", file);
                });
            }

            // Append multiple image files to FormData
            imagesToShare.files.forEach((file) => {
                if (file) {
                    // Append each file to FormData
                    combinedFormData.append("imagestoshare[]", file);
                }
            });

            //Multiple Video Upload Dropzone
            const videosToShare = Dropzone.forElement("#videostoshare");
            videosToShare.options.acceptedFiles = "video/mp4, video/mov, video/avi";
            videosToShare.options.maxFilesize = 30; // This is Video Size that is 20 MB maximum.
            videosToShare.files.forEach((Videofile) => {
                if (Videofile) {
                    combinedFormData.append("videostoshare[]", Videofile);
                }
            });


            // Log the combined form data to the console
            for (let [key, value] of combinedFormData.entries()) {
                console.log(key, value);
            }

            // Send AJAX request with CSRF token
            $.ajax({
                url: '/admin/submitinvestpagesettings'
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
                                    window.location.reload();
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
