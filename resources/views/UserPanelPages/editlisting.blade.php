{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.UserPanelLayouts.user')
@section('title','Edit Property')
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
                        <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
                            <i class="ti ti-arrow-narrow-left"></i> Go Back
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
                                    <input type="text" value="{{$listingdata->property_name}}" placeholder="Property Name" name="property_name" class="form-control" required>
                                    <input type="hidden" name="listingid" value="{{$listingdata->id}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label class="form-label">Near By Location<span class="text-danger">*</span>
                                    </label>
                                    <input type="text" value="{{$listingdata->nearbylocation}}" placeholder="Enter Near by Location of Property" name="nearbylocation" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="mb-4">
                                        <label class="form-label">Approx Rental Income<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" value="{{$listingdata->approxrentalincome}}" placeholder="Approx Rental Income" name="approxrentalincome" class="form-control" required>
                                    </div>
                                </div>
                        </div>
                        <div>
                            <label class="form-label">Property Description</label>
                            <div id="editorr">
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
                    <div id="thumbnailPreview" class="mt-3">
                        @if ($listingdata->gallery)
                        <div class=" d-flex">
                            @foreach (json_decode($listingdata->gallery) as $galleryimg)
                            <div class="mx-2">
                                <img src="{{ asset($galleryimg) }}" class="rounded-3 img-fluid" alt="Thumbnail" style="max-height: 100px;">
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <p class="fs-3 text-start text-danger pt-3 mb-0 fw-bold">
                        Set the product Gallery images. Only *.png, *.jpg and *.jpeg image files are accepted.
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
                    <div id="videoPreview" class="mt-3">
                        @if ($listingdata->videos)
                        <div class="d-flex flex-wrap">
                            @foreach (json_decode($listingdata->videos) as $video)
                            <div class="mx-2 mb-2">
                                <video controls class="rounded-3" style="max-height: 200px; max-width: 300px;">
                                    <source src="{{ asset($video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <p class="fs-3 text-start text-danger pt-3 mb-0 fw-bold">
                        Set the property Videos. Only *.mp4, *.mov and *.avi video files are accepted. <br> Video Max size : 20MB
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
                                    <input type="text" id="propertyprice" value="{{$listingdata->price}}" name="price" class="form-control" placeholder="Property Price" required>
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
                                    <input type="text" value="{{$listingdata->squarefoot}}" name="sqfoot" placeholder="Square Foot" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label class="form-label">Bedroom<span class="text-danger">*</span>
                                    </label>
                                    <input type="number" value="{{$listingdata->bedroom}}" name="bedroom" placeholder="Bedroom" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label class="form-label">Bathroom<span class="text-danger">*</span>
                                    </label>
                                    <input type="number" value="{{$listingdata->bathroom}}" name="bathroom" placeholder="Bathroom" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label class="form-label">Floor<span class="text-danger">*</span>
                                    </label>
                                    <input type="number" name="floor" placeholder="Floor" class="form-control" value="{{$listingdata->floor}}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label class="form-label">City<span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="city" placeholder="City" class="form-control" value="{{$listingdata->city}}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Property Address</label>
                                    <textarea class="form-control" placeholder="Property Address" name="officeaddress" rows="4" id="input7" required>{{$listingdata->address}}</textarea>
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
                    @if ($listingdata->documents)
                    <div class="d-flex">
                        @foreach (json_decode($listingdata->documents) as $document)
                        <div class="mx-2">
                            @if (pathinfo($document, PATHINFO_EXTENSION) == 'pdf')
                            <iframe src="{{ asset($document) }}" class="rounded-3 img-fluid" style="max-height: 200px; max-width: 300px;" frameborder="0"></iframe>
                            @else
                            <img src="{{ asset($document) }}" class="rounded-3 img-fluid" alt="Document" style="max-height: 100px;">
                            @endif
                            <a href="{{ asset($document) }}" class="btn btn-outline-primary mt-2" download>Download</a>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    <p class="fs-3 mt-4 text-start text-danger mb-0 fw-bold">
                        Set the product documents. Only *.pdf files are accepted.
                    </p>
                    <div class="mt-4">
                        <form action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="form-label">Upload Master Plan of Property</label>
                                <input type="file" name="masterplandocument" class="form-control" id="masterplandocument">
                            </div>
                        </form>
                        @if ($listingdata->masterplandoc)
                        <div class="mt-2">
                            @if (pathinfo($listingdata->masterplandoc, PATHINFO_EXTENSION) == 'pdf')
                            <iframe src="{{ asset('assets/images/Listings/' . $listingdata->masterplandoc) }}" class="rounded-3 img-fluid" style="max-height: 200px; max-width: 300px;" frameborder="0"></iframe>
                            @else
                            <img src="{{ asset('assets/images/Listings/' . $listingdata->masterplandoc) }}" class="rounded-3 img-fluid" alt="Document" style="max-height: 100px;">
                            @endif
                            <a href="{{ asset('assets/images/Listings/' . $listingdata->masterplandoc) }}" class="btn btn-outline-primary mt-2" download>Download</a>
                        </div>
                        @endif
                        <p class="fs-3 mt-2 text-left text-danger mb-0 fw-bold">
                            Set the Master Plan Document. Only *.pdf files are accepted.
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
                            <h4 class="card-title">Status</h4>
                            <div class="p-2 h-100 {{$listingdata->status == 'unpublished' ? 'bg-danger' : 'bg-success'}} rounded-circle"></div>
                        </div>
                        <form action="#" class="form-horizontal">
                            <div>
                                <select name="status" class="form-select mr-sm-2  mb-2" id="inlineFormCustomSelect" required>
                                    <option selected="">--select status--</option>
                                    <option value="unpublished" {{$listingdata->status == 'unpublished' ? 'selected' : ''}}>Unpublished</option>
                                    <option value="published" {{$listingdata->status == 'published' ? 'selected' : ''}}>Published</option>
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
                        <div id="thumbnailPreview" class="mt-3">
                            <img src="{{asset('assets/images/Listings/'.$listingdata->thumbnail)}}" alt="Thumbnail Preview" class="img-fluid rounded-3" style="max-height: 100px; display: {{$listingdata->thumbnail ? 'block' : 'none'}};">
                        </div>
                        <p class="fs-3 text-start mt-3 text-danger mb-0 fw-bold">
                            Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted.
                        </p>
                    </div>
                </div>
                <script>
                    Dropzone.options.propertythumbnail = {
                        init: function() {
                            this.on("success", function(file, response) {
                                const thumbnailPreview = document.querySelector("#thumbnailPreview img");
                                thumbnailPreview.src = URL.createObjectURL(file);
                                thumbnailPreview.style.display = 'block';
                            });
                        }
                    };

                </script>

                <div class="card">
                    <form action="" method="post">
                        <div class="card-body">
                            <h4 class="card-title mb-7">Property Details</h4>
                            <div class="mb-3">
                                <label class="form-label">Categories</label>
                                <select name="category" class="form-select mr-sm-2  mb-2" id="inlineFormCustomSelect" required>
                                    <option value="3" selected="">--select category--</option>
                                    @foreach ($categories as $data)
                                    <option value="{{$data->label}}" {{$listingdata->category == $data->label ? 'selected' : ''}}>{{$data->label}}</option>
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
                                    <input type="text" value="{{ isset($listingdata->amenties) && is_array($listingdata->amenties) ? implode(',', $listingdata->amenties) : '' }}" name="input" class="form-control" data-role="tagsinput">
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
                                @php
                                $locations = json_decode($listingdata->maplocations,true);
                                @endphp
                                <div class="mt-3">
                                    <label class="form-label">Lat</label>
                                    <input type="text" value="{{ $locations['Latitude']}}" name="latitude" class="form-control" id="us2-lat" />
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">Long</label>
                                    <input type="text" value="{{ $locations['Longitude']}}" name="longitude" class="form-control" id="us2-lon" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <form>
                        <div class="card-body">
                            <h4 class="card-title mb-7">Price History</h4>
                            @if(!empty($listingdata->pricehistory))
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sno</th>
                                                <th>On this date</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        @php
                                        $history = json_decode($listingdata->pricehistory, true) ?? [];
                                        @endphp
                                        <tbody>
                                            @foreach ($history as $index => $data)
                                            <tr>
                                                <td>{{ (int)$index + 1 }}</td>
                                                <td>{{ \Carbon\Carbon::parse($data['dateValue'])->format('d-M-Y') }}</td>
                                                <td>₹ {{ $data['priceValue'] }} /-</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @else
                            <h4 class="card-title mb-7">No History Found</h4>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-start mb-5">
            <button type="button" id="submitAllForms" class="btn btn-primary">
                Update changes
            </button>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        var amenities = $('input[name="input"]').val(); // Get preloaded values

        $('input[name="input"]').tagsinput({
            trimValue: true
            , confirmKeys: [13, 44, 32], // Enter, comma, space
            focusClass: 'my-focus-class'
        });

        // Set existing values on page load
        if (amenities) {
            var amenityArray = amenities.split(','); // Convert string to array
            amenityArray.forEach(function(item) {
                $('input[name="input"]').tagsinput('add', item.trim());
            });
        }
    });


    document.getElementById("flexCheckDefault").addEventListener("change", function() {
        var dateInput = document.getElementById("dateInput");
        dateInput.style.display = this.checked ? "block" : "none";
    });

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
        });

        // Get Dropzone instances
        const dropzoneInstance = Dropzone.forElement("#propertyGalleryForm"); // Multiple images
        const propertydocumentsform = Dropzone.forElement("#propertydocumentsform"); // Multiple images
        const propertyThumbnail = Dropzone.forElement("#propertythumbnail"); // Single image
        const MasterPlanDocument = document.getElementById("masterplandocument"); // Master Plan Document
        const descriptionContent = document.querySelector('#editorr').innerHTML;
        console.log(descriptionContent);
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


        //Get Value of Price History using checkbox
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
        videosdrop.options.maxFilesize = 20; // This is Video Size that is 10 MB maximum.
        videosdrop.files.forEach((Videofile) => {
            if (Videofile) {
                combinedFormData.append("propertyvideos[]", Videofile);
            }
        });
        console.log("Property Videos:", videosdrop.files);



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
        console.log("propertydocumentsform:", propertydocumentsform.files);


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

        // Submit the form data via AJAX
        $.ajax({
            url: '/user/updateuserlisting'
            , method: 'POST'
            , data: combinedFormData
            , processData: false
            , contentType: false
            , headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
            , success: function(data) {
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
                                window.location.href = "/user/mylistings/";
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
    var quill = new Quill('#editorr', {
        theme: 'snow'
    });

    // Inject content from Laravel
    const content = @json($listingdata['discription']);
    console.log(content);

    // Check if content exists and populate the editor
    if (content) {
        quill.clipboard.dangerouslyPasteHTML(content);
    }

</script>
@endsection
