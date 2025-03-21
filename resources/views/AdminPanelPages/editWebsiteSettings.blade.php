{{----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------}}
@section('title', 'Edit Home Page Banners')
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
                        <h4 class="card-title mb-7">Main Slider Images</h4>
                        <form action="#" class="dropzone dz-clickable mb-2" id="mainslideriamges" enctype="multipart/form-data">
                            <div class="dz-default dz-message">
                                <button class="dz-button" type="button">Drop Thumbnail here
                                    to upload</button>
                            </div>
                        </form>
                        <div id="thumbnailPreview" class="mt-3">
                            @if ($websitedata->mainslideriamges)
                            <div class="d-flex">
                                @foreach (json_decode($websitedata->mainslideriamges) as $main)
                                <div class="mx-2 position-relative image-container" style="display: inline-block;">
                                    <img src="{{ asset($main) }}" class="rounded-3 img-fluid" alt="Thumbnail" style="max-height: 100px;">
                                    <button data-image="{{ $main }}"  class="btn btn-danger pe-2 ps-2 rounded text-black delete-image-btn" style="position: absolute; top: -2px; right: 0px;">X
                                    </button>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <p class="fs-2 text-center text-danger mb-0">
                            Set the main banner slider images. Only *.png, *.jpg and *.jpeg image files are accepted.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-7">Offer Slider Images</h4>
                        <form action="#" class="dropzone dz-clickable mb-2" id="offersliderimages" enctype="multipart/form-data">
                            <div class="dz-default dz-message">
                                <button class="dz-button" type="button">Drop Thumbnail here
                                    to upload</button>
                            </div>
                        </form>
                        <div id="thumbnailPreview" class="mt-3">
                            @if ($websitedata->offersliderimages)
                            <div class=" d-flex">
                                @foreach (json_decode($websitedata->offersliderimages) as $offer)
                                <div class="mx-2 position-relative image-containeroffer" style="display: inline-block;">
                                    <img src="{{ asset($offer) }}" class="rounded-3 img-fluid" alt="Thumbnail" style="max-height: 100px;" alt="Thumbnail" style="max-height: 100px;">
                                     <button data-imageoffer="{{ $offer }}" class="btn btn-danger pe-2 ps-2 rounded text-black deleteoffer-image-btn" style="position: absolute; top: -2px; right: 0px;">X
                                    </button>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <p class="fs-2 text-center text-danger mb-0">
                            Set the Offer slider images. Only *.png, *.jpg and *.jpeg image files are accepted.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="offcanvas-md offcanvas-end overflow-auto" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-7">First Offer Banner Image</h4>
                            <form action="#" class="dropzone dz-clickable mb-2" id="firstofferimage">
                                <div class="dz-default dz-message">
                                    <button class="dz-button" type="button">Drop Thumbnail here
                                        to upload</button>
                                </div>
                            </form>
                            <div id="thumbnailPreview" class="mt-3">
                                <img src="{{asset('assets/images/Media/'.$websitedata->firstofferimage)}}" alt="Thumbnail Preview" class="img-fluid rounded-3" style="max-height: 100px; display: {{$websitedata->firstofferimage ? 'block' : 'none'}};">
                            </div>
                            <p class="fs-2 text-center text-danger mb-0">
                                Set First Offer Banner Image. Only *.png, *.jpg and *.jpeg image files are accepted.
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-7">Second Offer Banner Image</h4>
                            <form action="#" class="dropzone dz-clickable mb-2" id="secondofferimage">
                                <div class="dz-default dz-message">
                                    <button class="dz-button" type="button">Drop Thumbnail here
                                        to upload</button>
                                </div>
                            </form>
                            <div id="thumbnailPreview" class="mt-3">
                                <img src="{{asset('assets/images/Media/'.$websitedata->secondofferimage)}}" alt="Thumbnail Preview" class="img-fluid rounded-3" style="max-height: 100px; display: {{$websitedata->secondofferimage ? 'block' : 'none'}};">
                            </div>
                            <p class="fs-2 text-center text-danger mb-0">
                                Set Second Offer Banner Image. Only *.png, *.jpg and *.jpeg image files are accepted.
                            </p>
                        </div>
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

            const mainslideriamges = Dropzone.forElement("#mainslideriamges");
            const offersliderimages = Dropzone.forElement("#offersliderimages");
            const firstofferimage = Dropzone.forElement("#firstofferimage");
            const secondofferimage = Dropzone.forElement("#secondofferimage");


            // Check if there are any files selected for the thumbnail
            if (firstofferimage.files.length > 0) {
                firstofferimage.files.forEach((file) => {
                    combinedFormData.append("firstofferimage", file);
                });
            }
            if (secondofferimage.files.length > 0) {
                secondofferimage.files.forEach((file) => {
                    combinedFormData.append("secondofferimage", file);
                });
            }
            // Append multiple image files to FormData
            mainslideriamges.files.forEach((file) => {
                if (file) {
                    combinedFormData.append("mainslideriamges[]", file);
                }
            });

            // Append multiple image files to FormData
            offersliderimages.files.forEach((file) => {
                if (file) {
                    combinedFormData.append("offersliderimages[]", file);
                }
            });
            // Log the combined form data to the console
            for (let [key, value] of combinedFormData.entries()) {
                console.log(key, value);
            }

            // Send AJAX request with CSRF token
            $.ajax({
                url: '/admin/updateWebsiteSettings'
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
    

    {{-- Delete Main Slider Particular Images Code......... --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.delete-image-btn').forEach(button => {
                button.addEventListener('click', function () {
                    let imagePath = this.getAttribute('data-image'); // Get image path
                    let imageContainer = this.closest('.image-container'); // Get image div

                    // Send AJAX request to delete the image
                    fetch("{{ route('delete.slider.image') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({ image: imagePath })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            imageContainer.remove(); // Remove image from UI
                        } else {
                            alert("Error deleting image");
                        }
                    })
                    .catch(error => console.error("Error:", error));
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.deleteoffer-image-btn').forEach(button => {
                button.addEventListener('click', function () {
                    let imagePath = this.getAttribute('data-imageoffer'); // Get image path
                    let imageContainer = this.closest('.image-containeroffer'); // Get image div

                    // Send AJAX request to delete the image
                    fetch("{{ route('deleteoffer.slider.image') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({ image: imagePath })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            imageContainer.remove(); // Remove image from UI
                        } else {
                            alert("Error deleting image");
                        }
                    })
                    .catch(error => console.error("Error:", error));
                });
            });
        });
</script>
</x-app-layout>
