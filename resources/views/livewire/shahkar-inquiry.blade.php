<div>
    <header class="header header-fixed">
        <div class="container">
            <div class="header-content">
                <div class="left-content">
                    <a href="{{ url()->previous() }}" class="back-btn">
                        <i class="icon feather icon-chevron-right"></i>
                    </a>
                    <h6 class="title">تطابق کد ملی و شماره موبایل</h6>
                </div>
                <div class="mid-content"></div>
                <div class="right-content">
                    <ul class="nav nav-pills light style-1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-list-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-list" type="button" role="tab" aria-controls="pills-list"
                                aria-selected="true">
                                <i class="icon feather icon-phone"><a
                                        href="https://open-platform-redirect.divar.ir/completion">
                                        بازگشت به دیوار
                                    </a>
                                </i>
                            </button>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </header>

    <form wire:submit.prevent="submit">
        <div class="page-content space-top p-b80">
            <div class="container">
                <h6 class="title border-bottom pb-2 mb-3">اطلاعات شخص</h6>

                <div class="mb-3">
                    <label class="form-label" for="codemele">کد ملی *</label>
                    <input type="number" wire:model="codemele" id="codemele" class="form-control">
                    @error('codemele')
                        <strong class="text-primary">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="phone">شماره موبایل *</label>
                    <input type="number" wire:model="phone" id="phone" class="form-control">
                    @error('phone')
                        <strong class="text-primary">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="divider border"></div>
                <h6>توضیحات</h6>
                <h7>استعلام شاهکار (تطابق کد ملی و شماره موبایل)</h7>
                <p>
                    برای اطمینان از صحت اطلاعات خریداران و فروشندگان می‌توانید از این سرویس استفاده کنید.
                    با استفاده از این سرویس، کد ملی و شماره موبایل کاربران تطبیق داده می‌شود تا مشخص شود
                    شماره تلفن ثبت‌شده واقعاً متعلق به همان فرد است.
                    این فرایند به افزایش اعتماد میان کاربران کمک می‌کند و باعث می‌شود خرید و فروش با امنیت بیشتری انجام
                    شود.
                </p>
            </div>
        </div>

        <div class="footer fixed bg-white border-top">
            <div class="container py-2">
                <div class="total-cart d-flex justify-content-between align-items-center">
                    <div class="price-area">
                        <h3 class="price">{{ number_format($price) }} تومان</h3>
                        <span class="font-w500 text-primary">هزینه سرویس</span>
                    </div>
                    <button class="btn btn-primary" type="submit">استعلام</button>
                </div>
            </div>
        </div>
    </form>
</div>
