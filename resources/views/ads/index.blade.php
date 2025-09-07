@extends('base')
@section('ad_section')
    <!-- feature-style-two -->
    <section class="feature-style-two">
        <div class="auto-container">
            <div class="sec-title centred">
                <h2>Featured Ads</h2>
            </div>
            <div class="tabs-box">
                <div class="tabs-content">
                    <div class="tab active-tab" id="tab-1">
                        <div class="row clearfix">
                            @foreach ($ads as $ad)
                                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                                    <div class="feature-block-one">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image"><img
                                                        src="{{ asset($ad->ads_image ?? 'images/resource/feature-1.jpg') }}"
                                                        alt="{{ $ad->title }}">
                                                </figure>
                                                <div class="shape"></div>
                                                <div class="feature">Featured</div>
                                                <div class="icon">
                                                    <div class="icon-shape"></div>
                                                    <i class="icon-16"></i>
                                                </div>
                                            </div>
                                            <div class="lower-content">
                                                <div class="author-box">
                                                    <div class="inner">
                                                        <img src="{{ asset($ad->user->profile_image ?? 'images/resource/author-1.png') }}"
                                                            alt="{{ $ad->user->name }}">
                                                        <h6>{{ $ad->user->name }}<i class="icon-18"></i></h6>
                                                        <span>For sell</span>
                                                    </div>
                                                </div>
                                                <div class="category"><i class="fas fa-tags"></i>
                                                    <p>{{ $ad->category->name }}</p>
                                                </div>
                                                <h3><a href="{{ route('ads.show', $ad->id) }}">{{ $ad->title }}</a></h3>

                                                <ul class="info clearfix">
                                                    <li><i class="far fa-clock"></i>{{ $ad->created_at->diffForHumans() }}
                                                    </li>
                                                    <li><i
                                                            class="fas fa-map-marker-alt"></i>{{ $ad->location ?? 'Location not specified' }}
                                                    </li>
                                                </ul>
                                                <div class="lower-box">
                                                    <h5><span>Price:</span>${{ number_format($ad->ads_price, 2) }}</h5>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                {{ $ads->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
        </div>
    </section>
    <!-- feature-style-two end -->
@endsection
