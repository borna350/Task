@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              
                <div class="card-header">CV PDF List:</div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>PDF List</th> <th>Download</th> <th>Create Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($cvTrack as $data)
                            <tr>
                                <td>{{$data->cv_pdf }}</td>
                                <td><a href="{{asset('/').$data->cv_pdf }}" download> Download </a></td>
                                <td>{{date("j F, Y h:i a", strtotime($data->created_at)) }}</td>
                           
                        
                            </tr>
                             @endforeach
                            </tbody>
                        </table>
                    </div>
                
                </div>
            </div>
           
        </div>
    </div>

@endsection
