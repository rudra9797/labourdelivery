@extends('layouts.app')
@section('content')
    <div>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    <div class="delivery-section">
        <div class="container p-sm-5 p-4">
            <p class="delivery-text pb-4">Select a Store</p>
            <div class="row ">
                <div class="col-md-6">
                    <div class="d-flex align-items-center store-section">
                        <div class="store-img">
                            <img src="img/home-depot-logo-1-(1).png" alt="">
                        </div>
                        <div class="store-text">
                            <p>The Home <br>Depot</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-sm-0 mt-4">
                    <div class=" d-flex align-items-center store-section ">
                        <div class="store-img">
                            <img src="img/lowes logo 1.png" alt="">
                        </div>
                        <div class="store-text">
                            <p>Lowe’s Home <br>Improvement</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class=" d-flex align-items-center store-section ">
                        <div class="store-img">
                            <img src="img/mccoys logo 1.png" alt="">
                        </div>
                        <div class="store-text">
                            <p>McCoy’s Building<br> Supply</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-sm-0 mt-4">
                    <div class=" d-flex align-items-center store-section ">
                        <div class="store-img">
                            <img src="img/store-location-logo 1.png" alt="">
                        </div>
                        <div class="store-text">
                            <p>Ace <br>Hardware</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
