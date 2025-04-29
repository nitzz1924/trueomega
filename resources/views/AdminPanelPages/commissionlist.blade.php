{{----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------}}
@section('title', 'Commission List')
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
                                <i class="ti ti-arrow-narrow-left"></i> Go Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-7">
                            <button class="navbar-toggler border-0 shadow-none d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                <i class="ti ti-menu fs-5 d-flex"></i>
                            </button>
                        </div>
                        <form action="{{ route('admin.SaveCommission') }}" class="form-horizontal" method="POST">
                            @csrf
                            <div class="row align-items-center">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Select Level</label>
                                        <select name="level" class="form-select mr-sm-2 mb-2" id="leveldrop" required>
                                            <option selected="">--select level--</option>
                                            <option value="1">Level 1</option>
                                            <option value="2">Level 2</option>
                                            <option value="3">Level 3</option>
                                            <option value="4">Level 4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Commission Percentage</label>
                                        <select name="commission_percentage" class="form-select mr-sm-2 mb-2" id="commissionPercentage" required>
                                            <option selected="">--select percentage--</option>
                                            <option value="20">20%</option>
                                            <option value="12">12%</option>
                                            <option value="8">8%</option>
                                            <option value="5">5%</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start">
                                    <button type="submit" id="submitAllForms" class="btn btn-primary mt-2">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Level</th>
                                        <th>Commission Percentage</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    @forelse($commissions as $commission)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>Level {{ $commission->level }}</td>
                                        <td>{{ $commission->commission_percentage }}%</td>
                                        <td>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-outline-primary btn-border editbtnmodal" data-bs-toggle="modal" data-bs-target="#primary-header-modal" data-comm="{{ json_encode($commission) }}"><i class="ti ti-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button onclick="confirmDelete('{{ $commission->id }}')" class="btn btn-outline-danger btn-border"><i class="ti ti-trash"></i></button>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No commissions found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="primary-header-modal" class="modal fade" tabindex="-1" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary text-white">
                    <h4 class="modal-title text-white" id="primary-header-modalLabel">
                        Edit Details
                    </h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('admin.updateCommission')}}" class="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body" id="modalbodyedit">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn bg-primary-subtle text-primary ">
                            Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                    title: "Are you sure?"
                    , html: "You want to delete?"
                    , icon: "warning"
                    , showCancelButton: true
                    , confirmButtonColor: "#222222"
                    , cancelButtonColor: "#d33"
                    , confirmButtonText: "Yes, delete it!"
                    , cancelButtonText: "Cancel"
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/admin/deleteCommission/" + id;
                    }
                });
        }


        $('#table-body').on('click', '.editbtnmodal', function() {
            const masterdata = $(this).data('comm');
            console.log(masterdata);
            $('#modalbodyedit').html(`
            <div class="card-body">
                <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="mb-3">
                    <label class="form-label">Select Level</label>
                    <select name="level" class="form-select mr-sm-2 mb-2" id="leveldrop" required>
                        <option value="1" ${masterdata.level == 1 ? 'selected' : ''}>Level 1</option>
                        <option value="2" ${masterdata.level == 2 ? 'selected' : ''}>Level 2</option>
                        <option value="3" ${masterdata.level == 3 ? 'selected' : ''}>Level 3</option>
                        <option value="4" ${masterdata.level == 4 ? 'selected' : ''}>Level 4</option>
                    </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                    <label class="form-label">Commission Percentage</label>
                    <select name="commission_percentage" class="form-select mr-sm-2 mb-2" id="commissionPercentage" required>
                        <option value="20" ${masterdata.commission_percentage == 20 ? 'selected' : ''}>20%</option>
                        <option value="12" ${masterdata.commission_percentage == 12 ? 'selected' : ''}>12%</option>
                        <option value="8" ${masterdata.commission_percentage == 8 ? 'selected' : ''}>8%</option>
                        <option value="5" ${masterdata.commission_percentage == 5 ? 'selected' : ''}>5%</option>
                    </select>
                    </div>
                    <input type="hidden" name="commissionid" value="${masterdata.id}">
                </div>
                </div>
            </div>
            `);
        });

    </script>
</x-app-layout>
