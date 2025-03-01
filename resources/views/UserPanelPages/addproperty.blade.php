{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.UserPanelLayouts.user')
@section('title','Add Property')
@section('user-content')
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
                            <a href="{{ route('user.mylistings') }}" class="btn btn-outline-primary">
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
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label class="form-label">Property Name<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" placeholder="Property Name" name="property_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label class="form-label">Near By Location<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" placeholder="Enter Near by Location of Property" name="nearbylocation" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label class="form-label">Approx Rental Income<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" placeholder="Approx Rental Income" name="approxrentalincome" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="form-label">Property Description</label>
                                <div id="editor">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-7">Property Gallery</h4>
                        <form action="#" class="dropzone dz-clickable mb-2" id="propertyGalleryForm" enctype="multipart/form-data">
                            <div class="dz-default dz-message">
                                <button class="dz-button" type="button">Drop files here
                                    to upload</button>
                            </div>
                        </form>
                        <p class="fs-3 text-left text-danger mb-0 fw-bold">
                            Set the property Gallery images. Only *.png, *.jpg and *.jpeg image files are accepted.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-7">Property Videos</h4>
                        <form action="#" class="dropzone dz-clickable mb-2" id="propertyvideosform" enctype="multipart/form-data">
                            <div class="dz-default dz-message">
                                <button class="dz-button" type="button">Drop Video Files here
                                    to upload</button>
                            </div>
                        </form>
                        <p class="fs-3 text-left text-danger pt-3 mb-0 fw-bold">
                            Set the property Videos. Only *.mp4, *.mov and *.avi video files are accepted. <br> Video Max size : 20MB <br> Max can be : 2 Files
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
                                        <label class="form-label">Property Price<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" id="propertyprice" name="price" class="form-control" placeholder="Property Price" value="" required>
                                    </div>
                                    <div class="mt-3 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label text-black fw-bold" for="flexCheckDefault">
                                                Will this price added to the chart ?
                                            </label>
                                        </div>
                                        <div class="form-group mt-3 mb-3" style="display: none;" id="dateInput">
                                            <label class="form-label">Add Date</label>
                                            <input type="date" name="historydate" id="historydateinput" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label class="form-label">Square Foot<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="sqfoot" placeholder="Square Foot" class="form-control" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label class="form-label">Bedroom<span class="text-danger">*</span>
                                        </label>
                                        <input type="number" name="bedroom" placeholder="Bedroom" class="form-control" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label class="form-label">Bathroom<span class="text-danger">*</span>
                                        </label>
                                        <input type="number" name="bathroom" placeholder="Bathroom" class="form-control" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label class="form-label">Floor<span class="text-danger">*</span>
                                        </label>
                                        <input type="number" name="floor" placeholder="Floor" class="form-control" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label class="form-label">City<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="city" placeholder="City" class="form-control" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Property Address</label>
                                        <textarea class="form-control" placeholder="Property Address" name="officeaddress" rows="4" id="input7" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-7">Property Documents</h4>
                        <form action="#" class="dropzone dz-clickable mb-2" id="propertydocumentsform" enctype="multipart/form-data">
                            <div class="dz-default dz-message">
                                <button class="dz-button" type="button">Drop files here
                                    to upload</button>
                            </div>
                        </form>
                        <p class="fs-3 mt-2 text-left text-danger mb-0 fw-bold">
                            Set the property documents. Only *.pdf, *.jpg files are accepted.
                        </p>
                        <div class="mt-4">
                            <form action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="form-label">Upload Master Plan of Property</label>
                                    <input type="file" name="masterplandocument" class="form-control" id="masterplandocument">
                                </div>
                            </form>
                            <p class="fs-3 mt-2 text-left text-danger mb-0 fw-bold">
                                Set the Master Plan Document.<br>Only *.pdf and *.jpg files are accepted.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="offcanvas-md offcanvas-end overflow-auto" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-7">
                                <h4 class="card-title">Set Property Status</h4>
                                <div class="p-2 h-100 bg-danger rounded-circle"></div>
                            </div>
                            <form action="#" class="form-horizontal">
                                <div>
                                    <select name="status" class="form-select mr-sm-2  mb-2" id="inlineFormCustomSelect" required>
                                        <option selected="">--select status--</option>
                                        <option value="unpublished">Unpublished</option>
                                        <option value="published">Published</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-7">Property Thumbnail</h4>
                            <form action="#" class="dropzone dz-clickable mb-2" id="propertythumbnail">
                                <div class="dz-default dz-message">
                                    <button class="dz-button" type="button">Drop Thumbnail here
                                        to upload</button>
                                </div>
                            </form>
                            <p class="fs-3 text-left text-danger mb-0 fw-bold">
                                Set the property thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted.
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <form action="" method="post">
                            <div class="card-body">
                                <h4 class="card-title mb-7">Property Categories</h4>
                                <div class="mb-3">
                                    <select name="category" class="form-select mr-sm-2  mb-2" id="inlineFormCustomSelect" required>
                                        <option value="3" selected="">--select category--</option>
                                        @foreach ($categories as $data)
                                        <option value="{{$data->label}}">{{$data->label}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <form onsubmit="return false;">
                            <div class="card-body">
                                <h4 class="card-title mb-7">Features & Amenities</h4>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label class="form-label text-muted">Enter to Add Amenities</label>
                                        <input type="text" name="input" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <form>
                            <div class="card-body">
                                <h4 class="card-title mb-7">Pin Location in Map</h4>
                                <div class="container well">
                                    <div id="maparea" style="width: 100%; height: 400px;"></div>
                                    <div class="mt-3">
                                        <label class="form-label">Lat</label>
                                        <input type="text" name="latitude" class="form-control" id="us2-lat" />
                                    </div>
                                    <div class="mt-2">
                                        <label class="form-label">Long</label>
                                        <input type="text" name="longitude" class="form-control" id="us2-lon" />
                                    </div>
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
        $(document).ready(function() {
            $('input[name="input"]').tagsinput({
                trimValue: true
                , confirmKeys: [13, 44]
                , focusClass: 'my-focus-class'
            });

            $('.bootstrap-tagsinput input').on('focus', function() {
                $(this).closest('.bootstrap-tagsinput').addClass('has-focus');
            }).on('blur', function() {
                $(this).closest('.bootstrap-tagsinput').removeClass('has-focus');
            });

        });

        document.getElementById("flexCheckDefault").addEventListener("change", function() {
            var dateInput = document.getElementById("dateInput");
            dateInput.style.display = this.checked ? "block" : "none";
        });

    </script>
    <script>
        var counter = 0;
        let amenties = [];
        $(document).on('click', '.addRow', function() {
            counter++;
            var name = $('#amentinamevalue').val();
            amenties.push(name);
            var tr = `
                    <tr>
                        <td class="row-number">${counter}</td>
                        <td>
                            <div class="mb-3">
                                <div class="mb-4">${name}</div>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm deleteRow" data-value="${name}">delete</button>
                        </td>
                    </tr>
                `;
            $('#tablebody').append(tr);
            updateRowNumbers();
            console.log("dsfsd", amenties);
        });

        $(document).on('click', '.deleteRow', function() {
            var valueToRemove = $(this).data("value"); // Get the value associated with the button
            amenties = amenties.filter(item => item !== valueToRemove); // Remove value from array
            $(this).closest('tr').remove();
            updateRowNumbers();
            console.log("Updated Amenities:", amenties);
        });

        // Function to update row numbers dynamically
        function updateRowNumbers() {
            counter = 0; // Reset counter
            $('#tablebody tr').each(function() {
                counter++;
                $(this).find('.row-number').text(counter);
            });
        }

    </script>
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
            const dropzoneInstance = Dropzone.forElement("#propertyGalleryForm"); // Multiple images
            const propertydocumentsform = Dropzone.forElement("#propertydocumentsform"); // Multiple images
            const propertyThumbnail = Dropzone.forElement("#propertythumbnail"); // Single image
            const MasterPlanDocument = document.getElementById("masterplandocument"); // Master Plan Document
            const descriptionContent = quill.root.innerHTML;
            combinedFormData.append("description", descriptionContent);


            //Get Amenities here..
            let amenities = $('input[name="input"]').tagsinput('items');
            combinedFormData.append("amenities", JSON.stringify(amenities));

            //Create JSON for Latitude & Longitude
            const locationData = {
                Latitude: document.getElementById("us2-lat").value
                , Longitude: document.getElementById("us2-lon").value
            };
            combinedFormData.append("location", JSON.stringify(locationData));


            //Get Value of Date using checkbox
            let checkbox = document.getElementById("flexCheckDefault");
            if (checkbox.checked) {
                const PriceHistory = {
                    dateValue: document.getElementById("historydateinput").value
                    , priceValue: document.getElementById("propertyprice").value
                };
                combinedFormData.append("historydate", JSON.stringify([PriceHistory]));
            }


            //Multiple Video Upload Dropzone
            const videosdrop = Dropzone.forElement("#propertyvideosform");
            videosdrop.options.acceptedFiles = "video/mp4, video/mov, video/avi";
            videosdrop.options.maxFilesize = 20; // This is Video Size that is 20 MB maximum.
            videosdrop.options.maxFiles = 2; // Restrict to 2 files maximum
            if (videosdrop.files.length > 2) {
                Swal.fire({
                    title: "Error!"
                    , text: "You can upload a maximum of 2 video files."
                    , icon: "error"
                    , confirmButtonText: "OK"
                    , customClass: {
                        confirmButton: "btn btn-primary w-xs me-2 mt-2"
                    }
                    , buttonsStyling: true
                    , showCancelButton: true
                    , showCloseButton: true
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);
                return;
            }
            videosdrop.files.forEach((Videofile) => {
                if (Videofile) {
                    combinedFormData.append("propertyvideos[]", Videofile);
                }
            });

            // Append multiple image files to FormData
            dropzoneInstance.files.forEach((file) => {
                if (file) {
                    // Append each file to FormData
                    combinedFormData.append("galleryImages[]", file);
                }
            });

            propertydocumentsform.files.forEach((file) => {
                if (file) {
                    // Append each file to FormData
                    combinedFormData.append("documents[]", file);
                }
            });


            // Check if there are any files selected for the thumbnail
            if (propertyThumbnail.files.length > 0) {
                propertyThumbnail.files.forEach((file) => {
                    // Append each file to FormData
                    combinedFormData.append("thumbnailImages", file);
                });
                console.log("thumbnailImages:", propertyThumbnail.files);
            }

            //Master Plan Document
            if (MasterPlanDocument.files.length > 0) {
                for (let i = 0; i < MasterPlanDocument.files.length; i++) {
                    combinedFormData.append("masterplandocument", MasterPlanDocument.files[i]);
                }
                console.log("MasterPlanDocument:", MasterPlanDocument.files);
            }


            // Log all form values to the console
            for (let [key, value] of combinedFormData.entries()) {
                console.log(key, value);
            }


            // Submit the form data via AJAX
            $.ajax({
                url: '/user/insertuserlisting'
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
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "editlisting/" + data.data.id;
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

@endsection
