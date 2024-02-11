@extends('templates.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt-4">
                <div class="custom-card"
                    style="
                background: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5));
                box-shadow: 1px 1px 1px 1px rgba(255,255,255,0.8);
                ">
                    @if (Cookie::has('question_answered'))
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <p>See the API</p>
                            </div>
                            <div class="col-12 mt-3 d-flex justify-content-center">
                                <div class="row">
                                    <div class="col-6">
                                        <a class="link-custom" href="https://app.swaggerhub.com/apis/Zaazxz/e-nabung/1.0.0"
                                            target="_blank">
                                            Documentation
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a class="link-custom" href="https://github.com/zaazxz/e-nabung" target="_blank">
                                            API Source
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <button class="btn-custom" data-bs-toggle="modal" data-bs-target="#questionModal">
                            Question
                        </button>
                    @endif
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt-4">
                <div class="custom-card"
                    style="
                background: linear-gradient(rgba(220, 53, 69, 0.5), rgba(220, 53, 69, 0.5));
                box-shadow: 1px 1px 1px 1px rgba(220,53,69,0.8);
                ">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <p class="text-white">X-API-Key Value</p>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <input type="text"
                                @if (Cookie::has('question_answered')) value="{{ md5('API E-Nabung') }}"
                            @else
                                value="Click the question button for X-API-Key" @endif
                                disabled class="input-custom">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt-4">
                <div class="custom-card"
                    style="
                background: linear-gradient(rgba(13, 110, 253, 0.5), rgba(13, 110, 253, 0.5));
                box-shadow: 1px 1px 1px 1px rgba(13,110,253,0.8);
                ">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <p class="text-white">Need help with your website?</p>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <a class="link-custom" href="https://wa.me/6289681238317" target="_blank">
                                WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt-4">
                <div class="custom-card"
                    style="
                background: linear-gradient(rgba(25, 135, 84, 0.5), rgba(25, 135, 84, 0.5));
                box-shadow: 1px 1px 1px 1px rgba(25,135,84,0.8);
                ">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <p class="text-white">See me on our social!</p>
                        </div>
                        <div class="col-12 mt-3 d-flex justify-content-center">
                            <div class="row">
                                <div class="col-6">
                                    <a class="link-custom" href="https://github.com/zaazxz" target="_blank">
                                        Github
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a class="link-custom" href="https://www.linkedin.com/in/mirzaqamaruzzaman18"
                                        target="_blank">
                                        Linkedin
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
