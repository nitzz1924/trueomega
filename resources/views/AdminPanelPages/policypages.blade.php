{{----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------}}
@section('title', 'Policy Pages')
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title">Page Information</h4>

                            <button class="navbar-toggler border-0 shadow-none d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                <i class="ti ti-menu fs-5 d-flex"></i>
                            </button>
                        </div>
                        <form action="#" class="form-horizontal">
                            <div class="mb-3">
                                <label class="form-label">Select Page Name</label>
                                <select name="pagename" class="form-select mr-sm-2  mb-2" id="pagenamedrop" required>
                                    <option selected="">--select page--</option>
                                    <option value="privacy-policy">Privacy Policy</option>
                                    <option value="refund-policy">Refund Policy</option>
                                    <option value="shipping-policy">Shipping Policy</option>
                                    <option value="terms-and-conditions">Terms & Conditions</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <label class="form-label">Page Description</label>
                                <div id="editor">
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
            const combinedFormData = new FormData();
            const forms = document.querySelectorAll("form");

            forms.forEach(form => {
                const formData = new FormData(form);
                for (let [key, value] of formData.entries()) {
                    combinedFormData.append(key, value);
                }
            });

            const descriptionContent = quill.root.innerHTML;
            combinedFormData.append("pagediscription", descriptionContent);

            // Log the combined form data to the console
            for (let [key, value] of combinedFormData.entries()) {
                console.log(key, value);
            }

            // Send AJAX request with CSRF token
            $.ajax({
                url: '/admin/policypagesinsert'
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
    <script>
        $(document).ready(function() {
            $('#pagenamedrop').on('change',function(){
                var pagename = $(this).val();
                
                $.ajax({
                    url: '/admin/policypagesgetdata',
                    method: 'POST',
                    data: {
                        pagename: pagename
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                         var content = response.data.pagediscription;
                        if (content) {
                            quill.root.innerHTML = content;
                        } else {
                            quill.root.innerHTML = '';
                        }
                    }
                });
            });
        });
    </script>
</x-app-layout>
