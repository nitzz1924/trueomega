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
            <div class="col-lg-12">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-7">Property Gallery</h4>
                            <form action="#" class="dropzone dz-clickable mb-2" id="mediaGalleryForm" enctype="multipart/form-data">
                                @csrf
                                <div class="dz-default dz-message">
                                    <button class="dz-button" type="button">Drop files here
                                        to upload</button>
                                </div>
                            </form>
                            <p class="fs-3 text-left text-danger mb-0 fw-bold">
                                Set the property Gallery images. Only *.png, *.jpg and *.jpeg image files are accepted.
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <button type="button" id="submitAllForms" class="btn btn-primary">
                                    Upload
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title">Image Gallery</h5>
                            </div>
                            <div class="row gy-4" id="mediaGallery">
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title">Image Information</h5>
                            </div>
                            <div class="row gy-4">
                                <div class="col-md-12">
                                    <div class="" id="imagePreview">
                                        <img src="{{asset('assets/images/Categories/placeholder.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="text" placeholder="path of image" name="imageUrl" class="form-control" required>
                                        <button class="btn btn-outline-primary" type="button" onclick="copyToClipboard(event)">
                                            <i class="ti ti-copy"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
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
            const combinedFormData = new FormData();
            const forms = document.querySelectorAll("form");

            forms.forEach(form => {
                const formData = new FormData(form);
                for (let [key, value] of formData.entries()) {
                    combinedFormData.append(key, value);
                }
            });

            // Get mediaGalleryForm instances
            const mediaGalleryForm = Dropzone.forElement("#mediaGalleryForm");
            mediaGalleryForm.files.forEach((file) => {
                if (file) {
                    combinedFormData.append("mediaImages[]", file);
                }
            });

            // Log all form values to the console
            for (let [key, value] of combinedFormData.entries()) {
                console.log(key, value);
            }

            // Submit the form data via AJAX (Move it inside the event listener)
            $.ajax({
                url: '/admin/insertMedia'
                , method: 'POST'
                , data: combinedFormData
                , processData: false
                , contentType: false
                , headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
                , success: function(data) {
                    console.log("%cRaw response:", "background: black; color: purple; font-size: 14px;", data);
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
                                if (data.images && data.images.length > 0) {
                                    let gallery = document.querySelector("#mediaGallery");
                                    data.images.forEach(imgUrl => {
                                        let imgElement = document.createElement("img");
                                        imgElement.src = imgUrl;
                                        imgElement.classList.add("col-3", "gallery-card", "img-fluid");
                                        gallery.appendChild(imgElement);
                                    });
                                }
                            }
                        });
                    }
                }

            });
        });

        //Getting Gallery Images here............
        $(document).ready(function() {
            $.ajax({
            url: "/admin/showMediaGallery"
            , method: "GET"
            , success: function(response) {
                let gallery = $("#mediaGallery");
                response.storedImages.forEach(imgUrl => {
                let imgElement = `<img src="${imgUrl}" data-url="${imgUrl}" onclick="GetPath(event);" class="gallery-card img-fluid" alt="Media Image">`;
                gallery.append(imgElement);
                });
            }
            , error: function(error) {
                console.error("Error fetching images:", error);
            }
            });
        });
        
          //Getting path of Image url and show it in div
        function GetPath(event) {
            var imgUrl = event.target.getAttribute('data-url');
            document.querySelector('input[name="imageUrl"]').value = imgUrl;
            document.getElementById('imagePreview').querySelector('img').src = imgUrl;
        }


        //Copy URL to clipboard
        function copyToClipboard(event) {
            event.preventDefault();
            const imgUrl = document.querySelector('input[name="imageUrl"]').value;
            const currentUrl = imgUrl;
            navigator.clipboard.writeText(currentUrl)
                .then(() => {
                    const toastHTML = `
                        <div class="toast position-fixed top-0 end-0 p-1 align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 1050;">
                        <div class="toast-body">
                                URL copied to clipboard
                            </div>
                        </div>
                        `;

                    const toastContainer = document.createElement('div');
                    toastContainer.innerHTML = toastHTML;
                    document.body.appendChild(toastContainer);

                    const toastElement = new bootstrap.Toast(toastContainer.querySelector('.toast'), { delay: 3000 });
                    toastElement.show();
                })
                .catch(err => {
                    console.error("Failed to copy URL: ", err);
                });
        }
    </script>  

</x-app-layout>
