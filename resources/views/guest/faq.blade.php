@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-hero text-center">
    <div class="container">
        <h1 class="breadcrumb-title">FAQ</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    FAQ
                </li>
            </ol>
        </nav>

    </div>
</div>


<div class="content">
    <div class="container">
        <h2 class="main-title mb-1">Most frequently asked questions</h2>
        <p class="mb-4">Here are the most frequently asked questions you may check before getting started</p>
        <div class="row">
            @forelse ($faqs as $index => $item)
            <div class="col-lg-6">
                <!-- Faq -->
                <div class="faq-card">
                    <h6 class="faq-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#faq-{{$index}}" aria-expanded="false">
                            {{$item->question}}
                        </a>
                    </h6>
                    <div id="faq-{{$index}}" class="collapse">
                        <div class="faq-detail">
                            <p>{{$item->answer}}</p>
                        </div>
                    </div>
                </div>

            </div>
            @empty

            @endforelse

        </div>

        <div class="bg-light border rounded p-4 p-sm-5 mt-4">

            <div class="row">
                <!-- Title and inputs -->
                <div class="col-lg-7 text-center mx-auto">
                    <!-- Avatar group -->
                    <!-- Title -->
                    <h4 class="mb-2">Still have a question?</h4>
                    <p class="mb-4">We'd be happy to help you with any questions you have! Please let us know what
                        you're looking for, and we'll do our best to assist you.</p>

                    <!-- Button -->
                    <a href="{{route('guest.contact')}}" class="btn btn-lg btn-dark mb-0">Contact us</a>
                </div>
            </div> <!-- Row END -->
        </div>
    </div>
</div>
@endsection