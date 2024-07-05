<style>

    .pagination li{
        list-style: none;
        float: left;
        margin-left: 5px;
         
    }
</style>



@foreach($product as $value)

{{$value->name}} <br>

@endforeach

{!! $product->links() !!}