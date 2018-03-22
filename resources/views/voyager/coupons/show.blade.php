@extends('voyager.master')
@section('content')
    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">


              <div class="row">
                <b>
                <?php echo $question->question;?>

              </b>
              </div>

            @if ( !$question->answers->isEmpty() )
              <div class="row">
                Answers :
                <table class="table table-striped table-bordered">

                <tbody>
                @foreach($question->answers as $key => $value)


                    <tr>
                        <td>{{ $value->answer }}  </td>
                        <td>{{ $value->user->name }}</td>
                        <td> </td>
                        <!-- we will also add show, edit, and delete buttons -->
                        <td>

                            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->

                            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                            <a class="btn btn-small btn-success" href="{{ URL::route('questions.show' , array('id' => $value->id)) }}">Details</a>

                            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->

                            <a class="btn btn-small btn-info"  href="{{ URL::route('questions.edit', array('id' => $value->id)) }}"> Edit
                            </a>



                        </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
              </div>
            @endif


                    <div class="pull-right">

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
                    </h4>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@stop
