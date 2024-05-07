@extends('front.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="fmg">
                    <div class="nk-fmg-body">
                        <div class="nk-fmg-body-content">
                            <div class="nk-fmg-listing nk-block-lg">
                                <div class="nk-block-head-xs">
                                    <div class="nk-block-between g-2">
                                        <div class="nk-block-head-content">
                                            <h6 class="nk-block-title title">{{__('Browse Files')}}</h6>
                                            @foreach($folder->Path() as $parentFolder)
                                                <a href="{{ Route('file_manager',[ 'id' => $parentFolder['id']]) }}" >{{$parentFolder['name']}}</a><a>/</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="file-list-view">
                                        <div class="nk-files nk-files-view-list">
                                            <div class="nk-files-head">
                                                <div class="nk-file-item">
                                                    <div class="nk-file-info">
                                                        <div class="tb-head">{{__('Name')}}</div>
                                                    </div>
                                                    <div class="nk-file-meta">
                                                        <div class="tb-head">{{__('Last Opened')}}</div>
                                                    </div>
                                                    <div class="nk-file-members">
                                                        <div class="tb-head">{{__('Members')}}</div>
                                                    </div>
                                                    <div class="nk-file-actions">
                                                        <div class="dropdown">
                                                            <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-files-head -->
                                            @if($folder->parent_id != null)
                                                <div class="nk-files-list">
                                                    <div class="nk-file-item nk-file">
                                                        <div class="nk-file-info">
                                                            <div class="nk-file-title">
                                                                <div class="nk-file-name">
                                                                    <div class="nk-file-name-text">
                                                                        <a href="{{ Route('file_manager',[ 'id' =>  $folder->parent_id ]) }}" class="title"><em class="icon ni ni-more-h"></em></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-file-meta">
                                                        </div>
                                                        <div class="nk-file-members">
                                                        </div>
                                                        <div class="nk-file-actions">
                                                        </div>
                                                    </div><!-- .nk-file -->
                                            @endif

                                            @foreach($folders as $folder)
                                                <div class="nk-file-item nk-file">
                                                    <div class="nk-file-info">
                                                        <div class="nk-file-title">
                                                            <div class="nk-file-icon">
                                                                        <span class="nk-file-icon-type">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                                <g>
                                                                                    <rect x="32" y="16" width="28" height="15" rx="2.5" ry="2.5" style="fill:#f29611" />
                                                                                    <path d="M59.7778,61H12.2222A6.4215,6.4215,0,0,1,6,54.3962V17.6038A6.4215,6.4215,0,0,1,12.2222,11H30.6977a4.6714,4.6714,0,0,1,4.1128,2.5644L38,24H59.7778A5.91,5.91,0,0,1,66,30V54.3962A6.4215,6.4215,0,0,1,59.7778,61Z" style="fill:#ffb32c" />
                                                                                    <path d="M8.015,59c2.169,2.3827,4.6976,2.0161,6.195,2H58.7806a6.2768,6.2768,0,0,0,5.2061-2Z" style="fill:#f2a222" />
                                                                                </g>
                                                                            </svg>
                                                                        </span>
                                                            </div>
                                                            <div class="nk-file-name">
                                                                <div class="nk-file-name-text">
                                                                    <a href="{{ Route('file_manager',[ 'id' => $folder['id']]) }}" class="title">{{$folder['name']}}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-file-meta">
                                                        <div class="tb-lead">{{\Carbon\Carbon::parse($folder['created_at'])->format('d/m/Y')}}</div>
                                                    </div>
                                                    <div class="nk-file-members">
                                                        <div class="tb-lead">{{__('Only Me')}}</div>
                                                    </div>
                                                    <div class="nk-file-actions">
                                                    </div>
                                                </div><!-- .nk-file -->
                                            @endforeach
                                                    @foreach($Sheets as $sheet)
                                                        <div class="nk-file-item nk-file">
                                                            <div class="nk-file-info">
                                                                <div class="nk-file-title">
                                                                    <div class="nk-file-icon">
                                                                                <span class="nk-file-icon-type">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                                        <g>
                                                                                            <path d="M49,61H23a5.0147,5.0147,0,0,1-5-5V16a5.0147,5.0147,0,0,1,5-5H40.9091L54,22.1111V56A5.0147,5.0147,0,0,1,49,61Z" style="fill:#e3edfc" />
                                                                                            <path d="M54,22.1111H44.1818a3.3034,3.3034,0,0,1-3.2727-3.3333V11s1.8409.2083,6.9545,4.5833C52.8409,20.0972,54,22.1111,54,22.1111Z" style="fill:#b7d0ea" />
                                                                                            <path d="M19.03,59A4.9835,4.9835,0,0,0,23,61H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2" />
                                                                                            <rect x="27" y="31" width="18" height="2" rx="1" ry="1" style="fill:#599def" />
                                                                                            <rect x="27" y="36" width="18" height="2" rx="1" ry="1" style="fill:#599def" />
                                                                                            <rect x="27" y="41" width="18" height="2" rx="1" ry="1" style="fill:#599def" />
                                                                                            <rect x="27" y="46" width="12" height="2" rx="1" ry="1" style="fill:#599def" />
                                                                                        </g>
                                                                                    </svg>
                                                                                </span>
                                                                    </div>
                                                                    <div class="nk-file-name">
                                                                        <div class="nk-file-name-text">
                                                                            <a href="{{Route('file_manager.sheet',['id' => $sheet->id]) }}" class="title">{{$sheet->title}}</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="nk-file-meta">
                                                                <div class="tb-lead">{{\Carbon\Carbon::parse($sheet->created_at)->format('d/m/yy')}}</div>
                                                            </div>
                                                            <div class="nk-file-members">
                                                                <div class="tb-lead">{{__('Only Me')}}</div>
                                                            </div>
                                                            <div class="nk-file-actions">
                                                            </div>
                                                        </div><!-- .nk-file -->

                                                    @endforeach
                                                </div>
                                        </div><!-- .nk-files -->
                                    </div><!-- .tab-pane -->
                                </div><!-- .tab-content -->
                            </div><!-- .nk-block -->
                        </div><!-- .nk-fmg-body-content -->
                    </div><!-- .nk-fmg-body -->
                </div><!-- .nk-fmg -->
            </div>
        </div>
    </div>
@endsection

