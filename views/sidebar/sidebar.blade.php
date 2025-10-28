<aside id="layout-menu" class="layout-menu menu-vertical menu bg-theme">
    <div class="app-brand demo {{-- bg-dark --}}">
        <a href="/" class="app-brand-link">
            <span class="app-brand-logo demo">
                <span class="text-primary">
                    {{-- logo here --}}
                    <img src="{{ asset($generalSettings->Logo) }}"
                        style="width: 60%;height:auto; margin-top:10px;margin-bottom:10px" alt="">
                </span>
            </span>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->


        <li class="menu-item active">
            <a href="{{ route('AdminCP') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dash">Dashboard</div>
            </a>
        </li>


        <li class="menu-header small text-uppercase"><span class="menu-header-text">Content MGT</span></li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div class="text-truncate" data-i18n="Settings">Website CMS </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('MgtSlider') }}" class="menu-link">
                        <div class="text-truncate">Sliders</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('MgtGallery') }}" class="menu-link">
                        <div class="text-truncate">Gallery</div>
                    </a>
                </li>

            </ul>
           <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('MgtAbout') }}" class="menu-link">
                        <div class="text-truncate">About Us</div>
                    </a>
                </li>
            </ul>
           <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('MgtWhy') }}" class="menu-link">
                        <div class="text-truncate">Why Us</div>
                    </a>
                </li>
            </ul>



        </li>



        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-book-bookmark"></i>
                <div class="text-truncate" data-i18n="Users Management">Blogs</div>
            </a>
            <ul class="menu-sub">

                <li class="menu-item">
                    <a href="{{ route('MgtBlogs') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Users">Blogs List</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('CreateBlog') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Users">Create</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('MgtComments') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Users">Comments</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('MgtBlogCategory') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Users">Categories</div>
                    </a>
                </li>

            </ul>
        </li>

        <li class="menu-item">
            <a href="{{ route('admin.applications.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div class="text-truncate" data-i18n="POS">Student Applications</div>
            </a>
        </li>



        <li class="menu-header small text-uppercase"><span class="menu-header-text">Settings</span></li>


        <li class="menu-item">
            <a href="{{ route('UserProfile') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div class="text-truncate" data-i18n="POS">Profile</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user-plus"></i>
                <div class="text-truncate" data-i18n="Users Management">Users</div>
            </a>
            <ul class="menu-sub">

                <li class="menu-item">
                    <a href="{{ route('MgtUsers') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Users">Users List</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('CreateUser') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Users">Create</div>
                    </a>
                </li>

            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div class="text-truncate" data-i18n="Settings">Settings </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('GeneralSettings') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="General Settings">General Settings</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('MgtFeatures') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="General Settings">General Features</div>
                    </a>
                </li>

            </ul>
        </li>





        <li class="menu-item">
            <a href="#" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div class="text-truncate" data-i18n="Support">Support</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="#" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div class="text-truncate" data-i18n="Documentation">Documentation</div>
            </a>
        </li>
    </ul>
</aside>


<div class="layout-page">
