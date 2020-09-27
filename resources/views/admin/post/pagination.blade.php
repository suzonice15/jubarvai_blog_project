@if(isset($products))
    <?php $i=$products->perPage() * ($products->currentPage()-1);?>
    @foreach ($products as $product)
        <tr>

            <td> {{ ++$i }} </td>
            <td>
                <img width="50" src="{{ url('/public/uploads') }}/{{ $product->folder }}/thumb/{{ $product->feasured_image }}">

            </td>
             <td>
                <a href="{{ url('post/') }}/{{$product->post_name}}"> {{$product->post_title}} </a>

            </td>

            
            <td><?php if($product->status==1) {echo "Publised" ;}else{ echo "Unpublished";} ?> </td>
            <td>{{date('d-m-Y H:m s',strtotime($product->created_time))}}</td>
            <td>
                <a title="edit" href="{{ url('admin/post') }}/{{ $product->post_id }}">
                    <span class="glyphicon glyphicon-edit btn btn-success"></span>
                </a>

                <a title="delete" href="{{ url('admin/post/delete') }}/{{ $product->post_id }}" onclick="return confirm('Are you want to delete this Product')">
                    <span class="glyphicon glyphicon-trash btn btn-danger"></span>
                </a></td>
        </tr>

    @endforeach

    <tr>
        <td colspan="9" align="center">
            {!! $products->links() !!}
        </td>
    </tr>
@endif


