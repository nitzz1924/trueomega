{{----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------}}
@section('title', 'Add Media')
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
                            <a href="#" class="btn btn-outline-primary">
                                <i class="ti ti-arrow-narrow-left"></i> Go Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-end">
                <button type="button" id="submitAllForms" class="btn btn-primary">
                    Save changes
                </button>
            </div>
            <div class="col-lg-8">
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
            </div>
            <div class="col-lg-4">
                <div class="offcanvas-md offcanvas-end overflow-auto" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
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
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-8">
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
                url: '/admin/insertlisting'
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
                                    window.location.href = "editproperty/" + data.data.id;
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
