@if(!$products->isEmpty())
    <table class="table table-striped">
        <thead>
        <th class="col-md-2 col-lg-2">Cover</th>
        <th class="col-md-2 col-lg-5">Name</th>
        <th class="col-md-2 col-lg-2">Quantity</th>
        <th class="col-md-2 col-lg-1"></th>
        <th class="col-md-2 col-lg-2">Price</th>
        </thead>
        <tfoot>
        <tr>
            <td class="bg-grey-cart">Subtotal</td>
            <td class="bg-grey-cart"></td>
            <td class="bg-grey-cart"></td>
            <td class="bg-grey-cart"></td>
            <td class="bg-grey-cart">{{config('cart.currency')}} {{ $subtotal }}</td>
        </tr>
        <tr>
            <td class="bg-grey-cart">Shipping</td>
            <td class="bg-grey-cart"></td>
            <td class="bg-grey-cart"></td>
            <td class="bg-grey-cart"></td>
            <td class="bg-grey-cart">{{config('cart.currency')}} <span id="shippingFee">{{ $shippingFee }}</span></td>
        </tr>
        <tr>
            <td class="bg-grey-cart">Tax</td>
            <td class="bg-grey-cart"></td>
            <td class="bg-grey-cart"></td>
            <td class="bg-grey-cart"></td>
            <td class="bg-grey-cart">{{config('cart.currency')}} {{ number_format($tax, 2) }}</td>
        </tr>
        <tr>
            <td class="bg-green-cart">Total</td>
            <td class="bg-green-cart"></td>
            <td class="bg-green-cart"></td>
            <td class="bg-green-cart"></td>
            <td class="bg-green-cart">{{config('cart.currency')}} <span id="total" data-total="{{ $total }}">{{ $total }}</span></td>
        </tr>
        </tfoot>
        <tbody>
        @foreach($cartItems as $cartItem)
            <tr>
                <td>
                    <a href="{{ route('front.get.product', [$cartItem->product->slug]) }}" class="hover-border">
                        @if(isset($cartItem->cover))
                            <img src="{{ asset("storage/$cartItem->cover") }}" alt="{{ $cartItem->name }}" class="img-responsive img-thumbnail">
                        @else
                            <img src="https://placehold.it/120x120" alt="" class="img-responsive img-thumbnail">
                        @endif
                    </a>
                </td>
                <td>
                    <h3>{{ $cartItem->name }}</h3>
                    @if(isset($cartItem->options))
                        @foreach($cartItem->options as $key => $option)
                            <span class="label label-primary">{{ $key }} : {{ $option }}</span>
                        @endforeach
                    @endif
                    <div class="product-description">
                        {!! $cartItem->product->description !!}
                    </div>
                </td>
                <td>
                    <form action="{{ route('cart.update', $cartItem->rowId) }}" class="form-inline" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="input-group">
                            <input type="text" name="quantity" value="{{ $cartItem->qty }}" class="form-control" />
                            <span class="input-group-btn"><button class="btn btn-default">Update</button></span>
                        </div>
                    </form>
                </td>
                <td>
                    <form action="{{ route('cart.destroy', $cartItem->rowId) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fa fa-times"></i></button>
                    </form>
                </td>
                <td>{{config('cart.currency')}} {{ number_format($cartItem->price, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif