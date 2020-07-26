@extends('layouts.app')
@section('content')
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Events</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Events</li>
                            </ol>
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#jobsModal"><i class="fa fa-plus-circle"></i> Book Event</button>

                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
              
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            
                            <h5 class="card-title">Latest Events </h5>
                            <h6 class="card-subtitle">Check all Events here </h6>
                        </div>
                       
                    </div>
                </div>
               
                <div class="table-responsive">
                <table id="config-table" class="table display table-bordered table-striped no-wrap">
                        <thead>
                            <tr>
                            <th>S/N</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Created On</th>
                            </tr>
                        </thead>
                        <?php $i = 1; ?>
                        @foreach($subscriptions as $item)
                            <tr>
                            <td>{{$i}}</td>
                            <td>
                            {{$item->title}}
                            </td>
                            <td>
                            {{$item->description}}
                            </td>
                            <td>
                            {{ Carbon\Carbon::parse($item->start)->isoFormat('dddd Do MMMM Y') }}
                            </td>

                            <td>
                            {{ Carbon\Carbon::parse($item->end)->isoFormat('dddd Do MMMM Y') }}
                            </td>

                            <td>
                            {{ Carbon\Carbon::parse($item->start)->format('h:i:s:A') }}
                            </td>
                            
                           
                            <td>
                                    @if($item->status == 'Active')
                                    <span class="btn btn-success btn-sm">Active</span>
                                    @else
                                    <span class="btn btn-danger btn-sm">{{$item->status}}</span>
                                    @endif
                                    <a href="{{route('veiwEvent',['id' => $item->id])}}" >
                                        <span class="btn btn-info btn-sm">View</span>
                                    </a>
                            </td>
                            <td>
                            {{ Carbon\Carbon::parse($item->created_at)->isoFormat('dddd Do Y') }}
                            </td>
                           
                            
                            </tr>
                        <?php $i++; ?>
                        @endforeach
                        <tbody>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
 
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>


            <div id="jobsModal" class="modal bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="jobsModal" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Event</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST" action="{{route('addEvent')}}" enctype="multipart/form-data">@csrf
                <div class="modal-body">
                
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="recipient-name" class="control-label">Title:</label>
                            <input type="text" name="title" class="form-control" id="recipient-name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="message-text" class="control-label">Attendance:</label>
                            <input type="number" class="form-control" name="attendance" min="0" id="recipient-name"  >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="recipient-name" class="control-label">Start Date:</label>
                            <input type="datetime-local" class="form-control" name="start" id="recipient-name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="message-text" class="control-label">End Date:</label>
                            <input type="datetime-local" class="form-control" name="end" id="recipient-name" required>
                        </div>
                    
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="recipient-name" class="control-label">Venue:</label>
                            <textarea  class="form-control " name="venue" id="recipient-name"  required> </textarea>
                        </div>
                       
                       
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="recipient-name" class="control-label">Description:</label>
                            <textarea  class="form-control " name="description" id="recipient-name"  > </textarea>
                        </div>
                       
                       
                    </div>

                  
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Book Event</button>
                </div>
                </form>
            </div>
        </div>
    </div>
 
@endsection