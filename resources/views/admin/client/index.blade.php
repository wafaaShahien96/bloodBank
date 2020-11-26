@extends('layouts.app')
@section('page_title')
    Clients
@endsection
@section('content')
<section class="content">
    @if (session('status'))
    <div class="alert alert-default-success">
        {{ session('status') }}
    </div>
@endif

<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
    <a class="btn btn-danger" href="{{route('admin.clients.create')}}">
            Add Client
        </a>
    </div>
</div>
</section>
<div class="container-fluid">

<div class="card">

    <div class="card-header">
          List of clients
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="40">#</th>
                          <th>  name    </th>
                          <th>  email    </th>
                          <th>  phone    </th>
                           <th>  &nbsp;  </th>
                    </tr>
                </thead>

                    <tbody>
                      
                     @foreach($clients as $client)
                        <tr data-entry-id = {{$client->id}} >
                            <td> {{$loop->iteration}}        </td>
                            <td> {{$client->name }}</td>
                        <td> {{$client->email }}</td>
                        <td> {{$client->phone }}</td>
                       <td> 

                        <a class="btn btn-sm btn-primary" href="{{route('admin.clients.show',$client->id)}}"> Show </a> 

                         <a class="btn btn-sm btn-danger" href="{{route('admin.clients.edit',$client->id)}}"> Edit </a> 

                         <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST"
                             onsubmit="return confirm('Are You Sure')" style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-sm btn-success" value="delete">
                        </form>

                        </td> 
                        </tr>
                     @endforeach 
              
                </tbody>
            </table>
            </div>
          </div>
</div>
</div>
     







 @endsection


 