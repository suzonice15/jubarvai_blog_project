@extends('layouts.master')
@section('pageTitle')
    All Sliders List
@endsection
@section('mainContent')

    <div class="box-body">
        <div class="table-responsive" >
            <table id="example1" class="table table-bordered table-striped table-responsive ">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name </th>
                    <th>Picture</th>

                    <th >Action </th>
                </tr>
                </thead>
                <tbody>

                @if(isset($sliders))
                    <?php $i=0;?>
                    @foreach ($sliders as $slider)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{$slider->add_title}} </td>
                            <td>
                                @if(isset($slider->add_image))
                                    <img src="{{URL::to('/public')}}/uploads/sliders/{{$slider->add_image}}" width="50" height="50"/>

                                @else
                                    <img src="{{URL::to('/public')}}/uploads/user/user.png" width="50" height="50"/>
                                @endif
                            </td>


                            <td>
                                <a title="edit" href="{{ url('admin/right/add/') }}/{{ $slider->right_add_id }}">
                                    <span class="glyphicon glyphicon-edit btn btn-success"></span>
                                </a>


                                <a title="delete" href="{{ url('/admin/right/add/delete') }}/{{ $slider->right_add_id }}" onclick="return confirm('Are you want to delete this information :press Ok for delete otherwise Cancel')">
                                    <span class="glyphicon glyphicon-trash btn btn-danger"></span>
                                </a></td>
                        </tr>

                    @endforeach
                @endif
                </tbody>

            </table>

        </div>



    </div>


@endsection

