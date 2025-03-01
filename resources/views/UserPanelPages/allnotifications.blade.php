{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.UserPanelLayouts.user')
@section('title','All Notifications')
@section('user-content')
<div class="container-fluid">
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <h4 class="fw-semibold mb-8">@yield('title')- ({{$notifycnt}})</h4>
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
    <div class="card">
        <div class="">
            <div class="p-4">
                <table id="file_export" class="table table-hover table-bordered display text-nowrap py-3">
                    <thead>
                        <tr>
                            <th>SNo.</th>
                            <th>Notification Name</th>
                            <th>Notification Description</th>
                            <th>Recieved On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        @foreach ($notifications as $index => $data)
                        <tr>
                            <td>{{ $index + 1}}</td>
                            <td>
                                <div class="d-flex align-items-center gap-6">
                                    <img src="{{asset('assets/images/Notificaitons/'.$data->notificationimg)}}" width="45" class="rounded">
                                    <h6 class="mb-0">{{ $data->notificationname}}</h6>
                                </div>
                            </td>
                            <td>{{ Str::limit($data->notificationdes,15) }}</td>
                            <td>{{ $data->created_at->format('d M Y | h:i A')}}</td>
                            <td>
                                <div class="hstack gap-3 flex-wrap">
                                    <a href="#" data-value="{{ json_encode($data) }}" data-bs-toggle="modal" data-bs-target="#primary-header-modaledit" class="editbtnmodal btn-sm btn btn-primary btn-sm" data-bs-toggle="tooltip" title="Edit">View</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="primary-header-modaledit" class="modal fade" tabindex="-1" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary text-white">
                <h4 class="modal-title text-white" id="primary-header-modalLabel">
                    Notification
                </h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" id="modalbodyedit">
                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
        $('.editbtnmodal').on('click',function(){
            const data = $(this).data('value');
            console.log(data);
            $('#modalbodyedit').html(`
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <h4>${data.notificationname}</h4>
                        </div>
                        <div>
                            <p>${data.notificationdes}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="thumbnailPreview" class="mt-3">
                            <img src="{{asset('assets/images/Notificaitons/${data.notificationimg}')}}" alt="Thumbnail Preview" class="img-fluid rounded-3">
                        </div>
                    </div>
                </div>
            `);
        });
</script>
@endsection
