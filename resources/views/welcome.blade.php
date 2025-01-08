@extends('layouts.app')
@section('content')
<div class="container">
    <div class="feature">
        <div class="container my-5">
            <h5>Featured</h5>
            <div class="row mt-4">
                @if ($featured_medicine->isNotEmpty())
                @foreach ($featured_medicine as $shoe)
                    <div class="col-md-3 mb-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('product/' . $shoe->img) }}" class="card-img-top"
                                alt="{{ $shoe->title }}" style="height: 350px;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $shoe->title }}</h5>
                                <p class="card-text">{{ Str::limit($shoe->description, 100) }}</p>
                                <p><strong>Brand:</strong> {{ $shoe->brand->name }}</p>
                                <p><strong>Category:</strong> {{ $shoe->category->name }}</p>
                                <p><strong>Price:</strong> ${{ $shoe->price }}</p>
                                <p><strong>Published on:</strong> {{ $shoe->published_at }}</p>
                                <!-- <a href="{{ route('shoe.show', $shoe->id) }}" class="btn btn-info w-100">View</a> -->
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif


            </div>
        </div>
    </div>
</div>
@endsection