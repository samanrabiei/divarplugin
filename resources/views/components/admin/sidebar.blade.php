<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="'index') }}" class="sidebar-logo">
            <img src="{{ asset('admin/assets/images/logo.png') }}" alt="site logo" class="light-logo">
            <img src="{{ asset('admin/assets/images/logo-light.png') }}" alt="site logo" class="dark-logo">
            <img src="{{ asset('admin/assets/images/logo-icon.png') }}" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a href="'email') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>داشبورد</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                    <span>مشتریان</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="'usersGrid') }}"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            افزودن مشتری جدید </a>
                    </li>
                    <li>
                        <a href="{{ route('customers.list') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            لیست مشتریان </a>
                    </li>

                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="hugeicons:invoice-03" class="menu-icon"></iconify-icon>
                    <span> تراکنش ها</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="'invoiceList') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            List</a>
                    </li>
                    <li>
                        <a href="'invoicePreview') }}"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Preview</a>
                    </li>
                    <li>
                        <a href="'invoiceAdd') }}"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Add
                            new</a>
                    </li>
                    <li>
                        <a href="'invoiceEdit') }}"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Edit</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:document-text-outline" class="menu-icon"></iconify-icon>
                    <span>سرویس ها</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="'typography') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Typography</a>
                    </li>

                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="icon-park-outline:setting-two" class="menu-icon"></iconify-icon>
                    <span>تنظیمات</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="'company') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Company</a>
                    </li>
                    <li>
                        <a href="'notification') }}"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Notification</a>
                    </li>
                    <li>
                        <a href="'notificationAlert') }}"><i
                                class="ri-circle-fill circle-icon text-info-main w-auto"></i> Notification Alert</a>
                    </li>
                    <li>
                        <a href="'theme') }}"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Theme</a>
                    </li>
                    <li>
                        <a href="'currencies') }}"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Currencies</a>
                    </li>
                    <li>
                        <a href="'language') }}"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Languages</a>
                    </li>
                    <li>
                        <a href="'paymentGateway') }}"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Payment Gateway</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
