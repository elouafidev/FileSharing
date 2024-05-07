
{{-- Sidebar Menu --}}
<ul id="sidebar" class="sidebar-menu" data-widget="tree">
    <li class="header">{{__('HEADER')}}</li>
    {{-- Optionally, you can add icons to the links --}}
    <li ><a href="{{route('panel.home',[],false)}}"><i class="fa fa-dashboard"></i> <span>{{__('Dashboard')}}</span></a></li>
    <li ><a href="{{route('panel.folder.index',[],false)}}"><i class="fa fa-fw fa-folder-o"></i> <span>{{__('Storage')}}</span></a></li>
    <li ><a href="{{route('panel.contact.index',[],false)}}"><i class="fa fa-envelope-o"></i><span>{{__('Conatct')}}</span></a></li>
</ul>
{{-- /.sidebar-menu --}}
