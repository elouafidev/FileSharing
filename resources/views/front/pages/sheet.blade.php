@extends('front.layouts.app')
@section('content')
    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">{{$sheet->title}}</h3>
                                <div class="nk-block-des text-soft">
                                    <ul class="list-inline">
                                        <li>Creater: <span class="text-base">{{$sheet->createrUser()->first()->name}}</span></li>
                                        <li>Created at : <span class="text-base">{{\Illuminate\Support\Carbon::parse($sheet->created_at)->format('d/m/yy')}}</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="nk-block-head-content">
                                <a href="{{route('file_manager',['id' => $sheet->folder_id])}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                <a href="{{route('file_manager',['id' => $sheet->folder_id])}}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-aside-wrap">
                                <div class="card-content">
                                    <div class="card-inner">
                                        <div class="nk-block">
                                            <div class="nk-block-head">
                                                <h5 class="title">Personal Information</h5>
                                            </div><!-- .nk-block-head -->
                                            <div class="bq-note">
                                                <div class="bq-note-item">
                                                    <div class="bq-note-text">
                                                        <p>{{$sheet->description}}</p>
                                                    </div>

                                                </div><!-- .bq-note-item -->
                                            </div><!-- .bq-note -->

                                        </div><!-- .nk-block -->
                                        <div class="nk-divider divider md"></div>
                                        @isset($sheet->content)
                                            <div class="nk-block">
                                                <div class="nk-block-head nk-block-head-sm nk-block-between">
                                                    <h5 class="title">{{__('Documentation')}}</h5>
                                                </div><!-- .nk-block-head -->
                                                <div class="bq-note">
                                                    <div class="bq-note-item">
                                                        <div class="">
                                                            {!! $sheet->content  !!}
                                                        </div>

                                                    </div><!-- .bq-note-item -->
                                                </div><!-- .bq-note -->
                                            </div><!-- .nk-block -->
                                        @endisset
                                        @foreach($sheet->Files()->get() as $file)
                                            <div class="nk-block">
                                                <div class="nk-block-head nk-block-head-sm nk-block-between">
                                                    <h5 class="title">{{$file->name}}</h5>
                                                    <a href="{{\Illuminate\Support\Str::contains(\Illuminate\Support\Str::lower($file->url),'http') ? $file->url : "http://{$file->url}" }}" class="link ">{{__('Download')}}</a>
                                                </div><!-- .nk-block-head -->
                                                <div class="profile-ud-list">
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">{{__('File Name')}}</span>
                                                            <span class="profile-ud-value">{{$file->name}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">{{__("Password")}}</span>
                                                            <span class="profile-ud-value">{{$file->password ?: 'NON'}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">{{__('Size')}}</span>
                                                            <span class="profile-ud-value">{{$file->size}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">{{__('Number Download')}}</span>
                                                            <span class="profile-ud-value">{{$file->download_count}}</span>
                                                        </div>
                                                    </div>
                                                </div><!-- .profile-ud-list -->

                                            </div><!-- .nk-block -->
                                        @endforeach
                                    </div><!-- .card-inner -->
                                </div><!-- .card-content -->
                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
