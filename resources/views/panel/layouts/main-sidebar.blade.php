
{{-- Sidebar Menu --}}
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">HEADER</li>
    {{-- Optionally, you can add icons to the links --}}
    <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    <li class="Storage"><a href="{{route('panel.folder.index')}}"><i class="fa fa-fw fa-folder-o"></i> <span>Storage</span></a></li>
</ul>
{{-- /.sidebar-menu --}}
