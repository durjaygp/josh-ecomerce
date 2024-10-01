@extends('backEnd.master')
@section('title','Message')
@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">@yield('title')</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted " href="{{route('admin.index')}}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Contact Message</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{asset('back')}}/assets/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-content searchable-container list">
            <!-- --------------------- start Contact ---------------- -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4 ">
                            <h2>Contact Message</h2>
                        </div>
                        <div class="col-md-8 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                            <a href="#" class="btn btn-info d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="ti ti-new-section text-white me-1 fs-5"></i> Spam Messages Keywords
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table width="100%" id="zero_config" class="table border table-striped table-bordered text-nowrap table-responsive">
                                    <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Service</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    <!-- end row -->
                                    </thead>
                                    <tbody>
                                    @foreach($message as $row)
                                        <!-- start row -->
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->service}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->phone}}</td>
                                            <td>{{ Str::limit($row->description, 50, '...')  }}</td>
                                            <td>
                                                <div class="action-btn">
                                                    <a href="" class="btn btn-primary"><i class="ti ti-eye fs-5"></i></a>
                                                    <a href="#"
                                                       onclick="event.preventDefault();
                                                           if (confirm('Are you sure you want to delete?'))
                                                           document.getElementById('delete-form-{{ $row->id }}').submit();"
                                                       class="btn btn-danger text-white delete ms-2">
                                                        <i class="ti ti-trash fs-5"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $row->id }}" action="{{ route('contact.message.delete', $row->id) }}" method="get" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end row -->
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


 <!-- Modal -->
 <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Update Spam Mesasage keywords
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('settings.updateSpamKeywords') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label for="contact_spam_keywords" class="form-label fw-semibold">Spam Keywords (comma separated)</label>

                                <textarea name="contact_spam_keywords" class="form-control" id="contact_spam_keywords" cols="30" rows="10">{{ implode(',', $spams) }}</textarea>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="gap-3 d-flex align-items-center">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-danger-subtle text-danger waves-effect text-start" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
@endsection
