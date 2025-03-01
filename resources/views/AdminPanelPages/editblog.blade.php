{{----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------}}
@section('title', 'Edit Blog')
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
                    <div class="col-md-2 d-flex justify-content-end align-items-center">
                        <div class="">
                            <a href="{{ route('admin.blogslist') }}" class="btn btn-outline-primary">
                                <i class="ti ti-arrow-narrow-left"></i> All Blogs
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 ">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-7">
                            <h4 class="card-title">Blog Information</h4>

                            <button class="navbar-toggler border-0 shadow-none d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                <i class="ti ti-menu fs-5 d-flex"></i>
                            </button>
                        </div>
                        <form action="#" class="form-horizontal">
                            <div class="mb-4">
                                <label class="form-label">Blog Name<span class="text-danger">*</span>
                                </label>
                                <input type="text" placeholder="Blog Name" value="{{$blogs->blogname}}" name="blogname" class="form-control" required>
                                 <input type="hidden" name="blogid" value="{{$blogs->id}}">
                            </div>
                            <div>
                                <label class="form-label">Blog Description</label>
                                <div id="editorblog">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="offcanvas-md offcanvas-end overflow-auto" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-7">Blog Thumbnail</h4>
                            <form action="#" class="dropzone dz-clickable mb-2" id="blogthumbnail">
                                <div class="dz-default dz-message">
                                    <button class="dz-button" type="button">Drop Thumbnail here
                                        to upload</button>
                                </div>
                            </form>
                            <div id="thumbnailPreview" class="mt-3">
                                <img src="{{asset('assets/images/Blogs/'.$blogs->blogthumbnail)}}" alt="Thumbnail Preview" class="img-fluid rounded-3" style="max-height: 100px; display: {{$blogs->blogthumbnail ? 'block' : 'none'}};">
                            </div>
                            <p class="fs-2 text-center text-danger mb-0">
                                Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted.
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <h4 class="card-title mb-7">Blog Details</h4>
                                <div class="mb-3">
                                    <label class="form-label">Blog Categories</label>
                                    <select name="categories" class="select2 form-control" multiple="multiple">
                                        @php
                                            $selectedCategories = json_decode($blogs->blogcategories, true);
                                        @endphp

                                        @foreach ($categories as $data)
                                        <option value="{{ $data->label }}" {{ in_array($data->label, $selectedCategories ?? []) ? 'selected' : '' }}>
                                            {{ $data->label }}
                                        </option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>
                        </form>
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
                    if (key === "categories") {
                        // If the key is "categories", gather all selected values as an array
                        const selectElement = form.querySelector('select[name="categories"]');
                        const selectedValues = Array.from(selectElement.selectedOptions).map(option => option.value);
                        combinedFormData.append(key, JSON.stringify(selectedValues)); // Convert to JSON string
                    } else {
                        combinedFormData.append(key, value);
                    }
                }
            });

            // Get Dropzone instances
            const propertyThumbnail = Dropzone.forElement("#blogthumbnail"); // Single image
            const descriptionContent = document.querySelector('#editorblog').innerHTML;
            console.log(descriptionContent);
            combinedFormData.append("blogdescription", descriptionContent);


            // Check if there are any files selected for the thumbnail
            if (propertyThumbnail.files.length > 0) {
                propertyThumbnail.files.forEach((file) => {
                    // Append each file to FormData
                    combinedFormData.append("blogthumbnail", file);
                });
                console.log("blogthumbnail:", propertyThumbnail.files);
            }

            // Log the combined form data to the console
            for (let [key, value] of combinedFormData.entries()) {
                console.log(key, value);
            }

            // Send AJAX request with CSRF token
            $.ajax({
                url: '/admin/updateblog'
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
                                    window.location.href = "/admin/blogslist/";
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
    <script src="{{ asset('assets/js/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/quill.min.js') }}"></script>
    <script src="{{ asset('assets/js/quill-init.js') }}"></script>
    <script>
        // Initialize the Quill editor
        var quill = new Quill('#editorblog', {
            theme: 'snow'
        });

        // Inject content from Laravel
        const content = @json($blogs['blogdescription']);
        console.log(content);

        // Check if content exists and populate the editor
        if (content) {
            quill.clipboard.dangerouslyPasteHTML(content);
        }

    </script>
</x-app-layout>
