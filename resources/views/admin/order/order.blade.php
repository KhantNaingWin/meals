@extends('admin.layouts.master')
@section('content')

<div class="main-content overflow-hidden">

    <div class="page-content">
        <div class="container-fluid">

            <table class="table table-success table-striped align-middle table-nowrap mb-0">
                <thead>
                    <a href="{{ url('admin/ui/product') }}">
                        <button type="button" class="btn btn-primary btn-label waves-effect waves-light"><i class="ri-user-smile-line label-icon align-middle fs-16 me-2"></i> Add</button>
                    </a>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Date</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">image</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td scope="row">{{ $order->id }}</td>
                        <td>{{ $order->date }}</td>
                        <td>
                            @foreach ($order->orderDetails as $orderDetail )
                                    {{$orderDetail?->name}}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($order->orderDetails as $orderDetail )
                                    {{$orderDetail?->quantity}}<br/>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($order->orderDetails as $orderDetail )
                                    {{$orderDetail?->price *$orderDetail?->quantity }}<br/>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($order->orderDetails as $orderDetail )
                            @if ($orderDetail->image != null)
                            <img src="{{ asset('images/'.$orderDetail->image) }}" class="img-thumbnail shadow-sm rounded" style="height: 60px"><br/>
                        @else

                                <img src="{{ asset('defaultImage/index.jpeg') }}" class="img-thumbnail shadow-sm rounded" style="height: 60px"><br/>
                        @endif
                            @endforeach
                          </td>

                        <td>
                            <div class="hstack gap-3 flex-wrap">
                                <a href="{{ url('adminorders/'.$order->id.'/edit') }}" href="javascript:void(0);"  class="link-success fs-15"><i class="ri-edit-2-line"></i>
                                </a>
                                <div class="remove">
                                    <form action="{{ url('adminorders/'.$order->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button style="background-color: transparent; border:none;" class="link-danger fs-15">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
           <div class="mt-2">
            {{$orders}}
           </div>

        </div>
    </div>
</div>

@endsection

