
{{-- Sidebar Menu --}}
<ul id="sidebar" class="sidebar-menu" data-widget="tree">
    <li class="header">HEADER</li>
    {{-- Optionally, you can add icons to the links --}}
    <li ><a href="{{route('panel.home',[],false)}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    <li ><a href="{{route('panel.folder.index',[],false)}}"><i class="fa fa-fw fa-folder-o"></i> <span>Storage</span></a></li>
</ul>
{{-- /.sidebar-menu --}}
