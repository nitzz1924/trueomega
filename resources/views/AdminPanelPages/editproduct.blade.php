{{----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------}}
@section('title', $productname)
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
                            <a href="{{ route('admin.allproducts') }}" class="btn btn-outline-primary">
                                <i class="ti ti-arrow-narrow-left"></i> Go Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-7">
                            <h4 class="card-title">General</h4>
                            <button class="navbar-toggler border-0 shadow-none d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                <i class="ti ti-menu fs-5 d-flex"></i>
                            </button>
                        </div>
                        <form action="#" class="form-horizontal">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Product Name<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" value="{{$data->productname}}" placeholder="Product Name" name="productname" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="form-label">Description</label>
                                <div id="editorr">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-7">Product Gallery</h4>
                        <form action="#" class="dropzone dz-clickable mb-2" id="productGalleryForm" enctype="multipart/form-data">
                            <div class="dz-default dz-message">
                                <button class="dz-button" type="button">Drop files here
                                    to upload</button>
                            </div>
                        </form>
                        <div id="thumbnailPreview" class="mt-3">
                            @if ($data->galleryImages)
                            <div class=" d-flex">
                                @foreach (json_decode($data->galleryImages) as $galleryimg)
                                <div class="mx-2">
                                    <img src="{{ asset('assets/images/Media/'.$galleryimg) }}" class="rounded-3 img-fluid" alt="Thumbnail" style="max-height: 100px;">
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <p class="fs-3 text-left text-danger mb-0 fw-bold">
                            Set the Product Gallery images. Only *.png, *.jpg and *.jpeg image files are accepted.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-7">Pricing & Other Details</h4>
                        <form action="#">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="">
                                        <label class="form-label">Regular price (₹)<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" value="{{$data->regularprice}}" id="propertyprice" name="regularprice" class="form-control" placeholder="Regular Price" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="">
                                        <label class="form-label">Sale price (₹)<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" value="{{$data->saleprice}}" id="propertyprice" name="saleprice" class="form-control" placeholder="Sale Price" value="" required>
                                    </div>
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
                            <h4 class="card-title mb-7">Product Thumbnail</h4>
                            <form action="#" class="dropzone dz-clickable mb-2" id="productthumbnail">
                                <div class="dz-default dz-message">
                                    <button class="dz-button" type="button">Drop Product Thumbnail here
                                        to upload</button>
                                </div>
                            </form>
                             <div id="thumbnailPreview" class="mt-3">
                                <img src="{{asset('assets/images/Media/'.$data->thumbnailImages)}}" alt="Thumbnail Preview" class="img-fluid rounded-3" style="max-height: 100px; display: {{$data->thumbnailImages ? 'block' : 'none'}};">
                            </div>
                            <p class="fs-3 text-left text-danger mb-0 fw-bold">
                                Set the Product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted.
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-7">
                                <h4 class="card-title">Set Product Status</h4>
                                <div class="p-2 h-100 {{$data->productstatus == 'unpublished' ? 'bg-danger' : 'bg-success'}} rounded-circle"></div>
                            </div>
                            <form action="#" class="form-horizontal">
                                <div>
                                    <select name="status" class="form-select mr-sm-2  mb-2" id="inlineFormCustomSelect" required>
                                        <option selected="">--select status--</option>
                                        <option value="unpublished" {{$data->productstatus == 'unpublished' ? 'selected' : ''}}>Unpublished</option>
                                        <option value="published" {{$data->productstatus == 'published' ? 'selected' : ''}}>Published</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <form action="" method="post">
                            <div class="card-body">
                                <h4 class="card-title mb-7">Product Categories</h4>
                                <div class="mb-3">
                                    <select name="category" class="form-select mr-sm-2  mb-2" id="inlineFormCustomSelect" required>
                                        <option value="3" selected="">--select category--</option>
                                        @foreach ($categories as $datacat)
                                        <option value="{{$data->datacat}}" {{$data->category == $datacat->label ? 'selected' : ''}}>{{$datacat->label}}</option>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
            })


            // Get Dropzone instances
            const productGalleryForm = Dropzone.forElement("#productGalleryForm"); // Multiple images
            const productthumbnail = Dropzone.forElement("#productthumbnail"); // Single image
            const descriptionContent = document.querySelector('#editorr').innerHTML;
            console.log(descriptionContent);
            combinedFormData.append("description", descriptionContent);


            // Append multiple image files to FormData
            productGalleryForm.files.forEach((file) => {
                if (file) {
                    // Append each file to FormData
                    combinedFormData.append("galleryImages[]", file);
                }
            });

        
            // Check if there are any files selected for the thumbnail
            if (productthumbnail.files.length > 0) {
                productthumbnail.files.forEach((file) => {
                    // Append each file to FormData
                    combinedFormData.append("thumbnailImages", file);
                });
            }

            // Log all form values to the console
            for (let [key, value] of combinedFormData.entries()) {
                console.log(key, value);
            }

            // Submit the form data via AJAX
            $.ajax({
                url: '/admin/insertProduct'
                , method: 'POST'
                , data: combinedFormData
                , processData: false
                , contentType: false
                , headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
                , success: function(data) {
                    console.log("%cRaw response:", "background: black; color: green; font-size: 14px;", data);
                    console.log("%cRaw response:", "background: black; color: green; font-size: 14px;", data.id);
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
                            })
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
    <script>
        // Initialize the Quill editor
        var quill = new Quill('#editorr', {
            theme: 'snow'
        });

        // Inject content from Laravel
        const content = @json($data['description']);
        console.log(content);

        // Check if content exists and populate the editor
        if (content) {
            quill.clipboard.dangerouslyPasteHTML(content);
        }

    </script>
</x-app-layout>
