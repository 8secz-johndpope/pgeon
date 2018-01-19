@extends('voyager::master')
@section('content')
    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                      <table class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <td>ID</td>
                              <td>Slug</td>
                              <td>Status </td>
                              <td>Member? </td>
                              <td>Featured</td>
                              <td>Actions</td>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach($users as $key => $value)
                      
                 

                          <tr>
                              <td>{{ $value->id }}</td>
                              <td>{{ $value->slug }} 

                   </td>
                              <td>{{ $value->slug }}</td>
                              <td>
                              {{ ($value->role_id == 3)? 'yes': 'no'  }}
                                </td>
                               <td>{{ $value->featured }}  </td>
                              <!-- we will also add show, edit, and delete buttons -->
                              <td>

                                  <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                  <!-- we will add this later since its a little more complicated than the other two buttons -->

                                  <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                  <a class="btn btn-small btn-success" href="{{ URL::route('users.edit' , array('id' => $value->id)) }}">Details</a>

                                  <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->




                                      <div class="btn-sm btn-danger pull-right delete" data-id="{{ $value->id }}">
                                          <i class="voyager-trash"></i> Delete
                                      </div>


                              </td>
                          </tr>
                      @endforeach
                      </tbody>
                    </table>

                    <div class="pull-right">
                        {{ $users->links() }}
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        <i class="voyager-trash"></i> Are you sure you want to delete this user with its answers and votes?
                    </h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('users.destroy', ['id' => '__id']) }}" id="delete_form" method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="Yes, Delete This">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@stop


@section('javascript')
    {{-- DataTables --}}
    <script>
        $('td').on('click', '.delete', function(e) {
            $('#delete_form')[0].action = $('#delete_form')[0].action.replace('__id', $(e.target).data('id'));
            $('#delete_modal').modal('show');
        });
    </script>

@stop
